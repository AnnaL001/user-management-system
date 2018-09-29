<!-- header -->
<?php    include 'header.php'  ?>
<!-- header -->


<?php
$id = $_GET['id'];

//Getting information on logged in user
if (isset($id)) {
    $sql = "SELECT * FROM users WHERE userId=$id";
    $result = $conn->query($sql);

//Check query
    if ($result){
      //If the info is available
            if ($result->num_rows > 0 ) {
              //Loop through the row
           while ($row=$result->fetch_assoc()) {
?>
     <div style="margin-top: 30px;"> </div>
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="media">
                        <div align="center">


                            <img class="thumbnail img-responsive" src="https://www.njm.com/-/media/njm-insurance/njm/images/careers/employee-testimonials.jpg?h=422&la=en&w=750&hash=9EE11E8A8417E1C26870F8B22B9C55E11BB656F0" width="300" height="300">

                        </div>
                        <div class="media-body">

      <!--  Assigning row value with each element -->
                            <hr>
                            <h3><strong>Full Name</strong></h3>
                               <p> <?php echo   $row['full_name']; ?></p>

                            <hr>
                            <h3><strong>Email</strong></h3>
                               <p><?php echo   $row['email']; ?></p>

                            <hr>
                            <h3><strong>Address</strong></h3>
                                <p><?php echo   $row['address']; ?></p> <br>

                            <hr>
                            <h3><strong>User Name</strong></h3>
                                <p><?php echo  $row['username']; ?></p>

                                <hr>
                            <h3><strong>Password</strong></h3>
                                <p><?php echo   $row['password']; ?></p>


                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--  Assigning row value with each element -->



<!-- Users Privilages based on type -->

        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <span>
                        <h1 class="panel-title pull-left" style="font-size:30px;">
                        <?php echo  $row['username']. "  "; ?><small>
                                 <?php echo   $row['email']; ?>
                                 </small>
                        <i class="fa fa-check text-success" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="John Doe is sharing with you"></i></h1>

                        <div class="dropdown pull-right">
                        <a href="update.php?id=<?php echo  $row['userId']; ?>"> <button type="button" class="btn btn-warning">Edit</button></a>

                            </button>
                        </div>
                    </span>
                    <br><br>

                            <p>
                                <u><h1>Info</h1></u>
                                <p> <?php echo  $row['full_name']; ?> is a <?php  echo  $row['user_type']; ?></p>
                                <?php

                                if ($row['user_type']== 'Super Administrator'){
                                ?>
                                <p>
                                The  Super Administrator  is allowed to: <br><br>
                                               1. Change his/her personal details including password but NOT the username.<br>
                                               2. Manage Other Users will allow the Super Administrator to: <br>

                                               <div style="margin-left: 30px;">
                                                    a.    Add a new user. <br>
                                                    b.    See a list of all other users.<br>
                                                    c.    Update any user’s details.<br>
                                                    d.    Delete any user.

                                               </div>

                                    </p>

                                   <?php
                                    } elseif ($row['user_type'] == 'Administrator'){
                                ?>

                                 The  Administrator  is allowed to: <br><br>
                                       1. Update profile will allow the administrator to change his/her personal details.<br>
                                       2. Manage  Authors will allow the Administrator to: <br>

                                               <div style="margin-left: 30px;">
                                                    a.    Add a new Author. <br>
                                                    b.    See a list of all Authors.<br>
                                                    c.     Update any Author’s details.<br>
                                                    d.   Delete any Authors.

                                             <?php
                                                }
                                            }
                                        }else  {
                                             ?>
                                      <div class="alert alert-danger" role="alert" style="margin-left: 20px;margin-right: 20px;">
                                           <?php echo " Not records found"."<br>".$conn->error;
                                                  header( "location: 'index.php'" );
                                                  ?>
                                           </div>
                                          <?php
                                        }
                          }else{
                                             ?>
                                      <div class="alert alert-danger" role="alert" style="margin-left: 20px;margin-right: 20px;">
                                           <?php echo " Database Error"."<br>";
                                                  header( "location: 'index.php'" );
                                                  ?>
                                           </div>
                                          <?php
                                        }
                                    }       ?>
                                     </p>

                </div>
            </div>
          <hr>
       </div>

<!-- Users Privilages based on type -->

   </body>


                <!-- footer -->
       <?php  include 'footer.php';  ?>

<!-- footer -->
