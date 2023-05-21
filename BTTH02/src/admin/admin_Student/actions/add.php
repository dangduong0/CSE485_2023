<?php
include '../../../../config/database.php';
include '../../../../includes/function.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $class = $_POST['class'];
    $email = $_POST['email'];
    $sql = "INSERT INTO students (name,class,email) VALUES (:name,:class,:email)";
    $new_std = pdo($pdo,$sql,['name'=>$name,'class'=>$class,'email'=>$email]);
}
header("Location: ../../admin_Student/index.php");
?>