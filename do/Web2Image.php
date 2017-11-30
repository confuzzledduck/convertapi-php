<?php

namespace ConvertAPI;

require_once('Abstract2Image.php');

 /**
  * Extends the ConvertAPI class to convert URLs into image format via
  * convertapi.com.
  *
  * @see http://www.convertapi.com/web-image-api
  */
class Web2Image extends Abstract2Image {

 /**
  * URL of the appropriate convertapi.com API.
  */
	protected $_apiUrl = 'https://do.convertapi.com/Web2Image';

 /**
  * A string indicating that the valid input format is a URL for this
  * converion. Overrides the parent array.
  */
	protected $_validInputFormats = 'url';

}