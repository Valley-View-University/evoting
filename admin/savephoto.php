<?php
session_start();
include('../connect.php');

// new data
$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);
		if ($image_size==FALSE) {
		
			echo "That's not an image!";
			
		}else{
		move_uploaded_file($_FILES["image"]["tmp_name"],"candidates/" . $_FILES["image"]["name"]);
		$b = $_POST['memids'];
		$a=$_FILES["image"]["name"];
$sql = "UPDATE candidates 
        SET image=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$b));
header("location: candidates.php");
}


?>