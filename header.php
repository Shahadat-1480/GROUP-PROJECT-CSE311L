<?php
   session_start();
   ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <title>Services Wala</title>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark navbar-fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">ServiceWala</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sevices.php">Services</a>
        </li>
        
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="text" placeholder="Search">
        <button class="btn btn-primary" type="button">Search</button>
      </form>
      <ul class="navbar-nav me">
        <?php
        if(isset($_SESSION["useruid"])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='profile.php'>Profile Page</a>
        </li>";
        echo "<li class='nav-item'>
          <a class='nav-link' href='includes/logout.inc.php'>Log Out</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='register.php'>Register</a>
        </li>";
        echo "<li class='nav-item'>
          <a class='nav-link' href='signin.php'>Log in</a>
        </li>";
        }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signin.php">log in</a>
        </li>
      </ul>
    </div>
  </div>
</nav>