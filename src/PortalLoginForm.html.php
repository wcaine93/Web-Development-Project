<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
<link href="style.css" rel="stylesheet">

<head>
	<meta charset="utf-8">
  	<meta http-equiv="x-ua-compatible" content="ie=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- Login to registration portal -->
  	<title>Sign in to SeatMe Registration Portal</title>
</head>
<body class="bkg">
	<div id="header">
		<!--FIXME: header-->
	</div>
	<div id="display_panel" class="center" >
		<div id="page_title">
			<h1 class="centertext notop" id="log_in_to_registration_portal">Sign in to SeatMe <a href="LandingPage.html.php"><img alt="SeatMe logo" width="20" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/Windsor_Chair.svg/716px-Windsor_Chair.svg.png?20200505051955"></a>&nbsp; Registration Portal</h1>
		</div>
		<div id="login_form">
			<form action="Login.process.php" method="post" accept-charset="utf-8">
				<div id="inputs">
					<div class="row" id="student_id">
						<label for="username">Student ID</label>
						<input type="text" name="student_id" autocomplete="username" placeholder="910XXXXXX" minlength="9" maxlength="9" id="username">
					</div>
					<div class="row" id="PIN">
						<label for="password">PIN</label>
						<input type="password" name="PIN" autocomplete="current-password" placeholder="Between 8 and 20 characters" minlength="8" maxlength="20" style="width: 17em" id="password">
					</div>					
				</div>
				<div id="submit" class="centertext" style="margin-top: 80px /* to match page_title margin */">
					<input type="submit" name="submit" class="button" value="Sign in">
				</div>
			</form>
		</div>
	</div>
	<div id="forgot_password" style="text-align: right; margin-right: calc(var(--center-margin)*1.1); padding-top: 15px">
		<a href="ForgotPasswordForm.html.php" style="color: gray">Forgot PIN?</a>
	</div>
	<div id="footer">
		<!--FIXME: footer-->
	</div>
</body>
</html>
