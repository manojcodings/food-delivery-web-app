<?php include('includes/header.php'); ?>

    <?php 
        if(isset($_GET['category_id'])) {
            $category_id = $_GET['category_id'];
            $sql = "SELECT title FROM tbl_category WHERE id=$category_id";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($res);
            $category_title = $row['title'];
        } else {
            header('location:'.SITEURL);
        }
    ?>

    <section class="section" style="background-color: var(--light-bg);">
        <div class="container">
            <div class="section-title">
                <h2>Foods in "<?php echo $category_title; ?>"</h2>
            </div>

            <div class="grid grid-3">
                <?php   
                $sql2 = "SELECT * FROM tbl_food WHERE category_id=$category_id AND active='Yes'";
                $res2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($res2);

                if($count2 > 0) {
                    while($row2 = mysqli_fetch_assoc($res2)) {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];
                        ?>
                        <div class="card">
                            <div class="card-img">
                                <?php if($image_name == ""): ?>
                                    <img src="https://via.placeholder.com/400x300?text=No+Image" alt="No Image">
                                <?php else: ?>
                                    <img src="images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>">
                                <?php endif; ?>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title"><?php echo $title; ?></h3>
                                <p class="card-price">₹<?php echo $price; ?></p>
                                <p class="card-text"><?php echo $description; ?></p>
                                <br>
                                <a href="order.php?food_id=<?php echo $id; ?>" class="btn btn-primary btn-sm">Order Now</a>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p class='text-center'>No food items found in this category.</p>";
                }
                ?>
            </div>
        </div>
    </section>

<?php include('includes/footer.php'); ?>
