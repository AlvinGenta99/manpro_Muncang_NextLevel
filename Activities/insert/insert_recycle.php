<?php
require_once "config.php";
require_once "insert_own.php";
$posted = false;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    try
    {
        $posted = true;
        $tipe = $_POST["comTipe2"];
        $recycleCount = $_POST["iRecycleCount"];

        if (empty($recycleCount))
        {
            $new_recycle = "INSERT INTO recycle_identifier (id_tipe,recycle_count) VALUES ('$tipe',0)";
        }
        else
        {
            $new_recycle = "INSERT INTO recycle_identifier (id_tipe,recycle_count) VALUES ('$tipe', '$recycleCount')";
        }
        pg_query($new_recycle);
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