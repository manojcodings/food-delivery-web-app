<?php include('includes/header.php'); ?>

    <?php 
        if(isset($_GET['food_id'])) {
            $food_id = $_GET['food_id'];
            $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            if($count == 1) {
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            } else {
                header('location:'.SITEURL);
            }
        } else {
            // If no food_id, just show a general message or redirect
            // For this rebuild, let's redirect to home if no food is selected
            // header('location:'.SITEURL);
        }
    ?>

    <section class="section">
        <div class="container">
            <div class="section-title">
                <h2>Confirm Your Order</h2>
            </div>

            <?php if(isset($title)): ?>
            <div class="contact-container">
                <div class="selected-food card">
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
                        
                        <form action="" method="POST" class="contact-form">
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" name="qty" value="1" min="1" required>
                            </div>
                    </div>
                </div>

                <div class="delivery-details">
                    <div class="contact-form">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="full-name" placeholder="E.g. John Doe" required>
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="E.g. hi@johndoe.com" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" rows="5" placeholder="E.g. Street, City, Country" required></textarea>
                            </div>
                            <input type="hidden" name="food" value="<?php echo $title; ?>">
                            <input type="hidden" name="price" value="<?php echo $price; ?>">
                            <button type="submit" name="submit" class="btn btn-primary">Confirm Order</button>
                        </form>

                        <?php 
                            if(isset($_POST['submit'])) {
                                $food = $_POST['food'];
                                $price = $_POST['price'];
                                $qty = $_POST['qty'];
                                $total = $price * $qty;
                                $order_date = date("Y-m-d h:i:sa");
                                $status = "Ordered";
                                $customer_name = $_POST['full-name'];
                                $customer_contact = $_POST['contact'];
                                $customer_email = $_POST['email'];
                                $customer_address = $_POST['address'];

                                $sql2 = "INSERT INTO tbl_order SET 
                                    food = '$food',
                                    price = $price,
                                    qty = $qty,
                                    total = $total,
                                    order_date = '$order_date',
                                    status = '$status',
                                    customer_name = '$customer_name',
                                    customer_contact = '$customer_contact',
                                    customer_email = '$customer_email',
                                    customer_address = '$customer_address'
                                ";

                                $res2 = mysqli_query($conn, $sql2);

                                if($res2 == true) {
                                    echo "<div style='margin-top: 20px; padding: 15px; background: #d4edda; color: #155724; border-radius: 8px;'>
                                            Food Ordered Successfully.
                                          </div>";
                                } else {
                                    echo "<div style='margin-top: 20px; padding: 15px; background: #f8d7da; color: #721c24; border-radius: 8px;'>
                                            Failed to Order Food.
                                          </div>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php else: ?>
                <p class="text-center">Please select a food item from the <a href="foods.php" style="color: var(--primary-color);">Menu</a> to place an order.</p>
            <?php endif; ?>
        </div>
    </section>

<?php include('includes/footer.php'); ?>
