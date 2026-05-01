<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Dashboard</h1>
        
        <?php 
            if(isset($_SESSION['login'])) {
                echo "<div style='padding: 1rem; background: #d4edda; color: #155724; border-radius: 8px; margin-bottom: 2rem;'>".$_SESSION['login']."</div>";
                unset($_SESSION['login']);
            }
        ?>

        <div class="dashboard-grid">
            <!-- Categories -->
            <div class="col-4">
                <?php 
                    $sql = "SELECT COUNT(*) AS total FROM tbl_category";
                    $res = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($res);
                    $count = $row['total'];
                ?>
                <h1><?php echo $count; ?></h1>
                <p>Categories</p>
            </div>

            <!-- Foods -->
            <div class="col-4">
                <?php 
                    $sql2 = "SELECT COUNT(*) AS total FROM tbl_food";
                    $res2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($res2);
                    $count2 = $row2['total'];
                ?>
                <h1><?php echo $count2; ?></h1>
                <p>Foods</p>
            </div>

            <!-- Total Orders -->
            <div class="col-4">
                <?php 
                    $sql3 = "SELECT COUNT(*) AS total FROM tbl_order";
                    $res3 = mysqli_query($conn, $sql3);
                    $row3 = mysqli_fetch_assoc($res3);
                    $count3 = $row3['total'];
                ?>
                <h1><?php echo $count3; ?></h1>
                <p>Total Orders</p>
            </div>

            <!-- Revenue -->
            <div class="col-4">
                <?php 
                    $sql4 = "SELECT SUM(total) AS revenue FROM tbl_order WHERE status='Delivered'";
                    $res4 = mysqli_query($conn, $sql4);
                    $row4 = mysqli_fetch_assoc($res4);
                    $revenue = $row4['revenue'];
                ?>
                <h1>₹<?php echo $revenue ? $revenue : 0; ?></h1>
                <p>Revenue Generated</p>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
</div>

<?php include('partials/footer.php'); ?>
