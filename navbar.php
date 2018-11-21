<html>

<head>
	<link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Oswald|Raleway" rel="stylesheet">
	<style>
		body {
		margin: 0;
		background: #eeeeee;
		color: #111;
		font-family: 'Lato';
		font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
	}
	a {
		text-decoration: none;
    	color: inherit;
    	font-style: italic;
	}
	.site-heading {
		text-align: center;
		font-size: 42px;
		color: #224;
		padding: 10px;
		margin: 0;
	}
	.site-nav {
		background: #1e506d;
	}
	.site-nav > ul {
		list-style-type: none;
		display: flex;
		justify-content: space-around;
		padding: 10px;
		align-items: center;
	}
	.site-nav > ul > li {
		display: inline-block;
		padding: 10px 20px;
		margin: 15px;
		background: #3388b9;
		color: #ddd;
		border-radius: 10px/20px;
	}
	.site-nav > ul > li > a.active {
		display: inline-block;
		padding: 10px 20px;
		margin: 15px;
		background: #cf5f1d;
		color: #ddd;
		border-radius: 50px;
	}
	.nav_src_button input[type=text]{
		padding:10px;
		width:250px;
	}
	.nav_src_button input[type=submit]{
		padding:10px;
		background:#4e9625;
		color: white
	}
	.nav_src_button input {
		margin: 5px;
		border-radius: 10px/20px;
		font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		border: 2px solid white;
	}
	#logo {
		text-shadow: #ddd 0px 0px 10px;
	}
	</style>
</head>

<body>
	<nav>
		<h1 class="site-heading"><img src="Logo.png" alt="logo"> Medz To Home</h1>
		<nav class="site-nav">
			<ul>
				<li><a href="index.php">Home</a></li>
				<?php
			// session_start();
			if(isset($_SESSION['user']))
			 {
				echo "
			<li><a href='account-details.php'>My Account</a></li>
			<li><a href='cart.php'> Cart</a></li>
			<li><a href='logout.php'>Logout</a></li>";
			}
			else
			{
				echo "
			<li><a href='SignUp.html'>My Account</a></li>
			<li><a href='SignUp.html'> Cart</a></li>
			<li><a href='SignUp.html'>Sign Up/ Login</a></li>";
			}
			?>
				<li><a href="contact.php">Contact Us</a></li>
				<form class="nav_src_button" action="search-results.php" style="margin:auto;width:auto">
					<input type="text" placeholder="Search.." name="q">
					<input type="submit" value="Search">
				</form>
			</ul>
		</nav>
	</nav>