<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="paymentpage.css">
</head>

<body>
  <?php
if(!isset($_SESSION['cart'])) {
  header('location:index.php');
}

$username="localhost";
$password="root";
$database="testdb";

$conn=mysqli_connect("localhost","root","");
if(!$conn)
{
  die('connection failed!');
}
mysqli_select_db($conn,"testdb");
  ?>
  <?php include("navbar.php");?>
  <div class="row">
    <div class="col-75">
      <div class="container">
        <form action="postpaymentpage.php" method="POST">
          <div class="row">
            <div class="col-50">
              <h1>Billing Address</h1>
              <div class="row">
                <div class="col-50">
                  <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                  <input type="text" id="fname" name="firstname" placeholder="Bruce Wayne" required>
                </div>
                <div class="col-50">
                  <label for="email"><i class="fa fa-envelope"></i> Email</label>
                  <input type="text" id="email" name="email" placeholder="example@example.com" required>
                </div>
              </div>
              <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
              <input type="text" id="adr" name="address" placeholder="ABC" required>
              <div class="row">
                <div class="col-25">
                  <label for="city"><i class="fa fa-institution"></i> City</label>
                  <input type="text" id="city" name="city" placeholder="XYZ" required>
                </div>
                <div class="col-25">
                  <label for="state">State</label>
                  <input type="text" id="state" name="state" placeholder="XYZ" required>
                </div>
                <div class="col-25">
                  <label for="zip">Zip</label>
                  <input type="number" id="zip" name="zip" placeholder="xxxxxx" required>
                </div>
              </div>
              <hr>
              <h1>Payment</h1>
              <label for="fname">Accepted Cards</label>
              <div class="icon-container">
                <i class="fa fa-cc-visa" style="color:navy;"></i>
                <i class="fa fa-cc-amex" style="color:blue;"></i>
                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                <i class="fa fa-cc-discover" style="color:orange;"></i>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="cname">Name on Card</label>
                  <input type="text" id="cname" name="cardname" placeholder="ABCD">
                </div>
                <div class="col-25">
                  <label for="ccnum">Credit card number</label>
                  <input type="number" id="ccnum" name="cardnumber" placeholder="AAAA-BBBB-CCCC-DDDD"  required>
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="expmonth">Exp Month</label>
                  <input type="number" id="expmonth" name="expmonth" placeholder="XX" max=12 min=1 required>
                </div>
                <div class="col-25">
                  <label for="expyear">Exp Year</label>
                  <input type="number" id="expyear" name="expyear" placeholder="XXXX" min=2018 max=2032 required>
                </div>
                <div class="col-25">
                  <label for="cvv">CVV</label>
                  <input type="number" id="cvv" name="cvv" placeholder="XXX" min=000 max=999 required>
                </div>
              </div>
            </div>

          </div>
          <div class="button_contain">
            <input type="submit" value="Continue to checkout" class="btn">
            <input type="hidden" name="orders" value="<?php echo serialize($_SESSION['cart']) ?>">
            <button type="button" class="cancelbtn"><a href="Medicine1.php">Cancel</a></button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-25">
      <div class="container_cart">
        <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>
              <?php echo sizeof($_SESSION['cart']);?></b></span></h4>
        <hr>
        <?php
  $total = 0;
  foreach ($_SESSION['cart'] as $id => $qty) {
    $query="SELECT * FROM medicines WHERE id like ".$id.";";
    $res=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($res);
    $amt = $row['price'] * $qty;
    ?>
        <p><a href="#">
            <?php echo $row['name']?></a> <span class="price">
            <?php echo " &#x20B9 ".$amt; ?></span></p>
        <?php
    $total += $amt;
  }
  ?>
        <hr>
        <p>Total - <span class="price" style="color:black"><b>
              <?php echo " &#x20B9 ".$total; ?></b></span></p>
      </div>
    </div>
  </div>
</body>

</html>