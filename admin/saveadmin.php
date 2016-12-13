<?php
session_start();
include('../connect.php');
$a = $_POST['username'];
$b = $_POST['password'];
// query
$sql = "INSERT INTO admin (username,password) VALUES (:a,:b)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b));
header("location: admin.php");


?>