<?php

// Include the required concrete conversion class
include('../Text2PDF.php');

try {
// Instantiate the class
	$text2pdf = new ConvertAPI\Text2Pdf();
// Convert the file
	$text2pdf->convert(__DIR__.'/input.txt', __DIR__.'/output.pdf');
} catch (Exception $e) {
	var_dump($e->getMessage());
}