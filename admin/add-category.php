<?php include('partials/menu.php'); ?>

<div class="main-content">
<div class="wrapper">

<h1>Add Category</h1>
<br><br>

<?php 
// Messages
if(isset($_SESSION['add']))
{
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}

if(isset($_SESSION['upload']))
{
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}
?>

<form action="" method="POST" enctype="multipart/form-data">

<table class="tbl-30">

<tr>
    <td>Title:</td>
    <td>
        <input type="text" name="title" placeholder="Category Title" required>
    </td>
</tr>

<tr>
    <td>Select Image:</td>
    <td>
        <input type="file" name="image" accept="image/*">
    </td>
</tr>

<tr>
    <td>Featured:</td>
    <td>
        <input type="radio" name="featured" value="Yes"> Yes
        <input type="radio" name="featured" value="No"> No
    </td>
</tr>

<tr>
    <td>Active:</td>
    <td>
        <!-- ✅ FIXED NAME -->
        <input type="radio" name="active" value="Yes"> Yes
        <input type="radio" name="active" value="No"> No
    </td>
</tr>

<tr>
    <td colspan="2">
        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
    </td>
</tr>

</table>
</form>

<?php

if(isset($_POST['submit']))
{
    // Title sanitize
    $title = mysqli_real_escape_string($conn, $_POST['title']);

    // Default values (blank if not selected)
    $featured = isset($_POST['featured']) ? $_POST['featured'] : "";
    $active   = isset($_POST['active']) ? $_POST['active'] : "";

    $image_name = "";

    // IMAGE UPLOAD
    if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != "")
    {
        $original_name = $_FILES['image']['name'];

        // Extension
        $ext = strtolower(pathinfo($original_name, PATHINFO_EXTENSION));

        // Allow only safe formats
        $allowed = array('jpg','jpeg','png','gif');

        if(in_array($ext, $allowed))
        {
            // Rename
            $image_name = "Food_Category_" . rand(1000,9999) . "." . $ext;

            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../images/category/" . $image_name;

            // Upload
            if(!move_uploaded_file($source_path, $destination_path))
            {
                $_SESSION['upload'] = "<div class='error'>Image Upload Failed</div>";
                header('location: '.SITEURL.'admin/add-category.php');
                exit();
            }
        }
        else
        {
            $_SESSION['upload'] = "<div class='error'>Only JPG, PNG, GIF allowed</div>";
            header('location: '.SITEURL.'admin/add-category.php');
            exit();
        }
    }

    // OPTIONAL VALIDATION (recommended)
    if($featured == "" || $active == "")
    {
        $_SESSION['add'] = "<div class='error'>Please select Featured and Active</div>";
        header('location: '.SITEURL.'admin/add-category.php');
        exit();
    }

    // INSERT QUERY
    $sql = "INSERT INTO tbl_category (title, image_name, featured, active) 
            VALUES ('$title', '$image_name', '$featured', '$active')";

    $res = mysqli_query($conn, $sql);

    if($res)
    {
        $_SESSION['add'] = "<div class='success'>Category Added Successfully</div>";
        header('location: '.SITEURL.'admin/manage-category.php');
        exit();
    }
    else
    {
        $_SESSION['add'] = "<div class='error'>Failed to Add Category</div>";
        header('location: '.SITEURL.'admin/add-category.php');
        exit();
    }
}
?>

</div>
</div>

<?php include('partials/footer.php'); ?>