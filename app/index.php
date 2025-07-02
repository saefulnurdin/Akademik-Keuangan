<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!$_SESSION['nama']) {
  header('location: ../index.php?session=expired');
}
include 'header.php';
?>
<?php include '../config/config.php'; ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <?php include 'preloader.php'; ?>

        <!-- NAvbar -->
        <?php include 'navbar.php'; ?>
        <!-- / .navbar-->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <?php include 'logo.php'; ?>

            <!-- Sidebar -->
            <?php include 'sidebar.php'; ?>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php include 'content_header.php'; ?>
            <!-- /.content-header -->

            <!-- Main content -->
            <?php
      if (isset($_GET['page'])) {
        if ($_GET['page'] == 'dashboard') {
          include 'dashboard.php';
        } else if ($_GET['page'] == 'data-mahasiswa') {
          include 'data_mahasiswa.php';
        } else if ($_GET['page'] == 'data-pembayaran') {
          include 'data_pembayaran.php';
        } else if ($_GET['page'] == 'edit-data') {
          include 'edit/edit_data.php';
        } else if ($_GET['page'] == 'edit-data-dosen') {
          include 'edit/edit_data_dosen.php';
        } else if ($_GET['page'] == 'data-mk') {
          include 'data_mata_kuliah.php';
        } else if ($_GET['page'] == 'edit-mk') {
          include 'edit/edit_mk.php';
        } else if ($_GET['page'] == 'data-dosen') {
          include 'data_dosen.php';
        } else if ($_GET['page'] == 'data-pembayaran-gaji') {
          include 'data_pembayaran_gaji.php';
        } else {
          include 'not_found.php';
        }
      } else {
        include 'dashboard.php';
      } ?>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Footer -->
        <?php include 'footer.php'; ?>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
</body>

</html>