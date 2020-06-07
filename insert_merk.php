<?php
/**
 * Function to insert a new brand name of spareparts into the DB. Input parameter is obatined from insert_own.php
 * 
 * @author Mohammad Khairi Poerwo Satrio, Fadhillah Reza Putranto, Alvin Genta Pratama
 * @version 6.3.20
 */
$posted = false;
require_once "config.php";
require_once "insert_own.php";


if($_SERVER["REQUEST_METHOD"] = "POST"){
    try 
    {   
		// Initialization from $_POST method.
        $posted = true;
        $nama_merk = $_POST['iNamaMerk'];
        
		//Insert into 'merk' table query
        $new_merk = "INSERT INTO merk (nama_merk) VALUES ('$nama_merk')";
        pg_query($new_merk);

      
            echo ("<script>
            alert('Data sudah tercatat');
            </script>");
    }

    catch(Exception $e)
    {
        echo $e;
    }
}
?>