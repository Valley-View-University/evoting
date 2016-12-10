<html>
<head>
<title>
	E-Voting System Admin Panel
</title>
<link rel="icon" type="image/png" href="../favicon.png" />
<!-- CSS Style -->
<link rel="stylesheet" href="admin.css">
<!--sa poip up-->
<script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
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
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
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
				<li class="active"><a href="index.php"><img alt="" src="img/home.png"><span>Dash Board</span></a></li>
				<li><a href="winner.php"><img alt="" src="img/win.png"><span>Winner</span></a></li>
				<li><a href="candidates.php"><img alt="" src="img/candidates.png"><span>Candidates</span></a></li>
				<li><a href="parties.php"><img alt="" src="img/parties.png"><span>Parties</span></a></li>
				<li><a href="students.php"><img alt="" src="img/user.png"><span>Voters</span></a></li>
				<li><a href="idnumbers.php"><img alt="" src="img/numbers.png"><span>Voters Information</span></a></li>
				<li><a href="admin.php"><img alt="" src="img/userpic.png"><span>Admin Acount</span></a></li>
				<li><a href="position.php"><img alt="" src="img/position.png"><span>Position</span></a></li>
				<li><a href="../index.php"><img alt="" src="img/logout.png"><span>Logout</span></a></li>
			</ul>
		</div>
		<div class="two-thirds1 column">
			<div class="thewraper">
			<div style="margin-top: 18px;">
			<a id="addd" href="javascript:Clickheretoprint()">Print</a>
			</div>
				<div class="content" id="content">
				<div style="margin-bottom: 30px;">
				<img src="../psu.png" style="width: 44px; float: left; margin-left: 215px;">
				<span style="text-align: center; font-weight: bold;display: inline-block; margin-top: 6px;">Voting Result</span>
				<br>
				</div>
				<?php
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM position ORDER BY id ASC");
					$result->bindParam(':userid', $res);
					$result->execute();
					for($i=0; $row = $result->fetch(); $i++){
					$dsds=$row['name'];
					
					$resulta = $db->prepare("SELECT sum(votes) FROM candidates WHERE position= :a");
					$resulta->bindParam(':a', $dsds);
					$resulta->execute();
					for($i=0; $rowa = $resulta->fetch(); $i++){
					$dsada=$rowa['sum(votes)'];
					}
					echo '<div style="margin-top: 18px;">';
					echo '<strong>'.$row['name'].'&nbsp;&nbsp;Total Votes&nbsp;&nbsp;'.$dsada.'</strong><br>';
					
					$results = $db->prepare("SELECT * FROM candidates WHERE position= :a ORDER BY votes DESC");
					$results->bindParam(':a', $dsds);
					$results->execute();
					for($i=0; $rows = $results->fetch(); $i++){
					{
						echo $rows['name'].'&nbsp;&nbsp;=&nbsp;&nbsp;'.$rows['votes'];
						}
						$sdsd=$dsada
						?>
						<img src="pollyes.gif"
						width='<?php echo(100*round($rows['votes']/($sdsd),2)); ?>'
						height='10'>
						<?php echo(100*round($rows['votes']/($sdsd),2)); ?>%<br>
						<?php
						
						
						
					}
					echo '</div>';
					
					
					
				}
				?>
				</div>
			</div>
		</div>
	</div>
	<div id="footer">
		<div class="copyrights">&copy; Copyright 2016</div>
	</div>
</body>
</html>
