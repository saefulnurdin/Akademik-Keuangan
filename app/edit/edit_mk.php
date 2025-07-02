<?php
$id = $_GET['id'];
$stmt = mysqli_prepare($conn, "SELECT * FROM tb_mk WHERE id = ?");
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$view_mk = mysqli_fetch_array($result);
?>

<section class="content">
    <div class="container-fluid">
        <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Data Mata Kuliah</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="update/update_data_mk.php">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Kode MK</label>
                        <input type="text" class="form-control" placeholder="Kode_MK" name="kode_mk" value="<?= $view_mk['kode_mk'];?>">
                        <input type="hidden" class="form-control" placeholder="Nama" name="id" value="<?= $view_mk['id'];?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Mata Kuliah</label>
                        <input type="text" class="form-control" placeholder="Mata Kuliah" name="mata_kuliah" value="<?= $view_mk['mata_kuliah'];?>">
                      </div>
                    </div>
                  </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>SKS</label>
                        <input type="text" class="form-control" placeholder="Jurusan" name="sks" value="<?= $view_mk['sks'];?>">
                      </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-dark ml-2" onclick="window.location.href='index.php?page=data-mk';">Batal</button>
                    <button type="submit" class="btn btn-sm btn-info">Simpan</button>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
        </div>
    </div>
</section>