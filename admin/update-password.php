<?php include('partials/menu.php');   ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php 
        if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
         ?>


        <form action="" method="POST">

    <table class="tbl_30">
        <tr>
            <td>Current Password: </td>
            <td>
                <input type="password" name="current_password" placeholder="Current Password">
            </td>
        </tr>

        <tr>
            <td>New Password:</td>
            <td>
                <input type="password" name="new_password" placeholder="New Password">

            </td>
        </tr>

        <tr>
            <td>Confrim Password:</td>
            <td>
                <input type="password" name="confirm_password" placeholder="Confirm Password">

            </td>
        </tr>

        <tr>
            <td colspan="2">
                <input type="hidden" name="id" value="<?php echo $id;  ?>">
                <input type="submit" name="submit" value="Change Password" class="btn-secondary">
            </td>
        </tr>

    </table>
        

    </form>
    </div>
</div>
<?php
if(isset($_POST['submit']))
{
    // 1. Get Data
    $id = (int) $_POST['id'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // 2. Get user from DB
    $sql = "SELECT * FROM tbl_admin WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    if($res && mysqli_num_rows($res) == 1)
    {
        $row = mysqli_fetch_assoc($res);
        $db_password = $row['password'];

        // 3. Verify current password
        if(password_verify($current_password, $db_password))
        {
            // 4. Check new password match
            if($new_password == $confirm_password)
            {
                // Hash new password
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                // 5. Update password
                $update_sql = "UPDATE tbl_admin SET password='$hashed_password' WHERE id=$id";
                $update_res = mysqli_query($conn, $update_sql);

                if($update_res)
                {
                    $_SESSION['update'] = "<div class='success'>Password Changed Successfully</div>";
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>Failed to Change Password</div>";
                }
            }
            else
            {
                $_SESSION['update'] = "<div class='error'>New Password and Confirm Password do not match</div>";
            }
        }
        else
        {
            $_SESSION['update'] = "<div class='error'>Current Password is incorrect</div>";
        }
    }
    else
    {
        $_SESSION['user-not-found'] = "<div class='error'>User Not Found</div>";
    }

    header("Location: ".SITEURL."admin/manage-admin.php");
    exit();
}
?>


<?php include('partials/footer.php');   ?>
