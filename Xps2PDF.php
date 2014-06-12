<?php

namespace ConvertAPI;

require_once('Abstract2PDF.php');

 /**
  * Extends the ConvertAPI class to convert Open Paper documents into PDF format
  * via convertapi.com.
  *
  * @see http://convertapi.com/xps-pdf-api
  */
class Xps2Pdf extends Abstract2Pdf {

 /**
  * URL of the appropriate convertapi.com API.
  */
	protected $_apiUrl = 'http://do.convertapi.com/Xps2Pdf';

 /**
  * An array of valid input file formats for this conversion. Overrides the
  * parent array.
  */
	protected $_validInputFormats = array('xps');

}