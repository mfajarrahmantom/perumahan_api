<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "../../database/database.php";

$data = json_decode(file_get_contents("php://input"));
$kd_pelanggan = $data->kd_pelanggan;
$nama = $data->nama;
$tanggal_beli = $data->tanggal_beli;
$jenis_kelamin = $data->jenis_kelamin;
$telp = $data->telp;
$rumah_kd = $data->rumah_kd;

$hasil["success"] = false;
$hasil["data"] = array();

$insert_sql = "UPDATE customer SET nama='$nama', tanggal_beli='$tanggal_beli', jenis_kelamin='$jenis_kelamin', telp='$telp', rumah_kd='$rumah_kd' WHERE kd_pelanggan='$kd_pelanggan'";
$result = mysqli_query($connection, $insert_sql);
if ($result) {
    $hasil["success"] = true;
    $hasil["data"] = $data;
}

echo json_encode($hasil);
