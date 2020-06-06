<?php
/* Database Login Credentials
 * Insert PostgreSQL dredentials here.
 * Make sure DB is naed to your requirements, and use the given TXT files.
 * 
 * @author Mohammad Khairi Poerwo Satrio, Fadhillah Reza Putranto, Alvin Genta Pratama
 * @version 6.3.20
*/
$link = pg_connect("host=localhost dbname=muncang_jaya user=postgres password=asdf");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . "Error");
}
?>

