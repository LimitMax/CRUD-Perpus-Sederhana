<?php

require_once "../koneksi.php";

$id_pinjam = $_POST['id_pijam'];
$id_anggota = $_POST['id_anggota'];
$nama = $_POST['nama'];
$buku =$_POST['kode_buku'];
$keterangan_buku = $_POST['keterangan_buku'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = Date('2018-03-14');// bisa di ganti untuk mengecek telat pengembalian, format tahun-bulan-tanggal.

$cari_hari = abs(strtotime($tgl_pinjam) - strtotime($tgl_kembali));
$hitung_hari = floor($cari_hari/(60*60*24));
?>
<center>
    <h2>Hasil Pengolahan Data Pengembalian</h2>
<form action="store.php" method="post">
    <input type="hidden" name="id_pinjam_kembali" readonly value="<?php echo $id_pinjam_kembali ?>">
    <table>
        <tr>
            <td>Nama</td>
            <td>
                <input type="hidden" name="id_anggota" readonly value="<?php echo $id_anggota ?>">
                <input type="text" name="nama" readonly value="<?php echo $nama ?>">
            </td>
        </tr>
        <tr>
            <td>Kode Buku</td>
            <td><input type="text" name="kode_buku" readonly value="<?php echo $buku ?>"></td>
        </tr>
        <tr>
            <td>Tanggal Pinjam</td>
            <td><input type="text" name="tgl_pinjam" readonly value="<?php echo $tgl_pinjam ?>"></td>
        </tr>
        <tr>
            <td>Tanggal Kembali</td>
            <td><input type="text" name="tgl_kembali" readonly value="<?php echo $tgl_kembali ?>"></td>
        </tr>
        <tr>
            <td>Keterangan Buku</td>
            <td><input type="text" name="keterangan_buku" readonly value="<?php echo $keterangan_buku ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Simpan Data"></td>
        </tr>
    </table>
</form>
</center>