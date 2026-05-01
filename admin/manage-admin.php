


<?php include('partials/menu.php');    ?>

    <!-- Main Content Section Starts-->
        <div class="main-content">
         <div class="wrapper">
            <h1>MANAGE ADMIN</h1>
          <div class="clearfix"></div>
  <br> 


  <?php 
     if(isset($_SESSION['add']))
      {
              echo $_SESSION['add']; //Displaying Session Message
              unset($_SESSION['add']); // Removing Session Message
      }

      if(isset($_SESSION['delete']))
        {
          echo $_SESSION['delete'];
          unset($_SESSION['delete']);
        }

        if(isset($_SESSION['update']))
          {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
          }

          if(isset($_SESSION['user-not-found']))
            {
              echo $_SESSION['user-not-found'];
              unset($_SESSION['user-not-found']);
            }
      ?>
      <br> <br> <br>

          <!--Button to Add Admin  -->
          <a href="add-admin.php" class="btn-primary">Add Admin</a>
         <br> <br> <br>
          <div class="table-responsive">
          <table class="tbl-full">
            <tr>
              <th>S.N.</th>
              <th>Full Name</th>
              <th>Username</th>
               <th>Actions</th>
            </tr>

           <?php
           // Query to get all Admin
           $sql = "SELECT * FROM tbl_admin";
           // Exexcute the Query
           $res =  mysqli_query($conn, $sql);

          // Check whether the Query is Executed of Not 
          if($res ==  TRUE)
            {
              // count Rows to check whether we have data in database or nit
              $count =  mysqli_num_rows($res);  // Function to get all the rows in database


             $sn=1; // Create a Variable and Assig the Value



              // Check the num of rows
              if($count>0)
                {
                  // We have data in database
                  while($rows = mysqli_fetch_assoc($res)) 
                    {
                      // using while loop to get all the data from database
                      //And whike loop will run as long as we have data in database

                      // get individual DATA
                      $id = $rows['id'];
                      $full_name =  $rows['full_name'];
                      $username=$rows['username'];

                      // display the values in our table
                      ?>
                         <tr>
              <td><?php echo $sn++; ?></td>
              <td><?php echo $full_name; ?></td>
              <td><?php echo $username; ?></td>
              <td>
                <a href="<?php echo SITEURL;  ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                <a href="<?php echo SITEURL;  ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
               <a href="<?php echo SITEURL;  ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
              </td>
            </tr>
                      
                      <?php


                    }
                }
                 else
                  {
                    // We do not have Data in DATABASE
                  }
            }
           ?>

          </table>
          </div>

          </div>
   </div>

    <!-- Main Content Section Ends-->


<?php include('partials/footer.php'); ?>

    