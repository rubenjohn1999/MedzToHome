<?php session_start(); ?>
<html>

<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <link rel="stylesheet" href="cart.css">
</head>

<body align="center">
    <?php include("navbar.php"); ?>
    <span>
        <h1>Your Cart! </h1>
        <?php
$username="localhost";
$password="root";
$database="testdb";

$conn=mysqli_connect("localhost","root","");
if(!$conn)
{
  die('connection failed!');
}
mysqli_select_db($conn,"testdb");

if(!isset($_SESSION['cart']))
{
    echo "<p>No items in your cart.</p>";
    echo "<div class='btns'><a href='index.php'><p>Continue Shopping</p></a></div>";
}
else
{
    $total = 0;
    // print_r($_SESSION['cart']);
    ?>
        <div class="wrapper">
            <div class="header">
                <div class="img-h">Item</div>
                <div class="name-h">Name</div>
                <div class="price-h">Rate(&#x20B9)</div>
                <div class="qty-h">Quantity</div>
                <div class="amt-h">Amount</div>
            </div>
            <div class="items">
                <?php
    foreach ($_SESSION['cart'] as $id => $qty) {
        $query="SELECT * FROM medicines WHERE id like ".$id.";";
        $res=mysqli_query($conn,$query);
        $row=mysqli_fetch_assoc($res);
        // print_r($row);
        $amt = $row['price'] * $qty;
?>
                <div class="item">
                    <div class="img">
                        <?php echo "<img src='".$row['imgcontainer']."'>" ?>
                    </div>
                    <div class="name">
                        <?php echo $row['name'] ?>
                    </div>
                    <div class="price">
                        <?php echo "&#x20B9 ".$row['price'] ?>
                    </div>
                    <div class="qty">
                        <?php echo $qty ?>
                    </div>
                    <div class="amt">
                        <?php echo "&#x20B9 ".$amt ?>
                    </div>
                </div>
                <?php
        // echo "<p><a href='#' ><span><img>$row[name], Cost per item: $row[price], Quantity:$qty, amount is $amt</span></a></p>";
        $total += $amt;
    }
    ?>
            </div>
            <div class="footer">
                <p>Total</p>
                <p>
                    <?php echo "&#x20B9 ".$total; ?>
                </p>
            </div>
        </div>
        <div class="btns">
            <a href="clearcart.php">
                <p>Clear Cart</p>
            </a>
            <a href="index.php">
                <p>Continue Shopping</p>
            </a>
            <a href="paymentpage.php">
                <p>Checkout</p>
            </a>
        </div>
        <?php
}
    
mysqli_close($conn);
    ?>
    </span>
</body>

</html>