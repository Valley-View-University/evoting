<?php
//Start session
session_start();

//Array to store validation errors
$errmsg_arr = array();

//Validation error flag
$errflag = false;

//Connect to mysql server
include('connect.php');


$c=$_POST['username'];
$d=$_POST['password'];
$w=$_POST['rpassword'];
$x=$_POST['question'];
$y=$_POST['ans'];
$e='notuse';
$f='notvoted';
$g='used';
if ($w!=$d) {
$errmsg_arr[] = 'password mismatch';
$errflag = true;
}
if($errflag) {
	$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
	session_write_close();
	header("location: index.php");
	exit();
}
$resultas = $db->prepare("SELECT * FROM list_stu_num WHERE id_number= :k AND status= :l");
$resultas->bindParam(':k', $c);
$resultas->bindParam(':l', $e);
$resultas->execute();
for($i=0; $rowas = $resultas->fetch(); $i++){
	$a=$rowas['name'];
    //$b=$rowas['course'];
	}

$result = $db->prepare("SELECT * FROM list_stu_num WHERE id_number= :a AND status= :e");
$result->bindParam(':a', $c);
$result->bindParam(':e', $e);
$result->execute();
$rows = $result->fetch(PDO::FETCH_NUM);
if($rows > 0) {
	
	$sql = "INSERT INTO voters (name,username,password,status,question,answer) VALUES (:a,:c,:d,:f,:x,:y)";
	$q = $db->prepare($sql);
	$q->execute(array(':a'=>$a,':c'=>$c,':d'=>$d,':f'=>$f,':x'=>$x,':y'=>$y));
	
	$sqla = "UPDATE list_stu_num 
        SET status=?
		WHERE id_number=?";
$qa = $db->prepare($sqla);
$qa->execute(array($g,$c));
$errmsg_arr[] = 'You can now login to vote';
$errflag = true;
header("location: index.php");
}
else{
	$errmsg_arr[] = 'ID Number Does Not exist Or Already Taken';
	$errflag = true;
}
if($errflag) {
	$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
	session_write_close();
	header("location: index.php");
	exit();
}
?>