<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Update Student</title>
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center">
            <h3>Thông tin sinh viên</h3>
            <a href="../index.php" class="btn btn-primary">Quay lại</a>
        </div>
        <?php
        require_once('StudentDAO.php');
        $studentDAO = new StudentDAO('../data/Student.csv');
        $students = $studentDAO->getAll();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            // Tìm sinh viên theo ID
            $studentToEdit = null;
            foreach ($students as $student) {
                if ($student->getId() == $id) {
                    $studentToEdit = $student;
                    break;
                }
            }
        }
        if ($studentToEdit) {
        ?>
            <form action="updateStudent.php" method="post">
                <div class="mb-3">
                    <input type="hidden" name="id" value="<?php echo $studentToEdit->getId(); ?>">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $studentToEdit->getName() ?>">
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="text" class="form-control" name="age" value="<?php echo $studentToEdit->getAge() ?>">
                </div>
                <div class="mb-3">
                    <label for="grade" class="form-label">Grade</label>
                    <input type="text" class="form-control" name="grade" value="<?php echo $studentToEdit->getGrade() ?>">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>

            </form>
        <?php } ?>


    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>