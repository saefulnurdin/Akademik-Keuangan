<?php
$id = $_GET['id'];
$stmt = mysqli_prepare($conn, "SELECT * FROM tb_mahasiswa WHERE id = ?");
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$view = mysqli_fetch_array($result);
?>

<section class="content">
    <div class="container-fluid">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit Data Mahasiswa</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="post" action="update/update_data.php">
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
                                <label>NIM</label>
                                <input type="text" class="form-control" placeholder="NIM" name="nim"
                                    value="<?= htmlspecialchars($view['nim']); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- textarea -->
                            <div class="form-group">
                                <label>Angkatan</label>
                                <select class="custom-select" id="angkatan" name="angkatan" required>
                                    <option value="<?= htmlspecialchars($view['angkatan']); ?>" selected>
                                        <?= htmlspecialchars($view['angkatan']); ?></option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Jurusan</label>
                                <input type="text" class="form-control" placeholder="Jurusan" name="jurusan"
                                    value="<?= htmlspecialchars($view['jurusan']); ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Semester</label>
                                <input type="text" class="form-control" placeholder="Semester" name="semester"
                                    value="<?= htmlspecialchars($view['semester']); ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- textarea -->
                            <div class="form-group">
                                <label>Angkatan</label>
                                <select class="custom-select" id="status" name="status" required>
                                    <option value="<?= htmlspecialchars($view['status']); ?>" selected>
                                        <?= htmlspecialchars($view['status']); ?></option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Non Aktif">Non Aktif</option>
                                    <option value="Lulus">Lulus</option>
                                </select>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-dark ml-2"
                            onclick="window.location.href='index.php?page=data-mahasiswa';">Batal</button>
                        <button type="submit" class="btn btn-sm btn-info ml-3">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>