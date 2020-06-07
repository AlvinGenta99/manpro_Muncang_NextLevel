<?php
/**
 * Function to insert a new motorcycle entry into the DB. Input parameter is obatined from insert_own.php
 * 
 * @author Mohammad Khairi Poerwo Satrio, Fadhillah Reza Putranto, Alvin Genta Pratama
 * @version 6.3.20
 */
require_once "config.php";
require_once "insert_own.php";
$posted = false;
$jenis = $tipe = $namaMotor = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    try 
    {   
		// Initialization from $_POST method.
        $posted = true;
        $namaMotor = $_POST["iNamaMotor"];
        
		//Isert into 'motor' table query
        $new_motor = "INSERT INTO motor (nama_motor) VALUES ('$namaMotor')";
        pg_query($new_motor);

      
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