<?php 
function insert_taikhoan($fullname,$username,$password,$phone,$email,$address,$role){
    $sql="INSERT INTO users(fullname,username,password,phone,email,address,role) values('$fullname','$username','$password','$phone','$email','$address','$role')";
    pdo_execute($sql);
    var_dump($sql);
}
function load_tk(){
    $sql = "SELECT * FROM users order by id_user desc";
    $listtaikhoan=pdo_query($sql);
    return $listtaikhoan;
}
function checkuser($ten_dang_nhap,$mat_khau){
    $sql="SELECT * FROM khach_hang where ten_dang_nhap='".$ten_dang_nhap."'  and  mat_khau='".$mat_khau."' " ;
    $tk=pdo_query_one($sql); 
    return $tk;
}
function update_taikhoan($ma_kh,$ten_kh,$ten_dang_nhap,$mat_khau,$email,$hinh){
    if($hinh!="")
    $sql="UPDATE khach_hang set ho_ten ='".$ten_kh."' , ten_dang_nhap='".$ten_dang_nhap."' , mat_khau='".$mat_khau."' , email='".$email."' , hinh='".$hinh."' where ma_kh=".$ma_kh;
   else
   $sql="UPDATE khach_hang set ho_ten ='".$ten_kh."' , ten_dang_nhap='".$ten_dang_nhap."' , mat_khau='".$mat_khau."' , email='".$email."'   where ma_kh=".$ma_kh;
   pdo_execute($sql);
}
function checktaikhoan($ten_dang_nhap,$email){
    $sql="SELECT * FROM khach_hang where ten_dang_nhap='".$ten_dang_nhap."'  and  email='".$email."' " ;
    $tk=pdo_query_one($sql); 
    return $tk;
}
?>