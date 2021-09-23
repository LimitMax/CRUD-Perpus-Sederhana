<div class="container">
    <h3>Input Data Buku</h3>
</div>
<div class="container">
    <form action="proses/buku-input-proses.php" method="post" enctype="multipart/form-data">

        <table id="tabel-input">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">ID Buku</label>
                <input type="text" class="form-control" name="id_buku" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" name="judul" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Kategori</label>
                <input type="text" class="form-control" name="kategori" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Pengarang</label>
                <input type="text" class="form-control" name="pengarang" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Penerbit</label>
                <input type="text" class="form-control" name="penerbit" id="exampleFormControlInput1">
            </div>
            <div>
                <label for="exampleFormControlInput1" class="form-label">Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="Dipinjam" value="Dipinjam">
                    <label class="form-check-label" for="Dipinjam">
                        Dipinjam
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="Tersedia" value="Tersedia">
                    <label class="form-check-label" for="Tersedia">
                        Tersedia
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" name="simpan" class="btn btn-outline-success" value="upload">Simpan</button>
            </div>
        </table>
    </form>
</div>