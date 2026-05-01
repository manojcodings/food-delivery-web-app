<?php include('includes/header.php'); ?>

    <?php 
        $search = mysqli_real_escape_string($conn, $_POST['search']);
    ?>

    <section class="section" style="background-color: var(--light-bg);">
        <div class="container">
            <div class="section-title">
                <h2>Foods on Your Search "<?php echo $search; ?>"</h2>
            </div>

            <div class="grid grid-3">
                <?php   
                $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count > 0) {
                    while($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
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
                    echo "<p class='text-center'>No food items found matching your search.</p>";
                }
                ?>
            </div>
        </div>
    </section>

<?php include('includes/footer.php'); ?>
