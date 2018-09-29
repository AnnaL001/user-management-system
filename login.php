<!DOCTYPE html>
<html>
<head>
  
	<title>Main page</title>
  	<style>
        #loginmessage{
        	padding:10px;
        	background-color:purple;
        	color:white;
        	width:150px;
        	height:30px;
        }


  	</style>
</head>
<body>

<?php
session_start();
if(isset($_POST['submit'])){
  function login($username,$pass){
$username = $_POST['username'];
$pass = $_POST['pswd'];
 include "connection.php";

$sql="SELECT * FROM users where username='$username' and password='$pass'";
$result=$conn->query($sql);
if($result->num_rows>0){

                      $row=$result->fetch_assoc();
                     //   Selecting the data from the db
                          $user = $row['username'];
                          $pass= $row['password'];
                          $id = $row['userId'];
                          $email =$row['email'];
                          $address =$row['address'];
                          $full_name=$row['full_name'];
                          $user_type = $row['user_type'];
                          $image= $row['image'];

                         $_SESSION['username']= $user;
                         $_SESSION['password']= $pass;
                         $_SESSION['user_type']= $user_type;
                         $_SESSION['email']= $email;
                         $_SESSION['id']= $id;
                         $_SESSION['address']= $address;
                         $_SESSION['full_name']= $full_name;
                         $_SESSION['image'] =  $image;



        	if($user_type=="Super Administrator"){
        	header('location:index.php');
         } else if($user_type=="Administrator"){
         	header('location:index.php');
         }
           else{

            ?>
            <div class="alert alert-danger" role="alert" style="margin-left: 20px;margin-right: 20px;">
                     <?php echo " Username and password does not match"."<br>".$conn->error; ?>
                     </div>

      <?php
    }

        }
}


        function validate($username){
        $username =$_POST['username'];
        $pass=$_POST['pswd'];
        include "connection.php";
        $sql="SELECT * FROM users where username='$username'";
        $result=$conn->query($sql);
        if($result->num_rows>0){
        	login($username,$pass);
         } else{
         	echo "<div id='loginmessage'>incorrect username</div>";
         }
}

$username =$_POST['username'];
validate($username);
}
?>




          <!-- footer -->
         <?php  include 'footer.php';  ?>
                <!-- footer -->