<?php
include '../../../../config/database.php';
include '../../../../includes/function.php';
session_start();

$user_id = $_SESSION['id'];
$nameStudent = ""; 

$sql = "SELECT name FROM students WHERE id = :user_id";
$result = pdo($pdo, $sql, ['user_id' => $user_id])->fetch();

if ($result) {
    $nameStudent = $result['name'];
}

$sql = "SELECT lop_hocphan.id_KhoaHoc AS idKhoaHoc
        FROM lop_hocphan 
        WHERE id_student = :user_id AND DATE(time) = DATE(NOW())";
$idKhoaHocs = pdo($pdo, $sql, ['user_id' => $user_id])->fetch();
$idKhoaHoc = $idKhoaHocs['idKhoaHoc'];

$sql = "SELECT courses.name AS tenKhoaHocs FROM courses WHERE courses.id = :idKhoaHoc";
$tenKhoaHocs = pdo($pdo, $sql, ['idKhoaHoc' => $idKhoaHoc])->fetch();
$tenKhoaHoc = $tenKhoaHocs['tenKhoaHocs'];
?>

<nav class="w3-sidebar w3-collapse bg-black w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container w3-row">
        <div class="w3-col s8 w3-bar">
            <span>Welcome, <strong><?php echo $nameStudent; ?></strong></span><br>
        </div>
    </div>
    <hr>
    <div class="w3-container">
        <h5>Dashboard</h5>
    </div>
    <div class="w3-bar-block ">
        <a href="../attendance/index.php" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-users fa-fw"></i>   Điểm danh</a>
        <a href="../index.php" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-users fa-fw"></i>  Sinh viên</a>
        <a href="../admin_Course/index.php" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-book fa-fw"></i>  Khóa học</a>
        <a href="../admin_Class/index.php" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-diamond fa-fw"></i>  Lớp học phần</a>
        <a href="#" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-bell fa-fw"></i>  News</a>
        <a href="#" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-bank fa-fw"></i>  Thống kê</a>
        <a href="#" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-history fa-fw"></i>  404 Page</a>
        <a href="#" class="w3-bar-item w3-button w3-padding p-3"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
    </div>
</nav>

<?php include '../../../../public/template/header.html'?>
<div class="container">
        <h2>Điểm Danh</h2>
        <form method="POST" action="process.php">
            <div class="mb-3">
                <label for="student_name" class="form-label">Tên Sinh Viên:</label>
                <input type="text" class="form-control" id="student_name" name="student_name" value="<?php echo $nameStudent; ?>" required readonly>
            </div>
            <div class="mb-3">
                <label for="attendance_status" class="form-label">Trạng Thái Điểm Danh:</label>
                <select class="form-select" id="attendance_status" name="attendance_status">
                    <option value="co_mat">Có Mặt</option>
                    <option value="muon">Muộn</option>
                    <option value="vang">Vắng</option>
                </select>
            </div>
			<div class="mb-3">
                <label for="student_name" class="form-label">Tên Sinh Viên:</label>
                <input type="text" class="form-control" id="student_name" name="student_name" value="<?php echo $tenKhoaHoc; ?>" required readonly>
            </div>
            <button type="submit" formaction="../../../user/Student/attendance/action/update.php" class="btn btn-primary">Điểm Danh</button>

        </form>
    </div>
<?php include '../../../../public/template/footer.html' ?>