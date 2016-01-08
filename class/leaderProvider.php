<?php
session_start();
require_once 'db.inc.php';
require_once 'user.inc.php';
require_once 'dataManager.php';

if(isset($_GET['l'])) {

$dm = new dataManager();
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
}
?>
