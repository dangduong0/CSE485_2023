<?php
include '../../../../config/database.php';
include '../../../../includes/function.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ma_khoahoc = $_POST['ma_khoahoc'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $sql = "INSERT INTO courses (ma_khoahoc,name,description) VALUES (:ma_khoahoc,:name,:description)";
    $new_course = pdo($pdo,$sql,['ma_khoahoc'=>$ma_khoahoc,'name'=>$name,'description'=>$description]);
}
header("Location: ../../admin_Course/index.php");
?>