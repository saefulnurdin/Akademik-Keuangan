<?php
include '../../config/config.php';
$kode = $_GET['kode_mk'];
$mk = $_GET['mata_kuliah'];
$sks = $_GET['sks'];
$query = mysqli_query($conn, "INSERT INTO tb_mk (id, kode_mk, mata_kuliah, sks) VALUES ('', '$kode', '$mk', '$sks')");
header('Location: ../index.php?page=data-mk');
?>