<?php
include '../../admin/sidebar.php';
include '../../admin/header.php';
include '../../../config/database.php';
include '../../../includes/function.php';
$sql = "SELECT * FROM teachers ORDER BY id DESC";
$teachers = pdo($pdo,$sql)->fetchALL();
$count=0;
?>
<div class="container">
    <h5 class="mt-3 m-4">Danh sách giáo viên</h5>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Thêm giáo viên
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin giáo viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../admin_Teacher/actions/add.php" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Tên</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone">
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
                <th scope="col" class="text-center border">Họ tên</th>
                <th scope="col" class="text-center border">Email</th>
                <th scope="col" class="text-center border">Số điện thoại</th>
                <th scope="col" colspan="2" class="text-center border">Handle</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teachers as $teacher) { ?>
                <tr class="border">
                    <th scope="row" class="text-center border"><?php echo $count + 1 ?></th>
                    <td class="text-center  border"><?php echo $teacher['name'] ?></td>
                    <td class="text-center  border"><?php echo $teacher['email'] ?></td>
                    <td class="text-center border"><?php echo $teacher['phone'] ?></td>
                    <td class="text-center border"><a class="btn" href='../admin_Teacher/actions/edit.php?id=<?php echo $teacher['id']?>'><i class="bi bi-pencil-square"></i></a></td>
                    <td class="text-center border"><a class="btn" href='../admin_Teacher/actions/delete.php?id=<?php echo $teacher['id']?>'onclick="return confirm('Bạn có chắc chắn muốn xóa ?')"><i class="bi bi-trash3"></i></a></td>
                </tr>

            <?php $count++;
            } ?>
        </tbody>
    </table>

</div>


<?php include '../../admin/footer.php' ?>