<?php
session_start();
require_once 'class/dataManager.php';
$dm = new dataManager();

if(!$dm->started()){
    header ('Location:nice-try.php');
}
if(isset($_POST['submit'])) {
    $res = $dm->loginUser($_POST['username'], $_POST['password']);
    if($res===1) header ('Location:play.php');
    else $error = 1;
}

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
                            <h4 id="levelno" align="center"><strong>LOGIN HERE</strong></h4>
                        </div>    
                        <div class="col-md-4"></div>
                    </div>
                </div>
                <br>
                
                 <div class="well">
                     <div class="row">
                     <div class="col-md-3"></div>
                     <div class="col-md-6">
                <form method="post" action="">
                  <div class="form-group" >
                    <label>
                      Enter your username
                    </label>
                    <input type="text" class="form-control" name="username" placeholder="Enter your username">
                  </div>

                <div class="form-group">
                  <label>
                    Enter password
                  </label>
                  <input type="password" class="form-control" name="password">
                </div>
                    <?php if(isset($error)&&($error==1)) {
                   echo '<p class="text-danger">Invalid Username/Password!</p>';
               } 
			   if($dm->isLogged()){
					?>
					<div class="well">
                    <h3 align="center" class="text-danger">You are alredy logged in!</h3>
                     <p align="center">Click <a href="play.php">here</a> to play!</p>
                  </div>
				
                 <?php
                }
			   ?> 
                <input type="submit" class="btn btn-primary" name="submit" value="Submit!"/>
               </form>
                     </div>
                     </div>
                     <div class="col-md-6"></div>
              </div>
            </div>
            <div class="col-md-1"></div>
        </div>
         <!-- Popup Modal -->
       <div  style = "font-size:18px; color:#219ab3" id="popupmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="popupmodalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
            <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h2 id="popupmodalLabel" class="text-success" style="color: blue; text-align: center;">Almost There 2015</h2>
		</div>
		<div class="modal-body" id="popupmodalbody">
                  <p>
					  <h3 style = "text-align:center;">Behold The Admin Speaks!!</h3><br><br>
					<h3 style = "text-align:center;">Almost There 2015 has officially ended.<br><br>The LeaderBoard is frozen.<br><br> But you can continue playing!! </h3><br>
					<strong>1. This event is for citizens of India only. Any international participation is welcome but they won't be eligible for the prizes.<br><br>
2. The theme for our Hunt is Computer Science and I.T. All answers comply with the theme.<br><br>
3. Your answers should not include spaces or special characters.<br>For eg. If the answer is "mozilla firefox",then just type in "mozillafirefox" as the answer.<br><br>
4. Check for all possible variations of the answer.<br><br>
5. We are watching your activities. If the Page moderator suspects any illegitimate activity then you shall be banned from the event.<br><br>
6. Do NOT post hints on the forum. The Mods are there to do that.<br><br>
7. Any unwanted activity on the Forum shall lead to immediate disqualification.<br><br>
8. The use of Google,Wikipedia and Bing is encouraged and necessary in some cases.<br><br> 
9. Keep an eye on the forum for hints and updates from the Admins.<br><br>
<div style = "text-align:center; font-size:25px;">Play Fair,Play Hard. Good Luck!</div><br><br>

<div style = "text-align:center;">Click <a style = "color:black;" href = "http://almost-there.iem-innovacion.in/#rules"> HERE </a> for more rules.</div>
			</strong>
					
					</p>
				

                </div>
                <div class="modal-footer">
                    <div id="successButtonnew"><a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</a></div>
                   <div id="retrynew"></div>
		</div>
                </div>
            </div>
        </div>
    </div>
    

    <?php include 'includes/footer.php'; ?>
  <script type="text/javascript">
      $(document).ready(function() {
         
         if(getCookie("treasure_updates_4")==="") {
             setCookie("treasure_updates_4",1,3); 
         }
		  $("#popupmodal").modal();
         
      });
      function getCookie(cname)
        {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i=0; i<ca.length; i++) 
          {
          var c = ca[i].trim();
          if (c.indexOf(name)==0) return c.substring(name.length,c.length);
          }
        return "";
        }
      function setCookie(cname,cvalue,exdays)
        {
        var d = new Date();
        d.setTime(d.getTime()+(exdays*24*60*60*1000));
        var expires = "expires="+d.toGMTString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
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