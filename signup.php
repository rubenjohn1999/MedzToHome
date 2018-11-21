<?php



extract($_POST);
$name=$_POST['name'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$phno=$_POST['phno'];
$dob=$_POST['dob'];
$psw=$_POST['psw'];

$check=0;


$conn=mysqli_connect("localhost","root","");
if(!$conn)
{
  die('connection failed!');
}
mysqli_select_db($conn,"testdb");
$rescheck=mysqli_query($conn,"SELECT * FROM users;");
while($rowcheck=mysqli_fetch_assoc($rescheck)){
  if($rowcheck["email"]==$email){
    echo"<script>alert('You have already registered!')</script>";
  //echo file_get_contents("index.php");
  $check=1;
  echo "<script> window.location.assign('index.php');</script>";

  }
}
if($check==0)
{
  $query = "INSERT INTO users (email,name,gender,phno,dob,password) VALUES ('$email','$name','$gender','$phno','$dob','$psw');";
  if(!mysqli_query($conn,$query)) 
  {
    die('Error: ' . mysqli_error($conn));
  }
  else
  { 
   echo "<script> window.location.assign('Login.php');</script>";

  }
}


?>