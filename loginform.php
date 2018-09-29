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

  <h2 class="form-signin-heading" style="margin-bottom: 30px;margin-top: 100px">Please sign in</h2>

            <form method="POST">
              <?php
              include "login.php";
                  ?>
                  </center>
                  </td>
                  </tr>
              <tr>

              <td style="padding-bottom:15px;">
              <center>

              <input type="text" name="username" maxlength="25" size="40" style="height:40px;width:400px;margin-bottom: 20px;" class="form-control" placeholder="Username">

              </center>
              </td>
               </tr>
               <tr>
               <td style="padding-bottom:15px;"><center> <input type="password" name="pswd" minlength="8" size="40" style="height:40px;width:400px;margin-bottom: 20px;" class="form-control" placeholder="Password"></center>
               </td>
               </tr>

               <tr>
               <td colspan="5" align ="center">
               <center>
                <input type="submit" value="Login" name="submit" class="btn btn-lg btn-primary btn-block" style="width:315px; height:45px;background-color:purple;color:white;font-size:16px ">
                </center>
                </td>
              </tr>

              </table>
              </form>

      </div>
</center>
    <!-- /container -->


          <!-- footer -->
         <?php  include 'footer.php';  ?>
                <!-- footer -->


