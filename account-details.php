<?php session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";
$conn = mysqli_connect($servername,$username,$password,$dbname);
$sql = "SELECT * from users where email = '$_SESSION[user]'";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($res);
?>
<html>

<head>
    <title>My Account</title>
    <link rel="stylesheet" href="account-details.css">
</head>

<body>
    <?php include("navbar.php"); ?>
    <h1 class="profile">My Profile</h1>
    <div class="profile">
        <div class="row">
            <div class="name-h">Name:</div>
            <div class="name">
                <?php echo $row['name'];?>
            </div>
        </div>
        <div class="row">
            <div class="dob-h">DOB:</div>
            <div class="dob">
                <?php echo $row['dob'];?>
            </div>
        </div>
        <div class="row">
            <div class="gender-h">Gender:</div>
            <div class="gender">
                <?php echo $row['gender'];?>
            </div>
        </div>
        <div class="row">
            <div class="orders-h">Your Orders:</div>
            <div class="orders">
                <?php if(isset($row['orders'])) {
                            echo "<ul>";
                            foreach (unserialize($row['orders']) as $id => $qty) {
                                $sql = "SELECT * from medicines where id = '$id'";
                                $res = mysqli_query($conn,$sql);
                                $row = mysqli_fetch_assoc($res);
                                echo "<li>".$row['name']." (".$qty." in numbers)</li>";
                            }
                            echo "</ul>";
                        } else echo 'No orders placed';
                    ?>
            </div>
        </div>
    </div>
</body>

</html>
<?php
mysqli_close($conn);