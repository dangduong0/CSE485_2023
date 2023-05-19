<?php
include '../../admin/sidebar.php';
include '../../admin/header.php';
include '../../../config/database.php';
include '../../../includes/function.php';
$sql = "SELECT * FROM courses ORDER BY id DESC";
$courses = pdo($pdo, $sql)->fetchAll();
$count = 0;
?>

<div class="container">
    <h5 class="mt-3 m-4">Danh sách sinh viên</h5>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Danh sách khóa học
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin khóa học</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../admin_Course/actions/add.php" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Mã khóa học</label>
                            <input type="text" class="form-control" name="ma_khoahoc">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Tên khóa học</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Mô tả</label>
                            <input type="text" class="form-control" name="description">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div> -->
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="text-center border">STT</th>
                <th scope="col" class="text-center border">Mã khóa học</th>
                <th scope="col" class="text-center border">Tên khóa học</th>
                <th scope="col" class="text-center border">Mô tả</th>
                <th scope="col" colspan="2" class="text-center border">Handle</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course) { ?>
                <tr class="border">
                    <th scope="row" class="text-center border"><?php echo $count + 1 ?></th>
                    <td class="text-center  border"><?php echo $course['ma_khoahoc'] ?></td>
                    <td class="text-center  border"><?php echo $course['name'] ?></td>
                    <td class="text-center border"><?php echo $course['description'] ?></td>
                    <td class="text-center border"><a class="btn" href='../admin_Course/actions/edit.php?id=<?php echo $course['id']?>'><i class="bi bi-pencil-square"></i></a></td>
                    <td class="text-center border"><a class="btn" href='../admin_Course/actions/delete.php?id=<?php echo $course['id']?>'onclick="return confirm('Bạn có chắc chắn muốn xóa ?')"><i class="bi bi-trash3"></i></a></td>
                </tr>

            <?php $count++;
            } ?>
        </tbody>
    </table>

</div>
<?php include '../../admin/footer.php' ?>