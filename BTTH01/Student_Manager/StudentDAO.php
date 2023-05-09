<?php

require_once('Student.php');

class StudentDAO {
    private $filename;

    public function __construct($filename) {
        $this->filename = $filename;
    }

    public function readAll() {
        // Đọc toàn bộ dữ liệu từ file CSV
        $data = array_map('str_getcsv', file($this->filename));
        // Loại bỏ phần tử đầu tiên trong mảng (tên cột)
        array_shift($data);

        // Tạo danh sách sinh viên
        $students = array();
        foreach ($data as $row) {
            $student = new Student($row[0], $row[1], $row[2], $row[3]);
            array_push($students, $student);
        }

        // Trả về danh sách sinh viên
        return $students;
    }

}
