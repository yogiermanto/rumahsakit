<?php

include_once('../_header.php');

?>

<div class="box">
    <h1>Dokter</h1>
    <h4>
        <small>Edit Data Dokter</small>
        <!-- Membuat button Kembali -->
        <div class="pull-right">
            <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
    </h4>
        <!-- Membuat Form -->
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
              <?php
              // id didapat dari file data.php di line 58
              $id = @$_GET['id'];
              $sql_dokter = mysqli_query($con, "SELECT * FROM tb_dokter WHERE id_dokter = '$id'") OR DIE (mysqli_error($con));
              $data = mysqli_fetch_array($sql_dokter);
              ?>
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="nama">Nama Dokter</label> 
                        <input type="hidden" name="id" value="<?=$data['id_dokter']?>"> 
                        <input type="text" name="nama" class="form-control"  value="<?=$data['nama_dokter']?>" required autofocus>
                    </div>
                    <div class="form-group">
                    <label for="spesialis">Spesialis</label>  
                        <textarea type="text" name="spesialis" id="spesialis" class="form-control" required><?=$data['spesialis']?></textarea>
                    </div>
                    <div class="form-group">
                    <label for="alamat">Alamat</label>  
                        <textarea type="text" name="alamat" id="alamat" class="form-control" required><?=$data['alamat']?></textarea>
                      </div>
                    <div class="form-group">
                    <label for="tep">No. Telepon</label>  
                        <input type="number" name="telp" id="telp" class="form-control" value="<?=$data['no_telp']?>" required>
                    </div>
                    <div class="form-group pull-right">
                    <!-- input typenya submit karena button nya cuman 1 edit dan tambah data -->
                    <input type="submit" name="edit" value="simpan" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </h4>
    </h4>
</div>
<?php include_once('../_footer.php'); ?>