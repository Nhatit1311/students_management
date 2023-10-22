<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require "../vendor/autoload.php";
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
                            <button class="btn btn-secondary" id="back">Quay Lại</button>
                            <div class="card mt-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-10">Danh Sách Sinh Viên</div>
                                        <div class="col-md-2">
                                            <form action="../views/search.php" method="get" class="d-flex" role="search">
                                                <input type="search" class="form-control me-2" name="search" aria-label="Search" placeholder="Tìm kiếm sinh viên" id="search">
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

                                                if(isset($_GET['search']) && !empty($_GET['search'])) {
                                                    $ho_va_ten = addslashes($_GET['search']);
                                                    $data = $sinhviencontroller->searchSinhVien($ho_va_ten);
                                                
                                                    // echo "<pre>";
                                                    // print_r($data);
                                                    // echo "</pre>";
                                                    if($data->num_rows > 0) {
                                                        while($row = $data->fetch_assoc()) {
                                                ?>
                                                <tr class="text-center align-middle text-nowrap">
                                                    <th><?= $row['id']; ?></th>
                                                    <td><?= $row['ho_va_ten']; ?></td>
                                                    <td><?= $row['email']; ?></td>
                                                    <td><?= $row['dien_thoai']; ?></td>
                                                    <td><?= $row['ngay_sinh']; ?></td>
                                                    <td>
                                                        <?php if($row['gioi_tinh']) { ?>
                                                        <button class="btn btn-primary">Nam</button>
                                                        <?php }else { ?>
                                                        <button class="btn btn-warning">Nữ</button>
                                                        <?php } ?>
                                                    </td>
                                                    <td><?= $row['dia_chi']; ?></td>
                                                    <td><?= $row['diem_cc']; ?></td>
                                                    <td><?= $row['diem_gk']; ?></td>
                                                    <td><?= $row['diem_ck']; ?></td>
                                                    <td><?= number_format((($row['diem_cc'] + $row['diem_gk'] + $row['diem_ck']) / 3), 2) ?></td>
                                                    <td>
                                                        <?php 
                                                            $xeploai = number_format((($row['diem_cc'] + $row['diem_gk'] + $row['diem_ck']) / 3), 2);
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
                                                        <a href="../views/update.php?idsv=<?php echo $row['id'] ?>" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                        <a onclick="return confirm('Bạn Muốn Xoá Không?');" href="../views/delete.php?idsv=<?php echo $row['id'] ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                                <?php 
                                                        }
                                                    }else {
                                                        echo "<b>Không tìm thấy kết quả</b>";
                                                    }
                                                }
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
    <script>
        let back = document.getElementById('back');

        back.onclick = () => {
            window.location = "../public/index.php";
        }
    </script>
</body>

</html>