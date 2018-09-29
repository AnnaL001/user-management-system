        <!-- header -->
        <?php    include 'header.php'  ?>
        <!-- header -->

     <!-- Trigger add button -->
  <div style="margin-bottom: 10px;margin-left: 20px;">
                <?php
                //Check if the user type to know which button to display

                if ($_SESSION['user_type'] == 'Super Administrator'){
                       ?>
               <a href="add.php"><button type="button" class="btn btn-info btn-lg" >Add User</button></a>
               <?php
                  }

              elseif ($_SESSION['user_type'] == 'Administrator')  {
               ?>
               <a href="add.php"><button type="button" class="btn btn-info btn-lg" >Add Authour</button></a>
               <?php
           }
                           ?>

  </div>
<!-- Display users from the database -->

     <table class="table table-striped" style="margin-left:5px;">
  <thread>
      <tr >
          <th> #No </th>
          <th> User Type </th>
          <th> Full Name </th>
          <th> Email </th>
          <th> Phone Number </th>
          <th> Acess Time</th>
          <th> Address </th>
          <th> Action </th>
      </tr>
  </thread>

<?php
include "connection.php";
$uid = $_SESSION['id'];

           //Selecting specific data for the logged in user
         if ($_SESSION['user_type'] == 'Super Administrator'){

         $sql = "SELECT * FROM users where userId != $uid and user_type != 'Author' ";
              }

              elseif ($_SESSION['user_type'] == 'Administrator')  {
                 $sql = "SELECT * FROM users where user_type = 'Author' ";
              }
              $no = 1;

$result = $conn->query($sql);

if ($result){

    if ($result->num_rows > 0 ) {
   while ($row=$result->fetch_assoc()) {

    ?>

<tbody>
      <tr >
          <td><?php echo $no++; ?></td>
          <td><?php  echo $row['user_type']; ?></td>
          <td><?php echo  $row['full_name']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php  echo $row['phone_number']; ?></td>
          <td><?php  echo $row['access_time']; ?></td>
          <td><?php  echo $row['address']; ?></td>

        <td>


                     <a href="update.php?id=<?php echo $row {'userId'}; ?>"> <button type="button" class="btn btn-warning">Edit</button></a>

                    <!-- Indicates a dangerous or potentially negative action -->
                    <a  onclick="return confirm('Are you sure you want to delete')" href="delete.php?id=<?php echo $row {'userId'}; ?>"><button type="button" class="btn btn-danger" >Delete</button></a>
          </td>

      </tr>

     <?php
        }
    }else  {
             ?>
      <div class="alert alert-danger" role="alert" style="margin-left: 20px;margin-right: 20px;">
           <?php echo " Not sucessful"."<br>".$conn->error; ?>
           </div>

            <?php
        }
     }else{
         ?>
      <div class="alert alert-danger" role="alert" style="margin-left: 20px;margin-right: 20px;">
           <?php  echo "No data was found"; ?>
           </div>
            <?php
     }
  ?>
  </tbody>
  </table>
</div>
<!-- Display users from the database -->

</body>

<!-- footer -->

      <div style="margin-top: 339px;">

      <?php  include 'footer.php';  ?>

      </div>

<!-- footer -->
