<?php
	require_once('auth.php');
	include('connect.php');
?>
<html>
<head>
<title>E-Voting System</title>
<link rel="icon" type="image/png" href="favicon.png" />
<style class="csscreations">

/*basic reset*/
* {margin: 0; padding: 0;}

html {
	height: 100%;
	background: #ffffff;
}
body {
	font-family: montserrat, arial, verdana;
}
#msform #submit {
	width: 100px;
	background: #27AE60;
	font-weight: bold;
	color: white;
	border: 0 none;
	border-radius: 1px;
	cursor: pointer;
	padding: 10px 5px;
	margin: 10px 5px;
	font-size: 14px;
}
#msform #submit:hover, #msform #submit:focus {
	box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
}
#msform a{
	text-decoration: none;
	padding: 10px 22px !important;
}
#msform {
	width: 500px;
	margin: 25px auto;
	background: white;
	border: 0 none;
	border-radius: 3px;
	box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
	padding: 20px 30px;
	text-align: left;
	-moz-box-sizing: border-box;
}
.fs-title {
	font-size: 15px;
	text-transform: uppercase;
	color: #2C3E50;
	margin-bottom: 10px;
	margin-top: 10px;
}
#logo {
	margin: 25px auto;
	width: 500px;
}
#logo img {
	float: left;
}
.clearfix {
	clear: both;
}
#logo span {
	display: inline-block;
    font-size: 17px;
    vertical-align: middle;
	margin-top: 34px;
	color: #000000;
}
</style>
</head>
<body>

<form id="msform" action="vote.php" method="Post">
<input type="hidden" value="<?php echo $_SESSION['SESS_MEMBER_ID'] ?>" name="idnum" />
<?php
$resultasa = $db->prepare("SELECT * FROM position");
$resultasa->execute();
for($i=0; $rowasa = $resultasa->fetch(); $i++){
$exrxrxrx=$rowasa['name'];
if ($exrxrxrx!='Senator') {
?>
<h2 class="fs-title"><?php echo $exrxrxrx ?></h2>
<input type="hidden" value="<?php echo $_POST[$exrxrxrx] ?>" name="votes[]" /><?php echo $_POST[$exrxrxrx] ?><br>
<?php
}
?>
<h2 class="fs-title"></h2>
<?php
}
?>
<a href="candidates_list.php" id="submit">Cancel</a>
<input type="submit" value="Submit" id="submit">

</form>
</body>
</html>