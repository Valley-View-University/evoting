<div style="text-align:center; margin-top: 50px;">
<?php
include('connect.php');
$dsdas=$_POST['username'];
$ans=$_POST['answer'];
$sadsdsd = $db->prepare("SELECT count(*) FROM voters WHERE username= :k AND answer= :l");
	$sadsdsd->bindParam(':k', $dsdas);
	$sadsdsd->bindParam(':l', $ans);
	$sadsdsd->execute();
	$rowaas = $sadsdsd->fetch(PDO::FETCH_NUM);
	$wapakpak=$rowaas[0];
?>
<?php
if ($wapakpak != 0) {
$resultas = $db->prepare("SELECT * FROM voters WHERE username= :a AND answer= :b");
	$resultas->bindParam(':a', $dsdas);
	$resultas->bindParam(':b', $ans);
	$resultas->execute();
	for($i=0; $rowas = $resultas->fetch(); $i++){
	?>
Your Password : <?php echo $rowas['password']; ?>
<?php
}
}
if ($wapakpak == 0) {
echo 'Incorrect answer';
}
?>
</div>