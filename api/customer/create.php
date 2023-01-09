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

$insert_sql = "INSERT INTO customer VALUES ('$kd_pelanggan','$nama','$tanggal_beli','$jenis_kelamin','$telp','$rumah_kd')";
$result = mysqli_query($connection, $insert_sql);
if ($result) {
    $hasil["success"] = true;
    $hasil["data"] = $data;
}

echo json_encode($hasil);
