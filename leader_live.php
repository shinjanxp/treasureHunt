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
    <meta name="description" content="Innovacion Online Treasure Hunt">
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
                            <h4 id="levelno" align="center"><strong>LEADER BOARD</strong></h4>
                        </div>    
                        <div class="col-md-4" style="color:green; text-align: center;"><h5><span class="glyphicon glyphicon-off"></span><strong> FROZEN </strong></h5></div>
                    </div>
                </div>
                <br>
                <div id="leaderboard">
                <?php
                
                $leaderboard = '
                <div class="well">
                <table class="table table-bordered table-hover table-responsive">
                    <tr><th>Rank</th><th>Name</th><th>College</th><th>Year</th><th>Level</th><th>Total Attempts</th></tr>';
                    
                   $leader = $dm->getLeaderBoard();
                    $ct =1;
                    while($row = $leader->fetch()) {
                    if(($row['full_name']!='iemtreasure')&&($row['college']!='update')) {  
                    if($row['level']>T_MAXLEVEL) $leveltable = 'All Clear!'; else $leveltable = $row['level'];
                    $leaderboard .= '<tr><td>' . $ct . '</td><td>' . $row['full_name'] . '</td><td>' . $row['college'] . '</td><td>' .$row['year'] . '</td><td>' .$leveltable . '</td><td>' .  $row['attempts'] . '</td></tr>';    
                        
                        $ct++;
                    }    
                    }
                 $leaderboard .='
                </table>
                </div>';
                 
                 echo $leaderboard;
                 
                 ?>
                    <!--
                    <div class="well" text-align="center">
                    <h3>The LeaderBoard will be live from 5PM IST Today! </h3><p>Untill then Those who have registered Please follow the Recovery Options!</p>   
                    </div>
                    </div>
                    -->
            </div>
            <div class="col-md-1"></div>
        </div>
        
    </div>
<?php include 'includes/footer.php'; ?>
      <script type="text/javascript">
      function loadLeader() {
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
                document.getElementById("leaderboard").innerHTML = xmlhttp.responseText;
                
                }
              }
              xmlhttp.open("GET","class/leaderProvider.php?l=1",true);
              xmlhttp.send();
      }
      setInterval (loadLeader, 7000);
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