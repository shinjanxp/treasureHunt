<?php
session_start();
require_once 'db.inc.php';
require_once 'user.inc.php';
require_once 'dataManager.php';


$answer = $_GET['a'];
$dm = new dataManager();
$level = $dm->getLevel(T_USER_ID);

if($dm->isLogged()) {
    $deg = $dm->checkAnswer($answer, $level);
    if($deg==0) {
        
    $new_level = $level + 1;
    if($new_level > T_MAXLEVEL) {
     $dm->updatePassed($level);
     $dm->updateAttempt(T_USER_ID, $level);
     $dm->updateProgress(T_USER_ID, $new_level);
     $explanation = $dm->getExplanation($level);
     $passed = $dm->getPassed($level);
     $result = array('result' => 2,'passed' => $passed,'explanation' => $explanation);   
    }else {
    $dm->updateProgress(T_USER_ID, $new_level);
    $dm->updatePassed($level);
    $dm->updateAttempt(T_USER_ID, $level);
    $passed = $dm->getPassed($new_level);
    $explanation = $dm->getExplanation($level);
    $newquestion = file_get_contents('../private/q'. $new_level . '.html');
    $result = array('result' => 1,'explanation' => $explanation,'newquestion' => $newquestion,'passed' => $passed,'level' => $new_level);
    }
    echo json_encode($result);
}
else {
    $dm->updateAttempt(T_USER_ID,$level);
    
    $error = 'Try Again';
    if($deg>=1&&$deg<=2) $error = 'Very Close! Try again!';
    /*if($deg==3) $error = 'Going in the right direction! Try Again!';*/
    $result = array('result' => 0,'reply' => $error);
    echo json_encode($result);
}
}else{
    $result = array('result' => 0,'notlogged' => 1);
    echo json_encode($result);
}
?>