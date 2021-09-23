<?php

require_once "../koneksi.php";

$id = $_GET['id'];

$query = $db->query("SELECT * FROM pinjam_kembali INNER JOIN anggota on(pinjam_kembali.id_anggota = anggota.id_anggota) WHERE id_pinjam_kembali = '$id'");
$res = $query->fetch_assoc();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>:Proses Pengembalian</title>
    </head>
    <body>
        <center>
            <h2>Manajemen Proses Pengembalian</h2>
            <form action="proses_pengembalian.php" method="post">
                <input type="hidden" name="id_pijam_kembali" value="<?php echo $id ?>">
                <input type="hidden" name="tgl_pinjam" value="<?php echo $res['tgl_pinjam'] ?>">
                <input type="hidden" name="id_anggota" value="<?php echo $res['id_anggota'] ?>">
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td> <input type="text" name="nama" readonly value="<?php echo $res['nama'] ?>"> </td>
                    </tr>
                    <tr>
                        <td>Kode Buku</td>
                        <td>:</td>
                        <td> <input type="text" name="kode_buku" readonly value="<?php echo $res['id_buku'] ?>"> </td>
                    </tr>
                    <tr>
                        <td>Keterangan  Buku</td>
                        <td>:</td>
                        <td>
                            <select name="keterangan_buku">
                                <option value="Tersedia">Tersedia</option>
                                <option value="Dipinjam">Dipinjam</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <input type="submit" name="" value="Proses">
                            <input type="reset" name="" value="Reset">
                        </td>
                    </tr>
                </table>
            </form>
        </center>
    </body>
</html>