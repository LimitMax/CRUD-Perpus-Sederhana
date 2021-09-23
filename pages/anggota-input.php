<div class="container"><h3>Input Data Anggota</h3></div>
<div class="container">
	<form action="proses/anggota-input-proses.php" method="post" enctype="multipart/form-data">

	<table id="tabel-input">
        <div class="mb-3">
            <label for="formFileSm" class="form-label">FOTO</label>
            <input class="form-control form-control-sm" name="file" id="formFileSm" type="file">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">ID Anggota</label>
            <input type="text" class="form-control" name="id_anggota" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="exampleFormControlInput1">
        </div>
        <div>
            <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jeniskelamin" id="Pria" value="Pria">
                <label class="form-check-label" for="Pria">
                    Pria
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="jeniskelamin" id="Wanita" value="Wanita">
                <label class="form-check-label" for="Wanita">
                    Wanita
                </label>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <button type="submit" name="simpan" class="btn btn-outline-success" value="upload">Simpan</button>
        </div>
	</table>
	</form>
</div>