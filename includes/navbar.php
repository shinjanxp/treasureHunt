<nav class="navbar navbar-default navbar-fixed-top navbar-right" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand active" href="index.php">ALMOST THERE 2015</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse navbar-right">
          <ul class="nav navbar-nav">
            <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a href="index.php#rules">RULES</a>
                    </li>
                    
                    <li>
                        <a href="index.php#about">ABOUT</a>
					</li>
					 <li>
                        <a href="leader_live.php">LEADERBOARD</a>
					</li>
					
					<?php 
             require_once 'class/dataManager.php';
             $dm = new dataManager();
             
             if($dm->isLogged()) {
                 $level = $dm->getLevel(T_USER_ID);
                 
                 if($level > T_MAXLEVEL) {
                  echo '<li><a href="play.php" id="nav_level">Completed</a></li>';    
                 }else {
                     echo '<li><a href="play.php" id="nav_level">Level ' . $level .'</a></li>';
                 }
				 echo '<li><a href="forum.php" id="nav_level">Forum</a></li>';
                 echo '<li class="dropdown page-scroll"><a href="#" class="dropdown-toggle">' . T_NAME .'</a>';
                 
                 echo '<ul class="dropdown-menu page-scroll">';
                 echo '<li><a href="update.php">Update Details</a></li>';
                 echo '<li class="divider page-scroll"></li>';
                 echo '<li><a href="logout.php">Logout</a></li></ul>';
             } else { ?>   
           <li>
                 <a href="register.php">REGISTER</a>
            </li>
            <li>
                  <a href="login.php">LOGIN</a>
			</li>
			
             <?php } ?>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>