<?php
require '../../../../config/database.php';
require '../../../../includes/function.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);  // Validate id

$sql = "DELETE FROM lop_hocphan WHERE id = :id;"; // SQL
$student = pdo($pdo, $sql, [$id]);
header('Location: ../index.php');  
  
?>