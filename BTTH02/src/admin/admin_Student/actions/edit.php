<?php
include '../../sidebar.php';
include '../../header.php';
include '../../../../config/database.php';
include '../../../../includes/function.php';
$id =$_GET['id'];
$sql = "SELECT *FROM students WHERE id=:id";
$student = pdo($pdo,$sql,[$id])->fetch();

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
include '../../footer.php';
?>