<?php
$id = $_GET['id'];
$stmt = mysqli_prepare($conn, "SELECT * FROM tb_dosen WHERE id = ?");
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$view = mysqli_fetch_array($result);
?>

<section class="content">
    <div class="container-fluid">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit Data Dosen</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="post" action="update/update_data_dosen.php">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" placeholder="Nama" name="nama"
                                    value="<?= htmlspecialchars($view['nama']); ?>">
                                <input type="hidden" class="form-control" name="id"
                                    value="<?= htmlspecialchars($view['id']); ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>NIDN</label>
                                <input type="text" class="form-control" placeholder="NIDN" name="nidn"
                                    value="<?= htmlspecialchars($view['nidn']); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tanggal Masuk</label>
                                <input type="date" class="form-control" placeholder="Tanggal Masuk" name="tanggal_masuk"
                                    value="<?= htmlspecialchars($view['tanggal_masuk']); ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" class="form-control" placeholder="Jabatan" name="jabatan"
                                    value="<?= htmlspecialchars($view['jabatan']); ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="custom-select" id="status" name="status" required>
                                    <option value="<?= htmlspecialchars($view['status']); ?>" selected>
                                        <?= htmlspecialchars($view['status']); ?></option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Non Aktif">Non Aktif</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-sm btn-dark ml-2"
                                onclick="window.location.href='index.php?page=data-dosen';">Batal</button>
                            <button type="submit" class="btn btn-sm btn-info ml-3">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>