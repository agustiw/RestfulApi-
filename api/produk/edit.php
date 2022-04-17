<?php
    require_once('../config/konek.php');
    $data = json_decode(file_get_contents("php://input"));

    if ($data->id!=null){
        $id = $data->id;
        $nama_buku= $data->nama_buku;
        $penulis = $data->penulis;
        $jenis_buku = $data->jenis_buku;
        $stok = $data->stok;

        $sql = $conn -> prepare("UPDATE tbbuku SET nama_buku=?, penulis=?, jenis_buku=?, stok=? WHERE id=?");
        $sql -> bind_param('sssdd', $nama_buku, $penulis, $jenis_buku, $stok, $id);
        $sql -> execute();
        if ($sql){
            echo json_encode(array('RESPONSE' => 'SUCCESS'));
        }else{
            echo json_encode(array('RESPONSE' => 'FAILED'));
        }
    }else{
        echo "GAGAL";
    }
?>