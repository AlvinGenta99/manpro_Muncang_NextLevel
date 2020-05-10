<?php
require_once "config.php";
require_once "insert_own.php";
$posted = false;
$jenis = $namaMotor = $tipe = $namaMotor = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    try 
    {   
        $posted = true;
        $namaMotor = $_POST["motorCompat"];
        $jenis = $_POST["spJenis"];
        $merk = $_POST["spMerk"];
        $tipe = $_POST["spTipe"];
        $harga = $_POST["spHarga"];
        $stock = $_POST["spStock"];
        $recycle= $_POST["spRecycle"];
        
        $new_sparepart = "INSERT INTO spareparts VALUES ('$jenis','$merk','$tipe','$stock','$harga')";
        $update = "INSERT INTO riwayat_restock VALUES ('$tipe','$stock')";
        
        //Recycle table queries
        $check_recycle = "SELECT id_recycle FROM recycle_identifier WHERE id_recycle='$recycle' LIMIT 1";
        $add_recycle = "UPDATE recycle_identifier SET recycle_count = recycle_count + 1 WHERE id_recycle = '$recycle'";
        
        //$trial = "SELECT id_tipe FROM tipe WHERE nama_tipe = '$tipe'";
        //$insert_test = "INSERT INTO recycle_identifier (id_tipe,recycle_count) VALUES ($trial, 0)";
        if(empty($recycle)){
            pg_query($new_sparepart);
            pg_query($update);

            echo ("<script>
                alert('Data sudah tercatat');
                window.location.href='#';
                </script>");
        }
        if ($check_recycle == TRUE){
            pg_query($add_recycle);
            pg_query($new_sparepart);
            pg_query($update);
            
            echo ("<script>
                alert('Data sudah tercatat');
                window.location.href='#';
                </script>");
            }
    }

    catch(Exception $e)
    {
        echo $e;
    }
}
?>


