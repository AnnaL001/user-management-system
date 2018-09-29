<?php
$host = "localhost";
$user = "root";
$pass = "australiz1998JGH";
$db = "project";

//Make a connection to the db
$conn = new mysqli($host,$user,$pass,$db);

//Check connection
if ($conn->connect_error == TRUE) {
    die("Error connection to the database <br> ".$conn->connect_error);
}

?>