<?php
include '../../../../config/database.php';
include '../../../../includes/function.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_khoahoc = $_POST['id_khoahoc'];
    $class = $_POST['class'];
    $id_giangvien = $_POST['id_giangvien'];
    $sql = "INSERT INTO lop_hocphan (id_khoahoc,id_teacher,ten_lop) VALUES (:id_khoahoc,:id_teacher,:ten_lop)";
    $new_course = pdo($pdo,$sql,['id_khoahoc'=>$id_khoahoc,'id_teacher'=>$id_giangvien,'ten_lop'=>$class]);
}
header("Location: ../../admin_Class/index.php");
?>