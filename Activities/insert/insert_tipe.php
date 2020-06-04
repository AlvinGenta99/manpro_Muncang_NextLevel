<?php
require_once "config.php";
require_once "insert_own.php";
$posted = false;
$jenis = $tipe = $namaTipe = '';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    try
    {
        $posted = true;
        $namaTipe = $_POST["iNamaTipe"];

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
