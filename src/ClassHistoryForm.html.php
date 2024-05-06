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
<body>
	<div id="header">
		<!--FIXME: header-->
	</div>
	<div id="title">
		<h1 id="upload_my_class_history">Upload My Class History to SeatMe</h1> <!--FIXME: center header?-->
	</div>
	<div id="class_history_form">
		<form action="ClassHistoryForm_submit" method="post" enctype="multipart/form-data" accept-charset="utf-8">
			<!--No max file size-->
			<label for="class_history">Class history: </label>
			<input type="file" name="class_history" accept="application/pdf" id="class_history">
	
			<p class="centertext"><input type="submit" name="upload" value="Upload files"></p>
		</form>
	</div>
	<div id="footer">
		<!--FIXME: footer-->
	</div>
</body>
</html>