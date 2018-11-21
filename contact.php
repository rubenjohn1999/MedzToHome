<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
    <title>Contact</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <style type="text/css">
        {
            margin: 0;
            font-family: "Lato";
        }

        form.form {
            background: #ddd;
            width: 33%;
            margin: 0 auto;
            border-radius: 5px;
            padding: 20px 50px;
        }

        form.form>div {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        input[type=text],
        select,
        textarea {
            width: 75%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 6px;
            margin-bottom: 16px;
        }

        input[type=submit]:hover {
            background-color: #224;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 10px;
            text-align: center;
        }

        label {
            padding: 10px;
            width: 100px;
        }

        .signupbtn {
            background-color: #227542;
            color: white;
            padding: 14px 20px;
            border-radius: 9px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            font-family: 'Lato';
        }
    </style>
    <script>
        function thankYou()
        {
            form=document.getElementById("form");
            form.innerHTML="<h1>Thank you for your feedback!</h1><br><h2>We will get back to you within 3 working days!</h2>";
        }
    </script>
</head>

<body>
    <?php include("navbar.php");?>
    <div class="container" id="form">
        <form action="contact.php" class="form" onsubmit="thankYou()">
            <div>
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="firstname" placeholder="Your name..">
            </div>
            <div>
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lastname" placeholder="Your last name..">
            </div>
            <div>
                <label for="country">Country</label>
                <input type="text" name="country" placeholder="Your country name">
            </div>
            <div>
                <label for="email">Email id</label>
                <input type="text" name="email" placeholder="Your email id">
            </div>
            <div>
                <label for="contact">Contact</label>
                <input type="text" name="contact" placeholder="Your contact number">
            </div>
            <div>
                <label for="subject">Subject</label>
                <textarea id="subject" name="subject" placeholder="Write something.." style="height:100px"></textarea>
            </div>
            <div><button type="submit" class="signupbtn">Submit</button></div>
        </form>





    </div>
</body>

</html>