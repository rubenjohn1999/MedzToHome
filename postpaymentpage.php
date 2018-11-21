<?php session_start();?>
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
if (!isset($_SESSION['cart'])) {
  header('location:index.php');
}
$q = "UPDATE users SET orders = '".serialize($_SESSION['cart'])."' WHERE email = '".$_SESSION['user']."';";
unset($_SESSION['cart']);
mysqli_query($conn, $q);

?>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="postpaymentpage.css">
</head>

<body>
  <?php include("navbar.php");?>
  <div class="text_1">
    <form action="signup.php">
      <h1 class="cong">Congrats! </h1>
      <div class="text_inside">
        <p>
          Your order has been placed!</p>
        <p><strong>Please check your email</strong> for further order details
        </p>
      </div>

      <div class="order_calc">
        <p>
          On an estimate, your order should be delivered by
          <script>
            var testDate = new Date();
            var weekInMilliseconds = 7 * 24 * 60 * 60 * 1000;
            testDate.setTime(testDate.getTime() + weekInMilliseconds);
            document.write(testDate)
          </script>
        </p>
      </div>
      <div class="contact">
        Having trouble? Feel free to Contact us!
        <br>
        <p>
          Track your order through the My Account page!</p>
    </form>

  </div>
</body>

</html>