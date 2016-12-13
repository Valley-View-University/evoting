<html>
<head>
<title>
	E-Voting System Admin Panel
</title>
<link rel="icon" type="image/png" href="../favicon.png" />
<!-- CSS Style -->
<link rel="stylesheet" href="admin.css">
<script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<!--sa poip up-->
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
</head>
<body>
	<div id="top">
		<div class="logo">
			<img src="../psu.png" style="width: 44px;">
		</div>
		<div class="welcome">
			<img alt="" src="img/userpic.png">
			<span>Howdy, Admin!</span>
		</div>
	</div>
	<div class="container  clearfix">
		<div class="one-third1 column">
			<ul>
				<li><a href="index.php"><img alt="" src="img/home.png"><span>Dash Board</span></a></li>
				<li><a href="winner.php"><img alt="" src="img/win.png"><span>Winner</span></a></li>
				<li><a href="candidates.php"><img alt="" src="img/candidates.png"><span>Candidates</span></a></li>
				<li><a href="parties.php"><img alt="" src="img/parties.png"><span>Parties</span></a></li>
				<li class="active"><a href="voters.php"><img alt="" src="img/user.png"><span>Voters</span></a></li>
				<li><a href="idnumbers.php"><img alt="" src="img/numbers.png"><span>Voters Information</span></a></li>
				<li><a href="admin.php"><img alt="" src="img/userpic.png"><span>Admin Acount</span></a></li>
				<li><a href="course.php"><img alt="" src="img/page.png"><span>Course</span></a></li>
				<li><a href="position.php"><img alt="" src="img/position.png"><span>Position</span></a></li>
				<li><a href="../index.php"><img alt="" src="img/logout.png"><span>Logout</span></a></li>
			</ul>
		</div>
		<div class="two-thirds1 column">
			<div class="thewraper">
			<div id="formdesign"><input type="text" name="filter" value="" id="filter" placeholder="search..." autocomplete="off" /></div>
			<div>
			<?php
			include('../connect.php');
			$dsdsss='notvoted';
			$xxzz='voted';
			$sadsdsd = $db->prepare("SELECT count(*) FROM voters WHERE status= :a");
				$sadsdsd->bindParam(':a', $dsdsss);
				$sadsdsd->execute();
				$rowaas = $sadsdsd->fetch(PDO::FETCH_NUM);
				$notvoted=$rowaas[0];
			$sadsdsda = $db->prepare("SELECT count(*) FROM voters WHERE status= :b");
				$sadsdsda->bindParam(':b', $xxzz);
				$sadsdsda->execute();
				$rowaasa = $sadsdsda->fetch(PDO::FETCH_NUM);
				$voted=$rowaasa[0];
			$sadsdsds = $db->prepare("SELECT count(*) FROM voters");
				$sadsdsds->execute();
				$rowaass = $sadsdsds->fetch(PDO::FETCH_NUM);
				$tottot=$rowaass[0];
			?>
			Total Students: <?php echo $tottot ?><br><br>
			Voted: <?php echo $voted ?>
			<img src="pollyes.gif" width='<?php echo(100*round($voted/($tottot),2)); ?>' height='20'> <?php echo(100*round($voted/($tottot),2)); ?>%
			<br><br>
			Not Vote: <?php echo $notvoted ?>
			<img src="pollyes.gif" width='<?php echo(100*round($notvoted/($tottot),2)); ?>' height='20'> <?php echo(100*round($notvoted/($tottot),2)); ?>%
			<br><br>
			</div>
			<table id="resultTable" data-responsive="table">
				<thead>
					<tr>
						<th> Name </th>
						<th> Status </th>
						<th> Action </th>
					</tr>
				</thead>
				<tbody>
					<?php
						$result = $db->prepare("SELECT * FROM voters");
						$result->execute();
						for($i=0; $row = $result->fetch(); $i++){
					?>
					<tr class="record">
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['status']; ?></td>
						<td><a href="#" id="<?php echo $row['id']; ?>" class="delbutton" title="Click To Delete">Delete</a></td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
	<div id="footer">
		<div class="copyrights">&copy; Copyright 2016 </div>
	</div>
	<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletestudents.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</body>
</html>
