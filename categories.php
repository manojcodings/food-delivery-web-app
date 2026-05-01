<?php include('includes/header.php'); ?>

    <section class="section">
        <div class="container">
            <div class="section-title">
                <h2>Explore All Categories</h2>
            </div>

            <div class="grid grid-3">
                <?php  
                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count > 0) {
                    while($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        <a href="category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="card">
                                <div class="card-img">
                                    <?php if($image_name == ""): ?>
                                        <img src="https://via.placeholder.com/400x300?text=No+Image" alt="No Image">
                                    <?php else: ?>
                                        <img src="images/category/<?php echo $image_name; ?>" alt="<?php echo $title; ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="card-body text-center">
                                    <h3 class="card-title"><?php echo $title; ?></h3>
                                </div>
                            </div>
                        </a>
                        <?php
                    }
                } else {
                    echo "<p class='text-center'>No categories found.</p>";
                }
                ?>
            </div>
        </div>
    </section>

<?php include('includes/footer.php'); ?>
