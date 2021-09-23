<?php
	$id_buku=$_GET['id'];
	$q_tampil_buku=mysqli_query($db,"SELECT * FROM tbbuku WHERE idbuku='$id_buku'");
	$r_tampil_buku=mysqli_fetch_array($q_tampil_buku);
?>
<div class="container">
    <h3>Edit Data Buku</h3>
</div>
<div class="container">
    <form action="proses/buku-edit-proses.php" method="post" enctype="multipart/form-data">
        <table id="tabel-input">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">ID Buku</label>
                <input type="text" class="form-control" name="id_buku" value="<?php echo $r_tampil_buku['idbuku']; ?>"
                    readonly="readonly" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" name="judul" value="<?php echo $r_tampil_buku['judulbuku']; ?>"
                    id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Kategori</label>
                <input type="text" class="form-control" name="kategori"
                    value="<?php echo $r_tampil_buku['kategori']; ?>" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Pengarang</label>
                <input type="text" class="form-control" name="pengarang"
                    value="<?php echo $r_tampil_buku['pengarang']; ?>" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Penerbit</label>
                <input type="text" class="form-control" name="penerbit"
                    value="<?php echo $r_tampil_buku['penerbit']; ?>" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Status</label>
                <?php
            if($r_tampil_buku['status']=="Dipinjam")
			{
				echo "<div class='form-check'>
                <input class='form-check-input' type='radio' name='status' id='Dipinjam' value='Dipinjam' checked>
                <label class='form-check-label' for='Dipinjam'>
                    Dipinjam
                </label>
            </div>
            <div class='form-check'>
                <input class='form-check-input' type='radio' name='status' id='Tersedia' value='Tersedia'>
                <label class='form-check-label' for='Tersedia'>
                    Tersedia
                </label>
            </div>";
			}
			elseif($r_tampil_buku['status']=="Tersedia")
			{
				echo "<div class='form-check'>
                <input class='form-check-input' type='radio' name='status' id='Dipinjam' value='Dipinjam'>
                <label class='form-check-label' for='Dipinjam'>
                    Dipinjam
                </label>
            </div>
            <div class='form-check'>
                <input class='form-check-input' type='radio' name='status' id='Tersedia' value='Tersedia' checked>
                <label class='form-check-label' for='Tersedia'>
                    Tersedia
                </label>
            </div>";
			}
			?>
            </div>
            <div class="mb-2 p-2">
                <button type="submit" name="simpan" class="btn btn-outline-success">Simpan</button>
            </div>
        </table>
    </form>
</div>