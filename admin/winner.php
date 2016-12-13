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
				<li><a href="index.php"><img alt="" src="img/home.png"><span>Dash Board</span></a></li>
				<li class="active"><a href="winner.php"><img alt="" src="img/win.png"><span>Winner</span></a></li>
				<li><a href="candidates.php"><img alt="" src="img/candidates.png"><span>Candidates</span></a></li>
				<li><a href="parties.php"><img alt="" src="img/parties.png"><span>Parties</span></a></li>
				<li><a href="voters.php"><img alt="" src="img/user.png"><span>Voters</span></a></li>
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
				<span style="text-align: center; font-weight: bold;display: inline-block; margin-top: 6px;">E-Voting Result</span>
				</div>
				
				
				<?php
				include('../connect.php');
				$resultasa = $db->prepare("SELECT * FROM position");
					$resultasa->execute();
					for($i=0; $rowasa = $resultasa->fetch(); $i++){
					$ac=$rowasa['name'];
					$dsds=$ac;
					echo '<div style="margin-top: 18px;">';
					echo '<strong>'.$ac.'</strong><br>';
					$results = $db->prepare("SELECT * FROM candidates WHERE position= :a ORDER BY votes DESC LIMIT 1");
						$results->bindParam(':a', $dsds);
						$results->execute();
						for($i=0; $rows = $results->fetch(); $i++){
							echo $rows['name'].'&nbsp;&nbsp;=&nbsp;&nbsp;'.$rows['votes'].'<br>';
						}
					echo '</div>';
					}
					
				?>
				
				
				
				<?php
				
				?>
				</div>
				</div>
			</div>
		</div>
	</div>
	<div id="footer">
		<div class="copyrights">&copy; Copyright 2016</div>
	</div>
</body>
</html>
