<?php

namespace ConvertAPI;

require_once('Abstract2Image.php');

 /**
  * Extends the ConvertAPI class to convert PDF documents into image format via
  * convertapi.com.
  *
  * @see http://convertapi.com/pdf-image-api
  */
class Pdf2Image extends Abstract2Image {

 /**
  * URL of the appropriate convertapi.com API.
  */
	protected $_apiUrl = 'https://do.convertapi.com/Pdf2Image';

 /**
  * An array of valid input file formats for this conversion. Overrides the
  * parent array.
  */
	protected $_validInputFormats = array('pdf');

}