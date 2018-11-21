<?php
session_start();
$username="localhost";
$password="root";
$database="testdb";

$conn=mysqli_connect("localhost","root","");
if(!$conn)
{
  die('connection failed!');
}
mysqli_select_db($conn,"testdb");

$query="SELECT * FROM medicines WHERE id like ".$_GET['id'].";";
$res=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($res);
if (!$row) 
  echo "<script> window.location.assign('index.php');</script>";


if (isset($_POST['submit'])) {
  if (isset($_SESSION['cart'][$_GET['id']])) {
    $_SESSION['cart'][$_GET['id']] += $_POST['quantity'];
  } else {
    $_SESSION['cart'][$_GET['id']] = $_POST['quantity'];
  }
  // print_r($_SESSION['cart']);
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="medicne1.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
    crossorigin="anonymous">
</head>

<body>
  <?php include("navbar.php");?>
  <div class="info-container">
    <div class="medicine-image-container">
      <img src="<?php echo $row['imgcontainer']; ?>" alt="Disprin" class="medicine-image">
    </div>
    <div class="medicine-text-container">
      <?php  echo $row['textcontainer']; ?>
      <h3><strong>Price:</strong> Rs.
        <?php  echo $row['price']; ?>
      </h3>
      <form action="" method="POST">
        <h2>Quantity<input type="number" name="quantity" min="1" max="10" value="1"></h2>
        <input type="hidden" name="medicine_id" value="<?php echo $_GET['id'];?>">
        <input type="submit" name="submit" value="Add to Cart" class="button order-button">
      </form>
      <?php if ($row['rx'] == 1) echo '<p class="disclaimer"><strong>!Doctor\'s prescription mandatory for order quantity more than 3!</strong></p>' ?>
    </div>
  </div>

  <button class="accordion">Description</button>
  <div class="panel">
    <?php echo $row['description']; ?>
  </div>

  <button class="accordion">Uses</button>
  <div class="panel">
    <?php echo $row['uses']; ?>

  </div>

  <button class="accordion">Precautions</button>
  <div class="panel">
    <?php echo $row['precautions']; ?>
  </div>
  <button class="accordion">Side Effects</button>
  <div class="panel">
    <?php echo $row['sideeffects']; ?>
  </div>

  <script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        }
      });
    }
  </script>

</body>

</html>
<?php
mysqli_close($conn);
?>