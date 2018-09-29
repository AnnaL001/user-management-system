<?php
include "connection.php";
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Quickie Administration Panel</title>

    <!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"

 <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <link rel="stylesheet" href="styling.css">
      <style>
	    table{


		   height: 500px;
		   width:380px;
           padding-bottom:15px;

	         }
	   	 body{
		  font-size:18px;
		background-image:url(1.-branza-it_najbardziej-rozwojowe-obszary_shutterstock_318368642.jpg);
	        }

      </style>

			<title> Sign up page </title>
  </head>


  <body>

<!-- navbar -->
   <nav class="navbar navbar-inverse" navbar.static-top>
  <div class="container-fluid">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Quickie</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php
         if ($_SESSION['user_type'] == 'Super Administrator'){
                     ?>
        <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="manage_users.php">Manage Users <span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="profile.php?id=<?php echo $_SESSION['id'];?>">Profile <span class="sr-only">(current)</span></a></li>
          <?php
       }elseif ($_SESSION['user_type'] == 'Administrator'){
                     ?>
                      <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
                      <li class="active"><a href="manage_users.php">Manage Authors <span class="sr-only">(current)</span></a></li>
                      <li class="active"><a href="profile.php?id=<?php echo $_SESSION['id'];?>">Profile <span class="sr-only">(current)</span></a></li>
                      <?php
                    }
 ?>
  </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?php  echo $_SESSION['username']; ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="profile.php?id=<?php echo $_SESSION['id'];?>">Profile</a></li>
             <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- navbar -->


		<?php
		   include "connection.php";


		 if(isset($_POST["signup"]))
		 {

                  //Inserting data

                    if ($_SESSION['user_type'] == 'Super Administrator')
                     //Super Admin has the ability for adding administrators
                    {
         $fullname=$_POST["fullname"];
        $username=$_POST["username"];
        $email=$_POST["email"];
        $phoneNo=$_POST["phone_number"];
        $pswd=$_POST["pswd"];
        $address=$_POST["address"];


				 $sql="INSERT INTO users(full_name, username, email, phone_number,password,user_type,address) VALUES('$fullname','$username','$email','$phoneNo','$pswd','Administrator','$address')";   }

                     //Administrator has the ability for adding authors
                     elseif ($_SESSION['user_type'] == 'Administrator')  {

        $fullname=$_POST["fullname"];
        $email=$_POST["email"];
        $phoneNo=$_POST["phone_number"];


        $address=$_POST["address"];
                       $sql="INSERT INTO users(full_name,email, phone_number,user_type,address) VALUES('$fullname','$email','$phoneNo','Author','$address')";
                      }


					 if($conn->query($sql)) {
                       ?>
                <div class="alert alert-success" role="alert" style="margin-left: 20px;margin-right: 20px;">
                     <?php echo " Succesful"; ?>
                     </div>

                      <?php
                  }

 						else
                    //Display error
                  {
                       ?>
                <div class="alert alert-danger" role="alert" style="margin-left: 20px;margin-right: 20px;">
                     <?php echo " Not sucessful"."<br>".$conn->error; ?>
                     </div>

                      <?php
                  }
				}

?>
<br><br>
	<center>

		<form action="add.php" method="POST">
			<table>
				<tr>
			  <th colspan="5" align="center" style="font-size:20px; "> <?php    if ($_SESSION['user_type'] == 'Super Administrator'){  ?>
                                  <h1 class="form-signin-heading" >Add User</h1>
                                    <?php    }
                                           elseif ($_SESSION['user_type'] == 'Administrator')  { ?>
                                   <h1 class="form-signin-heading" >Add Author</h1>
                                   <?php   }  ?>
			  </th>
			  </tr>
			  <tr>
         <?php
 if ($_SESSION['user_type'] == 'Super Administrator'){
                                 ?>

			  <td><center><input type="text" name="fullname" maxlength="50" size="40" style="height: 30px" class="form-control" placeholder="Fullname"></center></td></tr>

			  <tr>
			  <td><center><input type="text" name="username" maxlength="50" size="40" class="form-control"  style="height: 30px" placeholder="Username"></center></td>
			   </tr>

			   <tr>
			   <td><center><input type="email" name="email" maxlength="50" size="40" style="height: 30px" class="form-control" placeholder="Email"></center></td>

			   </tr>
			   <tr>
			   	 <td><center><input type="tel" name="phone_number" maxlength="20" size="40" style="height: 30px" class="form-control" placeholder="Phone number"></center></td>
			   </tr>
			   <tr>
			   <td><center> <input type="password" name="pswd" minlength="8" size="40" style="height: 30px" class="form-control" placeholder="Password"></center></td>
			   </tr>

			   <tr>
			   <td><center><input type="text" name="address" maxlength="20" size="40" style="height: 30px" class="form-control" placeholder="Address"></center></td>
			   </tr>


			   <tr>
			   <td colspan="5" align ="center"><input type="submit"
			    name="signup" value="Add User"  class="btn btn-lg btn-primary btn-block"  style="width:315px; height:37px;background-color:purple;color:white;">
			    </td>

			  </tr>
			  <tr>

             <?php
                              }

                       elseif ($_SESSION['user_type'] == 'Administrator')  {  ?>

        <td><center><input type="text" name="fullname" maxlength="50" size="40" style="height: 30px" class="form-control" placeholder="Fullname"></center></td></tr>


         <tr>
         <td><center><input type="email" name="email" maxlength="50" size="40" style="height: 30px" class="form-control" placeholder="Email"></center></td>

         </tr>
         <tr>
           <td><center><input type="tel" name="phone_number" maxlength="20" size="40" style="height: 30px" class="form-control" placeholder="Phone number"></center></td>
         </tr>

  <tr>
        <td><center><input type="text" name="username" maxlength="50" size="40" class="form-control"  style="height: 30px" placeholder="Username" disabled=""></center></td>
         </tr>

           <tr>
         <td><center> <input type="password" name="pswd" minlength="8" size="40" style="height: 30px" class="form-control" placeholder="Password" disabled=""></center></td>
         </tr>

         <tr>
         <td><center><input type="text" name="address" maxlength="20" size="40" style="height: 30px" class="form-control" placeholder="Address"></center></td>


         </tr>
         <tr>
         <td colspan="5" align ="center">
         <input type="submit"
          name="signup" value="Add Author"  class="btn btn-lg btn-primary btn-block"  style="width:315px; height:37px;background-color:purple;color:white;">

          </td>

        </tr>
        <tr>

     <?php
                              }
                              ?>

			    <td colspan="5" align ="center">
			    <a href="manage_users.php" class="btn btn-lg btn-primary btn-block" style="text-decoration:none;width:315px; height:37px;margin-bottom: 50px;"> Back </a>

			    </td>
			    </tr>

				</table>
			</form>
		</center>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
         integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
         crossorigin="anonymous">
         </script>
  </body>
</html>