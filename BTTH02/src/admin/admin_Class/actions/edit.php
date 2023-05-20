<?php
include '../../sidebar.php';
include '../../header.php';
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
include '../../footer.php';
?>