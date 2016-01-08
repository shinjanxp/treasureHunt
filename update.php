<?php
session_start();
require_once 'class/dataManager.php';
require_once 'class/user.inc.php';
$dm = new dataManager();

$curr_user = $dm->getuser(T_USER_ID);

if(isset($_POST['submit'])) {
    if($_POST['userpass']==""||$_POST['userpass']==null) $changePASS = false;
    else $changePASS = true;
    $res = $dm->updateUser($_POST['userpass'], $_POST['full_name'], $_POST['usercollege'], $_POST['useryear'], $_POST['useremail'], $_POST['usercontact'], $changePASS);
    if($res == 1) $success = 1;
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
    <meta name="keywords" content="iem,iem,innovacion,innovacion 2014,almost there,computer,engineering,computer,engineering"/>
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
                            <h4 id="levelno" align="center"><strong>UPDATE YOUR DETAILS HERE</strong></h4>
                        </div>    
                        <div class="col-md-4"></div>
                    </div>
                </div>
                <br>
                
                  
                <?php
                if($dm->isLogged()) {
                if(isset($success)) {
                    ?>
                <div class="well">
                    <h3 align="center">Your details has been updated in the system!</h3>
                    <p align="center">Click <a href="play.php">here</a> to continue Playing!</p>
                    
                </div>   
                        
                    <?php
                }else{
                
                ?>
                
                 <div class="well">
                     <div class="row">
                     <div class="col-md-1"></div>
                     <div class="col-md-9">
                <form method="post" action="">
                     
                  <div class="form-group" >
                    <div class="row">
                        <div class="col-md-3"><label id="reg_form">Full Name</label></div>
                        <div class="col-md-9">
                       <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Enter your full name" value="<?php echo $curr_user->full_name; ?>">
                        </div>
                    </div>   
                  </div>
                  <div class="form-group" >
                    <div class="row">
                        <div class="col-md-3"><label id="reg_form">Enter Username</label></div>
                        <div class="col-md-9">
                       <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username" value="<?php echo $curr_user->username; ?>" disabled>
                        </div>
                    </div>   
                  </div>
                  <div class="form-group" >
                    <div class="row">
                        <div class="col-md-3"><label id="reg_form">Enter Password (Leave Blank if Not updating)</label></div>
                        <div class="col-md-9">
                       <input type="password" class="form-control" name="userpass" id="userpass">
                        </div>
                    </div>   
                  </div>
                  <div class="form-group" >
                    <div class="row">
                        <div class="col-md-3"><label id="reg_form">Enter Email</label></div>
                        <div class="col-md-9">
                       <input type="email" class="form-control" name="useremail" id="useremail" placeholder="yourname@abc.com" value="<?php echo $curr_user->email; ?>">
                        </div>
                    </div>   
                  </div>
                  <div class="form-group" >
                    <div class="row">
                        <div class="col-md-3"><label id="reg_form">College</label></div>
                        <div class="col-md-9">
                       <input type="text" class="form-control" name="usercollege" id="usercollege" placeholder="Enter your College Name" value="<?php echo $curr_user->college; ?>">
                        </div>
                    </div>   
                  </div>
                  <div class="form-group" >
                    <div class="row">
                        <div class="col-md-3"><label id="reg_form">Year</label></div>
                        <div class="col-md-9">
                       <select class="form-control" name="useryear" >
                            <option value="1" <?php if($curr_user->year == 1) echo 'selected="selected"'; ?>>1st year</option>
                            <option value="2" <?php if($curr_user->year == 2) echo 'selected="selected"'; ?>>2nd year</option>
                            <option value="3" <?php if($curr_user->year == 3) echo 'selected="selected"'; ?>>3rd year </option>
                            <option value="4" <?php if($curr_user->year == 4) echo 'selected="selected"'; ?>>Final Year</option>
                            <option value="0" <?php if($curr_user->year == 0) echo 'selected="selected"'; ?>>Others</option>
                    
                        </select>
                        </div>
                    </div>   
                  </div>
                  <div class="form-group" >
                    <div class="row">
                        <div class="col-md-3"><label id="reg_form">Contact</label></div>
                        <div class="col-md-9">
                       <input type="text" class="form-control" name="usercontact" id="usercontact" value="<?php echo $curr_user->contact; ?>" onkeypress="return isNumberKey(event);">
                        </div>
                    </div>   
                  </div>  
                
                <input type="submit" class="btn btn-primary" name="submit" value="Update!" onclick="return validate();"/>
               </form>
                     </div>
                     <div class="col-md-2"></div>
                     </div>
                     </div>
                <?php } } else echo '<div class="well"><h3 class="text-danger" align="center">Sorry, you must Login first!</h3></div>'; ?>
              
            </div>
            <div class="col-md-1"></div>
        </div>
        <!-- Popup Modal -->
      <div id="popupmodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="popupmodalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
            <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			<h2 id="popupmodalLabel" class="text-danger" style="text-align: center;">Something's Wrong!</h2>
		</div>
		<div class="modal-body" id="popupmodalbody">
                    <p>Please fill out all the required fields!</p>  
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
    function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
    }    
    function validate() {
          var full_name = document.getElementById("full_name").value;
          
          var useremail = document.getElementById("useremail").value;
          var usercollege = document.getElementById("usercollege").value;
          var usercontact = document.getElementById("usercontact").value;
          var atpos=useremail.indexOf("@");
          var dotpos=useremail.lastIndexOf(".");
          if (atpos<1 || dotpos<atpos+2 || dotpos+2>=useremail.length)
          {
              document.getElementById("popupmodalbody").innerHTML = '<p>Not a Valid Email!</p>';
              $("#popupmodal").modal();
              return false;
          }
          if(usercontact.length<8) {
            document.getElementById("popupmodalbody").innerHTML = "<p>Invalid Contact!</p>";
            $("#popupmodal").modal(); 
            return false;
       
           }
          
          if(full_name==""||useremail==""||usercollege==""||usercontact=="") {
              document.getElementById("popupmodalbody").innerHTML = '<p>Please fill out all the required fields!</p>';
              $("#popupmodal").modal();
              return false;
          }
          return true;
          
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