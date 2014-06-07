<?php

namespace ConvertAPI;

require_once('Abstract2PDF.php');

 /**
  * Extends the ConvertAPI class to convert Rich Text documents into PDF
  * format via convertapi.com.
  *
  * @see http://convertapi.com/richtext-pdf-api
  */
class RichText2Pdf extends Abstract2Pdf {

 /**
  * URL of the appropriate convertapi.com API.
  */
	protected $_apiUrl = 'http://do.convertapi.com/RichText2Pdf';

 /**
  * An array of valid input file formats for this conversion. Overrides the
  * parent array.
  */
	protected $_validInputFormats = array('rtf');

}