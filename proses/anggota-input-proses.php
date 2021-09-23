<?php
include'../koneksi.php';
$id_anggota=$_POST['id_anggota'];
$nama=$_POST['nama'];
$jeniskelamin=$_POST['jeniskelamin'];
$alamat=$_POST['alamat'];
$status = "Tidak Meminjam";



if(isset($_POST['simpan'])){
		extract($_POST);
		$nama_file   = $_FILES['foto']['name'];
		if(!empty($nama_file)){
		// Baca lokasi file sementar dan nama file dari form (fupload)
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
		$file_foto = $id_anggota.".".$tipe_file;

		// Tentukan folder untuk menyimpan file
		$folder = "../images/$file_foto";
		// Apabila file berhasil di upload
		move_uploaded_file($lokasi_file,"$folder");
		}
		else
			$file_foto="-";

       $sql = $db -> query("INSERT INTO tbanggota (idanggota,nama,jeniskelamin,alamat,status)
       VALUES ('$id_anggota', '$nama', '$jeniskelamin', '$alamat', '$status')");

       if($sql) {
        header("location:../index.php?p=anggota");
       }

        }
?>