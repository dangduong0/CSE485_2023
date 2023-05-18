<?php 
    include '../../admin/sidebar.php';
    include '../../admin/header.php' ;
    include '../../../config/database.php';
    include '../../../includes/function.php';
    $sql ="SELECT * FROM students ";
    $students = pdo($pdo,$sql)->fetchAll();    
    $count=0;
?>

<div class="container">
    <h5 class="mt-3 m-4">Danh sách sinh viên</h5>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="text-center border">STT</th>
                <th scope="col"class="text-center border">Họ tên</th>
                <th scope="col" class="text-center border">Lớp</th>
                <th scope="col" class="text-center border">Email</th>
                <th scope="col" colspan="2" class="text-center border">Handle</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student) { ?>
            <tr class="border">
                <th scope="row" class="text-center border"><?php echo $count+1 ?></th>
                <td class="text-center  border"><?php echo $student['name']?></td>
                <td class="text-center  border"><?php echo $student['class']?></td>
                <td class="text-center border"><?php echo $student['email']?></td>
                <td class="text-center border"><a class="btn"><i class="bi bi-pencil-square"></i></a></td>
                <td class="text-center border"><a class="btn"><i class="bi bi-trash3"></i></a></td>
            </tr>
            
            <?php $count++; }?>
        </tbody>
    </table>

</div>
<?php include '../../admin/footer.php' ?>