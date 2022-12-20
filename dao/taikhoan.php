<?php 
function insert_taikhoan($fullname,$password,$phone,$email,$address,$role){
    $sql="INSERT INTO users(fullname,password,phone,email,address,role) values('$fullname','$password','$phone','$email','$address','$role')";
    pdo_execute($sql);
    // var_dump($sql);
}
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
function load_one_tk($id_user){
    $sql="SELECT * FROM users where id_user=".$id_user;
    $taikhoan=pdo_query_one($sql);
    return $taikhoan;
}
function delete_tk($id_user){
    $sql="DELETE FROM users where id_user=".$id_user;
    pdo_execute($sql);
}
function checkuser($ten_dang_nhap,$mat_khau){
    $sql="SELECT * FROM users where email='".$ten_dang_nhap."'  and  password='".$mat_khau."' " ;
    $tk=pdo_query_one($sql); 
    return $tk;
}
function update_taikhoan($id_user,$fullname,$password,$phone,$email,$address,$role){
   $sql=" UPDATE users set fullname ='".$fullname."', password='".$password."' ,phone='".$phone."' , email='".$email."', address='".$address."', role='".$role."' where id_user=".$id_user;
   pdo_execute($sql);
//    var_dump($sql);
}
function checktaikhoan($ten_dang_nhap,$email){
    $sql="SELECT * FROM khach_hang where ten_dang_nhap='".$ten_dang_nhap."'  and  email='".$email."' " ;
    $tk=pdo_query_one($sql); 
    return $tk;
}
function login_user($email,$mat_khau){
    $sql="SELECT fullname, email, address, phone FROM users where email='".$email."'  and  password='".$mat_khau."' " ;
    $tk=pdo_query_one($sql); 
    return $tk;
}
function registerAcount($fullname, $email, $password, $username){
    $sql="INSERT INTO users(fullname,email, password, username,role) values('$fullname','$email','$password', '$username',0)";
    pdo_execute($sql);
}

function checkAccoutnExist($email, $username) {
    $sql="SELECT * FROM users where email='".$email."' OR username='". $username ."'" ;
    $tk=pdo_query_one($sql); 
    return $tk;
}
function check_role(){
    $sql = "SELECT role from users";
    $check_role = pdo_query($sql);
    return $check_role;
}
?>