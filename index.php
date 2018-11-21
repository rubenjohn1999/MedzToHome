<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Welcome To MedzToHome</title>
    <link rel="stylesheet" type="text/css" href="homepage.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">

</head>

<body style="background:url('background.jpg'); background-repeat:repeat-x; background-size:100%" align=center>
    <?php include("navbar.php") ?>
    <br />
    <h1>Welcome to MedzToHome.com </h1>
    <h3>Your new favorite place to buy Medicines</h3>
    <br />
    <div id="offers">
        <a href="index.php">
            <div>
                <h2>New to MedzToHome ? <br /> Login now and get 30% off on your first purchase!</h2>
            </div>

            <a href="index.php">
                <div>
                    <h2>Get free medicines <br /> share the link to 7 people and get 2 medicines free!!</h2>
                </div>
            </a>
            <a href="index.php">
                <div>
                    <h2>Buy medicines and get cashback <br /> Get cashback upto Rs 500 on your first order!! </h2>
                </div>
            </a>
    </div>
</body>

</html>