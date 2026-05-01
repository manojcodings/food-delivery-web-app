<?php include('partials/menu.php'); ?>

<div class="main-content">
<div class="wrapper">

<h1>Update Category</h1>
<br><br>

<?php

// 1. GET ID
if(isset($_GET['id']))
{
    $id = $_GET['id'];

    // 2. Fetch data
    $sql = "SELECT * FROM tbl_category WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res) == 1)
    {
        $row = mysqli_fetch_assoc($res);

        $title = $row['title'];
        $current_image = $row['image_name'];
        $featured = $row['featured'];
        $active = $row['active'];
    }
    else
    {
        header('location: '.SITEURL.'admin/manage-category.php');
        exit();
    }
}
else
{
    header('location: '.SITEURL.'admin/manage-category.php');
    exit();
}
?>

<form action="" method="POST" enctype="multipart/form-data">

<table class="tbl-30">

<tr>
    <td>Title:</td>
    <td>
        <input type="text" name="title" value="<?php echo $title; ?>" required>
    </td>
</tr>

<tr>
    <td>Current Image:</td>
    <td>
        <?php
        if($current_image != "")
        {
        ?>
            <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="100px">
        <?php
        }
        else
        {
            echo "<div class='error'>No Image Added</div>";
        }
        ?>
    </td>
</tr>

<tr>
    <td>New Image:</td>
    <td>
        <input type="file" name="image">
    </td>
</tr>

<tr>
    <td>Featured:</td>
    <td>
        <input type="radio" name="featured" value="Yes" <?php if($featured=="Yes") echo "checked"; ?>> Yes
        <input type="radio" name="featured" value="No" <?php if($featured=="No") echo "checked"; ?>> No
    </td>
</tr>

<tr>
    <td>Active:</td>
    <td>
        <input type="radio" name="active" value="Yes" <?php if($active=="Yes") echo "checked"; ?>> Yes
        <input type="radio" name="active" value="No" <?php if($active=="No") echo "checked"; ?>> No
    </td>
</tr>

<tr>
    <td colspan="2">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
    </td>
</tr>

</table>
</form>

<?php

// 3. Update logic
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $featured = $_POST['featured'];
    $active = $_POST['active'];
    $current_image = $_POST['current_image'];

    // IMAGE UPDATE
    if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != "")
    {
        $image_name = $_FILES['image']['name'];

        $ext = pathinfo($image_name, PATHINFO_EXTENSION);
        $image_name = "Food_Category_" . rand(1000,9999) . "." . $ext;

        $source_path = $_FILES['image']['tmp_name'];
        $destination_path = "../images/category/" . $image_name;

        // Upload new image
        if(!move_uploaded_file($source_path, $destination_path))
        {
            $_SESSION['upload'] = "<div class='error'>Failed to upload new image</div>";
            header('location: '.SITEURL.'admin/manage-category.php');
            exit();
        }

        // Remove old image
        if($current_image != "")
        {
            $remove_path = "../images/category/" . $current_image;

            if(file_exists($remove_path))
            {
                unlink($remove_path);
            }
        }
    }
    else
    {
        $image_name = $current_image;
    }

    // UPDATE QUERY
    $sql2 = "UPDATE tbl_category 
             SET title='$title', image_name='$image_name', featured='$featured', active='$active' 
             WHERE id=$id";

    $res2 = mysqli_query($conn, $sql2);

    if($res2)
    {
        $_SESSION['update'] = "<div class='success'>Category Updated Successfully</div>";
    }
    else
    {
        $_SESSION['update'] = "<div class='error'>Failed to Update Category</div>";
    }

    header('location: '.SITEURL.'admin/manage-category.php');
}
?>

</div>
</div>

<?php include('partials/footer.php'); ?>