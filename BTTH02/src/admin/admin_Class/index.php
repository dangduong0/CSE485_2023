<?php
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
$sqlMa_khoahoc = "SELECT id,ma_khoahoc FROM courses";
$makhoahocs = pdo($pdo, $sqlMa_khoahoc)->fetchAll();
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
        <a href="../index.php" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-users fa-fw"></i>  Overview</a>
        <a href="../admin_Student/index.php" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-users fa-fw"></i> Sinh viên</a>
        <a href="../admin_Teacher/index.php" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-user fa-fw"></i>  Giáo viên</a>
        <a href="../admin_Course/index.php" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-book fa-fw"></i>  Khóa học</a>
        <a href="../admin_Class/index.php" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-diamond fa-fw"></i>  Lớp học phần</a>
        <a href="#" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-bell fa-fw"></i>  News</a>
        <a href="#" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-bank fa-fw"></i>  Thống kê</a>
        <a href="#" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-history fa-fw"></i>  404 Page</a>
        <a href="#" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
    </div>
</nav>
<?php
include '../../../public/template/header.html';
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
                            <?php foreach ($makhoahocs as $makhoahoc) { ?>
                                <option value="<?php echo $makhoahoc['id'] ?>"><?php echo $makhoahoc['ma_khoahoc'] ?></option>
                            <?php } ?>
                        </select>
                        <div class="mb-3">
                            <label for="" class="form-label">Tên Lớp</label>
                            <input type="text" class="form-control" name="class">
                        </div>
                        <select class="form-select mt-4 mb-5 " name="id_giangvien" aria-label="Default select example">
                            <option selected>Chọn giảng viên</option>
                            <?php foreach ($teachers as $teacher) { ?>
                                <option value="<?php echo $teacher['id'] ?>"><?php echo $teacher['name'] ?></option>
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
                    <td class="text-center border"><a class="btn" href='../admin_Class/actions/edit.php?id=<?php echo $class['id'] ?>'><i class="bi bi-pencil-square"></i></a></td>
                    <td class="text-center border"><a class="btn" href='../admin_Class/actions/delete.php?id=<?php echo $class['id'] ?>' onclick="return confirm('Bạn có chắc chắn muốn xóa ?')"><i class="bi bi-trash3"></i></a></td>
                </tr>

            <?php $count++;
            } ?>
        </tbody>
    </table>

</div>
<?php include '../../../public/template/footer.html' ?>