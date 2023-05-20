<?php
include '../../admin/sidebar.php';
include '../../admin/header.php';
include '../../../config/database.php';
include '../../../includes/function.php';
$sql = "SELECT 
        lop_hocphan.id AS id,
        lop_hocphan.ten_lop AS class,
        lop_hocphan.time,
        courses.ma_khoahoc,
        courses.name AS ten_khoahoc,
        teachers.name AS ten_giaovien 
        FROM lop_hocphan 
        JOIN courses ON lop_hocphan.id_khoahoc = courses.id 
        JOIN teachers on lop_hocphan.id_teacher=teachers.id
        ORDER BY id DESC";
$classes = pdo($pdo, $sql)->fetchAll();
$count = 0;
$sqlMa_khoahoc ="SELECT id,ma_khoahoc FROM courses";
$makhoahocs=pdo($pdo,$sqlMa_khoahoc)->fetchAll();
$sql_teacher ="SELECT id ,name FROM teachers";
$teachers=pdo($pdo,$sql_teacher)->fetchAll();
?>

<div class="container">
    <h5 class="mt-3 m-4">Danh sách lớp học phần</h5>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Thêm lớp học phần
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin lớp học phần</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../admin_Class/actions/add.php" method="post">
                        <select class="form-select mb-3" name="id_khoahoc" aria-label="Default select example">
                            <option selected>Chọn mã khóa học</option>
                            <?php foreach ($makhoahocs as $makhoahoc) {?>
                                <option value="<?php echo $makhoahoc['id']?>"><?php echo $makhoahoc['ma_khoahoc'] ?></option>
                            <?php } ?>
                        </select>
                        <div class="mb-3">
                            <label for="" class="form-label">Tên Lớp</label>
                            <input type="text" class="form-control" name="class">
                        </div>
                        <select class="form-select mt-4 mb-5 " name="id_giangvien" aria-label="Default select example">
                            <option selected>Chọn giảng viên</option>
                            <?php foreach ($teachers as $teacher) {?>
                                <option value="<?php echo $teacher['id']?>"><?php echo $teacher['name'] ?></option>
                            <?php } ?>
                        </select>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="text-center border">STT</th>
                <th scope="col" class="text-center border">Mã khóa học</th>
                <th scope="col" class="text-center border">Tên khóa học</th>
                <th scope="col" class="text-center border">Tên lớp</th>
                <th scope="col" class="text-center border">Giảng viên</th>
                <th scope="col" colspan="2" class="text-center border">Handle</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($classes as $class) { ?>
                <tr class="border">
                    <th scope="row" class="text-center border"><?php echo $count + 1 ?></th>
                    <td class="text-center  border"><?php echo $class['ma_khoahoc'] ?></td>
                    <td class="text-center  border"><?php echo $class['ten_khoahoc'] ?></td>
                    <td class="text-center border"><?php echo $class['class'] ?></td>
                    <td class="text-center border"><?php echo $class['ten_giaovien'] ?></td>
                    <td class="text-center border"><a class="btn" href='../admin_Class/actions/edit.php?id=<?php echo $class['id']?>'><i class="bi bi-pencil-square"></i></a></td>
                    <td class="text-center border"><a class="btn" href='../admin_Class/actions/delete.php?id=<?php echo $class['id']?>'onclick="return confirm('Bạn có chắc chắn muốn xóa ?')"><i class="bi bi-trash3"></i></a></td>
                </tr>

            <?php $count++;
            } ?>
        </tbody>
    </table>

</div>
<?php include '../../admin/footer.php' ?>