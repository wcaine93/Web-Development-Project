<?php
/**
 * Contains methods to read ClassHistory pdf file and turn into database entry
 */

include 'pdfparser.php-dist';

// Parse PDF file and return content as String
$parser = new \Smalot\PdfParser\Parser();
$pdf = $parser->parseFile('Class History.pdf');

$text = $pdf->getText();;
echo $text;
?>