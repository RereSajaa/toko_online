<?php
if ($_POST) {
    $nama_petugas = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    if (empty($nama_petugas)) {
        echo "<script>alert('username petugas tidak boleh kosong');location.href='tambah_admin.php';</script>";
    } elseif (empty($username)) {
        echo "<script>alert('username tidak boleh kosong');location.href='tambah_admin.php';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('password tidak boleh kosong');location.href='tambah_admin.php';</script>";
    } else {
        include "koneksi.php";
        $insert = mysqli_query($conn, "INSERT INTO petugas (nama_petugas , username , password , level) value ('" . $nama_petugas . "','" . $username . "','" . md5($password) . "','" . $level . "')") or die(mysqli_error($conn));
        if ($insert) {
            echo "<script>alert('Sukses menambahkan Pegawai');location.href='tambah_admin.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan Pegawai');location.href='tambah_admin.php.php';</script>";
        }
    }
}

?>