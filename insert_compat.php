<?php

/**
 * Function to insert a new compatibility pair into the DB. Input parameter is obatined from insert_own.php
 * 
 * @author Mohammad Khairi Poerwo Satrio, Fadhillah Reza Putranto, Alvin Genta Pratama
 * @version 6.3.20
 */
require_once "config.php";
require_once "insert_own.php";
$posted = false;
$jenis = $tipe = $motor = '';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    try
    {
        // Initialization from $_POST method.
        $posted = true;
        $tipe = $_POST["comTipe"];
        $motor = $_POST["comMotor"];

        // Insert to compatibility table Query.
        $new_compat = "INSERT INTO compatibility VALUES ($tipe,$motor)";
        pg_query($new_compat);

        echo ("<script>
            alert('Data sudah tercatat');
            window.location.href='insert_own.php';
            </script>");

    }

    catch(Exception $e)
    {
        echo $e;
    }
}
?>
