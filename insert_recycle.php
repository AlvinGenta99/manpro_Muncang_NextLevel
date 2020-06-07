<?php
/**
 * Function to insert a recycled item into the DB. Input parameter is obatined from insert_own.php
 * 
 * @author Mohammad Khairi Poerwo Satrio, Fadhillah Reza Putranto, Alvin Genta Pratama
 * @version 6.3.20
 */
require_once "config.php";
require_once "insert_own.php";
$posted = false;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    try
    {
		// Initialization from $_POST method.
        $posted = true;
        $tipe = $_POST["comTipe2"];
        $recycleCount = $_POST["iRecycleCount"];

		//Insert into 'recycle_identifier' table query
        if (empty($recycleCount))
        {
			//If only an item is inserted
            $new_recycle = "INSERT INTO recycle_identifier (id_tipe,recycle_count) VALUES ('$tipe',0)";
        }
        else
        {
			//If the amount is specified
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