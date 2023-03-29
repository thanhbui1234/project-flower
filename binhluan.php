<?php 
session_start();
include './model/connect.php'; 
include './model/comment.php';
$id=$_GET['id'];
addcmt();
?>
