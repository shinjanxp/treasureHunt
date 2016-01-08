<?php
session_start();
require_once 'class/dataManager.php';

if(isset($_POST['submit'])) {
    $dm = new dataManager();
    $res = $dm->loginUser($_POST['username'], $_POST['password']);
    if($res===1) header ('Location:index.php');
    else $error = 1;
}

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
      <img src="images/treasure_back2.jpg" class="bg"/>
      
    <?php include 'includes/navbar.php'; ?>

    
    
    <div class="container main_body">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                 <div class="well"  style="padding:0;">
                    <div class="row">
                        <div class="col-md-4"></div>
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
               } ?> 
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
      <div id="popupmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="popupmodalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
            <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h2 id="popupmodalLabel" class="text-success" style="color: blue; text-align: center;">Treasure Hunt</h2>
		</div>
		<div class="modal-body" id="popupmodalbody">
                    <p>Sorry for the inconvenience caused to all! It was a major problem!</p>
                    <p>Your progress is saved with us. Just login with the following details :</p>
                    <p>Your previous username as login id, and password as almostthere</p>
                    <p>Update your details in the Update tab in the upper right corner</p>
                    <p>Log out and Login again!</p>
                    <br>
                    <p>Regretfully, Admin</p>

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
      $(document).ready(function () {
          $("#popupmodal").modal();
      });
          
      
      
      </script>

  </body>
</html>