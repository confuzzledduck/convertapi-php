convertapi-php
==============

PHP library for the convertapi.com REST API.

ConvertApi is an online file conversion service for creating PDF and Images from various source files, such as Word documents, web pages and raw HTML. converapi-php provides a set of classes for using the ConvertApi service with PHP.

Development of this library is not in any way connected with Baltsoft Software.

Extending
---------

The library currently supports the following conversions:
* Word -> PDF
* Text -> PDF
* Rich Text -> PDF
* Open Office -> PDF

Addition of new conversions is simply a matter of extending the abstract ConvertAPI class and

a) defining:
* $_apiUrl - the URL of the ConvertApi endpoint (see http://www.convertapi.com/ for details)
* $_validInputFormats - an array of document types (extensions) which can be converted

b) completing function __set() to handle additional valid parameters for the conversion being defined.
