<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM list_stu_num WHERE id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>