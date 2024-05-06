<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
<link href="style.css" rel="stylesheet">

<head>
	<meta charset="utf-8">
  	<meta http-equiv="x-ua-compatible" content="ie=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- To be called by sql_error() in db_connect.inc.php -->
  	<title>A <?php global $errno; echo $errno ?> error has been thrown!</title>
</head>
<body class="bkg">
	<div id="header">
		<!--FIXME: header-->
	</div>
	<div id="display_panel" class="center" >
		<div id="page_title">
			<h2 class="centertext" style="margin-top: 100px" id="error_header">SQL Error: Number <?php global $errno; echo $errno ?></h2>
		</div>
		<div id="error_information" style="margin: 100px" class="centertext">
			<p>Error text: <?php global $error; echo $error ?>. Please contact your system administrator.</p>
		</div>
	</div>
	<div id="footer">
		<!--FIXME: footer-->
	</div>
</body>
</html>