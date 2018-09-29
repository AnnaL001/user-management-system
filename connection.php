<?php
 include "constant.php";
 
  $conn=new mysqli($host_name,$database_user,$password,$dbname);
  if($conn->connect_error){
  	die("Connection failed :". $conn->connect_error);
  }//else{
  	//echo "Connection successful";
  //}


?>