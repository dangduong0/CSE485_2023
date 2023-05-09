<?php
require_once './StudentDAO.php';
// Lấy dữ liệu từ form
$name = $_POST['name'];
$age = $_POST['age'];
$grade = $_POST['grade'];

// Tạo đối tượng Student mới
$student = new Student(null, $name, $age, $grade);
$student->setName($name);
$student->setAge($age);
$student->setGrade($grade);

// Thêm sinh viên mới vào file CSV
$newStudent = new StudentDAO('../data/Student.csv');
$new_id = $newStudent->addStudent($student);

// Hiển thị thông báo
header('Location: ../index.php');

?>

