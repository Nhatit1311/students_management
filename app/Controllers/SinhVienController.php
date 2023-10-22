<?php

namespace App\Controllers;

use App\Config\Database;
use App\Models\SinhVien;

class SinhVienController {
    use Database;

    public function create() {
        require "../views/index.php";
        $sinhvien = new SinhVien;

        if(isset($_POST['submit'])) {
            $ho_va_ten = mysqli_real_escape_string($this->conn, $_POST['ho_va_ten']);
            $email = mysqli_real_escape_string($this->conn, $_POST['email']);
            $dien_thoai = mysqli_real_escape_string($this->conn, $_POST['dien_thoai']);
            $ngay_sinh = mysqli_real_escape_string($this->conn, $_POST['ngay_sinh']);
            $gioi_tinh = mysqli_real_escape_string($this->conn, $_POST['gioi_tinh']);
            $dia_chi = mysqli_real_escape_string($this->conn, $_POST['dia_chi']);
            $diem_cc = mysqli_real_escape_string($this->conn, $_POST['diem_cc']);
            $diem_gk = mysqli_real_escape_string($this->conn, $_POST['diem_gk']);
            $diem_ck = mysqli_real_escape_string($this->conn, $_POST['diem_ck']);

            if(isset($ho_va_ten) && isset($email) && isset($dien_thoai) && isset($ngay_sinh) && isset($gioi_tinh) && isset($dia_chi) && isset($diem_cc) && isset($diem_gk) && isset($diem_ck)) {
                if(!empty($ho_va_ten) && !empty($email) && !empty($dien_thoai) && !empty($ngay_sinh) && !empty($dia_chi) && !empty($diem_cc) && !empty($diem_gk) && !empty($diem_ck)) {
                    $sinhvien->insert($ho_va_ten, $email, $dien_thoai, $ngay_sinh, $gioi_tinh, $dia_chi, $diem_cc, $diem_gk, $diem_ck);
                    echo "<script>alert('Thêm Sinh Viên Thành Công');</script>";
                    echo "<meta http-equiv='refresh' content='0';URL='./views/index.php'>";
                }else {
                    echo "<script>alert('Thông Tin Không Được Để Trống');</script>";
                    echo "<meta http-equiv='refresh' content='0';URL='./views/index.php'>";
                }
            }
        }
    }

    public function getData() {
        $sinhvien = new Sinhvien;
        
        $data = $sinhvien->select();
        return $data;
    }

    public function getIdData() {
        $sinhvien = new Sinhvien;

        if(isset($_GET['idsv'])) {
            $id = addslashes($_GET['idsv']);
            $getid = $sinhvien->getId($id);
        }

        return $getid;
    }

    public function updateData() {
        $sinhvien = new Sinhvien;

        if(isset($_GET['idsv'])) {
            $id = addslashes($_GET['idsv']);

            if(isset($_POST['update_data'])) {
                $ho_va_ten = addslashes($_POST['ho_va_ten']);
                $email = addslashes($_POST['email']);
                $dien_thoai = addslashes($_POST['dien_thoai']);
                $ngay_sinh = addslashes($_POST['ngay_sinh']);
                $gioi_tinh = addslashes($_POST['gioi_tinh']);
                $dia_chi = addslashes($_POST['dia_chi']);
                $diem_cc = addslashes($_POST['diem_cc']);
                $diem_gk = addslashes($_POST['diem_gk']);
                $diem_ck = addslashes($_POST['diem_ck']);
                if(isset($ho_va_ten) && isset($email) && isset($dien_thoai) && isset($ngay_sinh) 
                    && isset($gioi_tinh) && isset($dia_chi) && isset($diem_cc) && isset($diem_gk) && isset($diem_ck)) {
                    if(!empty($ho_va_ten) && !empty($email) && !empty($dien_thoai) && !empty($ngay_sinh)
                        && !empty($dia_chi) && !empty($diem_cc) && !empty($diem_gk) && !empty($diem_ck)) {

                        $sinhvien->update($id, $ho_va_ten, $email, $dien_thoai, $ngay_sinh, $gioi_tinh, $dia_chi, $diem_cc, $diem_gk, $diem_ck);
                        echo "<script>alert('Cập Nhật Thành Công');</script>";
                        echo "<meta http-equiv='refresh' content='0';URL='../public/index.php'>";
                    }else {
                        echo "<script>alert('Thông Tin Không Được Để Trống');</script>";
                        echo "<meta http-equiv='refresh' content='0';URL='../public/index.php'>";
                    }
                }
    
            }
        }
    }

    public function deleteData() {
        $sinhvien = new Sinhvien;
        
        if(isset($_GET['idsv'])) {
            $id = addslashes($_GET['idsv']);
        
            $sinhvien->delete($id);
            echo "<script>alert('Xoá Sinh Viên Thành Công');</script>";
            header("Location: ../public/index.php");
        }
    }

    public function searchSinhVien($ho_va_ten) {
        $sinhvien = new SinhVien;

        $search = $sinhvien->search($ho_va_ten);
        return $search;
    }
}