
<?php
require("mysqli_connect.php");
session_start();
if(!isset($_GET["bid"])){
    if(!$_SESSION["bid"]){
        echo "<br>Session not set!!!!<br>";
    }
  }
else{
    $_SESSION["bid"] =  $_GET["bid"];
// echo "<br>Session set<br>";

$SESSION_ID = intval($_SESSION['bid']);
if($_SERVER['REQUEST_METHOD'] =='POST'){

    if(empty($_POST["cname"])  || empty($_POST["Email"]) || empty($_POST["Cardnum"])) {

        echo "<span style='color:red; font-size:2em'>Please fill all fields!!</span>";
    }
    else{
        $customer_name= $_POST["cname"];
        $Email= $_POST["Email"];
        $Cardnum= $_POST["Cardnum"];
            // insert customer details----------------------------------------------------

     
    // Get book details----------------------------------------------------
    
        $Order = "SELECT * FROM bookinventory WHERE bookid = {$SESSION_ID}";
        $getorder = @mysqli_query($dbc, $Order);
        $rows = @mysqli_fetch_array($getorder);
        $bookid = $rows["bookid"];
        $book_name = $rows["name"];
      
    // Insert in Order Table---------------------------------------------
            $invenorderQuery = "INSERT INTO bookinventoryorder (orderid, bookid, `customer_name`, `email`, `card_number`) 
            VALUES (null,'$bookid','$customer_name','$Email','$Cardnum')";

        $order_item = @mysqli_query($dbc,$invenorderQuery);
        // $orderedItem = @mysqli_fetch_array($order_item);

        echo "  <br><b><span style='color:red;font-size:2em'>Your Order Book Name - ". $book_name ." is Booked !!</span>";
    // Update Quantiy of particular item in bookinventory table-----------------
        $updateQuery = "UPDATE bookinventory SET quantity = quantity - 1 WHERE bookid= {$SESSION_ID}";
        $update_table = @mysqli_query($dbc, $updateQuery);

        unset ($_SESSION['bid']);
        session_destroy();

    }
}
}   
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Checkout</title>
</head>
<H1>Checkout Form</H1>
<body>
    <form role="form" action= "checkout.php?bid=<?php echo $SESSION_ID ;?>" method="post">
        <div class="form-group row">
            <label for="inputname" class="col-sm-2 col-form-label">customer name</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="" name="cname" placeholder="customer name">
            </div>
        </div>
       
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-4">
                <input type="email" class="form-control" id="" name="Email" placeholder="Email">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputcardnum" class="col-sm-2 col-form-label">Card Number</label>
            <div class="col-sm-4">
                <input type="number" class="form-control" id="" name="Cardnum" placeholder="card number" maxlength="12">
            </div>
        </div>
        <div class="form-group row">
        <div class="offset-sm-2 col-sm-4 text-center">
          <input type="submit" value="Buy" name="submit" class="btn btn-primary"/>
        </div>
      </div>
       
    </form>


</body>
</html>
