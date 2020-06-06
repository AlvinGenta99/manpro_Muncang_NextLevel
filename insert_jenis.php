<?php
require_once "config.php";
require_once "insert_own.php";
$posted = false;
$jenis = $tipe = $namaJenis = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    try 
    {   
        $posted = true;
        $namaJenis = $_POST["iNamaJenis"];
        
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