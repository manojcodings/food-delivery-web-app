<?php 
    include('../config/config.php');  
    include('login-check.php');  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Royal Dining</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Admin CSS -->
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
    <!-- Navbar Section -->
    <nav class="admin-navbar">
        <div class="wrapper">
            <div class="admin-logo">
                <a href="index.php">Royal<span>Dining</span> Admin</a>
            </div>
            <ul class="admin-menu">
                <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="manage-admin.php"><i class="fas fa-user-shield"></i> Admin</a></li>
                <li><a href="manage-category.php"><i class="fas fa-list"></i> Category</a></li>
                <li><a href="manage-food.php"><i class="fas fa-hamburger"></i> Food</a></li>
                <li><a href="manage-order.php"><i class="fas fa-shopping-cart"></i> Order</a></li>
                <li><a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>
    </nav>
