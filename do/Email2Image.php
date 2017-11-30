<?php

namespace ConvertAPI;

require_once('Abstract2Image.php');

 /**
  * Extends the ConvertAPI class to convert Email documents into image format
  * via convertapi.com.
  *
  * @see http://www.convertapi.com/email-image-api
  */
class Email2Image extends Abstract2Image {

 /**
  * URL of the appropriate convertapi.com API.
  */
	protected $_apiUrl = 'https://do.convertapi.com/Email2Image';

 /**
  * An array of valid input file formats for this conversion. Overrides the
  * parent array.
  */
	protected $_validInputFormats = array('eml', 'mbx', 'msg',
	                                      'oft');

}