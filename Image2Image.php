<?php

namespace ConvertAPI;

require_once('Abstract2Image.php');

 /**
  * Extends the ConvertAPI class to convert Image documents into image format
  * via convertapi.com.
  *
  * @see http://www.convertapi.com/image-image-api
  */
class Image2Image extends Abstract2Image {

 /**
  * URL of the appropriate convertapi.com API.
  */
	protected $_apiUrl = 'https://do.convertapi.com/Image2Image';

 /**
  * An array of valid input file formats for this conversion. Overrides the
  * parent array.
  */
	protected $_validInputFormats = array('avs', 'bmp', 'dcx',
	                                      'dib', 'dpx', 'fax',
	                                      'fits', 'fpx', 'gif',
	                                      'ico', 'iptc', 'jbig',
	                                      'jp2', 'jpeg', 'jpg',
	                                      'mdi', 'miff', 'mng',
	                                      'mpc', 'mtv', 'otb',
	                                      'pbm', 'pcd', 'pcds',
	                                      'pct', 'pcx', 'pgm',
	                                      'pict', 'png', 'pnm',
	                                      'ppm', 'psd', 'p7',
	                                      'ras', 'rgba', 'sun',
	                                      'tga', 'tiff', 'tif',
	                                      'vicar', 'vid', 'viff',
	                                      'wmf', 'xbm', 'xpm',
	                                      'xwd');

}