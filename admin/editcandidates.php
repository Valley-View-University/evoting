<?php
	include('../connect.php');
	$id=$_GET['id'];
	$results = $db->prepare("SELECT * FROM candidates WHERE id= :userid");
	$results->bindParam(':userid', $id);
	$results->execute();
	for($i=0; $rows = $results->fetch(); $i++){
?>
<form action="savecandidate.php" method="POST">
<input type="hidden" name="memids" value="<?php echo $id; ?>" /><br>
Position<br>
<select name="position">
	<option><?php echo $rows['position']; ?></option>
	<?php
	include('../connect.php');
	$result = $db->prepare("SELECT * FROM position");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option><?php echo $row['name']; ?></option>
	<?php
	}
	?>
</select><br>
Name<br>
<input type="text" name="name" value="<?php echo $rows['name']; ?>" /><br>
<input type="submit" value="Save" />
</form>
<?php
}
?>