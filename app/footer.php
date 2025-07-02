<footer class="main-footer">
  <strong>Copyright &copy; 2025 <a href="#">STMIK PAMITRAN</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.2.0
  </div>
</footer>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<!-- <script src="plugins/sparklines/sparkline.js"></script> -->
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="dist/js/pages/dashboard.js"></script> -->

<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });

  $('.view-data').click(function() {
    var nama = $(this).attr('data-nama');
    var nim = $(this).attr('data-nim');
    var angkatan = $(this).attr('data-angkatan');
    var jurusan = $(this).attr('data-jurusan');
    var semester = $(this).attr('data-semester');
    var status = $(this).attr('data-status');
    $.ajax({
      url: "view/view-data-mahasiswa.php",
      dataType: "html",
      method: "POST",
      data: {
        nama: nama,
        nim: nim,
        angkatan: angkatan,
        jurusan: jurusan,
        semester: semester,
        status: status
      },
      success: function(data) {
        $('#hasil-view-data').html(data);
      }
    });
    console.log(nim);
  });
  $('.view-data-dosen').click(function() {
    var nama = $(this).attr('data-nama');
    var nidn = $(this).attr('data-nidn');
    var tanggal_masuk = $(this).attr('data-tanggal_masuk');
    var jabatan = $(this).attr('data-jabatan');
    var status = $(this).attr('data-status');
    $.ajax({
      url: "view/view-data-dosen.php",
      dataType: "html",
      method: "POST",
      data: {
        nama: nama,
        nidn: nidn,
        tanggal_masuk: tanggal_masuk,
        jabatan: jabatan,
        status: status,

      },
      success: function(data) {
        $('#hasil-view-data-dosen').html(data);
      }
    });
    console.log(nim);
  });
  $('.view-pembayaran').click(function() {
    var nama = $(this).attr('data-nama');
    var nim = $(this).attr('data-nim');
    var angkatan = $(this).attr('data-angkatan');
    var jurusan = $(this).attr('data-jurusan');
    var semester = $(this).attr('data-semester');
    var status = $(this).attr('data-status');
    $.ajax({
      url: "view/view-data-pembayaran.php",
      dataType: "html",
      method: "POST",
      data: {
        nama: nama,
        nim: nim,
        angkatan: angkatan,
        jurusan: jurusan,
        semester: semester,
        status: status
      },
      success: function(data) {
        $('#hasil-view-pembayaran').html(data);
      }
    });
    console.log(nim);
  });
  $('.view-gaji').click(function() {
    var nama = $(this).attr('data-nama');
    var nidn = $(this).attr('data-nidn');
    var jabatan = $(this).attr('data-jabatan');
    $.ajax({
      url: "view/view-data-gaji.php",
      dataType: "html",
      method: "POST",
      data: {
        nama: nama,
        nidn: nidn,
        jabatan: jabatan
      },
      success: function(data) {
        $('#hasil-view-gaji').html(data);
      }
    });
    console.log(nidn);
  });
  $(document).ready(function() {
    setInterval(function() {
      $('#report-mhs').load("banner.php");
    }, 500);
  });
</script>