<?php

namespace ConvertAPI;

require_once('Abstract2PDF.php');

 /**
  * Extends the ConvertAPI class to convert URLs into PDF format via
  * convertapi.com.
  *
  * @see http://www.convertapi.com/web-pdf-api
  */
class Web2Pdf extends Abstract2Pdf {

 /**
  * URL of the appropriate convertapi.com API.
  */
	protected $_apiUrl = 'https://do.convertapi.com/Web2Pdf';

 /**
  * An string indicating that the valid input format is a URL for this
  * converion. Overrides the parent array.
  */
	protected $_validInputFormats = 'url';

}