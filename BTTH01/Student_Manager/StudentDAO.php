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
    public function addStudent($student)
    {
        // Đọc dữ liệu từ file CSV
        // Đọc toàn bộ dữ liệu từ file CSV
        $data = array_map('str_getcsv', file($this->filename));
        // Tìm ID lớn nhất hiện có
        $max_id = 0;
        foreach ($data as $row) {
            if ($row[0] > $max_id) {
                $max_id = intval($row[0]);
            }
        }

        // Tạo ID mới và đặt cho sinh viên mới
        $new_id = $max_id + 1;
        $student->setId($new_id);

        // Thêm thông tin của sinh viên mới vào mảng dữ liệu
        $newData = array(
            $student->getId(),
            $student->getName(),
            $student->getAge(),
            $student->getGrade()
        );
        array_push($data, $newData);

        // Ghi mảng dữ liệu vào file CSV
        $file = fopen($this->filename, 'w');
        foreach ($data as $row) {
            fputcsv($file, $row);
        }
        fclose($file);
    }

    public function updateStudent($student)
    {
        // Đọc toàn bộ dữ liệu từ file CSV
        $data = array_map('str_getcsv', file($this->filename));

        // Tạo một mảng để lưu trữ dữ liệu đã được sửa
        $updatedData = array();

        // Duyệt qua mảng dữ liệu và sửa thông tin sinh viên
        foreach ($data as $row) {
            if ($row[0] == $student->getId()) {
                $updatedData[] = array(
                    $student->getId(),
                    $student->getName(),
                    $student->getAge(),
                    $student->getGrade()
                );
            } else {
                $updatedData[] = $row;
            }
        }

        // Ghi mảng dữ liệu đã sửa vào file CSV
        $file = fopen($this->filename, 'w');
        foreach ($updatedData as $row) {
            fputcsv($file, $row);
        }
        fclose($file);
    }
}

