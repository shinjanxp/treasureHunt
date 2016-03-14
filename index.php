<?php
session_start();
require_once 'class/dataManager.php';
$dm = new dataManager();

?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
  <meta charset="utf-8" />

 

  <meta name = "viewport" content = "width = 1000">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  	<meta name="description" content="Innovacion Online Treasure Hunt">   
	<meta name="keywords" content="iem,innovacion,innovacion 2014,almost there,computer,engineering"> 
	<meta name="author" content="Almost There 2016" />
    <title>Almost There 2016</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

  
    <link href="css/almostThere.css" rel="stylesheet">
	<link href = "css/jquery.countdown.css" rel = "stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <span class="light">Almost There 2016 </a>
            </div>

           
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                   
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#rules">Rules</a>
                    </li>
                    
                    <li>
                        <a class="page-scroll" href="#about">About</a>
					</li>
					 
					
					
					<?php 
             require_once 'class/dataManager.php';
             $dm = new dataManager();
             
             if($dm->started() && $dm->isLogged()) {
                 $level = $dm->getLevel(T_USER_ID);
                 
                 if($level > T_MAXLEVEL) {
                  echo '<li><a class = "page-scroll" href="play.php" id="nav_level">Completed</a></li>';    
                 }else {
                     echo '<li><a class = "page-scroll" href="play.php" id="nav_level">Level ' . $level .'</a></li>';
                 }
                 echo '<li class="dropdown page-scroll"><a href="#" class="dropdown-toggle">' . T_NAME .'</a>';
                 
                 echo '<ul class="dropdown-menu page-scroll">';
                 echo '<li><a href="update.php">Update Details</a></li>';
                 echo '<li class="divider page-scroll"></li>';
                 echo '<li><a href="logout.php">Logout</a></li></ul>';
             } elseif($dm->started()) { ?>   
                    <li>
                        <a class="page-scroll" href="leader_live.php">LeaderBoard</a>
					</li>
                    <li>
                        <a class="page-scroll" href="register.php">Register</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="login.php" >Login</a>
                    </li>
			
             <?php } ?>
					
					
					
                </ul>
            </div>
           
        </div>
      
    </nav>

    <!-- Intro -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <?php if($dm->started()){?>
                        <a href ="play.php" class="btn btn-default1 btn-xlarge btn-lg">Start Playing Now</a>
                        <?php }?>
                        <div class = "clock btn">
                            <a href="#" id="timer"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Rules Section -->
    <section id="rules" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
			<h2>Rules and Regulations</h2><br>
			<strong><p style = "font-size:22px;">    
<br>Thou shall always remember, mod is God. <br><br>			

The browser being used to view the website should be a updated one and should support HTML5. <a href = "https://html5test.com/" >www.html5test.com</a> can be used to test the browser. Make sure you have AUDIO and VIDEO support. 
<br><br>
A participant will not be eligible for any prize if he/she registers with incorrect personal information. 
<br><br>
                            
 Shall any Pirate seek any unfair help or recourse to unethical means. He/She shall be exiled from the quest.<br><br>
 In case of any dispute,refer to 1st rule.<br><br>
The game shall comprise of <strong>25</strong> levels . In each level you will have to solve a riddle/puzzle to proceed. The number of levels can be changed by the administrator if required.<br><br>
 Clues can be present any where on the page. The source code,image names,urls etc. Shall all serve as angels guiding thee on thy lofty quest.<br><br>
 The answers are NOT case sensitive.For e.g, "Amazon" ,"aMaZon","amaZON" are all the same. Also,answers do NOT include any special characters.<br><br>
 Hints shall be provided on the forum from time to time, depending upon the generosity of the Mod.<br><br>
 May the force be with you. Remember,"Not all treasure is silver and gold mate."
			</p></strong>
                            
                        </div>
                    </div>
    </section>

	
    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>About Us</h2>
				<p>Can you read between the lines? Do riddles entice you? This event tests your ability to link facts and see things in twisted perspectives. Can you get to the finish first?

Almost There is an on-site treasure hunt contest consisting of many levels. The key to a level may be in the form of a pass-phrase, a URL, etc. The objective is to get through all the levels in the shortest period of time. In case no team manages to get through all levels, the team at the highest level shall be declared the winner. In case of a tie, the person reaching the highest level first will be declared the winner.</p>
               
			   
				<p>We value your feedback. Feel free to provide your feedback to us. </p>
                <p><a href="mailto:almostthere@iem-innovacion.in">almostthere@iem-innovacion.in</a>
                </p>
				<h4>Concept creator and Question setter</h4>
				<p><a href="https://www.facebook.com/theKaustuv" target = "_blank">Kaustuv Mukherji</a><br>
				<a href="https://www.facebook.com/mitra.zgod" target = "_blank">Shinjan Mitra</a>
				</p>
				<h4>Web Site Development and Maintenance Team</h4>
				<p><a href="https://www.facebook.com/daggerhunt" target = "_blank">Aryak Sengupta</a><br>
				<a href="https://www.facebook.com/arupam.sengupta" target = "_blank">Arupam Sengupta</a><br>
				<a href="https://www.facebook.com/devarati.tripathi" target = "_blank">Devarati Tripathi</a><br>
				<a href="https://www.facebook.com/mitra.zgod" target = "_blank">Shinjan Mitra</a></p>
				<h4>Website Moderator</h4>
				<p><a href="https://www.facebook.com/theKaustuv" target = "_blank">Kaustuv Mukherji</a></p>
				<h4>Special Thanks To</h4>
				<p><a href="https://www.facebook.com/subhodip.kumar?fref=ts" target = "_blank">Subhodip Kumar</a><br>
				<a href="https://www.facebook.com/koustuvsinha?fref=ts" target = "_blank">Koustuv Sinha</a></p>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            
	    <?php include 'includes/footer.php'; ?>
        </div>
    </footer>

    <!-- Popup Modal -->
       <div  style = "font-size:18px; color:#219ab3" id="popupmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="popupmodalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
            <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h2 id="popupmodalLabel" class="text-success" style="color: blue; text-align: center;">Almost There 2016</h2>
		</div>
		<div class="modal-body" id="popupmodalbody">
                    <p>
					 <h3 style = "text-align:center;">Behold The Admin Speaks!!</h3><br><br>
				<!--	<h3 style = "text-align:center;">Almost There 2016 has officially ended. <br><br>The LeaderBoard is frozen. <br><br>But you can continue playing!! </h3><br>
				-->
				<strong>	1. This event is for citizens of India only. Any international participation is welcome but they won't be eligible for the prizes.<br><br>
2. There is no specific theme for the contest. Answers may be from any field of knowledge.<br><br>
3. Your answers should not include spaces or special characters.<br>For eg. If the answer is "mozilla firefox",then just type in "mozillafirefox" as the answer.<br><br>
4. Check for all possible variations of the answer.<br><br>
5. We are watching your activities. If the Page moderator suspects any illegitimate activity then you shall be banned from the event.<br><br>
6. Do NOT post hints on the forum. The Mods are there to do that.<br><br>
7. Any unwanted activity on the Forum shall lead to immediate disqualification.<br><br>
8. The use of Google,Wikipedia and Bing is encouraged and necessary in some cases.<br><br> 
9. Keep an eye on the forum for hints and updates from the Admins.<br><br>
<div style = "text-align:center; font-size:25px;">Play Fair,Play Hard. Good Luck!</div><br><br>

<div style = "text-align:center;">Click <a style = "color:black;" href = "#rules"> HERE </a> for more rules.</div>
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
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery.easing.min.js"></script>
    <script src="js/almostThere.js"></script>
	<script src="js/jquery.als-1.2.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.countdown.js"></script>
    <script src="js/bootstrap-notify.js"></script>
</body>

</html>