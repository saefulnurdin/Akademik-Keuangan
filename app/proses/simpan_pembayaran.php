<?php
include('../../config/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $angkatan = $_POST['angkatan'];
    $jurusan = $_POST['jurusan'];
    $semester = $_POST['semester'];
    $tgl_bayar = $_POST['tgl_bayar'];
    $nama_pembayaran = $_POST['nama_pembayaran'];
    $pembayaran = $_POST['pembayaran'];

    // Debug: print data yang diterima
    error_log("Data received: " . print_r($_POST, true));

    $query = "INSERT INTO tb_pembayaran (nama, nim, angkatan, jurusan, semester, tgl_bayar, nama_pembayaran, pembayaran) 
              VALUES ('$nama', '$nim', '$angkatan', '$jurusan', '$semester', '$tgl_bayar', '$nama_pembayaran', '$pembayaran')";

    if (mysqli_query($conn, $query)) {
        header('Location: ../index.php?page=data-pembayaran');
        exit;
    } else {
        // Debug: print error jika query gagal
        error_log("Query error: " . mysqli_error($conn));
        $params = http_build_query([
            'nim' => $nim,
            'error' => true,
            'message' => 'Gagal menyimpan pembayaran: ' . mysqli_error($conn)
        ]);
        header("Location: ../view/data-pembayaran.php?" . $params);
        exit;
    }
}
