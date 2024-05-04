<?php
/**
 * Read ClassHistory pdf file and turns into database entry
 */


/**
 * Ends execution and notifies user of data missing from class history document, sending back to ClassHistoryForm.html for reexecution
 * @see ClassHistoryForm.html
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
$UD_fields = array('name' => '/Student/', 
						'level' => '/Level/', 
						'student_id' => '/ID/', 
						'degree' => '/Degree/', 
						'classification' => '/Classification/', 
						'major' => '/Major[s]?/', 
						'advisor' => '/Advisor[s]?/', 
						'concentration' => '/Concentration[s]?/', 
						'GPA' => '/Institutional GPA/',
						'minor' => '/Minor[s]?/',
					   'classes' => '/(Spring|Summer|Fall) [0-9]{4}/' /* only for termination */);

// takes all data between field names and inserts into $UD_fields as array
$arr = preg_grep('/Student/', $text); // dummy variable
if($arr === FALSE) missingData("Student");
$text = array_slice($text, array_key_first($arr)); // locate key (first instance)
$prev_field = 'name';
foreach ($UD_fields as $field => $regex) {
	if ($field == 'name') continue;
	// locates key of (first instance of) $field, notify user as missing if nonexistent
	$arr = preg_grep($regex, $text); // dummy variable
	if($arr === FALSE) missingData($field);
	$next_index = array_key_first($arr);
	
	// assigns data[] of $prev_field to $UD_fields, removing empty values
	$UD_fields[$prev_field] = array_values(preg_grep('/^\S+/', array_slice($text, 1, $next_index - 1)));
	
	// shifts off assigned field information
	$text = array_slice($text, $next_index);
	$prev_field = $field;
}


/**
 * III: Assigns class data (CD) for database allocation
 *
 * Uses $text internal pointer to assign data to $CD_fields aligned by index across keys
 * (i.e. $CD_fields['subject'][1] corresponds to $CD_fields['number'][1])
 */
$sem_year_regex = '/(Spring|Summer|Fall) [0-9]{4}/';
$subjects = '/^(ACCT|AENT|AGEC|ANSC|ARTH|BHSC|BIOL|BIOT|BLOG|BOTN|BUSA|CHEM|COMM|COUN|CRJU|CSCI|CSIS|DATA|ECON|ECSP|EDMG|EDSC|EDUC|EEGG|ELET|ENGG|ENGL|EPSY|FCSC|FDNU|FREN|FVSU|GEOG|GEOL|GERO|HIST|HLTH|HORT|HPER|ICDV|ITEC|MAED|MATH|MCMM|MILS|MKTG|MLHC|MNGT|MUSC|NURS|PBHL|PEDW|PHIL|PHSC|PHYS|POLS|PSCI|PSYC|RCCM|READ|SCIE|SOSC|SOWK|SPAN|SSCI|STAT|VETY|ZOOL|SOCI|ISCI|ARTS|ENVS|THEA|FTA|GFA |ORGL|HADM|OATC|SJUS)$/';
$CD_fields = array('semester' => [],
						 'year' => [],
						 'subject' => [],
						 'number' => [],
						 'modifier' => [], // in $text, appended to course number
						 'title' => [],
						 'grade' => [],
						 'credits' => [],
						 'notes' => []);
						 
// takes data between subject titles and assigns to $CD_felds as string
// multiple entries delimited by ";"
$count = 0;
foreach ($text as $info) {
	// update semester and year each time heading appears in $text
	if (preg_match($sem_year_regex, $info) != FALSE) {
		$sem_year = explode(' ', $info);
		$semester = $sem_year[0];
		$year = $sem_year[1];
		
		// set internal array pointer to subject element
		reset($CD_fields); // semester
		next($CD_fields); // year
		next($CD_fields); // subject
		continue;
	}
	
	// move to next class information when new subject is reached
	if (preg_match($subjects, $info) != FALSE) {
		++$count;
		$CD_fields['semester'][$count] = $semester;
		$CD_fields['year'][$count] = $year;
		$CD_fields['subject'][$count] = $info;
		
		// set internal array pointer to next element
		reset($CD_fields); // semester
		next($CD_fields); // year
		next($CD_fields); // subject
		next($CD_fields); // number
		continue;
	}

	// if the current key is 'number', check number for course modifier and separate
	if(key($CD_fields) == 'number') {
		preg_match('/([0-9]{4})(.)?/', $info, $number);
		$CD_fields['number'][$count] = $number[1]; // first capture group contains number
		$CD_fields['modifier'][$count] = $number[2]; // second capture group contains modifier
		
		next($CD_fields); // modifier
		next($CD_fields); // title
	}
	// else assign to corresponding field, skipping blank rows
	else if (preg_match('/^\s*$/', $info) == FALSE) {
		$CD_fields[key($CD_fields)][$count] = $CD_fields[key($CD_fields)][$count] . $info;
		
		// do not advance if field is 'notes'
		if(key($CD_fields) != 'notes') next($CD_fields);
	}
}

echo "<pre>";
print_r($text);
print_r($CD_fields);
echo "</pre>";
?>
