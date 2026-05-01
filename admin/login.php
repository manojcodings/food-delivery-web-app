<?php include('../config/config.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Food Order System</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                        url('https://images.unsplash.com/photo-1504674900247-0877df9cc836');
            background-size: cover;
            background-position: center;
        }

        .login{
            width: 350px;
            padding: 30px;
            border-radius: 15px;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            box-shadow: 0 0 25px rgba(0,0,0,0.3);
            color: #fff;
            text-align: center;
        }

        h1{
            margin-bottom: 10px;
            font-weight: 600;
        }

        .login p{
            font-size: 14px;
            margin-bottom: 20px;
            color: #ddd;
        }

        input{
            width: 100%;
            padding: 10px;
            border: none;
            outline: none;
            border-radius: 8px;
            margin-top: 8px;
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="password"]{
            background: rgba(255,255,255,0.9);
        }

        .btn-primary{
            background: #ff6b00;
            color: #fff;
            font-weight: 500;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-primary:hover{
            background: #ff3d00;
            transform: scale(1.05);
        }

        .text-center{
            text-align: center;
        }

        a{
            color: #ff6b00;
            text-decoration: none;
            font-weight: 500;
        }

        a:hover{
            text-decoration: underline;
        }

        /* Small food icon effect */
        .food-icon{
            font-size: 40px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

<div class="login">
    
    <div class="food-icon">🍔</div>

    <h1 class="text-center">LOGIN</h1>

    <?php 
    if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);

        }

        if(isset($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);

            }
      ?>
      <br><br>

    <p>Welcome to Food Order System</p>

    <!-- Login Form Starts Here -->
    <form action="" method="post" class="text-center">

        Username: <br>
        <input type="text" value="" name="username" placeholder="Enter Username"> 

        Password: <br>
        <input type="password" name="password" placeholder="Enter Password"> 

        <!-- FIXED typo (vaue -> value) -->
        <input type="submit" name="submit" value="Login" class="btn-primary">

    </form>
    <!-- Login Form Ends Here -->

    <p class="text-center">Create By - <a href="#">M.Rajpoot</a></p>

</div>

</body>
</html>





<?php 

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tbl_admin WHERE username = '$username'";
    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res) == 1)
    {
        $row = mysqli_fetch_assoc($res);

        if(password_verify($password, $row['password']))
        {
            $_SESSION['user'] = $username;

            $_SESSION['login'] = "<div class='success'>Login Successfully.</div>";
            header('location:'.SITEURL.'admin/');
            exit();
        }
        else
        {
            $_SESSION['login'] = "<div class='error'>Wrong Password.</div>";
            header('location:'.SITEURL.'admin/login.php');
            exit();
        }
    }
    else
    {
        $_SESSION['login'] = "<div class='error'>User Not Found.</div>";
        header('location:'.SITEURL.'admin/login.php');
        exit();
    }
}
?>