<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Data Pinjaman Buku</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                            <label for="ket" class="col-sm-3 control-label">ID Transaksi</label>
                            <div class="col-sm-9">
                                <input type="text" name="transaksi" class="form-control" id="inputEmail3" placeholder="Keterangan">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="peminjam" class="col-sm-3 control-label">Nama Anggota</label>
                            <div class="col-sm-9">
                                <?php
                                include '../koneksi.php';
                                $query = $db->query("SELECT * FROM tbanggota");?>
                                <select name="id_anggota">
                                    <?php while($res = $query->fetch_assoc()): ?>
                                    <option value="<?php echo $res['idanggota'] ?>"><?php echo $res['nama'] ?></option>
                                <?php endwhile; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="judulbuku" class="col-sm-3 control-label">ID Buku</label>
                            <div class="col-sm-9">
                                <?php $query2 = $db->query("SELECT * FROM tbbuku") ?>
                                <select name="id_buku">
                                    <?php while($res2 = $query2->fetch_assoc()): ?>
                                        <option value="<?php echo $res2['idbuku'] ?>"><?php echo $res2['idbuku'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>

						<div class="form-group">
                            <label for="tglPinjam" class="col-sm-3 control-label">Tanggal Pinjam</label>
                            <div class="col-sm-3">
                                <input type="date" name="tglPinjam" class="form-control" id="inputEmail3" placeholder="Tanggal Pinjam">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" name="simpan" class="btn btn-outline-success" value="upload">Simpan</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=buku&actions=depan" class="btn btn-danger btn-sm">
                        Kembali Ke Data Buku
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
include '../koneksi.php';
if($_POST['simpan']){
    //Ambil data dari form
    $transaksi = $_POST['transaksi'];
    $judulbuku=$_POST['id_buku'];
	$peminjam=$_POST['id_anggota'];
	$tglPinjam=$_POST['tglPinjam'];
    //buat sql
    $sql="INSERT INTO tbbuku
    VALUES('$transaksi','$judulbuku','$peminjam','$tglPinjam')";
    $query = mysqli_query($db, $sql) or die ("SQL Simpan Peminjaman Error");
	$sqlBuku="UPDATE tbbuku SET status='Dipinjam' WHERE idbuku='$judulbuku'";
	$queryBuku=  mysqli_query($db, $sqlBuku) or die ("SQL Simpan Data Buku Error");
    if ($query){
        echo "<script>window.location.assign('input-pinjam.php');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
    }

?>