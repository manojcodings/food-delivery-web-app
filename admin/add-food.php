<?php include('partials/menu.php'); ?>

<div class="main-content">
<div class="wrapper">

<h1>Add Food</h1>
<br><br>

<?php 
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
        <input type="text" name="title" placeholder="Food Title" required>
    </td>
</tr>

<tr>
    <td>Description:</td>
    <td>
        <textarea name="description" rows="5" placeholder="Food Description"></textarea>
    </td>
</tr>

<tr>
    <td>Price:</td>
    <td>
        <input type="number" name="price" placeholder="Price" required>
    </td>
</tr>

<tr>
    <td>Select Image:</td>
    <td>
        <input type="file" name="image">
    </td>
</tr>

<tr>
    <td>Category:</td>
    <td>
        <select name="category">
            <?php
            // Fetch active categories
            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if($count > 0)
            {
                while($row = mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    ?>
                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                    <?php
                }
            }
            else
            {
                echo "<option value='0'>No Category Found</option>";
            }
            ?>
        </select>
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
        <input type="radio" name="active" value="Yes"> Yes
        <input type="radio" name="active" value="No"> No
    </td>
</tr>

<tr>
    <td colspan="2">
        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
    </td>
</tr>

</table>
</form>

<?php

if(isset($_POST['submit']))
{
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = $_POST['price'];
    $category = $_POST['category'];

    $featured = isset($_POST['featured']) ? $_POST['featured'] : "No";
    $active = isset($_POST['active']) ? $_POST['active'] : "No";

    $image_name = "";

    // IMAGE UPLOAD
    if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != "")
    {
        $image_name = $_FILES['image']['name'];

        $ext = pathinfo($image_name, PATHINFO_EXTENSION);

        $image_name = "Food-Name" . rand(000,9999) . "." . $ext;

        $source_path = $_FILES['image']['tmp_name'];
        $destination_path = "../images/food/".$image_name;

        if(!move_uploaded_file($source_path, $destination_path))
        {
            $_SESSION['upload'] = "<div class='error'>Image Upload Failed</div>";
            header('location: '.SITEURL.'admin/add-food.php');
            exit();
        }
    }

    // INSERT QUERY
    $sql2 = "INSERT INTO tbl_food (title, description, price, image_name, category_id, featured, active)
             VALUES ('$title', '$description', '$price', '$image_name', '$category', '$featured', '$active')";

    $res2 = mysqli_query($conn, $sql2);

    if($res2)
    {
        $_SESSION['add'] = "<div class='success'>Food Added Successfully</div>";
        header('location: '.SITEURL.'admin/manage-food.php');
    }
    else
    {
        $_SESSION['add'] = "<div class='error'>Failed to Add Food</div>";
        header('location: '.SITEURL.'admin/add-food.php');
    }
}
?>

</div>
</div>

<?php include('partials/footer.php'); ?>