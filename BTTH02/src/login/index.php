<?php
session_start();
include '../../config/database.php';
include '../../includes/function.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $error=[];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql="SELECT * FROM user WHERE username=:username AND password=:password";
    $user_account = pdo($pdo,$sql,['username'=>$username,'password'=>$password])->fetch();
    if($user_account){
        $_SESSION['login']=$user_account['role'];
        $_SESSION['id']=$user_account['id'];
        header('Location: ../admin/index.php');
    }
    else{
        $error['invalid']='Sai tên đăng nhập hoặc mật khẩu';
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="../../public/css/login.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>

<div class="logo"></div>
<div class="login-block">
    <form action="" method="post">
        <h1>Login</h1>
        <input type="text" value="" placeholder="Username" name="username" />
        <input type="password" value="" placeholder="Password" name="password" />
        <span style="font-size: 14px;color:red;" class=""><?php echo isset($error['invalid'])?$error['invalid']:""?></span>
        <button style="margin-top:20px">Login</button>
    </form>
</div>
</body>
</html>