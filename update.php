        <!-- header -->
        <?php    include 'header.php'  ?>
        <!-- header -->

    <!--  content -->

           <?php
            $id = $_GET['id'];
            if (isset($id)) {
                            $sql = "SELECT * FROM users WHERE userId=$id";
                            $result = $conn->query($sql);

                            if ($result){
                                    if ($result->num_rows > 0 ) {
                                   while ($row=$result->fetch_assoc()) {
                        ?>


                         <!-- Update User -->
                   <center>
                              <div class="container" >

                              <?php    if ($_SESSION['user_type'] == 'Super Administrator'){  ?>
                                  <h2 class="form-signin-heading" style="margin-bottom: 30px;margin-top: 50px">Update User</h2>
                                    <?php    }
                                           elseif ($_SESSION['user_type'] == 'Administrator')  { ?>
                                   <h2 class="form-signin-heading" style="margin-bottom: 30px;margin-top: 50px">Update Author</h2>
                                   <?php   }  ?>

                                    <?php
                                 include 'conn.php';
                                if (isset($_POST['submit'])) {

                                   $password = $_POST['password'];
                                   $fullname = $_POST['fullname'];
                                   $email =$_POST['email'];
                                   $phonenumber =  $_POST['phonenumber'];
                                   $address =  $_POST['address'];

                                //Inserting data
                                $sql = "UPDATE  users  SET full_name = '$fullname', email = ' $email' , phone_number='$phonenumber ',password = '$password' , address = ' $address' WHERE userId = $id";

                                if ($conn->query($sql)) {

                                             if ($id == $_SESSION['id']) { header("location:profile.php?id=$id;"); }
                                             else{  header("location:manage_users.php"); }

                                }else  {
                                     ?>
                                      <div class="alert alert-danger" role="alert" style="margin-left: 20px;margin-right: 20px;">
                                           <?php echo " There was a problem"."<br>".$conn->error; ?>
                                           </div>

                                    <?php
                                }
                             }
                                    ?>



                                  <form class="form-signin" method="POST">

                                      <div class="form-group" style="width:400px;">
                                       <form class="form-signin" method="POST" style="margin-left: 20px;">
                                       <?php
                                       if ($_SESSION['user_type'] == 'Super Administrator'){
                                         ?>

                                                      <div class="form-group" align="center" style="width: 400px;">
                                                         <h4>Password</h4>
                                                        <input type="text" id="inputPassword" class="form-control" placeholder="Password" name="password"  value="<?php   echo $row['password'];   ?>">
                                                     </div>

                                                       <div class="form-group" align="center" style="width: 400px;">
                                                         <h4>Full Name</h4>
                                                        <input type="text"  class="form-control" placeholder="Full Name" value="<?php echo  $row['full_name'];      ?>" name="fullname">
                                                     </div>

                                                       <div class="form-group" align="center" style="width: 400px;">
                                                         <h4>Email</h4>
                                                        <input type="email" class="form-control" placeholder="Email" value="<?php   echo $row['email'];  ?>" name="email">
                                                     </div>


                                                       <div class="form-group" align="center" style="width: 400px;">
                                                         <h4>Phone Number</h4>
                                                        <input type="text" class="form-control" placeholder="Phone Number" value="<?php echo $row['phone_number'];  ?>" name="phonenumber">
                                                     </div>


                                                       <div class="form-group" align="center" style="width: 400px;">

                                                        <h4>Address</h4>
                                                        <input type="text" class="form-control" placeholder="Address" value="<?php echo $row['address'];  ?>" name="address">
                                                     </div>

                                                     <div class="form-group" align="center" style="width: 400px;">
                                                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Update User</button>
                                                        </div>

                                                             <?php
                                                          }
                                                  elseif ($_SESSION['user_type'] == 'Administrator')  {
                                                        ?>

                                                         <div class="form-group" align="center" style="width: 400px;">
                                                         <h4>Full Name</h4>
                                                        <input type="text"  class="form-control" placeholder="Full Name" value="<?php echo  $row['full_name'];      ?>" name="fullname">
                                                     </div>

                                                       <div class="form-group" align="center" style="width: 400px;">
                                                         <h4>Email</h4>
                                                        <input type="email" class="form-control" placeholder="Email" value="<?php   echo $row['email'];  ?>" name="email">
                                                     </div>


                                                       <div class="form-group" align="center" style="width: 400px;">
                                                         <h4>Phone Number</h4>
                                                        <input type="text" class="form-control" placeholder="Phone Number" value="<?php echo $row['phone_number'];  ?>" name="phonenumber">
                                                     </div>


                                                       <div class="form-group" align="center" style="width: 400px;">

                                                        <h4>Address</h4>
                                                        <input type="text" class="form-control" placeholder="Address" value="<?php echo $row['address'];  ?>" name="address">
                                                     </div>

                                                     <div class="form-group" align="center" style="width: 400px;">
                                                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Update Author</button>
                                                        </div>

                                                      </form>
                                                  </form>


                                            </div>
                                          </div>
                                        </div>
                                    </center>

                              <?php
                          }
                       }
                                    } else  {
                                             ?>
                                      <div class="alert alert-danger" role="alert" style="margin-left: 20px;margin-right: 20px;">
                                           <?php
                                                  header( "location: 'index.php'" );
                                                  ?>
                                           </div>
                                          <?php
                                        }
                                    }
                                     else{
                                        echo "Database Error";
                                     }
                         ?>

                        <?php
      }else{

    header( "location: 'index.php'" );

            }
?>
  <!-- Update User -->



      </body>
  <!--  content -->



<!-- footer -->

   <?php  include 'footer.php';  ?>


<!-- footer -->