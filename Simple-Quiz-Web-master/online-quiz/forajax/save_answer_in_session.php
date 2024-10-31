<?php 
session_start();
// $questionno=$_GET["questionno"];
$value1=$_GET["value1"];
$question_id=$_GET['id'];

$_SESSION["answer"][$question_id]=$value1;
