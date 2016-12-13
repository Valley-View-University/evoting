<?php
session_start();
include('../connect.php');
$a = $_POST['idnum'];
$b = 'notuse';
$d = $_POST['lname'].', '.$_POST['fname'].' '.$_POST['mname'];

// query
$sql = "INSERT INTO list_stu_num (id_number,status,name) VALUES (:a,:b,:c)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$d));
header("location: idnumbers.php");


?>