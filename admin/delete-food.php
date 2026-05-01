<?php 
include('../config/config.php');

// Check whether id and image_name are set
if(isset($_GET['id']) && isset($_GET['image_name']))
{
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    // 1. Remove Image (if exists)
    if($image_name != "")
    {
        $path = "../images/food/" . $image_name;

        if(file_exists($path))
        {
            $remove = unlink($path);

            if($remove == false)
            {
                $_SESSION['delete'] = "<div class='error'>Failed to remove image</div>";
                header('location: '.SITEURL.'admin/manage-food.php');
                exit();
            }
        }
    }

    // 2. Delete food from database
    $sql = "DELETE FROM tbl_food WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    // 3. Redirect with message
    if($res)
    {
        $_SESSION['delete'] = "<div class='success'>Food Deleted Successfully</div>";
    }
    else
    {
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Food</div>";
    }

    header('location: '.SITEURL.'admin/manage-food.php');
}
else
{
    // If id not set
    $_SESSION['delete'] = "<div class='error'>Unauthorized Access</div>";
    header('location: '.SITEURL.'admin/manage-food.php');
}
?>