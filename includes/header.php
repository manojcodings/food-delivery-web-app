<?php include('config/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Royal Dining | Modern Food Experience</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="container nav-container">
            <div class="logo">
                <a href="index.php">
                    <span class="logo-text">Royal<span>Dining</span></span>
                </a>
            </div>
            
            <div class="menu-toggle" id="mobile-menu">
                <i class="fas fa-bars"></i>
            </div>

            <ul class="nav-menu">
                <li><a href="index.php" class="nav-link">Home</a></li>
                <li><a href="categories.php" class="nav-link">Categories</a></li>
                <li><a href="foods.php" class="nav-link">Menu</a></li>
                <li><a href="contact.php" class="nav-link">Contact</a></li>
                <li><a href="order.php" class="btn btn-primary btn-sm">Order Now</a></li>
            </ul>
        </div>
    </nav>
