<?php
session_start();
if(isset($_SESSION['id_petugas']))
{
    echo "Berhasil login";
}
else {
    echo "Gagal";
}
include '../koneksi.php';

 $kon = $koneksi;

 if(isset($_POST['btnlogin']))
 {
 $username=$_POST['username'];
 $password=$_POST['password'];

 $sql="SELECT id_petugas,nama_petugas FROM nama_petugas
       WHERE username='$username' AND 
       password='$password'";
       $res=mysqli_query($kon,$sql);

       $count=mysqli_affected_rows($kon);

 if($count == 1)
 {
    $data_login = mysqli_fetch_assoc($res);

     $_SESSION['id_petugas'] = $data_login['id_petugas'];
    //nilainya digunakan waktu insert peminjaman

     $_SESSION['nama_petugas'] = $data_login['nama'];
     //nilainya bisa digunakan di navbar,mis. 'Hai,[nama_petugas]'

     header("Location: http://localhost/siperpus/login/index.php");
     
 }
 else
 {
     header("Location: http://localhost/siperpus/index.php");
     
  }
}
?>