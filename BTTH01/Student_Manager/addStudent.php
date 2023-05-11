<?php
session_start();
require_once './StudentDAO.php';
function is_text($text, int $min = 0, int $max = 1000): bool
{
    $length = mb_strlen($text);
    return ($length >= $min and $length <= $max);
}
function is_positive_integer($input) {
    if (is_numeric($input)) {
      $intValue = intval($input);
      return $intValue > 0;
    }
    
    return false;
  }
  
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $grade = $_POST['grade'];
    
    $validName = is_text($name, 3, 18);
    $validAge = is_positive_integer($age);
    $validGrade = is_positive_integer($grade);
    
    if (!$validName || !$validAge || !$validGrade) {
        if (!$validName) {
            $_SESSION['eName'] = 'Username must be 3-18 characters';
        }
        if (!$validAge) {
            $_SESSION['eAge'] = 'Age must be a positive integer';
        }
        if (!$validGrade) {
            $_SESSION['eGrade'] = 'Grade must be a positive integer';
        }
        
        header('Location: ../index.php');
        exit;
    }
    
    $student = new Student(null, $name, $age, $grade);
    $student->setName($name);
    $student->setAge($age);
    $student->setGrade($grade);
            
    // Thêm sinh viên mới vào file CSV
    $newStudent = new StudentDAO('../data/Student.csv');
    $new_student = $newStudent->addStudent($student);
    header('Location: ../index.php');
    unset($_SESSION['eName']);
    unset($_SESSION['eAge']);
    unset($_SESSION['eGrade']);
    exit;
}

?>


