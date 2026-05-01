<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>ADD ADMIN</h1>
        <br><br>

        <?php 
        if(isset($_SESSION['add']))  // Checking whether the session is set
        {
            echo $_SESSION['add'];   // Display message
            unset($_SESSION['add']); // Remove message after displaying
        }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name" required>
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username" required>
                    </td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password" required>
                    </td>
                </tr>
             
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php 
// Process form data
if(isset($_POST['submit']))
{
    // 1. Get data from form
    $full_name = $_POST['full_name'];
    $username  = $_POST['username'];
    $password  = password_hash($_POST['password'], PASSWORD_DEFAULT); // secure encryption

    // 2. SQL Query
    $sql = "INSERT INTO tbl_admin SET
        full_name='$full_name',
        username='$username',
        password='$password'
    ";

    // 3. Execute Query
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    // 4. Check result
    if($res == TRUE)
    {
        $_SESSION['add'] = "<div class='success1'>Admin Added Successfully</div>";
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else
    {
        $_SESSION['add'] = "<div class='error'>Failed to Add Admin</div>";
        header("location:".SITEURL.'admin/manage-admin.php');
    }
}
?>