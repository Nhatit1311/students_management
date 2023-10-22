<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    require "../vendor/autoload.php";
    use App\Controllers\SinhVienController;

    require "../views/layouts/css.php";
    $sinhviencontroller = new SinhVienController;
    $data = $sinhviencontroller->getIdData();
    $sinhviencontroller->updateData();
    ?>
</head>

<body>
    <div class="wrapper">
        <!-- Navbar -->
        <?php require "../views/layouts/header.php"; ?>

        <?php require "../views/layouts/menu.php"; ?>

        <div class="content-wrapper">
            <div class="content-header">
                <button class="btn btn-secondary" id="back">Quay Lại</button>
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Cập Nhật Sinh Viên</div>
                                <form method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">Họ Tên</label>
                                            <input type="text" class="form-control" name="ho_va_ten" value="<?= $data['ho_va_ten'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" value="<?= $data['email'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Điện Thoại</label>
                                            <input type="text" class="form-control" name="dien_thoai" value="<?= $data['dien_thoai'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Ngày Sinh</label>
                                            <input type="date" class="form-control" name="ngay_sinh" value="<?= $data['ngay_sinh'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Giới Tính</label>
                                            <select name="gioi_tinh" class="form-control">
                                                <option value="1">Nam</option>
                                                <option value="0">Nữ</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Địa Chỉ</label>
                                            <input type="text" class="form-control" name="dia_chi" value="<?= $data['dia_chi'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Chuyên Cần</label>
                                            <input type="number" class="form-control" min="0" max="10" name="diem_cc" value="<?= $data['diem_cc'] ?>" step="any">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Giữa Kỳ</label>
                                            <input type="number" class="form-control" min="0" max="10" name="diem_gk" value="<?= $data['diem_gk'] ?>" step="any">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Cuối Kỳ</label>
                                            <input type="number" class="form-control" min="0" max="10" name="diem_ck" value="<?= $data['diem_ck'] ?>" step="any">
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary" name="update_data">Cập Nhật Sinh Viên</button>
                                    </div>
                                </form>
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