<?php

require_once('Student.php');

class StudentDAO
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function getAll()
    {
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
    public function deleteStudent($id)
    {
        // Đọc toàn bộ dữ liệu từ file CSV vào mảng
        $students = array_map('str_getcsv', file($this->filename));
    
        // Tạo một mảng mới, chỉ chứa các bản ghi không có id bằng với id muốn xóa
        $newStudents = array();
        foreach ($students as $student) {
            if ($student[0] != $id) {
                array_push($newStudents, $student);
            }
        }
    
        // Ghi mảng mới vào file CSV
        $file = fopen($this->filename, 'w');
        foreach ($newStudents as $student) {
            fputcsv($file, $student);
        }
        fclose($file);
    }
}

