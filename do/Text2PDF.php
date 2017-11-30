<?php

namespace ConvertAPI;

require_once('Abstract2PDF.php');

 /**
  * Extends the ConvertAPI class to convert Rich Text documents into PDF
  * format via convertapi.com.
  *
  * @see http://www.convertapi.com/text-pdf-api
  */
class Text2Pdf extends Abstract2Pdf {

 /**
  * URL of the appropriate convertapi.com API.
  */
	protected $_apiUrl = 'https://do.convertapi.com/Text2Pdf';

 /**
  * An array of valid input file formats for this conversion. Overrides the
  * parent array.
  */
	protected $_validInputFormats = array('txt', 'log');

}