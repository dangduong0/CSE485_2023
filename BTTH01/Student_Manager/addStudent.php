<?php
session_start();
require_once './StudentDAO.php';

// $errorName;

//         $_SESSION['eName']=$errorName;
//     } else {
//         $student = new Student(null, $name, $age, $grade);
//         $student->setName($name);
//         $student->setAge($age);
//         $student->setGrade($grade);
    
//         // Thêm sinh viên mới vào file CSV
//         $newStudent = new StudentDAO('../data/Student.csv');
//         $new_student = $newStudent->addStudent($student);
//         // Hiển thị thông báo
//         header('Location: ../index.php'); 
//     }
//     header("location: ../index.php");  
// }
function is_text($text, int $min = 0, int $max = 1000): bool
{
    $length = mb_strlen($text);
    return ($length >= $min and $length <= $max);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $grade = $_POST['grade'];
    $valid = is_text($name, 3, 18);
    if (!$valid) {
        $_SESSION['eName'] = 'Username must be 3-18 characters';
        header('Location: ../index.php');
        exit;
    } else {
        $student = new Student(null, $name, $age, $grade);
        $student->setName($name);
        $student->setAge($age);
        $student->setGrade($grade);
            
                // Thêm sinh viên mới vào file CSV
        $newStudent = new StudentDAO('../data/Student.csv');
        $new_student = $newStudent->addStudent($student);
        header('Location: ../index.php');
        unset($_SESSION['eName']);
        exit;
    }
}
?>


