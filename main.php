<?php
include './dao/pdo.php';
// include './dao/loai.php';
// include './dao/hang-hoa.php';
include './dao/taikhoan.php';
// include './dao/thong-ke.php';
// include './dao/binh-luan.php';
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
        case 'thuonghieu':
                include './admin/thuonghieu/list-thuonghieu.php';
                break;
        case 'loai':
                include './admin/loai/list-loai.php';
                break;
        // Tai khoan 
        case 'taikhoan':
            $listtaikhoan = load_tk();
                include './admin/taikhoan/list-taikhoan.php';
                break;
        case 'add-taikhoan':
            if(isset($_POST['btnAddUser'])){
                $fullname = $_POST['inputFullName'];
                $username = $_POST['inputUser'];
                $password = $_POST['inputPassword'];
                $phone = $_POST['inputPhone'];
                $email = $_POST['inputEmail'];
                $address = $_POST['inputAddress'];
                $role = $_POST['inputVaitro'];
                insert_taikhoan($fullname,$username,$password,$phone,$email,$address,$role);
                // var_dump($fullname,$username,$password,$phone,$email,$address,$role);
              }
                include './admin/taikhoan/add-taikhoan.php';
                break;
        case 'sanpham':
                include './admin/sanpham/list-sanpham.php';
                break;
        case 'donhang':
                include './admin/donhang/list-donhang.php';
                break;
        case 'binhluan':
                include './admin/binhluan/list-binhluan.php';
                break;              
            }
        }else{
            include './admin/thongke/list-thongke.php';
        }
?>