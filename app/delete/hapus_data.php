<?php
include '../../config/config.php';
$id = $_GET['id'];
$query = mysqli_query($conn, "DELETE FROM tb_mahasiswa WHERE id='$id'");
header('Location: ../index.php?page=data-mahasiswa');
?>