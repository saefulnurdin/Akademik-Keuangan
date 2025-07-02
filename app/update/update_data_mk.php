<?php
include '../../config/config.php';
$id = $_POST['id'];
$kode_mk = $_POST['kode_mk'];
$mata_kuliah = $_POST['mata_kuliah'];
$sks = $_POST['sks'];
$query = mysqli_query($conn, "UPDATE tb_mk SET kode_mk='$kode_mk', mata_kuliah='$mata_kuliah', sks='$sks' WHERE id='$id'");
header('Location: ../index.php?page=data-mk');
?>