<?php
include'../koneksi.php';
$id_buku=$_POST['id_buku'];
$judul=$_POST['judul'];
$kategori=$_POST['kategori'];
$pengarang=$_POST['pengarang'];
$penerbit=$_POST['penerbit'];
$status=$_POST['status'];

if(isset($_POST['simpan'])){
    extract($_POST);
        $gambar = file($_POST['gambar']);

        $direktori = "gambar/";

        $tmp_name = $_FILES["gambar"]["tmp_name"];
        $name = pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION);
        $nama_baru = $_POST['nama_masakan'].".".$name;
        move_uploaded_file($tmp_name, $direktori."/".$nama_baru);
        $gambar = $nama_baru;

	$sql =
	"INSERT INTO tbbuku
		VALUES('$id_buku','$judul','$kategori','$pengarang','$penerbit','$status', '$gambar')";
	$query = mysqli_query($db, $sql);

	header("location:../index.php?p=buku");
}
?>