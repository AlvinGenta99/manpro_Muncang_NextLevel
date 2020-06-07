<?php
/**
 * Function to insert a new type of spareparts into the DB. Input parameter is obatined from insert_own.php
 * 
 * @author Mohammad Khairi Poerwo Satrio, Fadhillah Reza Putranto, Alvin Genta Pratama
 * @version 6.3.20
 */
require_once "config.php";
require_once "insert_own.php";
$posted = false;
$jenis = $tipe = $namaTipe = '';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    try
    {
		// Initialization from $_POST method.
        $posted = true;
        $namaTipe = $_POST["iNamaTipe"];

		//Insert into 'tipe' table query
        $new_tipe = "INSERT INTO tipe (nama_tipe) VALUES ('$namaTipe')";
        pg_query($new_tipe);

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
