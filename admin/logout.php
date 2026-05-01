<?php 
// Include constants.php for SITEURL
include('../config/config.php');
//1. Destory the Sessiion
session_destroy(); //unsets $_SESSION['USER']

//2.Redirect to Login Page
header('location:'.SITEURL.'admin/login.php');
  ?>