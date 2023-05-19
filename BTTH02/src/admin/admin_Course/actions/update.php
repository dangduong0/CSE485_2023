<?php
require '../../../../config/database.php';
require '../../../../includes/function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $description = $_POST['description'];
    $ma_khoahoc = $_POST['ma_khoahoc'];
    $sql = "UPDATE courses SET ma_khoahoc=:ma_khoahoc,name=:name,description=:description WHERE id=:id";
    $updatestd= pdo($pdo,$sql,['ma_khoahoc'=>$ma_khoahoc,'name'=>$name,'description'=>$description,'id'=>$id]);

}
header("Location: ../index.php");

?>