<?php

namespace ConvertAPI;

require_once('ConvertAPI.php');

 /**
  * Extends the ConvertAPI class to convert various documents into image format
  * via convertapi.com.
  */
abstract class Abstract2Image extends ConvertAPI {

 /* Magic methods. */

 /**
  * Magic setter method. Checks and sets values for $_additionalParameters.
  *
  * @param string $name Name of the additional parameter to set.
  * @param string $value Value to set the parameter to.
  */
	public function __set($name, $value) {

		switch ($name) {
			case 'OutputFormat':
				if (is_string($value) && in_array($value, array('png', 'jpg', 'tif'))) {
					$this->_additionalParameters[$name] = $value;
				} else {
					throw new \Exception($name.' must be "png", "jpg" or "tif".');
				}
			break;
			case 'JpgQuality':
				if (is_int($value) && $value >= 1 && $value <= 100) {
					$this->_additionalParameters[$name] = $value;
				} else {
					throw new \Exception($name.' must be an integer between 1 and 100.');
				}
			break;
			case 'ImageResolutionH': case 'ImageResolutionV':
				if (is_int($value) && $value >= 72 && $value <= 1200) {
					$this->_additionalParameters[$name] = $value;
				} else {
					throw new \Exception($name.' must be an integer between 72 and 1200.');
				}
			break;
			case 'StoreFile':
				if (is_bool($value)) {
					$this->_additionalParameters[$name] = $value;
				} else {
					throw new \Exception($name.' must be a boolean value.');
				}
			break;
			case 'Timeout':
				if (is_int($value) && $value >= 5 && $value <= 1200) {
					$this->_additionalParameters[$name] = $value;
				} else {
					throw new \Exception($name.' must be an integer between 5 and 1200.');
				}
			break;
		}

	}

}