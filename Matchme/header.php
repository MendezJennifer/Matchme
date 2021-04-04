<!DOCTYPE html>
<html lang="en-CA">
<head>
    <!--add charset -->
    <meta charset="utf-8">
    <!-- meta viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Matchme </title>
    <!-- Course Project: Jennifer Mendez-->
    <meta name="description" content= "Course Project - Phase One">
    <!-- add robots -->
    <meta name="robots" content="noindex, nofollow">
    <!--CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css"/>
    <!--JavaScript-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="./js/javascript.js"></script>
</head>
<body>
    <!-- logo and navigation-->
<div id=navLogo>    
    <article>
        <a href="index.php">
        <img src="./img/icon.png" alt="our logo" width="80" height="80"/>
    </a>
    </article>

    <nav>
    <ul>
        <li>
        <!--Navigation will dropdown upon clicking the menu-->
        <a href="#" onclick="dropFunction()" class="drop-button"> Menu </a>
        <ul id="dropMenu" class="dropdown-content">
            <li> <a href="insert_closet.php"> Add Clothes </a> </li>
            <li> <a href="view.php"> My Closet </a> </li>
            <li> <a href="logout.php"> Log Out </a> </li>
        </ul>
        </li>
    </ul>
    </nav>
</div>    
