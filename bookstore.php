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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        <div class="row">
            <?php
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="col-md-3">
                    <img src='images/<?php echo $row['image']; ?>' width="100">
                    <h3>
                        <?php echo $row['name']; ?>
                    </h3>
                    
                    <p> <?php echo $row['price']; ?></p>
                    <p><?php echo $row['quantity']; ?></p>
                    <a href='checkout.php?bid=<?php echo $row['bookid']; ?>'>
                        Add to Cart</a>
                </div>
            <?php   }
            ?>
        </div>
    </main>
</body>
</html>