<?php

include_once('../_header.php');

?>

<div class="box">
    <h1>Obat</h1>
    <h4>
        <small>Edit Data Obat</small>
        <!-- Membuat button Kembali -->
        <div class="pull-right">
            <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
    <h4>
        <!-- Membuat Form -->
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <?php 
                // mengambil variabel GET id
                $id = @$_GET['id'];
                //query untuk menselect data berdasarkan id
                $sql_obat = mysqli_query($con, "SELECT * FROM tb_obat WHERE id_obat = '$id'");
                //lalu kita fetch/keluarkan datanya
                $data = mysqli_fetch_array($sql_obat);
                ?>
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="nama">Nama Obat</label>
                        <input type="hidden" name="id" value="<?=$data['id_obat'];?>">  
                        <input type="text" name="nama" value="<?=$data['nama_obat'];?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                    <label for="nama">Keterangan</label>  
                        <textarea name="ket" id="key" class="form-control" required><?=$data['ket_obat'];?></textarea>
                    </div>
                    <div class="form-group pull-right">
                    <!-- input type submit karena button nya cuman 1 edit dan tambah data -->
                    <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </h4>
    </h4>
</div>

<?php include_once('../_footer.php'); ?>