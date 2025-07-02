        <?php
        include "../config/config.php";
        $query = mysqli_query($conn, "SELECT id, 
        (SELECT count(id) FROM tb_mahasiswa WHERE status='Aktif')AS Aktif,
        (SELECT count(id) FROM tb_dosen WHERE status='Aktif')AS DosenAktif,
        (SELECT count(id) FROM tb_mk)AS jmlh_mk,
        -- (SELECT count(id) FROM tb_mahasiswa WHERE status='Non Aktif')AS Non Aktif,
        (SELECT count(id) FROM tb_mahasiswa WHERE status='Lulus')AS Lulus FROM tb_mahasiswa");
        $view = mysqli_fetch_array($query); ?>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?= $view['Aktif']; ?></h3>

                    <p>Mahasiswa/i Aktif</p>
                </div>
                <div class="icon">
                    <i class="ion ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?= $view['DosenAktif']; ?></h3>

                    <p>Jumlah Dosen</p>
                </div>
                <div class="icon">
                    <i class="ion ion ion-person-add"></i>
                    <!-- ion-stats-bars -->
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?= $view['jmlh_mk']; ?></h3>

                    <p>Jumlah Matkul</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-compose"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?= $view['Lulus']; ?><sup style="font-size: 20px"></sup></h3>

                    <p>Mahasiswa/i Lulus</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->