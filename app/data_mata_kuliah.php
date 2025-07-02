<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Mata Kuliah</h3>
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
                                    <th>Kode MK</th>
                                    <th>Mata Kuliah</th>
                                    <th>SKS</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                // Ambil data mahasiswa dari database
                $no = 0;
                $query = mysqli_prepare($conn, "SELECT * FROM tb_mk");
                mysqli_stmt_execute($query);
                $result = mysqli_stmt_get_result($query);
                while ($mk = mysqli_fetch_array($result)) {
                  $no++;
                ?>
                                <tr>
                                    <td width='5%'><?= $no; ?></td>
                                    <td><?= $mk['kode_mk']; ?></td>
                                    <td><?= $mk['mata_kuliah']; ?></td>
                                    <td><?= $mk['sks']; ?></td>
                                    <td>
                                        <a onclick="hapus_data_mk(<?= $mk['id']; ?>)"
                                            class="btn btn-sm btn-danger">Hapus</a>
                                        <a href="index.php?page=edit-mk&& id=<?= htmlspecialchars($mk['id']); ?>"
                                            class="btn btn-sm btn-success">Edit</a>
                                    </td>
                                </tr>
                                <?php } ?>

                            </tbody>
                            <!-- <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot> -->
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
    </div>
</section>
<!-- /.content -->
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Mata Kuliah</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="get" action="add/tambah_data_mk.php">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Kode Mata Kuliah" name="kode_mk"
                                required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Mata Kuliah" name="mata_kuliah"
                                required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="SKS" name="sks" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
        </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="modal-view-mk">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="get" action="add/tambah_data_mk.php">
                <div class="modal-body" id="hasil-view-data-mk">

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
<!-- / .modal-view-data -->
<script>
function hapus_data_mk(data_id) {
    //window.location=("delete/hapus_data.php?id="+data_id);
    Swal.fire({
        title: "Apakah anda yakin ingin menghapus data ini?",
        //showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: "Hapus Data",
        confirmButtonColor: 'red',
        // denyButtonText: `Don't save`
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            window.location = ("delete/hapus_data_mk.php?id=" + data_id);
        }
    });
}
</script>