<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memids'];
$a = $_POST['username'];
$b = $_POST['password'];
// query
$sql = "UPDATE admin 
        SET username=?, password=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$id));
header("location: admin.php");

?>