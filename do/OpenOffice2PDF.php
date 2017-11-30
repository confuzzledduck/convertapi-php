<?php

namespace ConvertAPI;

require_once('Abstract2PDF.php');

 /**
  * Extends the ConvertAPI class to convert Microsoft Word documents into PDF
  * format via convertapi.com.
  *
  * @see http://convertapi.com/word-pdf-api
  */
class OpenOffice2Pdf extends Abstract2Pdf {

 /**
  * URL of the appropriate convertapi.com API.
  */
	protected $_apiUrl = 'https://do.convertapi.com/OpenOffice2Pdf';

 /**
  * An array of valid input file formats for this conversion. Overrides the
  * parent array.
  */
	protected $_validInputFormats = array('mml', 'odc', 'odf',
	                                      'odg', 'odi', 'odm',
	                                      'odp', 'ods', 'odt',
	                                      'otg', 'oth', 'otp',
	                                      'ots', 'pxl', 'sgl',
	                                      'smf', 'srw', 'stc',
	                                      'sti', 'stw', 'sxc',
	                                      'sxg', 'sxi', 'sxm',
	                                      'sxw', 'vor', 'wv2');

}