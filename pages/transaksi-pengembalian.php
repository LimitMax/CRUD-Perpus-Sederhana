<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<div class="container text-center"><h3>Data Pengembalian Buku</h3></div>
<div class="container">
	<FORM CLASS="form-inline" METHOD="POST">
	<div align="right"><form method=post><input type="text" name="pencarian"><input type="submit" name="search" value="search" class="tombol"></form>
	</FORM>
	</p>
    <table class="table">
        <thead class="table-dark">
            <th style="text-align: center;">No</td>
			<th style="text-align: center;">ID Transaksi</th>
			<th style="text-align: center;">ID Anggota</th>
            <th style="text-align: center;">ID Buku</th>
			<th style="text-align: center;">Tanggal Kembali</th>
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
				$sql = "SELECT * FROM tbtransaksi WHERE idtransaksi LIKE '%$pencarian%'
						OR idbuku LIKE '%$pencarian%'
						OR idanggota LIKE '%$pencarian%'
                        OR tglpinjam LIKE '%$pencarian%'
                        OR tglkembali LIKE '%$pencarian%'";

				$query = $sql;
				$queryJml = $sql;

			}
			else {
				$query = "SELECT * FROM tbtransaksi LIMIT $posisi, $batas";
				$queryJml = "SELECT * FROM tbtransaksi";
				$no = $posisi * 1;
			}
		}
		else {
			$query = "SELECT * FROM tbtransaksi LIMIT $posisi, $batas";
			$queryJml = "SELECT * FROM tbtransaksi";
			$no = $posisi * 1;
		}

		//$sql="SELECT * FROM tbbuku ORDER BY idbuku DESC";
		$q_tampil_transaksi = mysqli_query($db, $query);
		if(mysqli_num_rows($q_tampil_transaksi)>0)
		{
            while($r_tampil_transaksi=mysqli_fetch_array($q_tampil_transaksi)){
            ?>
		<tr>
			<td style="text-align: center;"><?php echo $nomor; ?></td>
			<td style="text-align: center;"><?php echo $r_tampil_transaksi['idtransaksi']; ?></td>
			<td style="text-align: center;"><?php echo $r_tampil_transaksi['idanggota']; ?></td>
			<td style="text-align: center;"><?php echo $r_tampil_transaksi['idbuku']; ?></td>
            <td style="text-align: center;"><?php echo $r_tampil_transaksi['tglkembali']; ?></td>
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