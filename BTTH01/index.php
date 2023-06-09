
<?php

session_start();
require_once('./Student_Manager/StudentDAO.php');
$studentDAO = new StudentDAO('./data/Student.csv');
$students = $studentDAO->getAll();



// Lấy dữ liệu từ form



?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>STUDENT MANAGER</title>
</head>

<style>
    .error{
        color:red;
    }
</style>

<body>
    <div class="container mt-5">
        <h2 class="text-center mt-5">Student Manager</h2>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Student
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Information Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="./Student_Manager/addStudent.php" method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" required>

                                <?php if(isset($_SESSION['eName'])): ?>
                            <span class="error"><?php echo $_SESSION['eName']; ?></span>
                        <?php endif; ?>

                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="text" class="form-control" name="age" required>
                                <?php if(isset($_SESSION['eAge'])): ?>
                            <span class="error"><?php echo $_SESSION['eAge']; ?></span>
                        <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="grade" class="form-label">Grade</label>
                                <input type="text" class="form-control" name="grade" required>
                                <?php if(isset($_SESSION['eGrade'])): ?>
                            <span class="error"><?php echo $_SESSION['eGrade']; ?></span>
                        <?php endif; ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">Age</th>
                    <th scope="col" class="text-center">Grade</th>
                    <th scope="col" colspan="2" class="text-center">Handle</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student) { ?>
                    <tr>
                        <td class="text-center"><?php echo $student->getId(); ?></td>
                        <td class="text-center"><?php echo $student->getName(); ?></td>
                        <td class="text-center"><?php echo $student->getAge(); ?></td>
                        <td class="text-center"><?php echo $student->getGrade(); ?></td>
                        <td class="text-center">
                            <a class="btn btn-warning" href="./Student_Manager/editStudent.php?id=<?php echo $student->getId()?>">Edit</a>
                            <a class="btn btn-danger" href="./Student_Manager/deleteStudent.php?id=<?php echo $student->getId()?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
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