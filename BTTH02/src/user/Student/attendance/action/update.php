<?php
include '../../../../../config/database.php';
include '../../../../../includes/function.php';
session_start();

// Lấy dữ liệu từ form
$studentName = $_SESSION['student_name'];
$attendanceStatus = $_SESSION['attendance_status'];
$idKhoaHoc = $idKhoaHocs['idKhoaHoc'];

// Thực hiện truy vấn để lưu dữ liệu vào bảng attendance
$sql = "INSERT INTO attendance (id_khoahoc, id_student, time, status) VALUES (:idKhoaHoc, :user_id, NOW(), :attendanceStatus)";
$params = [
    'idKhoaHoc' => $idKhoaHoc,
    'user_id' => $user_id,
    'attendanceStatus' => $attendanceStatus
];
pdo($pdo, $sql, $params);

// Thực hiện các xử lý khác sau khi lưu dữ liệu thành công (nếu cần)

// Chuyển hướng về trang điểm danh hoặc trang khác (tuỳ theo yêu cầu của bạn)
header('Location: ../attendance/index.php');
exit();
?>