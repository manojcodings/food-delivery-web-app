<?php 
include('../config/config.php');

// Check id and image_name
if(isset($_GET['id']) && isset($_GET['image_name']))
{
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    // 1. Remove Image if exists
    if($image_name != "")
    {
        $path = "../images/category/" . $image_name;

        // Remove file
        if(file_exists($path))
        {
            $remove = unlink($path);

            if($remove == false)
            {
                $_SESSION['delete'] = "<div class='error'>Failed to remove image</div>";
                header('location: '.SITEURL.'admin/manage-category.php');
                exit();
            }
        }
    }

    // 2. Delete from database
    $sql = "DELETE FROM tbl_category WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    // 3. Redirect
    if($res)
    {
        $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully</div>";
    }
    else
    {
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Category</div>";
    }

    header('location: '.SITEURL.'admin/manage-category.php');
}
else
{
    // Redirect if no id
    $_SESSION['delete'] = "<div class='error'>Unauthorized Access</div>";
    header('location: '.SITEURL.'admin/manage-category.php');
}
?>