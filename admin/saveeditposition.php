<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memids'];
$a = $_POST['position'];
// query
$sql = "UPDATE position 
        SET name=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$id));
header("location: position.php");

?>