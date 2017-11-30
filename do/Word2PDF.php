<?php

namespace ConvertAPI;

require_once('Abstract2PDF.php');

 /**
  * Extends the ConvertAPI class to convert Microsoft Word documents into PDF
  * format via convertapi.com.
  *
  * @see http://convertapi.com/word-pdf-api
  */
class Word2Pdf extends Abstract2Pdf {

 /**
  * URL of the appropriate convertapi.com API.
  */
	protected $_apiUrl = 'https://do.convertapi.com/Word2Pdf';
	
 /**
  * An array of valid input file formats for this conversion. Overrides the
  * parent array.
  */
	protected $_validInputFormats = array('doc', 'docx', 'dot',
	                                      'dotx', 'wpd', 'wps',
	                                      'wri');

}