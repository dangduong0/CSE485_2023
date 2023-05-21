
<?php
include '../../../../config/database.php';
include '../../../../includes/function.php';
$id =$_GET['id'];
$sql = "SELECT *FROM students WHERE id=:id";
$student = pdo($pdo,$sql,[$id])->fetch();
?>
<nav class="w3-sidebar w3-collapse bg-black w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container w3-row">
        <div class="w3-col s8 w3-bar">
            <span>Welcome, <strong>Admin</strong></span><br>
        </div>
    </div>
    <hr>
    <div class="w3-container">
        <h5>Dashboard</h5>
    </div>
    <div class="w3-bar-block ">
        <a href="../../index.php" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-users fa-fw"></i>   Overview</a>
        <a href="../../admin_Student/index.php" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-users fa-fw"></i>  Sinh viên</a>
        <a href="../../admin_Teacher/index.php" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-user fa-fw"></i>  Giáo viên</a>
        <a href="../../admin_Course/index.php" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-book fa-fw"></i>  Khóa học</a>
        <a href="../../admin_Class/index.php" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-diamond fa-fw"></i>  Lớp học phần</a>
        <a href="#" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-bell fa-fw"></i>  News</a>
        <a href="#" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-bank fa-fw"></i>  Thống kê</a>
        <a href="#" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-history fa-fw"></i>  404 Page</a>
        <a href="#" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
    </div>
</nav>
<?php
include '../../../../public/template/header.html';
?>
<div class="container p-5">
    <form action="../actions/update.php" method="post">
        <div class="mb-3">
            <label for="" class="form-label">Tên</label>
            <input type="text" class="form-control" name="name" value="<?php echo $student['name']?>">
            <input type="hidden" class="form-control" name="id" value="<?php echo $student['id']?>">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Lớp</label>
            <input type="text" class="form-control" name="class" value="<?php echo $student['class']?>"> 
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $student['email']?>">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </form>
</div>
<?php
include '../../../../public/template/footer.html';
?>