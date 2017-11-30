<?php

namespace ConvertAPI;

require_once('Abstract2PDF.php');

 /**
  * Extends the ConvertAPI class to convert PowerPoint documents into PDF format
  * via convertapi.com.
  *
  * @see http://www.convertapi.com/powerpoint-pdf-api
  */
class PowerPoint2Pdf extends Abstract2Pdf {

 /**
  * URL of the appropriate convertapi.com API.
  */
	protected $_apiUrl = 'https://do.convertapi.com/PowerPoint2Pdf';

 /**
  * An array of valid input file formats for this conversion. Overrides the
  * parent array.
  */
	protected $_validInputFormats = array('pot', 'potx', 'pps',
	                                      'ppsx', 'ppt', 'pptx');

}