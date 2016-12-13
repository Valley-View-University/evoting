<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memids'];
$a = $_POST['name'];
$b = $_POST['position'];
// query
$sql = "UPDATE candidates 
        SET name=?, position=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b,$id));
header("location: candidates.php");

?>