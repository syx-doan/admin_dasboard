<?php 
// thêm tài khoản
function insert_taikhoan($fullname,$image,$password,$phone,$email,$role){
    $sql="INSERT INTO users(fullname,image,password,phone,email,role) values('$fullname','$image','$password','$phone','$email','$role')";
    pdo_execute($sql);
}

// load tất cả tài khoản
function load_tk(){
    $row = 5;
    if (isset($_GET['pagetk'])) {
        $page = $_GET['pagetk'];
    }else{
        $page = 1 ; 
    }
    $from = ($page - 1) * $row; 
    $sql = "SELECT * FROM users order by id_user limit $from,$row";
    $listtaikhoan=pdo_query($sql);
    return $listtaikhoan;
}
 function load_all_tk()
{
    $sql = "SELECT * FROM users";
    $lisAlltaikhoan = pdo_query($sql);
    return $lisAlltaikhoan;
}

// load chi tiết tài khoản
function load_one_tk($id_user){
    $sql="SELECT * FROM users where id_user=".$id_user;
    $taikhoan=pdo_query_one($sql);
    return $taikhoan;
}

// xóa tìa khoản
function delete_tk($id_user){
    $sql="DELETE FROM users where id_user=".$id_user;
    pdo_execute($sql);
}

// kiểm tra tài khoản khi đăng nhập
function checkuser($ten_dang_nhap,$mat_khau){
    $sql="SELECT * FROM users where email='".$ten_dang_nhap."'  and  password='".$mat_khau."'  " ;
    $tk=pdo_query_one($sql); 
    return $tk;
}

// update tài khoản
function update_taikhoan($id_user,$fullname,$image,$password,$phone,$email,$role){
   $sql=" UPDATE users set fullname ='".$fullname."',image ='".$image."', password='".$password."' ,phone='".$phone."' , email='".$email."', role='".$role."' where id_user=".$id_user;
   pdo_execute($sql);
}
function checktaikhoan($ten_dang_nhap,$email){
    $sql="SELECT * FROM khach_hang where ten_dang_nhap='".$ten_dang_nhap."'  and  email='".$email."' " ;
    $tk=pdo_query_one($sql); 
    return $tk;
}

// đăng nhập
function login_user($email,$mat_khau){
    $sql="SELECT fullname, email, address, phone FROM users where email='".$email."'  and  password='".$mat_khau."' " ;
    $tk=pdo_query_one($sql); 
    return $tk;
}

// đăng kí 
function registerAcount($fullname, $email, $password, $username){
    $sql="INSERT INTO users(fullname,email, password, username,role) values('$fullname','$email','$password', '$username',0)";
    pdo_execute($sql);
}

// kiểm tra logout
function checkAccoutnExist($email, $username) {
    $sql="SELECT * FROM users where email='".$email."' OR username='". $username ."'" ;
    $tk=pdo_query_one($sql); 
    return $tk;
}

// kiểm tra vai trò
function check_role(){
    $sql = "SELECT role from users";
    $check_role = pdo_query($sql);
    return $check_role;
}
?>