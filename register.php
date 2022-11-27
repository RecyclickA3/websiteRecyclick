<?php
require ('query.php');

$obj=new crud;
if ( $_SERVER['REQUEST_METHOD'] == 'POST'):
    $email = $_POST['txt_User'];
    $pass = $_POST['txt_Pass'];
    $name = $_POST['txt_nama'];
    if($obj->insertData($email,$pass,$name)):
        echo 'div class ="alert alert-succes">Data berhasil disimpan</div>';
        header('Location: login2.php');
    
    else:
        echo '<div class="alert alert-danger">Data gagal disimpan</div>';
    endif;
endif;
?>
