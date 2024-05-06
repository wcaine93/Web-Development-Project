<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
<link href="style.css" rel="stylesheet">

<head>
	<meta charset="utf-8">
  	<meta http-equiv="x-ua-compatible" content="ie=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- To upload class history file from Ellucian degree management software -->
  	<title>Upload Class History to SeatMe</title>

	<!-- FIXME: Include upload for both class history and dynamic schedule at same time -->
</head>
<body class="bkg">
	<div id="header">
		<!--FIXME: header-->
	</div>
	<div id="display_panel" class="center" >
		<div id="page_title">
			<h1 class="centertext notop" id="log_in_to_registration_portal">Upload Class History to SeatMe <a href="LandingPage.html.php"><img alt="SeatMe logo" width="20" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/Windsor_Chair.svg/716px-Windsor_Chair.svg.png?20200505051955"></a>&nbsp;</h1>
		</div>
		<div id="login_form">
			<form action="ClassHistory.process.php" method="post" accept-charset="utf-8">
				<div class="row" id="student_id">
					<!--No max file size-->
					<label for="class_history">Class history: </label>
					<input type="file" name="class_history" accept="application/pdf" id="class_history">
				</div>
				<div id="submit" class="centertext" style="margin-top: 80px /* to match page_title margin */">
					<input type="submit" name="upload" class="button" value="Upload">
				</div>
			</form>
		</div>
	</div>
	<div id="footer">
		<!--FIXME: footer-->
	</div>
</body>
</html>