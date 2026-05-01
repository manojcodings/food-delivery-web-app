<?php include('includes/header.php'); ?>

    <!-- Hero Section -->
    <header class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Taste the Royal Excellence</h1>
                <p>Discover the best food & drinks in your city. Fresh ingredients, master chefs, and a royal atmosphere.</p>
                <form action="food-search.php" method="POST" class="search-form">
                    <input type="search" name="search" placeholder="Search for your favorite food..." required>
                    <button type="submit" name="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
    </header>

    <!-- Categories Section -->
    <section class="section categories">
        <div class="container">
            <div class="section-title">
                <h2>Explore Categories</h2>
            </div>

            <div class="grid grid-3">
                <?php 
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
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

    <!-- Food Menu Section -->
    <section class="section food-menu" style="background-color: var(--light-bg);">
        <div class="container">
            <div class="section-title">
                <h2>Featured Menu</h2>
            </div>

            <div class="grid grid-3">
                <?php   
                $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";
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
                                <p class="card-text"><?php echo substr($description, 0, 80); ?>...</p>
                                <br>
                                <a href="order.php?food_id=<?php echo $id; ?>" class="btn btn-primary btn-sm">Order Now</a>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p class='text-center'>No food items found.</p>";
                }
                ?>
            </div>

            <div class="text-center" style="margin-top: 3rem;">
                <a href="foods.php" class="btn btn-primary">View All Foods</a>
            </div>
        </div>
    </section>

<?php include('includes/footer.php'); ?>
