<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Thêm Mới Sinh Viên
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm Mới Sinh Viên</h1>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">X</button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Họ Tên</label>
                        <input type="text" class="form-control" name="ho_va_ten">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Điện Thoại</label>
                        <input type="text" class="form-control" name="dien_thoai">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Ngày Sinh</label>
                        <input type="date" class="form-control" name="ngay_sinh">
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
                        <input type="text" class="form-control" name="dia_chi">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Điểm CC</label>
                        <input type="number" class="form-control" name="diem_cc" min="0" max="10" step="any">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Điểm GK</label>
                        <input type="number" class="form-control" name="diem_gk" min="0" max="10" step="any">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Điểm CK</label>
                        <input type="number" class="form-control" name="diem_ck" min="0" max="10" step="any">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Thêm Mới</button>
                </div>
            </form>
        </div>
    </div>
</div>