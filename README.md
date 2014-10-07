convertapi-php
==============

  PHP library for the [convertapi.com](http://www.convertapi.com) REST API.

ConvertApi is an online file conversion service for creating PDF and Images from various source files, such as Word documents, web pages and raw HTML. converapi-php provides a set of classes for using the ConvertApi service with PHP.

Development of this library is not in any way connected with Baltsoft Software.

Using
-----

Using the library is simple:

1. Include the required concrete class ( include('Text2PDF.php'); )
2. Instantiate the class ( $text2pdf = new ConvertAPI\Text2Pdf(); )
3. Either:
  1. Carry out the conversion using filesystem path for output ( $text2pdf->convert('/path/to/intput/file.txt', '/path/to/output/file.pdf'); )
  2. Carry out the conversion using function return for output ( $text2pdf->convert('/path/to/intput/file.txt'); )

The conversion will write the converted document to the given filesystem path and return verious details about the conversion (depending on the response from ConvertApi), or return a binary string representation of the document.

See example/example.php for a working example.

Extending
---------

The library currently supports all the conversions available via convertapi.com.

Addition of new conversions is simply a matter of extending the abstract ConvertAPI class and

a) defining:
* $_apiUrl - the URL of the ConvertApi endpoint (see http://www.convertapi.com/ for details)
* $_validInputFormats - an array of document types (extensions) which can be converted

b) completing function __set() to handle additional valid parameters for the conversion being defined.
