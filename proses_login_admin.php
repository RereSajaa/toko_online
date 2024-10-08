<?php 
    if($_POST){
        $username=$_POST['username'];
        $password=$_POST['password'];
        if(empty($username)){
            echo "<script>alert('Username tidak valid!');location.href='login_admin.php';</script>";
        } elseif(empty($password)){
            echo "<script>alert('Password tidak boleh kosong');location.href='login_admin.php';</script>";
        } else {
            include "koneksi.php";
            $qry_login_admin=mysqli_query($conn,"select * from petugas where username = '".$username."' and password = '".md5($password)."'");
            if(mysqli_num_rows($qry_login_admin)>0){
                $dt_login_admin=mysqli_fetch_array($qry_login_admin);
                session_start();
                $_SESSION['username']=$dt_login_admin['username'];
                $_SESSION['nama_petugas']=$dt_login_admin['nama_petugas'];
                $_SESSION['status_login_admin']=true;
                header("location: home_admin.php");
            } else {
                echo "<script>alert('Username dan Password tidak benar');location.href='login_admin.php';</script>";
            }
        }
    }
?>