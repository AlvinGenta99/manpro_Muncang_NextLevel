<?php
    include('login.php'); // Includes Login Script
        if(isset($_SESSION['login_user']))
        {
            header("location: home.php"); // Redirecting To Profile Page
        }
?>

<!-- 
    Index page of the web Application. 
    This is the Login Page, for the user to enter their credentials. 
    
    @author Mohammad Khairi Poerwo Satrio, Fadhillah Reza Putranto, Alvin Genta Pratama
    @version 6.3.20 
-->

<!DOCTYPE html>
<html>
<head>
	<!-- Header for the tab -->
    <meta charset="utf-8">
    <title>Login ke Bengkel</title>
    <!-- Link to BootStrap styles and JavaScirpt BootStrap Scripts -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="theme.css" />  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <br>
</head>

<body>
    <div id="login">

    <br><br><br>
    <center><h1>Login</h1></center>
    <br><br>
    <!-- 
        For Login, Consists of Username and Password field.
        Input will be redirectedd over to Login.php, the application's login function.

        No register function is present, as this application is only intended for 1 account/person use only as of this code's creation.

    -->
        <form action="login.php" method="post">
            <center>
            <div class="md-form">
                <label>UserName :</label>
                <input class="form-control mb-3 col-5" id="name" name="username" placeholder="Enter Username" type="text" >
            </div>
            </center>

            <center>
            <div class="md-form">
                <label>Password :</label>
                <input class="form-control mb-3 col-5" id="password" name="password" placeholder="Enter Password" type="password"><br><br>
            </div>
            </center>

            <center>
            <button name="submit" type="submit" value=" Login " class="btn btn-primary btn-lg">Login
            </button>
            </center>
            <span><?php echo $error; ?></span>
            
        </form>

    </div>
</body>
</html>
