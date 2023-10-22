<?php

namespace App\Models;

use App\Config\Database;

class SinhVien {
    use Database;
    
    public function execute($sql) {
        $result = $this->conn->query($sql);
        return $result;
    }

    public function insert($ho_va_ten, $email, $dien_thoai, $ngay_sinh, $gioi_tinh, $dia_chi, $diem_cc, $diem_gk, $diem_ck) {
        $sql = "INSERT INTO sinhviens (ho_va_ten, email, dien_thoai, ngay_sinh, gioi_tinh, dia_chi, diem_cc, diem_gk, diem_ck)
                VALUES ('$ho_va_ten', '$email', '$dien_thoai', '$ngay_sinh', '$gioi_tinh', '$dia_chi', '$diem_cc', '$diem_gk', '$diem_ck')";
        
        $this->execute($sql);
    }

    public function select() {
        $data = null;
        $sql = "SELECT * FROM sinhviens";
        $result = $this->execute($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }
    
    public function getId($id) {
        $sql = "SELECT * FROM sinhviens WHERE id=$id";
        $result = $this->execute($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function update($id, $ho_va_ten, $email, $dien_thoai, $ngay_sinh, $gioi_tinh, $dia_chi, $diem_cc, $diem_gk, $diem_ck) {
        $sql = "UPDATE sinhviens 
                SET ho_va_ten='$ho_va_ten', email='$email', dien_thoai='$dien_thoai', ngay_sinh='$ngay_sinh', gioi_tinh='$gioi_tinh', 
                    dia_chi='$dia_chi', diem_cc='$diem_cc', diem_gk='$diem_gk', diem_ck='$diem_ck' WHERE id=$id";
        $this->execute($sql);
    }
    
    public function delete($id) {
        $sql = "DELETE FROM sinhviens WHERE id=$id";
        $this->execute($sql);
    }

    public function search($ho_va_ten) {
        // $sql = "SELECT * FROM sinhviens WHERE ho_va_ten LIKE '%$ho_va_ten%'";
        // $result = $this->execute($sql);
        // $row = $result->fetch_assoc();
        
        // return $row;

        $sql = "SELECT * FROM sinhviens WHERE ho_va_ten LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $search_term = "%$ho_va_ten%";
        $stmt->bind_param("s", $search_term);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }
}