<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_COURSE']);
	unset($_SESSION['NAME']);
?>
<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="10;url=index.php">
        <title>Page Redirection</title>
    </head>
    <body style="font-family: arial; font-size: 12px; margin-top:50px; text-align: center;">
		Your Vote Has been Submited , Thank you for your time<br>
		note <span style="font-style:italic">( you cannot vote again after you read this confirmation )</span><br>
        If you are not redirected automatically, Click the <a href='index.php'>link</a>
    </body>
</html>
<?php
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_COURSE']);
	unset($_SESSION['NAME']);
?>
