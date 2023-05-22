<?php 
include '../../../config/database.php';
include '../../../includes/function.php';
$sql = "SELECT * FROM students ORDER BY id DESC";
$students = pdo($pdo, $sql)->fetchAll();
$count = 0;
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
        <a href="../index.php" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-users fa-fw"></i>   Overview</a>
        <a href="../admin_Student/index.php" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-users fa-fw"></i>  Sinh viên</a>
        <a href="../admin_Teacher/index.php" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-user fa-fw"></i>  Giáo viên</a>
        <a href="../admin_Course/index.php" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-book fa-fw"></i>  Khóa học</a>
        <a href="../admin_Class/index.php" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-diamond fa-fw"></i>  Lớp học phần</a>
        <a href="#" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-bell fa-fw"></i>  News</a>
        <a href="#" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-bank fa-fw"></i>  Thống kê</a>
        <a href="#" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-history fa-fw"></i>  404 Page</a>
        <a href="#" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
    </div>
</nav>
<?php include '../../../public/template/header.html';?>
<div class="container">
    <h5 class="mt-3 m-4">Danh sách sinh viên</h5>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Thêm sinh viên
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin sinh viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../admin_Student/actions/add.php" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Tên</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Lớp</label>
                            <input type="text" class="form-control" name="class">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div> -->
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="text-center border">STT</th>
                <th scope="col" class="text-center border">Họ tên</th>
                <th scope="col" class="text-center border">Lớp</th>
                <th scope="col" class="text-center border">Email</th>
                <th scope="col" colspan="2" class="text-center border">Handle</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student) { ?>
                <tr class="border">
                    <th scope="row" class="text-center border"><?php echo $count + 1 ?></th>
                    <td class="text-center  border"><?php echo $student['name'] ?></td>
                    <td class="text-center  border"><?php echo $student['class'] ?></td>
                    <td class="text-center border"><?php echo $student['email'] ?></td>
                    <td class="text-center border"><a class="btn" href='../admin_Student/actions/edit.php?id=<?php echo $student['id']?>'><i class="bi bi-pencil-square"></i></a></td>
                    <td class="text-center border"><a class="btn" href='../admin_Student/actions/delete.php?id=<?php echo $student['id']?>'onclick="return confirm('Bạn có chắc chắn muốn xóa ?')"><i class="bi bi-trash3"></i></a></td>
                </tr>

            <?php $count++;
            } ?>
        </tbody>
    </table>

</div>
<?php include '../../../public/template/footer.html' ?>