<?php
session_start();
include('../connect.php');
$a = $_POST['name'];
$b = $_POST['description'];
// query
$sql = "INSERT INTO party (name,description) VALUES (:a,:b)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b));
header("location: parties.php");


?>