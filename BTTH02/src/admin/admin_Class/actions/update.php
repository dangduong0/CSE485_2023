<?php
require '../../../../config/database.php';
require '../../../../includes/function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id=$_POST['id'];
    $id_khoahoc=$_POST['id_khoahoc'];
    $id_teacher=$_POST['id_giangvien'];
    $class = $_POST['class'];
    $sql = "UPDATE lop_hocphan SET id_khoahoc=:id_khoahoc,id_teacher=:id_teacher,ten_lop=:ten_lop WHERE id=:id";
    $update= pdo($pdo,$sql,['id_khoahoc'=>$id_khoahoc,'id_teacher'=>$id_teacher,'ten_lop'=>$class,'id'=>$id]);

}
header("Location: ../index.php");

?>