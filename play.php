<?php
// header ('Location:nice-try.php');
session_start();
require_once 'class/dataManager.php';
require_once 'class/user.inc.php';
$dm = new dataManager();
if(!$dm->started())
    header ('Location:nice-try.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Innovacion Online Treasure Hunt">
    <meta name="author" content="Institute of Engineering & Management">
    <meta property="og:title" content="Almost There 2015" /> 

    <meta property="og:description" content="Innovacion Online Treasure Hunt" />  
    <!--<meta property="og:image" content="http://www.iemculturalfest.com/images/iemcf2.jpg" />
    <meta property="og:image:width" content="960" />  
    <meta property="og:image:height" content="590" />
    <meta property="og:url" content="http://www.iemculturalfest.com"/>-->
    <meta name="keywords" content="iem,innovacion,innovacion 2014,almost there,computer,engineering"/>
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
                
                <?php 
                
                
                if($dm->isLogged()) {
                 
               $level = $dm->getLevel(T_USER_ID);	  

                    if($level > T_MAXLEVEL) {
                        ?>
                           
                       <div class="well"  style="padding:0;">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                        
                            <h4 id="levelno" align="center"><strong>CONGRATULATIONS!</strong></h4>
                        </div>    
                        
                        <div class="col-md-4"></div>
                    </div>
                           
                </div>
                <div class="row"><div class="well"><h1 align="center">Congratulations!<h1><h3 align="center">You have completed Almost There 2015!</h3>
                                <br>
                                <div class="col-md-2"></div>
                                <div class="col-md-8"><img class="img img-responsive img-thumbnail" src="http://rack.1.mshcdn.com/media/ZgkyMDEzLzA4LzA1L2NkL2ZhaXJseW9kZHBhLmM2MTVjLmdpZgpwCXRodW1iCTg1MHg1OTA-CmUJanBn/cd76b13a/5d7/fairly-odd-parents.jpg"/></div>
                                <div class="col-md-2"></div>
                                </div></div>
                                
                       <?php
                    }else {
					$filename='private/';
					$filename.=$level;
					$filename.='.html';
                    $question = file_get_contents($filename);
		    	
                    $passed = $dm->getPassed($level);
                
                ?>
               
                
                <div class="well"  style="padding:0;">
                    <div class="row">
                        <div class="col-md-4">
<div class = "clock">
	<a href="#" id="timer"></a></div>
</div>
                        <div class="col-md-4">
                        
                            <h4 id="levelno" align="center"><strong>LEVEL <?php echo $level; ?></strong></h4>
                        </div>    
                        
                        <div class="col-md-4"><h4 id="madeit" align="center"><?php echo $passed; ?> made it!</h4></div>
                    </div>
                </div>
                <div id="htmlquestion">
                <?php echo $question; ?>
                </div>
                <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" id="controls">
                    <div class="input-group">
                    <input type="text" id="user_answer" class="form-control">
                    <span class="input-group-btn">
                      <button type="button" data-loading-text="Checking..." class="btn btn-default" id="submitButton" onclick="postAnswer();">Submit</button>
                    </span>
    </div>
                    
                </div>
                <div class="col-md-4"></div>
                </div>
                <br>
                    <?php } 
					}else { echo '<div class="well"><h3 class="text-danger" align="center">Sorry, you must Login first!<br>Click <a href=\'login.php\'>here</a> to login</h3></div>'; } ?>
                
            </div>
            <div class="col-md-1"></div>
        </div>
        
      <!-- Popup Modal -->
      <div id="popupmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="popupmodalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
            <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h2 id="popupmodalLabel" class="text-success" style="color: blue; text-align: center;">Treasure Hunt</h2>
		</div>
		<div class="modal-body" id="popupmodalbody">
                     
                </div>
                <div class="modal-footer">
                    <div id="successButtonnew"><a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</a></div>
                   <div id="retrynew"></div>
		</div>
                </div>
            </div>
        </div>
         <div class="notifications bottom-right"></div>
    </div>
    

    <?php include 'includes/footer.php'; ?>
      
      <script type="text/javascript">
      function zoomModal(image) {
          var imgtag = '<img class="img img-responsive" src="'+ image + '" alt="1"/>';
          document.getElementById("popupmodalbody").innerHTML = imgtag;
          $("#popupmodal").modal();
      }
      
      </script>
      <script src="js/bootmaster.js"></script>
      <script src="js/button.js"></script>
      <script type="text/javascript">
       $('#submitButton')
      .click(function () {
        var btn = $(this)
        btn.button('loading')
        
      })
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