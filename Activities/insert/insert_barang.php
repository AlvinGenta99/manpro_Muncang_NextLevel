<?php
require_once "config.php";
require_once "insert_own.php";
$posted = false;
$executeCheck = false;
$jenis = $tipe = $merk = $harga = $stock = $recycle = '';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    try
    {
        $posted = true;
        $jenis = $_POST["spJenis"];
        $merk = $_POST["spMerk"];
        $tipe = $_POST["spTipe"];
        $harga = $_POST["spHarga"];
        $stock = $_POST["spStock"];
        $recycle = $_POST["spRecycle"];

        $new_sparepart = "INSERT INTO spareparts VALUES ('$jenis','$merk','$tipe','$stock','$harga')";
        $update = "INSERT INTO riwayat_restock VALUES ('$tipe','$stock')";

        //Recycle table queries
        $check_recycle = "SELECT id_recycle FROM recycle_identifier WHERE id_recycle='$recycle' LIMIT 1";
        $recycle_warning = "SELECT recycle_count FROM recycle_identifier WHERE id_recycle='$recycle' LIMIT 1";
        $add_recycle = "UPDATE recycle_identifier SET recycle_count = recycle_count + 1 WHERE id_recycle = '$recycle'";

        if (empty($recycle))
        {
            pg_query($new_sparepart);
            pg_query($update);

            echo ("<script>
                alert('Data sudah tercatat tanpa RID');
                window.location.href='#';
                </script>");
        }
        else
        {
            $executeCheck = pg_query($check_recycle);
            $executeCheck = pg_fetch_result($executeCheck, 1);
            if ($executeCheck == true)
            {
                pg_query($add_recycle);
                pg_query($new_sparepart);
                pg_query($update);

                echo ("<script>
                    alert('Data sudah tercatat dengan RID');
                    window.location.href='#';
                    </script>");
            }
            else if ($executeCheck == false)
            {
                pg_query($new_sparepart);
                pg_query($update);

                echo ("<script>
                    alert('Recycle ID tidak ditemukan.\n
                    Memasukkan spareparts saja.');
                    window.location.href='#';
                    </script>");
            }
        }
    }

    catch(Exception $e)
    {
        echo $e;
    }
}
?>
