<?php
session_start();
include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];


$query = mysqli_query($conn, "SELECT * FROM tb_users WHERE username='$username' AND password='$password'");
if (mysqli_num_rows($query) == 1) {
    header('location:../app');
    $user = mysqli_fetch_array($query);
    $_SESSION['nama'] = $user['nama'];
    $_SESSION['level'] = $user['level'];
    // echo "Login successful";
} else if ($username =='' || $password =='') {
    header('location:../index.php?error=2');
    // echo "Login failed";
} else {
    header('location:../index.php?error=1');
    // echo "Login failed";
}


?>