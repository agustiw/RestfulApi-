<?php
    require_once('../config/konek.php');
    if (isset($_POST['nama_buku']) && isset($_POST['penulis']) && isset($_POST['jenis_buku'])&& isset($_POST['stok'])){
        $nama_buku = $_POST['nama_buku'];
        $penulis = $_POST['penulis'];
        $sql = $conn->prepare("INSERT INTO tbbuku (nama_buku, penulis, jenis_buku, stok) VALUES (?, ?, ?, ?)");
        $jenis_buku = $_POST['jenis_buku'];
        $stok = $_POST['stok'];
        $sql -> bind_param('sssd', $nama_buku, $penulis, $jenis_buku, $stok);
        $sql->execute();
        if ($sql){
            //echo json_encode(array('RESPONSE' =&gt; 'FAILED'));
            echo json_encode(array('RESPONSE' => 'SUCCESS'));
            //header("location:../readapi/tampil.php");
        } else{
            echo "GAGAL";
        }
    }
?>