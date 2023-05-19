<?php
require '../../../../config/database.php';
require '../../../../includes/function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE teachers SET name=:name,email=:email,phone=:phone WHERE id=:id";
    $updatestd= pdo($pdo,$sql,['name'=>$name,'email'=>$email,'phone'=>$phone,'id'=>$id]);

}
header("Location: ../index.php");

?>