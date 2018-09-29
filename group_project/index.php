<!-- header -->
<?php    include 'header.php'  ?>
<!-- header -->


<!-- container-->

<!-- list group-->
            <div class="container" style="
                                display: flex;
                                display: -webkit-flex;
                                -webkit-box-sizing: border-box;
                                box-sizing: border-box;">

                       <div class="list-group" style="margin-right: 50px;width: 400px;">
                  <?php
                               if ($_SESSION['user_type'] == 'Super Administrator'){
                                 ?>
                                      <a href="profile.php?id=<?php echo $_SESSION['id'];?>" class="list-group-item">Update Profile </a>
                                      <a href="manage_users.php" class="list-group-item">Manage Users</a>
                                      <a href="logout.php" class="list-group-item">Log Out</a>


               <?php
                               }elseif ($_SESSION['user_type'] == 'Administrator'){
                                 ?>
                                      <a href="profile.php?id=<?php echo $_SESSION['id'];?>" class="list-group-item ">Update Profile </a>
                                      <a href="manage_users.php" class="list-group-item">Manage Authors</a>
                                        <a href="logout.php" class="list-group-item">Log Out</a>
            <?php
            }
             ?>

            <!-- list group-->


               </div>

               <!-- jumbotron -->

           <div class="jumbotron" style="margin-left: 50px" style="height: 100px">

           <?php
                   if ($_SESSION['user_type'] == 'Super Administrator'){
                     ?>
            <h2>Hello, Super Administrator</h2>
            <p>
              This is a simple administration panel
               made by quickie company.
                  </p>

             <?php
                }elseif ($_SESSION['user_type'] == 'Administrator') {
                  ?>
                   <h2>Hello,Administrator</h2>
           <p>
              This is a simple administration panel
               made by quickie company.
                        </p>
          <?php

          }else{
              header("location: login.php");
          }
                   ?>

             </div>
      </div>
<!-- jumbotron -->


<!--container -->

          <!-- footer -->

         <?php  include 'footer.php';  ?>

                <!-- footer -->
