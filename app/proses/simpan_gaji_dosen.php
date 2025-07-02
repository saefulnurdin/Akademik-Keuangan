<?php
include('../../config/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nidn = $_POST['nidn'];
    $jabatan = $_POST['jabatan'];
    $tanggal_gaji = $_POST['tanggal_gaji'];
    $nominal = $_POST['nominal'];

    // Debug: print data yang diterima
    error_log("Data received: " . print_r($_POST, true));

    $query = "INSERT INTO tb_gaji (nama, nidn, jabatan, tanggal_gaji, nominal) 
              VALUES ('$nama', '$nidn', '$jabatan', '$tanggal_gaji', '$nominal')";

    if (mysqli_query($conn, $query)) {
        header('Location: ../index.php?page=data-pembayaran-gaji');
        exit;
    } else {
        // Debug: print error jika query gagal
        error_log("Query error: " . mysqli_error($conn));
        $params = http_build_query([
            'nidn' => $nidn,
            'error' => true,
            'message' => 'Gagal menyimpan gaji: ' . mysqli_error($conn)
        ]);
        header("Location: ../view/data-gaji.php?" . $params);
        exit;
    }
}
