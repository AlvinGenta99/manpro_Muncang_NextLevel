<?php
/**
 * Logout function to destroy current user's session
 * 
 * @author Mohammad Khairi Poerwo Satrio, Fadhillah Reza Putranto, Alvin Genta Pratama
 * @version 6.3.20 
 */
    session_start();
    
    if(session_destroy()) // Destroying All Sessions 
    {
    header("Location: index.php"); // Redirecting To Home Page
    }
    ?>