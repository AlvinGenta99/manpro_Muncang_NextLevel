
<?php
/**
 * Login function using inputs from index.php.
 * 
 * @author Mohammad Khairi Poerwo Satrio, Fadhillah Reza Putranto, Alvin Genta Pratama
 * @version 6.3.20
 */
    session_start(); // Starting Session
    $error = $username = $password = ''; // Variable To Store Error Message
    if (isset($_POST['submit'])) 
    {
        // Catch for empty inputs
        if (empty($_POST['username']) || empty($_POST['password'])) 
        {
            echo ("<script>
            alert('Username or Password is invalid');
            window.location.href='index.php';
            </script>");
        }
        
        /**
         * Password is hashed in MD5, as the password is stores in MD5 hashed form in the DB.
         */
        else
        {    
            $username = $_POST['username']; 
            $passraw = $_POST['password']; //Raw password input
            $password = md5("$passraw"); //Hashing the password

            require_once 'config.php';

            $query = "SELECT username, password from login where username= '$username' AND password= '$password' LIMIT 1";
            $stmt = pg_prepare($link, "my_query",$query);
            $stmt=pg_execute($link,"my_query",array());
            $param = pg_fetch_result($stmt,1);

            if($param == TRUE)
            {
            $_SESSION['login_user'] = $username; // Initializing Session
            header("location: index.php"); // Redirecting To Home Page
            }

            //Exception to invalid input
            else
            {
                echo ("<script>
                alert('Username or Password is invalid');
                window.location.href='index.php';
                </script>");
            }

        }
    }
?>