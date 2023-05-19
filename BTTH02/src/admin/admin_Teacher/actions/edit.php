<?php
include '../../sidebar.php';
include '../../header.php';
include '../../../../config/database.php';
include '../../../../includes/function.php';
$id =$_GET['id'];
$sql = "SELECT *FROM teachers WHERE id=:id";
$teacher = pdo($pdo,$sql,[$id])->fetch();

?>
<div class="container p-5">
    <form action="../actions/update.php" method="post">
        <div class="mb-3">
            <label for="" class="form-label">Tên</label>
            <input type="text" class="form-control" name="name" value="<?php echo $teacher['name']?>">
            <input type="hidden" class="form-control" name="id" value="<?php echo $teacher['id']?>">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $teacher['email']?>"> 
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" name="phone" value="<?php echo $teacher['phone']?>">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </form>
</div>
<?php
include '../../footer.php';
?>