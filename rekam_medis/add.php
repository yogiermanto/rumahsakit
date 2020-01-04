<?php

include_once('../_header.php');

?>

<div class="box">
    <h1>Rekam Medis</h1>
    <h4>
        <small>Tambah Data Rekam Medis</small>
        <!-- Membuat button Kembali -->
        <div class="pull-right">
            <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
    </h4>
        <!-- Membuat Form -->
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="pasien">Pasien</label>  
                        <!-- Ditampilkan dari table lain -->
                        <select name="pasien" id="pasien" class="form-control" required>
                          <option value="">- Pilih -</option>
                          <!-- Kita looping datanya diambil dari tb_pasien -->
                          <?php
                            $sql_pasien = mysqli_query($con,"SELECT * FROM tb_pasien" ) OR DIE (mysqli_error($no));
                            while($data_pasien = mysqli_fetch_array($sql_pasien)) {
                              // yang disimpan id nya, yang ditampilkan nama_pasien
                              echo  '<option value="'.$data_pasien['id_pasien'].'">'.$data_pasien['nama_pasien'].'</option>';
                            }
                          ?>
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="keluhan">Keluhan</label>  
                        <textarea type="text" name="keluhan" id="keluhan" class="form-control" required></textarea>
                      </div>
                    <div class="form-group">
                    <div class="form-group">
                        <label for="dokter">Dokter</label>  
                        <!-- Ditampilkan dari table lain -->
                        <select name="dokter" id="dokter" class="form-control" required>
                          <option value="">- Pilih -</option>
                          <!-- Kita looping datanya diambil dari tb_pasien -->
                          <?php
                            $sql_dokter = mysqli_query($con,"SELECT * FROM tb_dokter" ) OR DIE (mysqli_error($no));
                            while($data_dokter = mysqli_fetch_array($sql_dokter)) {
                              echo  '<option value="'.$data_dokter['id_dokter'].'">'.$data_dokter['nama_dokter'].'</option>';
                            }
                          ?>
                        </select>
                    </div>
                    <label for="diagnosa">Diagnosa</label>  
                        <textarea type="text" name="diagnosa" id="diagnosa" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="poli">Poliklinik</label>  
                        <!-- Ditampilkan dari table lain -->
                        <select name="poli" id="poli" class="form-control" required>
                          <option value="">- Pilih -</option>
                          <!-- Kita looping datanya diambil dari tb_pasien -->
                          <?php
                            $sql_poli = mysqli_query($con,"SELECT * FROM tb_poliklinik ORDER by nama_poli ASC" ) OR DIE (mysqli_error($no));
                            while($data_poli = mysqli_fetch_array($sql_poli)) {
                              echo  '<option value="'.$data_poli['id_poli'].'">'.$data_poli['nama_poli'].'</option>';
                            }
                          ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="obat">Obat</label>  
                        <!-- Ditampilkan dari table lain -->
                        <select multiple  name="obat[]" id="obat" class="form-control" size="7" required>
                          <!-- Kita looping datanya diambil dari tb_pasien -->
                          <?php
                            $sql_obat = mysqli_query($con,"SELECT * FROM tb_obat" ) OR DIE (mysqli_error($no));
                            while($data_obat = mysqli_fetch_array($sql_obat)) {
                              echo  '<option value="'.$data_obat['id_obat'].'">'.$data_obat['nama_obat'].'</option>';
                            }
                          ?>
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="tgl">Tanggal Periksa</label>
                        <!-- Untuk membuat default date gunakan value -->
                        <input type="date" name="tgl" id="tgl" class="form-control" value="<?=date('Y-m-d')?>" required></textarea>
                    </div>
                    <div class="form-group pull-right">
                    <!-- input type submit karena button nya cuman 1 edit dan tambah data -->
                    <input type="submit" name="add" value="Simpan" class="btn btn-success">
                    <input type="reset" name="reset" value="Reset" class="btn btn-default">
                  </div>
                </form>
            </div>
        </div>
    </h4>
    </h4>
</div>

<?php include_once('../_footer.php'); ?>