<?php

#
# ConvertAPI.php
#
# Copyright 2014, Jonathon Wardman. All rights reserved.
# Contact: jonathon@flutt.co.uk / flutt.co.uk
#
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU Lesser General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU Lesser General Public License for more details.
#
# You should have received a copy of the GNU Lesser General Public License
# along with this program. If not, see <http://www.gnu.org/licenses/>.
#

namespace ConvertAPI;

 /**
  * Abstract class for interacting with the convertapi.com APIs. Should be
  * extended in order to support each of the available convertapi.com conversion
  * methods.
  *
  * @see http://convertapi.com/
  */
abstract class ConvertAPI {

 /**
  * API key to use when making requests to convertapi.com APIs.
  */
	public $apiKey = null;
	
 /**
  * Additional parameters to send to convertapi.com when carrying out a Word to
  * PDF conversion.
  */
	protected $_additionalParameters = array();

 /**
  * An array of valid input file formats, or a string representing a URL. Will
  * be checked before conversion and therefore must be populated by concrete
  * classes.
  */
	protected $_validInputFormats = array();

 /* Magic methods. */
	
 /**
  * Constructor. Optionally sets the API key to use for calls to convertapi.com.
  *
  * @param string $apiKey Optional convertapi.com API key to use.
  */
	public function __construct($apiKey = null) {
	
		if (!isset($this->_apiUrl)) {
			throw new \Exception('Child classes of ConvertAPI must specify a value for $this->_apiUrl.');
		}
	
		if ($apiKey != null) {
			$this->apiKey = $apiKey;
		}
	
	}
	
 /* Public methods. */
 /**
  * Concrete classes must provide a convert method: a method which sends the
  * request to convertapi.com and deals with the response.
  *
  * @param string $inputFilename Full path of file to convert.
  * @param string $outputFilename Full path of file to write with converted document.
  */
	public function convert($inputFilename, $outputFilename = null) {
	
	 // Check input file (if it's an array of local file extensions)...
		if (is_array($this->_validInputFormats)) {
			$inputFilenameChunks = explode('.', $inputFilename);
			if (in_array(array_pop($inputFilenameChunks), $this->_validInputFormats)) {
				if (!is_readable($inputFilename)) {
					throw new \Exception('Input file is not readable.');
				}
			} else {
				throw new \Exception('Invalid input file type.');
			}
		}

	 // Check output file...
		if ($outputFilename !== null) {
			if (!((file_exists($outputFilename) && is_writable($outputFilename)) || is_writable(dirname($outputFilename)))) {
				throw new \Exception('Output file target is not writable.');
			}
		}

	 // Do conversion...
		try {
			$convertResponse = $this->_apiRequest($inputFilename);
			if ($outputFilename !== null) {
				if (file_put_contents($outputFilename, $convertResponse['document'])) {
					unset($convertResponse['document']);
					return $convertResponse;
				} else {
					throw new \Exception('Error writing output file.');
				}
			} else {
				return $convertResponse['document'];
			}
		} catch (\Exception $e) {
			throw $e;
		}

	}

 /* Protected methods. */
	
 /**
  * Send a request to the API.
  *
  * @param string $filename Full path of file to convert.
  * @return array Array containing request details and binary data. See above.
  */
	protected function _apiRequest($filename) {
	

		if (function_exists('curl_init')) {
			if (is_readable($filename)) {

	 // Build the post fields array...
				$postFields = array('File' => '@'.$filename);
				if ($this->apiKey !== null) {
					$postFields['ApiKey'] = $this->apiKey;
				}
				if (isset($this->_additionalParameters) && is_array($this->_additionalParameters)) {
					foreach ($this->_additionalParameters AS $key => $value) {
						if ($value !== null) {
							$postFields[$key] = $value;
						}
					}
				}

	 // Carry out the cURL request...
				$curlHandle = curl_init();
				curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curlHandle, CURLOPT_POST, true);
				curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $postFields);
				curl_setopt($curlHandle, CURLOPT_URL, $this->_apiUrl);
				curl_setopt($curlHandle, CURLOPT_HEADER, true);
				$curlReturn = curl_exec($curlHandle);

	 // Split the response into headers and body (usually document)...
				$curlReturnArray = explode("\r\n\r\n", $curlReturn);

	 // Check headers and return the document...
				$headers = explode("\r\n", $curlReturnArray[1]);
				if ($headers[0] == 'HTTP/1.1 200 OK') {
					$returnArray = array('document' => $curlReturnArray[2]);
					foreach ($headers AS $headerLine) {
						$headerParts = explode(': ', $headerLine);
						switch ($headerParts[0]) {
							case 'InputFormat': $returnArray['input'] = $headerParts[1]; break;
							case 'OutputFormat': $returnArray['output'] = $headerParts[1]; break;
							case 'CreditsCost': $returnArray['cost'] = $headerParts[1]; break;
							case 'FileSize': $returnArray['size'] = $headerParts[1]; break;
						}
					}
					return $returnArray;
				} else {
					throw new \Exception('Error converting document.');
				}

			} else {
				throw new \Exception('File does not exist or is not readable.');
			}
		} else {
			throw new \Exception('Invalid API URL.');
		}
	
	}
	
 /* Abstract methods. */
 
 /**
  * Magic setter method. Concrete classes must define this to handle the
  * _additionalParametersvariable. It should check and set all valid additional
  * parameters for the given API.
  *
  * @param string $name Name of the additional parameter to set.
  * @param string $value Value to set the parameter to.
  */
	abstract public function __set($name, $value);

}
