<?php

include('../config/config.php');

// 1. Get ID safely
$id = intval($_GET['id']);

// 2. Create SQL Query
$sql = "DELETE FROM tbl_admin WHERE id = $id";

// 3. Execute Query
$res = mysqli_query($conn, $sql);

// 4. Check result
if($res == TRUE)
{
    // Success
    $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
}
else
{
    // Failed
    $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin</div>";
}

// 5. Redirect
header('location:'.SITEURL.'admin/manage-admin.php');


?>