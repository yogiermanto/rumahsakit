<?php
//membuat variabel chk yang didapat dari nilai : name = checked[] di file data.php line 47
$chk = $_POST['checked'];
//mencheck apakah tidak ada varabel checked
if (!isset($chk)) {
    echo "<script>alert('Tidak ada data yang dipilih!'); location='data.php';</script>";
} else {
    include_once('../_header.php'); ?>
    <div class="box">
    <h1>Poliknik</h1>
    <h4>
        <small>Edit Data Poliknik</small>
        <div class="pull-right">
        <!-- membuat button kembali -->
            <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
    </h4>
    <!-- Menambah inputan data  -->
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
        <form action="proses.php" method="post">
            <!-- input hidden untuk menampung banyak data dari variabel count_add -->
            <input type="hidden" name="total" value="<?=@$_POST['count_add']?>">
            <!-- buat table -->
            <table class="table">
            <tr>
                <th>#</th>
                <th>Nama Poliklinik</th>
                <th>Gedung</th>
            </tr>
            <!-- setelah membuat th, lalu kita looping -->
            <?php
            $no = 1;
            // mengeluarkan data sesuai variabel checked
            foreach ($_POST['checked'] as $id) {
                $sql_poli = mysqli_query($con, "SELECT * FROM tb_poliklinik where id_poli = '$id'") or die (mysqli_error($con));
                while($data = mysqli_fetch_array($sql_poli)) { ?>
                <tr>
                    <td><?=$no++?></td>
                    <td>
                        <input type="hidden" name="id[]" value="<?=$data['id_poli'];?>">
                        <input type="text" name="nama[]" value="<?=$data['nama_poli'];?>" class="form-control" required>
                    </td>
                    <td>
                        <input type="text" name="gedung[]" value="<?=$data['gedung'];?>" class="form-control" required>
                    </td>
                </tr>    
                <?php
                }
            }
            ?>
            </table>
            <!-- Membuat button -->
            <div class="form-group pull-right">
            <input type="submit" name="edit" value="Update" class="btn btn-success">
            </div>
        </form>
        </div>
    </div>
    <?php include_once('../_footer.php'); 
    
} ?>