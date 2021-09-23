<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<div class="container text-center">
    <h3>Data Buku Buku Perpustakaan</h3>
</div>
<div class="container">
    <a href="index.php?p=buku-input" class="btn btn-outline-primary">Tambah Buku</a>
    <FORM CLASS="form-inline" METHOD="POST">
        <div align="right">
            <form method=post><input type="text" name="pencarian"><input type="submit" name="search" value="search"
                    class="tombol"></form>
    </FORM>
    </p>
    <table class="table">
        <thead class="table-dark">
            <th style="text-align: center;">No</td>
            <th style="text-align: center;">ID Buku</th>
            <th style="text-align: center;">Judul Buku</th>
            <th style="text-align: center;">Kategori</th>
            <th style="text-align: center;">Pengarang</th>
            <th style="text-align: center;">Penerbit</th>
            <th style="text-align: center;">Status</th>
            <th style="text-align: center;">Opsi</th>
        </thead>

        <?php
		$batas = 5;
		extract($_GET);
		if(empty($hal)){
			$posisi = 0;
			$hal = 1;
			$nomor = 1;
		}
		else {
			$posisi = ($hal - 1) * $batas;
			$nomor = $posisi+1;
		}
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
			if($pencarian != ""){
				$sql = "SELECT * FROM tbbuku WHERE judulbuku LIKE '%$pencarian%'
						OR idbuku LIKE '%$pencarian%'
						OR kategori LIKE '%$pencarian%'
                        OR pengarang LIKE '%$pencarian%'
                        OR penerbit LIKE '%$pencarian%'
                        OR status LIKE '%$pencarian%'";

				$query = $sql;
				$queryJml = $sql;

			}
			else {
				$query = "SELECT * FROM tbbuku LIMIT $posisi, $batas";
				$queryJml = "SELECT * FROM tbbuku";
				$no = $posisi * 1;
			}
		}
		else {
			$query = "SELECT * FROM tbbuku LIMIT $posisi, $batas";
			$queryJml = "SELECT * FROM tbbuku";
			$no = $posisi * 1;
		}

		//$sql="SELECT * FROM tbbuku ORDER BY idbuku DESC";
		$q_tampil_buku = mysqli_query($db, $query);
		if(mysqli_num_rows($q_tampil_buku)>0)
		{
            while($r_tampil_buku=mysqli_fetch_array($q_tampil_buku)){
            ?>
        <tr>
            <td style="text-align: center;"><?php echo $nomor; ?></td>
            <td style="text-align: center;"><?php echo $r_tampil_buku['idbuku']; ?></td>
            <td style="text-align: center;"><?php echo $r_tampil_buku['judulbuku']; ?></td>
            <td style="text-align: center;"><?php echo $r_tampil_buku['kategori']; ?></td>
            <td style="text-align: center;"><?php echo $r_tampil_buku['pengarang']; ?></td>
            <td style="text-align: center;"><?php echo $r_tampil_buku['penerbit']; ?></td>
            <td style="text-align: center;"><?php echo $r_tampil_buku['status']; ?></td>
            <td style="text-align: center;">
                <a href="index.php?p=buku-edit&id=<?php echo $r_tampil_buku['idbuku'];?>"
                    class="btn btn-primary">Edit</a>
                <a href="proses/buku-hapus.php?id=<?php echo $r_tampil_buku['idbuku']; ?>"
                    onclick="return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')"
                    class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        <?php $nomor++; }
        }
		else {
			echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
		}?>
    </table>
    <?php
	if(isset($_POST['pencarian'])){
	if($_POST['pencarian']!=''){
		echo "<div style=\"float:left;\">";
		$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
		echo "Data Hasil Pencarian: <b>$jml</b>";
		echo "</div>";
	}
	}
	else{ ?>
    <div style="float: left;">
        <?php
			$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
			echo "Jumlah Data : <b>$jml</b>";
		?>
    </div>
    <div class="pagination" style="float: right;">
        <?php
				$jml_hal = ceil($jml/$batas);
				for($i=1; $i<=$jml_hal; $i++){
					if($i != $hal){
						echo "<li class='page-item'><a href=\"?p=buku&hal=$i\" class='page-link'>$i</a>";
					}
					else {
						echo "<li class='page-item active' aria-current='page'>
                        <a class='page-link'>$i</a>
                        </li>";
					}
				}
				?>
    </div>
    <?php
	}
	?>
</div>