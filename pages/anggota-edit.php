<?php
	$id_anggota=$_GET['id'];
	$q_tampil_anggota=mysqli_query($db,"SELECT * FROM tbanggota WHERE idanggota='$id_anggota'");
	$r_tampil_anggota=mysqli_fetch_array($q_tampil_anggota);
	if(empty($r_tampil_anggota['foto'])or($r_tampil_anggota['foto']=='-'))
				$foto = "admin-no-photo.jpg";
			else
				$foto = $r_tampil_anggota['foto'];
?>
<div class="container"><h3>Edit Data Anggota</h3></div>
<div class="container">
	<form action="proses/anggota-edit-proses.php" method="post" enctype="multipart/form-data">
	<table id="tabel-input">
        <div class="mb-3">
            <label for="formFileSm" class="form-label">FOTO</label>
            <img src="images/<?php echo $foto; ?>" width=70px height=75px>
            <input class="form-control form-control-sm" name="foto" id="formFileSm" type="file">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">ID Anggota</label>
            <input type="text" class="form-control" name="id_anggota" value="<?php echo $r_tampil_anggota['idanggota']; ?>" readonly="readonly" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" value="<?php echo $r_tampil_anggota['nama']; ?>"  id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">ID Anggota</label>
            <input type="text" class="form-control" name="id_anggota" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"><?php echo $r_tampil_anggota['alamat']; ?></textarea>
        </div>
		<dic class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
			<?php
			if($r_tampil_anggota['jeniskelamin']=="Pria")
			{
				echo "<div class='form-check'>
                <input class='form-check-input' type='radio' name='jenis_kelamin' id='Pria' value='Pria' checked>
                <label class='form-check-label' for='Pria'>
                    Pria
                </label>
            </div>
            <div class='form-check'>
                <input class='form-check-input' type='radio' name='jenis_kelamin' id='Wanita' value='Wanita'>
                <label class='form-check-label' for='Wanita'>
                    Wanita
                </label>
            </div>";
			}
			elseif($r_tampil_anggota['jeniskelamin']=="Wanita")
			{
				echo "<div class='form-check'>
                <input class='form-check-input' type='radio' name='jenis_kelamin' id='Pria' value='Pria'>
                <label class='form-check-label' for='Pria'>
                    Pria
                </label>
            </div>
            <div class='form-check'>
                <input class='form-check-input' type='radio' name='jenis_kelamin' id='Wanita' value='Wanita' checked>
                <label class='form-check-label' for='Wanita'>
                    Wanita
                </label>
            </div>";
			}
			?>
        <div class="mb-2 p-2">
            <button type="submit" name="simpan" class="btn btn-outline-success">Simpan</button>
        </div>
	</table>
	</form>
</div>