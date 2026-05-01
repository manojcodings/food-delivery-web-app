<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">

        <h1>MANAGE CATEGORY</h1>
        <br><br>

        <?php 
        // Messages
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
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

        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>

        <br><br>

        <!-- Add Category Button -->
        <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>

        <br><br><br>

        <div class="table-responsive">
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>

            <?php
            $sql = "SELECT * FROM tbl_category";
            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);
            $sn = 1;

            if($count > 0)
            {
                while($row = mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
            ?>

            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $title; ?></td>

                <!-- Image -->
                <td>
                    <?php
                    if($image_name != "" && file_exists("../images/category/".$image_name))
                    {
                    ?>
                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="80px">
                    <?php
                    }
                    else
                    {
                        echo "<div class='error'>No Image</div>";
                    }
                    ?>
                </td>

                <td><?php echo $featured; ?></td>
                <td><?php echo $active; ?></td>

                <!-- ACTION BUTTONS -->
                <td>
                    <!-- Update -->
                    <a href="update-category.php?id=<?php echo $id; ?>" 
                       class="btn-secondary">
                       Update Category
                    </a>

                    <!-- Delete -->
                    <a href="delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" 
                       class="btn-danger"
                       onclick="return confirm('Are you sure you want to delete this category?');">
                       Delete Category
                    </a>
                </td>
            </tr>

            <?php
                }
            }
            else
            {
                echo "<tr><td colspan='6'><div class='error'>No Categories Added.</div></td></tr>";
            }
            ?>

        </table>
        </div>

    </div>
</div>

<?php include('partials/footer.php'); ?>