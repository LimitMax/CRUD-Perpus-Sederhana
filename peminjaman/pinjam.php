<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>:Peminjaman</title>
    </head>
    <body>
        <center>
            <h2>Manajemen Peminjaman</h2>
            <form action="proses_peminjaman.php" method="post">
                <table>
                    <tr>
                        <td>ID Anggota</td>
                        <td>:</td>
                        <td>
                            <?php
                            require_once "../koneksi.php";
                            $query = $db->query("SELECT * FROM tbanggota");?>
                            <select name="id_anggota">
                                <?php while($res = $query->fetch_assoc()): ?>
                                <option value="<?php echo $res['idanggota'] ?>"><?php echo $res['nama'] ?></option>
                            <?php endwhile; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Kode Buku</td>
                        <td>:</td>
                        <td>
                            <?php $query2 = $db->query("SELECT * FROM tbbuku") ?>
                            <select name="id_buku">
                                <?php while($res2 = $query2->fetch_assoc()): ?>
                                    <option value="<?php echo $res2['idbuku'] ?>"><?php echo $res2['idbuku'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <input type="submit" value="Simpan Peminjam">
                            <input type="reset" value="Reset">
                        </td>
                    </tr>
                </table>
            </form>
        </center>
    </body>
</html>