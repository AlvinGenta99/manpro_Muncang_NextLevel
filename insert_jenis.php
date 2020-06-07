<?php
/**
 * Function to insert a new kind of spareparts into the DB. Input parameter is obatined from insert_own.php
 * 
 * @author Mohammad Khairi Poerwo Satrio, Fadhillah Reza Putranto, Alvin Genta Pratama
 * @version 6.3.20
 */
require_once "config.php";
require_once "insert_own.php";
$posted = false;
$jenis = $tipe = $namaJenis = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    try 
    {   
		// Initialization from $_POST method.
        $posted = true;
        $namaJenis = $_POST["iNamaJenis"];
        
		//Insert into 'jenis' table query
        $new_jenis = "INSERT INTO jenis (nama_jenis) VALUES ('$namaJenis')";
        pg_query($new_jenis);

      
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