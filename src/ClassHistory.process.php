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

// notify user if document does not contain "Class History" and assign index if so
$start_index = array_search("Class History", $text);
if ($start_index === false) {
	missingData('PDF uploaded as class history is missing "Class History" header', '%s. This document is not a class history document.');
}
$text = array_slice($text, $start_index);


/**
 * II: Assigns user data (UD) for database allocation
 * 
 * To reduce complexity searching over large arrays, parsed data is shifted off array after use
 */
// field => regex to be replaced with field => data[] in next step
$UD_fields = array('Student' => '/Student/', 
						'Level' => '/Level/', 
						'ID' => '/ID/', 
						'Degree' => '/Degree/', 
						'Classification' => '/Classification/', 
						'Major' => '/Major[s]?/', 
						'Advisor' => '/Advisor[s]?/', 
						'Concentration' => '/Concentration[s]?/', 
						'GPA' => '/Institutional GPA/', // only field whose name differs
						'Minor' => '/Minor[s]?/',
						'Classes' => '/(Spring|Summer|Fall) [0-9]{4}/');

// takes all data between field names and inserts into $UD_fields as array
$arr = preg_grep('/Student/', $text); // dummy variable
if($arr === FALSE) missingData("Student");
$text = array_slice($text, array_key_first($arr)); // locate key (first instance)
$prev_field = 'Student';
foreach ($UD_fields as $field => $regex) {
	if ($field == 'Student') continue;
	// locates key of (first instance of) $field, notify user as missing if nonexistent
	$arr = preg_grep($regex, $text); // dummy variable
	if($arr === FALSE) missingData($field);
	$next_index = array_key_first($arr);
	
	// assigns data[] of $prev_field to $UD_fields, removing empty values
	$UD_fields[$prev_field] = array_values(preg_grep('/^\S/', array_slice($text, 1, $next_index - 1)));
	
	// shifts off assigned field information
	$text = array_slice($text, $next_index);
	$prev_field = $field;
}


echo "<pre>";
print_r($text);
echo "</pre>";
?>
