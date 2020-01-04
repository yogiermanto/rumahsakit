<?php

include_once('../_header.php');

?>

<div class="box">
    <h1>Obat</h1>
    <h4>
        <small>Tambah Data Obat</small>
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
                        <label for="nama">Nama Obat</label>  
                        <input type="text" name="nama" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                    <label for="nama">Keterangan</label>  
                        <textarea name="ket" id="key" class="form-control" required></textarea>
                    </div>
                    <div class="form-group pull-right">
                    <!-- input type submit karena button nya cuman 1 edit dan tambah data -->
                    <input type="submit" name="add" value="simpan" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </h4>
    </h4>
</div>

<?php include_once('../_footer.php'); ?>