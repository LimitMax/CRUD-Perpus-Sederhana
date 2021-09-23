<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<div class="container text-center"><h3>Data Anggota Perpustakaan</h3></div>
<div class="container">

    <a href="index.php?p=anggota-input" class="btn btn-outline-primary">Tambah Angota</a>
	<a target="_blank" href="pages/cetak.php"><img src="print.png" height="50px" height="50px"></a>
	<FORM CLASS="form-inline" METHOD="POST">
	<div align="right"><form method=post><input type="text" name="pencarian"><input type="submit" name="search" value="search" class="tombol"></form>
	</FORM>
	</p>
	<table class="table">
        <thead class="table-dark">
            <th style="text-align: center;">No</td>
			<th style="text-align: center;">ID Anggota</th>
			<th style="text-align: center;">Nama</th>
			<th style="text-align: center;">Foto</th>
			<th style="text-align: center;">Jenis Kelamin</th>
			<th style="text-align: center;">Alamat</th>
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
				$sql = "SELECT * FROM tbanggota WHERE nama LIKE '%$pencarian%'
						OR idanggota LIKE '%$pencarian%'
						OR jeniskelamin LIKE '%$pencarian%'
						OR alamat LIKE '%$pencarian%'";

				$query = $sql;
				$queryJml = $sql;

			}
			else {
				$query = "SELECT * FROM tbanggota LIMIT $posisi, $batas";
				$queryJml = "SELECT * FROM tbanggota";
				$no = $posisi * 1;
			}
		}
		else {
			$query = "SELECT * FROM tbanggota LIMIT $posisi, $batas";
			$queryJml = "SELECT * FROM tbanggota";
			$no = $posisi * 1;
		}

		//$sql="SELECT * FROM tbanggota ORDER BY idanggota DESC";
		$q_tampil_anggota = mysqli_query($db, $query);
		if(mysqli_num_rows($q_tampil_anggota)>0)
		{
		while($r_tampil_anggota=mysqli_fetch_array($q_tampil_anggota)){
			if(empty($r_tampil_anggota['foto'])or($r_tampil_anggota['foto']=='-'))
				$foto = "admin-no-photo.jpg";
			else
				$foto = $r_tampil_anggota['foto'];
		?>
		<tr>
			<td style="text-align: center;"><?php echo $nomor; ?></td>
			<td style="text-align: center;"><?php echo $r_tampil_anggota['idanggota']; ?></td>
			<td style="text-align: center;"><?php echo $r_tampil_anggota['nama']; ?></td>
			<td style="text-align: center;"><img src="images/<?php echo $foto; ?>" width=70px height=70px></td>
			<td style="text-align: center;"><?php echo $r_tampil_anggota['jeniskelamin']; ?></td>
			<td style="text-align: center;"><?php echo $r_tampil_anggota['alamat']; ?></td>
			<td style="text-align: center;">
				<a target="_blank" href="pages/cetak_kartu.php?id=<?php echo $r_tampil_anggota['idanggota'];?>" class="btn btn-warning">Cetak Kartu</a>
				<a href="index.php?p=anggota-edit&id=<?php echo $r_tampil_anggota['idanggota'];?>" class="btn btn-primary">Edit</a>
				<a href="proses/anggota-hapus.php?id=<?php echo $r_tampil_anggota['idanggota']; ?>" onclick = "return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="btn btn-danger">Hapus</a>
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
						echo "<li class='page-item'><a href=\"?p=anggota&hal=$i\" class='page-link'>$i</a>";
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