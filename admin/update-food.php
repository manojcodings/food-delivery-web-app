<?php include('partials/menu.php'); ?>

<div class="main-content">
<div class="wrapper">

<h1>Update Food</h1>
<br><br>

<?php
// 1. Get ID
if(isset($_GET['id']))
{
    $id = $_GET['id'];

    // Fetch food data
    $sql = "SELECT * FROM tbl_food WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res) == 1)
    {
        $row = mysqli_fetch_assoc($res);

        $title = $row['title'];
        $description = $row['description'];
        $price = $row['price'];
        $current_image = $row['image_name'];
        $current_category = $row['category_id'];
        $featured = $row['featured'];
        $active = $row['active'];
    }
    else
    {
        header('location: '.SITEURL.'admin/manage-food.php');
        exit();
    }
}
else
{
    header('location: '.SITEURL.'admin/manage-food.php');
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
    <td>Description:</td>
    <td>
        <textarea name="description" rows="5"><?php echo $description; ?></textarea>
    </td>
</tr>

<tr>
    <td>Price:</td>
    <td>
        <input type="number" name="price" value="<?php echo $price; ?>" required>
    </td>
</tr>

<tr>
    <td>Current Image:</td>
    <td>
        <?php
        if($current_image != "")
        {
        ?>
            <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" width="100px">
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
    <td>Category:</td>
    <td>
        <select name="category">
            <?php
            $sql2 = "SELECT * FROM tbl_category WHERE active='Yes'";
            $res2 = mysqli_query($conn, $sql2);

            while($row2 = mysqli_fetch_assoc($res2))
            {
                $cat_id = $row2['id'];
                $cat_title = $row2['title'];
                ?>
                <option value="<?php echo $cat_id; ?>" 
                    <?php if($current_category == $cat_id) echo "selected"; ?>>
                    <?php echo $cat_title; ?>
                </option>
                <?php
            }
            ?>
        </select>
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

        <input type="submit" name="submit" value="Update Food" class="btn-secondary">
    </td>
</tr>

</table>
</form>

<?php

// 2. Update logic
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = $_POST['price'];
    $category = $_POST['category'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];
    $current_image = $_POST['current_image'];

    // IMAGE UPDATE
    if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != "")
    {
        $image_name = $_FILES['image']['name'];

        $ext = pathinfo($image_name, PATHINFO_EXTENSION);
        $image_name = "Food_" . rand(1000,9999) . "." . $ext;

        $source_path = $_FILES['image']['tmp_name'];
        $destination_path = "../images/food/" . $image_name;

        // Upload new image
        if(!move_uploaded_file($source_path, $destination_path))
        {
            $_SESSION['upload'] = "<div class='error'>Failed to upload image</div>";
            header('location: '.SITEURL.'admin/manage-food.php');
            exit();
        }

        // Remove old image
        if($current_image != "")
        {
            $remove_path = "../images/food/" . $current_image;

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
    $sql3 = "UPDATE tbl_food SET 
                title='$title',
                description='$description',
                price='$price',
                image_name='$image_name',
                category_id='$category',
                featured='$featured',
                active='$active'
             WHERE id=$id";

    $res3 = mysqli_query($conn, $sql3);

    if($res3)
    {
        $_SESSION['update'] = "<div class='success'>Food Updated Successfully</div>";
    }
    else
    {
        $_SESSION['update'] = "<div class='error'>Failed to Update Food</div>";
    }

    header('location: '.SITEURL.'admin/manage-food.php');
}
?>

</div>
</div>

<?php include('partials/footer.php'); ?>