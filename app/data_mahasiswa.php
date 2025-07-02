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
            <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#modal-lg">
              Tambah Data
            </button>
            <table id="example1" class="table table-bordered table-striped">
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
                $query = mysqli_prepare($conn, "SELECT * FROM tb_mahasiswa");
                mysqli_stmt_execute($query);
                $result = mysqli_stmt_get_result($query);
                while ($mhs = mysqli_fetch_array($result)) {
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
                      <a onclick="hapus_data('<?= htmlspecialchars($mhs['id']); ?>')"
                        class="btn btn-sm btn-danger">Hapus</a>
                      <a href="index.php?page=edit-data&& id=<?= htmlspecialchars($mhs['id']); ?>"
                        class="btn btn-sm btn-success">Edit</a>
                      <a class="view-data btn btn-primary btn-sm" data-toggle="modal"
                        data-target="#modal-view" data-nama="<?= htmlspecialchars($mhs['nama']); ?>"
                        data-nim="<?= htmlspecialchars($mhs['nim']); ?>"
                        data-angkatan="<?= htmlspecialchars($mhs['angkatan']); ?>"
                        data-jurusan="<?= htmlspecialchars($mhs['jurusan']); ?>"
                        data-semester="<?= htmlspecialchars($mhs['semester']); ?>"
                        data-status="<?= htmlspecialchars($mhs['status']); ?>">View Data</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->
<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data Mahasiswa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="get" action="add/tambah_data.php">
        <div class="modal-body">
          <div class="form-row">
            <div class="col">
              <input type="text" class="form-control" placeholder="Nama" name="nama" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="NIM" name="nim" required>
            </div>
            <div class="col">
              <select class="custom-select" id="angkatan" name="angkatan" required>
                <option>Pilih Angkatan..</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
              </select>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Jurusan" name="jurusan" required>
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Semester" id="semester" name="semester"
                required>
            </div>
            <div class="col">
              <select class="custom-select" id="status" name="status" required>
                <option>Status..</option>
                <option value="Aktif">Aktif</option>
                <option value="Non Aktif">Non Aktif</option>
                <option value="Lulus">Lulus</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal body" id="modal-view">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">View Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="hasil-view-data">
        <div class="form-row">

        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<script>
  function hapus_data(data_id) {
    Swal.fire({
      title: "Apakah anda yakin ingin menghapus data ini?",
      showCancelButton: true,
      confirmButtonText: "Hapus Data",
      confirmButtonColor: 'red',
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "delete/hapus_data.php?id=" + data_id;
      }
    });
  }
</script>