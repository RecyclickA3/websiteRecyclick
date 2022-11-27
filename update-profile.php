
<?php
session_start();
include "koneksi.php";

if(isset($_POST['simpan'])){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $nama = $_POST['nama'];
    $notel = $_POST['notelepon'];
    $query = "UPDATE pembeli SET Username_pbl = '$username', password_pbl = '$pass', nama_pbl = '$nama', noTelp_pbl = '$notel' WHERE Username_pbl = '$id'";
    $result = mysqli_query($koneksi, $query);
    header('Location: index.html');
}
?>
				