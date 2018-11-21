<?php session_start();
$username="localhost";
$password="root";
$database="testdb";

$conn=mysqli_connect("localhost","root","");
if(!$conn)
{
  die('connection failed!');
}
mysqli_select_db($conn,"testdb");

$query="SELECT * FROM medicines WHERE name like '%".$_GET['q']."%';";
$q= mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($q);
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" type="text/css" href="medicne1.css"> -->

<style>
    .rest{
        width: 30%;
        padding:10px;
        display: flex;
        /* flex-direction: column;
        flex-wrap: wrap; */
        align-items: center;
        justify-content: center;
    }
    .rest img {
height: 200px;
max-width: 300px;
padding: 5px 20px;
    }
    .list {
        /* flex-direction: column; */
        display: flex;
        flex-wrap: wrap;
    }
    .rest > a {
        display: flex;
        align-items: center;
    }
</style>
</head>
<body>
<?php  include("navbar.php");?>

<ul class="results">
<?php
if (!$row) {
   echo '<h1>No results found!</h1>';
    echo '<h2> Please Search again</h2>';
}
else{
    echo '<div class="list">';
    while ($row) {
        echo '<li class="rest"><a href="Medicine1.php?id='.$row['id'].'"><img src="'.$row['imgcontainer'].'">'.$row['name'].'</a></li>';
        $row = mysqli_fetch_assoc($q);    
    }
    echo '</div>';
}
?>
</ul>
</body>
</html>
<?php
mysqli_close($conn);
?>