<?php
include '../../../../config/database.php';
include '../../../../includes/function.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sql = "INSERT INTO teachers (name,email,phone) VALUES (:name,:email,:phone)";
    $new_std = pdo($pdo,$sql,['name'=>$name,'email'=>$email,'phone'=>$phone]);
}
header("Location: ../../admin_Teacher/index.php");
?>