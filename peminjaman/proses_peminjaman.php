<?php

require_once "../koneksi.php";

$anggota = $_POST['id_anggota'];
$buku = $_POST['id_buku'];
$tgl_pinjam = Date('Y-m-d');
$tgl_kembali = '';
$keterangan_buku = '';
$status_buku = 'Pinjam';

$query = $db->query("INSERT INTO tbtransaksi VALUES(null, '$anggota', '$buku', '$tgl_pinjam', '$tgl_kembali', '$keterangan_buku', '$status_buku')");

echo "<script>
                alert('Peminjam Berhasil di Tambah...')
                window.location='pinjam.php';
            </script>";
?>