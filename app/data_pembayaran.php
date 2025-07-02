<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Mahasiswa</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>NIM</th>
                  <th>Angkatan</th>
                  <th>Jurusan</th>
                  <th>Semester</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Ambil data mahasiswa dari database
                $no = 0;
                $query = mysqli_query($conn, "SELECT * FROM tb_mahasiswa");
                while ($mhs = mysqli_fetch_array($query)) {
                  $no++;
                ?>
                  <tr>
                    <td width='5%'><?= htmlspecialchars($no); ?></td>
                    <td><?= htmlspecialchars($mhs['nama']); ?></td>
                    <td><?= htmlspecialchars($mhs['nim']); ?></td>
                    <td><?= htmlspecialchars($mhs['angkatan']); ?></td>
                    <td><?= htmlspecialchars($mhs['jurusan']); ?></td>
                    <td><?= htmlspecialchars($mhs['semester']); ?></td>
                    <td><?= htmlspecialchars($mhs['status']); ?></td>
                    <td>
                      <a class="view-pembayaran btn btn-sm btn-dark" data-id="<?= $mhs['id']; ?>"
                        data-nama="<?= $mhs['nama']; ?>" data-nim="<?= $mhs['nim']; ?>"
                        data-angkatan="<?= $mhs['angkatan']; ?>"
                        data-jurusan="<?= $mhs['jurusan']; ?>"
                        data-semester="<?= $mhs['semester']; ?>"
                        data-status="<?= $mhs['status']; ?>">View Pembayaran
                      </a>
                    </td>
                  </tr>
                <?php } ?>

              </tbody>
            </table>
            <!-- / .Table -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- / .card -->
        <div id="hasil-view-pembayaran">

        </div>
        <?php //include 'view/view-data-pembayaran.php';
        ?>
        <!-- / .vew data pembayaran -->
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->