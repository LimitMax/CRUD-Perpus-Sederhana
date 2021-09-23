<?php
include "../koneksi.php";

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<h3>Data Anggota</h3></div>
<div id="content">
    <table class="table">
        <thead class="table-dark">
            <th id="label-tampil-no">No</th>
            <th>ID Anggota</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
        </thead>

		<?php
		$nomor=1;
		$query="SELECT * FROM tbanggota ORDER BY idanggota DESC";
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
			<td><?php echo $nomor; ?></td>
			<td><?php echo $r_tampil_anggota['idanggota']; ?></td>
			<td><?php echo $r_tampil_anggota['nama']; ?></td>
			<td><img src="../images/<?php echo $foto; ?>" width=70px height=70px></td>
			<td><?php echo $r_tampil_anggota['jeniskelamin']; ?></td>
			<td><?php echo $r_tampil_anggota['alamat']; ?></td>
		</tr>
		<?php $nomor++; }
		}?>
	</table>
	<script>
		window.print();
	</script>
</div>
