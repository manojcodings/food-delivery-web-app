<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
         <h1>MANAGE FOOD</h1>

         <br><br>

         <!-- Button to Add Food -->
         <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>

         <br><br><br>

         <div class="table-responsive">
         <table class="tbl-full">
            <tr>
              <th>S.N.</th>
<th>Title</th>
	              <th>Price</th>
              <th>Image</th>
              <th>Category</th>
              <th>Actions</th>
            </tr>

            <?php
            // Fetch food data
            $sql = "SELECT * FROM tbl_food";
            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);
            $sn = 1;

            if($count > 0)
            {
                while($row = mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    $category_id = $row['category_id'];

                    // Get category title
                    $sql2 = "SELECT title FROM tbl_category WHERE id=$category_id";
                    $res2 = mysqli_query($conn, $sql2);

                    $category_title = "Not Found";
                    if($res2 && mysqli_num_rows($res2) > 0)
                    {
                        $row2 = mysqli_fetch_assoc($res2);
                        $category_title = $row2['title'];
                    }
            ?>

            <tr>
              <td><?php echo $sn++; ?></td>

              <!-- Using your same column names -->
              <td><?php echo $title; ?></td> <!-- Full Name -->
              <td>₹<?php echo $price; ?></td> <!-- Username -->

              <!-- Image -->
              <td>
                <?php
                if($image_name != "" && file_exists("../images/food/".$image_name))
                {
                ?>
                  <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="60px">
                <?php
                }
                else
                {
                  echo "<div class='error'>No Image</div>";
                }
                ?>
              </td>

              <!-- Category -->
              <td><?php echo $category_title; ?></td>

              <!-- Actions -->
              <td>
                <a href="update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>

                <a href="delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" 
                   class="btn-danger"
                   onclick="return confirm('Are you sure you want to delete this food?');">
                   Delete Admin
                </a>
              </td>
            </tr>

            <?php
                }
            }
            else
            {
                echo "<tr><td colspan='6'><div class='error'>No Food Added</div></td></tr>";
            }
            ?>

          </table>
         </div>
    </div>
</div>

<?php include('partials/footer.php'); ?>