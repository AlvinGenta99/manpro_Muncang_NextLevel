<?php
/* Search function and display for Sale confirmation.
 * This page is used to confirm a sale that is being made, by Cross-checking the selectd Item.
 * 
 * @author Mohammad Khairi Poerwo Satrio, Fadhillah Reza Putranto, Alvin Genta Pratama
 * @version 6.3.20
*/
require_once 'config.php';
session_start();
$number = count($_POST['iId']);
$id = $_POST['iId'];
$jumlah = $_POST['iJumlah'];
$query4 = "INSERT INTO riwayat_jual (id_tipe,jumlah) VALUES ";
pg_query("BEGIN") or die("Could not start transaction\n");

if ($number == 1)
{
    if ($id[0] == 0 || $jumlah[0] == 0)
    {
        echo ("Nilai tidak dimasukkan. HARAP CEK KEMBALI!");
        exit();
    }

    $query1 = "UPDATE spareparts SET stock = stock - $jumlah[0] WHERE id_tipe = $id[0]";
    $query2 = "SELECT stock FROM spareparts WHERE id_tipe = $id[0]";
    $prep1 = pg_prepare($link, "reduce", $query1);
    $prep2 = pg_prepare($link, "check", $query2);
    $prep1 = pg_execute($link, "reduce", array());
    $prep2 = pg_execute($link, "check", array());
    $query4 .= "($id[0], $jumlah[0])";
    pg_query($link, $query4);
    $data = pg_fetch_assoc($prep2);
    if ($data['stock'] < 0)
    {
        pg_query("ROLLBACK") or die("ROLLBACK failed\n");

        echo ("Transaksi Gagal, karena STOCK TIDAK ADA/HABIS. Harap cek transaksi kembali!");
        exit();
    }
    else
    {
        pg_query("COMMIT") or die("Transaction commit failed\n");
        echo ("Transaksi BERHASIL!");
        exit();
    }
}
if ($number > 1)
{
    if ($id[0] == 0 || $jumlah[0] == 0)
    {
        echo ("Nilai tidak dimasukkan. HARAP CEK KEMBALI!");
        exit();
    }
    for ($i = 0;$i < $number - 1;$i++)
    {
        if ($id[$i] == 0 || $jumlah[$i] == 0)
        {
            echo ("Nilai tidak dimasukkan. HARAP CEK KEMBALI!");
            exit();
        }
        if (trim($_POST["iId"][$i] != ''))
        {

            $query1 = "UPDATE spareparts SET stock = stock - $jumlah[$i] WHERE id_tipe = $id[$i]";
            $query2 = "SELECT stock FROM spareparts WHERE id_tipe = $id[$i]";
            $prep1 = pg_prepare($link, "reduce", $query1);
            $prep2 = pg_prepare($link, "check", $query2);
            $prep1 = pg_execute($link, "reduce", array());
            $prep2 = pg_execute($link, "check", array());
            $query4 .= "($id[$i], $jumlah[$i]),";
            $data = pg_fetch_assoc($prep2);
            if ($data['stock'] < 0)
            {
                pg_query("ROLLBACK") or die("ROLLBACK failed\n");

                echo ("Transaksi Gagal, karena STOCK TIDAK ADA/HABIS. Harap cek transaksi kembali!");
                exit();
            }
            else
            {
                pg_query("COMMIT") or die("Transaction commit failed\n");
                echo ("Transaksi BERHASIL!");
                exit();
            }

        }

    }

    $query4 .= "($id[$i], $jumlah[$i])";
    pg_query($link, $query4);

}

if ($data < 0)
{
    pg_query("ROLLBACK") or die("ROLLBACK failed\n");

    echo ("Transaksi Gagal, karena STOCK TIDAK ADA/HABIS. Harap cek transaksi kembali!");
    exit();
}
else
{

    pg_query("COMMIT") or die("Transaction commit failed\n");
    echo ("Transaksi BERHASIL!");
    exit();
}
?>
