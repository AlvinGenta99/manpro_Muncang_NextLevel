<?php
/**
 * Function to update the stock of spareparts in the DB. Input parameter is obatined from insert_own.php
 * 
 * @author Mohammad Khairi Poerwo Satrio, Fadhillah Reza Putranto, Alvin Genta Pratama
 * @version 6.3.20
 */
require_once "config.php";
require_once "insert_own.php";
$posted = false;
$jenis = $tipe = $namaMotor = '';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    try
    {
		// Initialization from $_POST method.
        $posted = true;
        $tipe_2 = $_POST['iTipe_2'];
        $stock = $_POST['iStock_update'];

		//Update query for spareparts
        $new_stock = "UPDATE spareparts SET stock = stock + $stock WHERE id_tipe = $tipe_2";
		//Insert the updated spareparts stock into 'riwayat_restock" table
        $update_date = "INSERT INTO riwayat_restock (id_tipe,jumlah) VALUES ($tipe_2,$stock)";
        pg_query($new_stock);
        pg_query($update_date);

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