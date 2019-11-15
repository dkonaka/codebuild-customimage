<?php
error_reporting(E_ALL);
//ini_set('display_errors', 'On');

session_start();
require_once "config.inc.php";
if(isset($_POST["sub_categories"])){
  $cat = $_POST['sub_categories'];


  $sth1 = $conn->prepare("SELECT temperature FROM weather WHERE state_name = '$cat'");
 $sth1->execute();

 while($row1 = $sth1->fetch(PDO::FETCH_ASSOC)){
  $temp = $row1['temperature'];
 echo  "<h6>The Temperature in  " .$cat. " is ". $temp . " "."Fahrenheit </h6>";
  }
}

  
?>
