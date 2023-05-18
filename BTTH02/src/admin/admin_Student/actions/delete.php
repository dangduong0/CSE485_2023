<?php
require '../../../../config/database.php';
require '../../../../includes/function.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);  // Validate id
if (!$id) {                                                // If no valid id
    include 'page-not-found.php';                          // Page not found
}

$sql = "DELETE FROM students WHERE id = :id;"; // SQL
$student = pdo($pdo, $sql, [$id]);
header('Location: ../index.php');  
  
?>