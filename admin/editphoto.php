<?php
	include('../connect.php');
	$id=$_GET['id'];
	$results = $db->prepare("SELECT * FROM candidates WHERE id= :userid");
	$results->bindParam(':userid', $id);
	$results->execute();
	for($i=0; $rows = $results->fetch(); $i++){
?>
<img src="candidates/<?php echo $rows['image']; ?>" width="250px;" />
<form action="savephoto.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="memids" value="<?php echo $id; ?>" /><br>
Picture: <br />
<input type="file" name="image" class="ed"><br />
<input type="submit" value="Save" />
</form>
<?php
}
?>