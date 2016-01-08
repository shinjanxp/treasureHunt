<?php
session_start();
require_once 'class/dataManager.php';

$dm = new dataManager();
$dm->logoutUSER();
header('Location:index.php');
?>