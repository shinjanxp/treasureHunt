<?php
session_start();
require_once 'db.inc.php';
require_once 'user.inc.php';
require_once 'dataManager.php';

if(isset($_GET['p'])&&isset($_GET['l'])) {
$post = $_GET['p'];
$level = $_GET['l'];
$dm = new dataManager();
$v = $dm->postComment($level, $post);
echo $v;
}
if(isset($_GET['del'])) {
    $post_id = $_GET['del'];
    $dm = new dataManager();
    if(T_ROLE == 1) {
    $dm->deletePost($post_id);
    }
}
?>
