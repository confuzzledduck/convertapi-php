<?php

namespace ConvertAPI;

require_once('Abstract2PDF.php');

 /**
  * Extends the ConvertAPI class to convert email documents into PDF format via
  * convertapi.com.
  *
  * @see http://www.convertapi.com/lotus-pdf-api
  */
class Email2Pdf extends Abstract2Pdf {

 /**
  * URL of the appropriate convertapi.com API.
  */
	protected $_apiUrl = 'http://do.convertapi.com/Lotus2Pdf';

 /**
  * An array of valid input file formats for this conversion. Overrides the
  * parent array.
  */
	protected $_validInputFormats = array('123', '12m', 'wk1',
	                                      'wk2', 'wk3', 'lwp',
	                                      'mwp', 'sam');

}