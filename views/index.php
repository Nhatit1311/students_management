<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    use App\Controllers\SinhVienController;

    require "../views/layouts/css.php";
    ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <?php require "../views/layouts/header.php"; ?>
 
        <?php require "../views/layouts/menu.php"; ?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <?php require "add.php"; ?>
                            <div class="card mt-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-10">Danh Sách Sinh Viên</div>
                                        <div class="col-md-2">
                                            <form action="../views/search.php" method="get" class="d-flex">
                                                <input type="search" class="form-control me-2" name="search" aria-label="Search" placeholder="Tìm kiếm sinh viên">
                                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-center text-nowrap">
                                                    <th>STT</th>
                                                    <th>Họ Tên</th>
                                                    <th>Email</th>
                                                    <th>Điện Thoại</th>
                                                    <th>Ngày Sinh</th>
                                                    <th>Giới Tính</th>
                                                    <th>Địa Chỉ</th>
                                                    <th>Chuyên Cần</th>
                                                    <th>Giữa Kì</th>
                                                    <th>Cuối Kì</th>
                                                    <th>Tổng Kết</th>
                                                    <th>Xếp Loại</th>
                                                    <th>Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $sinhviencontroller = new SinhVienController;
                                                $data = $sinhviencontroller->getData();
                                                
                                                if(is_iterable($data)):
                                                    foreach($data as $key => $value):
                                                ?>
                                                <tr class="text-center align-middle text-nowrap">
                                                    <th><?= $key + 1 ?></th>
                                                    <td><?= $value['ho_va_ten'] ?></td>
                                                    <td><?= $value['email'] ?></td>
                                                    <td><?= $value['dien_thoai'] ?></td>
                                                    <td><?= $value['ngay_sinh'] ?></td>
                                                    <td>
                                                        <?php if($value['gioi_tinh'] == 1) { ?>
                                                        <button class="btn btn-primary">Nam</button>
                                                        <?php }else { ?>
                                                        <button class="btn btn-warning">Nữ</button>
                                                        <?php } ?>
                                                    </td>
                                                    <td><?= $value['dia_chi'] ?></td>
                                                    <td><?= $value['diem_cc'] ?></td>
                                                    <td><?= $value['diem_gk'] ?></td>
                                                    <td><?= $value['diem_ck'] ?></td>
                                                    <td><?= number_format((($value['diem_cc'] + $value['diem_gk'] + $value['diem_ck']) / 3), 2) ?></td>
                                                    <td>
                                                        <?php 
                                                            $xeploai = number_format((($value['diem_cc'] + $value['diem_gk'] + $value['diem_ck']) / 3), 2);
                                                            if($xeploai >= 8) {
                                                                echo "Giỏi";
                                                            }else if($xeploai >= 6.5) {
                                                                echo "Khá";
                                                            }else if($xeploai >= 5) {
                                                                echo "Trung Bình";
                                                            }else {
                                                                echo "Yếu";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="../views/update.php?idsv=<?php echo $value['id'] ?>" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                        <a onclick="return confirm('Bạn Muốn Xoá Không?');" href="../views/delete.php?idsv=<?php echo $value['id'] ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                                <?php endforeach;
                                                endif;
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require "../views/layouts/footer.php"; ?>
    </div>

    <?php require "../views/layouts/js.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>