<?php
require('mysqli_connect.php');
session_start();
$query = "SELECT * FROM bookinventory";
$result = @mysqli_query($dbc, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
</head>
<body>
    <header>
    <div class="container">
        <nav class="nav">
        <div class="menu-toggle">
            <i class="fas fa-bars"></i>
            <i class="fas fa-times"></i>
            </div>
            <a href="index.php" class="logo"><img src="images/Roots-logo-2.png" alt=""></a>
            <ul class="nav-list">
                <li class="nav-item">
                <a href="index.php" class="nav-link active">Home</a>
                </li>
                <li class="nav-item">
                <a href="bookstore.php" class="nav-link">Book Store</a>
                </li>                             
            </ul>        
        </nav>
        </div>
    </header>
    <main>
        <div>
            <p>Welcome to the store of books. We don't have all the books but we have the books that you must read before you die. Do not miss this chance. Buy it read it! 
            </p>
            <a href="bookstore.php" class="btn body-btn">SHOP NOW</a>
        </div>
    </main>
</body>
</html>