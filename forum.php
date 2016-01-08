<?php
session_start();
require_once 'class/dataManager.php';
require_once 'class/user.inc.php';
$dm = new dataManager();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Almost There 2015">

	<meta name="author" content="Institute of Engineering & Management">
	<meta property="og:title" content="Innovacion Online Treasure Hunt" /> 
	<meta property="og:description" content="Innovacion Online Treasure Hunt" />  
	<!--<meta property="og:image" content="http://www.iemculturalfest.com/images/iemcf2.jpg" />
	<meta property="og:image:width" content="960" />  
	<meta property="og:image:height" content="590" />
	<meta property="og:url" content="http://www.iemculturalfest.com"/>-->
	<meta name="keywords" content="iem,iem conference,iemcon 2014,iemcon2014,electronics,computer,engineering,iem conference 2014"/>
	<title>Innovacion Online Treasure Hunt</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<link rel="stylesheet" href="css/treasure.css">
	<link rel="shortcut icon" href="images/favicon.ico">
	<!-- Add custom CSS here -->
	<style>
		body {margin-top: 60px;}
	</style>

  </head>

  <body>
	  <img src="images/Almostthere-bg.jpg" class="bg"/>
	  
	<?php include 'includes/navbar.php'; ?>

	
	
	<div class="container main_body">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				 <div class="well"  style="padding:0;">
					<div class="row">
						<div class="col-md-4">
<div class = "clock">
	<a href="#" id="timer"></a></div>
</div>

						<div class="col-md-4">
							<h4 id="levelno" align="center"><strong>FORUM</strong></h4>
						</div>    
						<div class="col-md-4"></div>
					</div>
				</div>
				<br>
				
				<?php
				if($dm->isLogged()) {
				if(isset($_GET['level'])) {
					$level = 1;
					if($level>=1||$level<=T_MAXLEVEL) $level = $_GET['level'];
					$user_level = $dm->getLevel($_SESSION['treasure_user_id']);
					if(($user_level!=$level)&&($_SESSION['treasure_user_role']==0)) {
						?>
				<div class="well"><h4 class="text-danger">You are currently playing in Level <?php echo $user_level ?>. Don't try anything fancy. No point hanging around. :P  </h4></div>    
							
						<?php
					}
					else{
					?>
					<div class="well"  style="padding:0;">
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<h4 id="levelno" align="center"><strong>LEVEL <?php echo $level; ?></strong></h4>
						</div>    
						<div class="col-md-4"></div>
					</div>
					</div>    
						
					<?php
					
					
					$post = $dm->getComment($level,1);
					while($row = $post->fetch()) {
						?>
						<div class="well" style="margin-bottom:0.6em;" id="post">
					<div class="row">
						<div class="col-md-2" align="center">
							<img class="img img-responsive img-circle" <?php if($row['role']==1) echo 'src="images/admin_pic.jpg"'; else echo 'src="images/player.jpg"'; ?> />
							<p><strong><?php if($row['role']==1) echo 'Admin'; else echo $row['full_name']; ?></strong></p>
						</div>
						<div class="col-md-8">
							<p><?php echo $row['post']; ?></p>
						</div>
						<div class="col-md-2">
							<strong><?php echo $row['posted_on']; ?></strong>
								<?php if($_SESSION['treasure_user_role']==1) echo '<br><button type="button" class="btn btn-danger btn-sm " onclick="deletePost(' . $row['post_id'] .');">Delete</button>'; ?>
						</div>
						
					</div>
				</div>      
							
							
						<?php
					}?>
				<hr>
					<div class="well" style="margin-bottom:0.6em;" id="post">
					<div class="row">
						<div class="col-md-2" align="center">
							<img class="img img-responsive img-circle" <?php if($_SESSION['treasure_user_role'] ==1) echo 'src="images/admin_pic.jpg"'; else echo 'src="images/player.jpg"'; ?>  />
							<br><p><strong><?php if($_SESSION['treasure_user_role'] ==1) echo 'Admin'; else echo $_SESSION['treasure_name']; ?></strong></p>
						</div>
						<div class="col-md-10">
							
							<textarea rows="5" id="postreply" name="postReply" placeholder="Post your reply here!"></textarea>
							&nbsp;
							<input type="button" class="btn btn-primary" id="submitPost" name="submitPost" value="Submit" onclick="postComment(<?php echo $level; ?>);"/>
							
						</div>
						
					</div>
				</div><?php
				
				/*if($_SESSION['treasure_user_role'] == 1{
					$dm->clearCount($level);
					}*/
				
				}
				}
				else {
				?>
				
				<div class="well" style="padding:0;">
					<h4 id="levelno" align="center">Select Level</h4>
				</div>
				<br>
				<div class="row" id="buttonrow">
					<?php
					if($_SESSION['treasure_user_role'] == 1) {
					  for($i=1;$i<=T_MAXLEVEL;$i++) {
						$newcount = $dm->getCount($i);
						echo '<div class="col-xs-2"><a type="button" class="btn btn-block btn-lg btn-default" href="forum.php?level=' . $i . '">Level ' . $i;
						if($newcount!=0) echo '<span class="badge pull-right">' . $newcount . '</span>';
						echo '</a></div>';
						
						if($i % 6 == 0) {
							echo '</div><div class="row" id="buttonrow">';
						}
					}  
					}else {
					
					$cur_level = $dm->getLevel($_SESSION['treasure_user_id']);
					for($i=1;$i<=T_MAXLEVEL;$i++) {
						if($i!=$cur_level) {
						   echo '<div class="col-xs-2"><a type="button" class="btn btn-block btn-lg btn-success" href="#">Level ' . $i . '</a></div>';
						}else {
						echo '<div class="col-xs-2"><a type="button" class="btn btn-block btn-lg btn-default" href="forum.php?level=' . $i . '">Level ' . $i . '</a></div>';
						}
						if($i % 6 == 0) {
							echo '</div><div class="row" id="buttonrow">';
						}
					}
					}
					?>
				   
					
				</div>
				<?php } }else { echo '<div class="well"><h3 class="text-danger" align="center">Sorry, you must Login first!<br>Click <a href=\'login.php\'>here </a> to login!</h3></div>'; } ?>
			</div>
			<div class="col-md-1"></div>
		</div>
		
	</div>
	

	<?php include 'includes/footer.php'; ?>
	  <script type="text/javascript">
	   function postComment(level) {
		   var post = document.getElementById("postreply").value;
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				var output = xmlhttp.responseText;
				if(output === "1") {
					window.location.reload(true);
				}else {
					alert(output);
				}
				
			}
	  }
	 xmlhttp.open("GET","class/forum_manager.php?p="+post+"&l="+level,true);
	 xmlhttp.send();
	   }
	   
	   function deletePost(post_id) {
		   var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				window.location.reload(true);
			}
	  }
	 xmlhttp.open("GET","class/forum_manager.php?del="+post_id,true);
	 xmlhttp.send();
	   }
	  
	  </script>

  </body>
<style>
.clock
{
	text-color:#219ab2;
	font-size:25px;
}
</style>
</html>