<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Log In</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  </head>


<body>
    <center>

    <!-- /container -->
<div class="container" >

  <h2 class="form-signin-heading" style="margin-bottom: 30px;margin-top: 40px">Please sign in</h2>

            <?php
            include 'conn.php';
            include 'add.php';
            session_start();

            if ((null!=$_POST['username']) && (null!= $_POST['password'])) {
             $username = $_POST['username'];
              $password =$_POST['password'];


              //Prepare the selection
            $sql="SELECT * FROM users
                  WHERE username='$username' and  password='$password' ";
            $result = $conn->query($sql);

            if ($result){
                  if ($result->num_rows > 0 ) {

                   $row=$result->fetch_assoc();

              //   Selecting the data from the db
                  $user = $row['username'];
                  $pass= $row['password'];
                  $id = $row['userId'];
                  $email =$row['email'];
                  $address =$row['address'];
                  $full_name=$row['full_name'];
                  $user_type = $row['user_type'];

                  session_start();

                 $_SESSION['username']= $user;
                 $_SESSION['password']= $pass;
                 $_SESSION['user_type']= $user_type;
                 $_SESSION['email']= $email;
                 $_SESSION['id']= $id;
                 $_SESSION['address']= $address;
                 $_SESSION['full_name']= $full_name;

                 header('location:index.php');
                 }

          else{
            ?>x
      <?php
             }
           }
          else{
                  echo "Database Error";
                }

            }else{
          $error = $conn->error. '<br>' . $conn->error;
          echo $error;
}
            ?>


      <form class="form-signin" method="POST">

     <div class="form-group" style="width:400px;">
         <h4>Username</h4>
        <input type="text" class="form-control" placeholder="Username" name="username" >
      </div>

      <div class="form-group" align="center" style="width: 400px;">
         <h4>Password</h4>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password">
     </div>

     <div class="form-group" align="center" style="width: 400px;">
        <button class="btn btn-lg btn-primary btn-block" type="submit" value="Login">Sign in</button>
        </div>
      </form>

    </div>
</center>
    <!-- /container -->

          <!-- footer -->
         <?php  include 'footer.php';  ?>
                <!-- footer -->

