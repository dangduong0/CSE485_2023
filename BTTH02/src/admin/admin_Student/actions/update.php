<?php
require '../../../../config/database.php';
require '../../../../includes/function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $class = $_POST['class'];
    $email = $_POST['email'];
    $sql = "UPDATE students SET name=:name,class=:class,email=:email WHERE id=:id";
    $updatestd= pdo($pdo,$sql,['name'=>$name,'class'=>$class,'email'=>$email,'id'=>$id]);

}
header("Location: ../index.php");

?>