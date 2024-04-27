<?php
/**
 * Contains methods to read ClassHistory pdf file and turn into database entry
 */


/**
 * Ends execution and notifies user of data missing from class history document, sending back to ClassHistoryForm.html for reexecution
 * @see ClassHistoryForm.hmtl
 *
 * @param	String	$missing_data	specifies the field name for missing data
 * @return	void
 */
function missingData(string $missing_data, string $error_text = '%s information cannot be found within the class history document.') {
	echo '<p>'; // FIXME: style tags to center text block in middle of screen
	echo sprintf($error_text, $missing_data) . ' Please re-upload valid class history document.';
	echo '</p>'; // FIXME: button leading to ClassHistoryForm.html
	die();
}


/** 
 * I: Parses PDF file and return content as String array
 * 
 * @see https://github.com/smalot/pdfparser/blob/master/doc/Usage.md
 */
include 'pdfparser.php-dist';

$parser = new \Smalot\PdfParser\Parser();
$pdf = $parser->parseFile('Class History.pdf');

// places text data from all pages of class history document into flat $text array
$text = [];
foreach ($pdf->getPages() as $page) {
	$text = array_merge($text, $page->getTextArray());
}

// notify user if document does not contain "Class History"
if (!in_array("Class History", $text)) {
	missingData('PDF uploaded as class history is missing "Class History" header', "%s. This document is not a class history document.");
}


/**
 * II: Assigns user data (UD) for database allocation
 */

echo "<pre>";
print_r($text);
echo "</pre>";
?>
