<?php

require_once('Student.php');

class StudentDAO {
    private $students = array();

    public function __construct($filename) {
        try {
            $handle = fopen($filename, "r");
            if ($handle === false) {
                throw new Exception("Không thể mở file");
            }
            fgets($handle);
            while (($line = fgets($handle)) !== false) {
                $studentData = explode(',', $line);
                $student = new Student($studentData[0], $studentData[1], $studentData[2], $studentData[3]);
                $this->students[] = $student;
            }
            fclose($handle);
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    public function getAll() {
        return $this->students;
    }
    
}
