<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
<link href="style.css" rel="stylesheet">

<head>
	<meta charset="utf-8">
  	<meta http-equiv="x-ua-compatible" content="ie=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- To be included in validation PHP files when errors are detected -->
  	<title>An error has been detected!</title>
</head>
<body class="bkg">
	<div id="header">
		<!--FIXME: header-->
	</div>
	<div id="display_panel" class="center" >
		<div id="page_title">
			<h2 class="centertext notop" id="error_header">An error has been detected on the <?php global $page_name; echo $page_name ?> page.<br>Please go back to fix them!</h2>
		</div>
		<div id="errors" style="margin-top: 80px; margin-left: 100px; margin-right: 100px">
			<ol style="font-size: 1.5em">
				<?php
				global $errors;
				foreach ($errors as $error) {
					echo "<li>$error</li>";
				}
				?>
			<ol>
		</div>
		<div id="go_back_form">
			<form action="<?php global $file_name; echo $file_name /* process file which this file is included in */ ?>" method="post" accept-charset="utf-8">
				<div id="submit" class="centertext" style="margin-top: 60px /* to match page_title margin */">
					<input type="submit" name="submit" class="button" value="Go Back">
				</div>
			</form>
		</div>
	</div>
	<div id="footer">
		<!--FIXME: footer-->
	</div>
</body>
</html>