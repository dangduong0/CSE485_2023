<?php
include '../../../../config/database.php';
include '../../../../includes/function.php';
$id = $_GET['id'];
$sql = "SELECT *FROM lop_hocphan WHERE id=:id";
$course_infor = pdo($pdo, $sql, [$id])->fetch();
$sqlMa_khoahoc = "SELECT * FROM courses";
$courses = pdo($pdo, $sqlMa_khoahoc)->fetchAll();
$sql_teacher = "SELECT id ,name FROM teachers";
$teachers = pdo($pdo, $sql_teacher)->fetchAll();
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
        <div>
        <label for="" class="form-label">Mã khóa học</label>
            <select class="form-select mb-3" name="id_khoahoc" aria-label="Default select example" value="<?php echo $course_infor['id_khoahoc']?>">
                <option>Chọn mã khóa học</option>
                <?php foreach ($courses as $course) { ?>
                    <!-- <option value="<?php //echo $makhoahoc['id'] ?>"><?php //echo $makhoahoc['ma_khoahoc'] ?></option> -->
                    <?php
                    if ($course['id'] == $course_infor['id_khoahoc']) {
                        echo '<option selected value="' . $course['id'] . '">' . $course['ma_khoahoc'] . '</option>';
                    } else {
                        echo '<option value="' . $course['id'] . '">' . $course['ma_khoahoc'] . '</option>';
                    }
                    ?>
                <?php } ?>
            </select>
        </div>
       
        <div class="mb-3">
            <label for="" class="form-label">Tên Lớp</label>
            <input type="text" class="form-control" name="class" value="<?php echo $course_infor['ten_lop']?>">
            <input type="hidden" class="form-control" name="id" value="<?php echo $course_infor['id']?>">
        </div>
       <div>
            <label for="" class="form-label">Giảng viên</label>
            <select class="form-select  mb-5" name="id_giangvien" aria-label="Default select example" value="<?php echo $course_infor['id_teacher']?>">
                <option selected>Chọn giảng viên</option>
                <?php foreach ($teachers as $teacher) { ?>
                    <!-- <option value="<?php //echo $makhoahoc['id'] ?>"><?php //echo $makhoahoc['ma_khoahoc'] ?></option> -->
                    <?php
                    if ($teacher['id'] == $course_infor['id_teacher']) {
                        echo '<option selected value="' . $teacher['id'] . '">' . $teacher['name'] . '</option>';
                    } else {
                        echo '<option value="' . $teacher['id'] . '">' . $teacher['name'] . '</option>';
                    }
                    ?>
                <?php } ?>
            </select>
       </div>
      
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </form>
</div>
<?php
include '../../../../public/template/footer.html';
?>