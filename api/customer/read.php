<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "../../database/database.php";

$select_sql = "SELECT * FROM customer";
$result = mysqli_query($connection, $select_sql);
$hasil["success"] = true;
$hasil["data"] = array();
while ($row = mysqli_fetch_assoc($result)) {
    $array_berkas = array(
        "kd_pelanggan" => $row["kd_pelanggan"],
        "nama" => $row["nama"],
        "tanggal_beli" => $row["tanggal_beli"],
        "jenis_kelamin" => $row["jenis_kelamin"],
        "telp" => $row["telp"],
        "rumah_kd" => $row["rumah_kd"]
    );
    array_push($hasil["data"], $array_berkas);
}
echo json_encode($hasil);
