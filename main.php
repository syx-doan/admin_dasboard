<?php
include './dao/pdo.php';
include './dao/loai.php';
include './dao/thuonghieu.php';
// include './dao/hang-hoa.php';
include './dao/taikhoan.php';
// include './dao/thong-ke.php';
// include './dao/binh-luan.php';
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
        //Thương hiệu 
        case 'thuonghieu':
                $listbrand = load_all_thuonghieu();
                include './admin/thuonghieu/list-thuonghieu.php';
                break;
        case 'add-thuonghieu':
                if(isset($_POST['btnAddthuonghieu'])){
                        $name_brand = $_POST['inputnameth'];
                        $image_brand =$_FILES['inputimageth']['name'];
                        $target_dir = "./upload/thuonghieu/";
                        $target_file = $target_dir . basename($_FILES["inputimageth"]["name"]);
                        if (move_uploaded_file($_FILES["inputimageth"]["tmp_name"], $target_file)) {
                            // echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
                          } else {
                            // echo "Sorry, there was an error uploading your file.";
                          }
                        insert_thuonghieu($name_brand,$image_brand);
                        echo '<script>alert("Thêm thành công");location="index.php?act=thuonghieu";</script>';
                        }
                include './admin/thuonghieu/add-thuonghieu.php';
                break;
        case 'suath' :
                if(isset($_GET['id'])&& ($_GET['id'])>0) {
                        $brand =load_one_thuonghieu($_GET['id']);
                }
                // $listbrand = load_all_thuonghieu();
                
                include './admin/thuonghieu/edit-thuonghieu.php';
                break;  
        case 'xoath' :
                if(isset($_GET['id'])&&($_GET['id'] > 0)){
                                delete_thuonghieu($_GET['id']);
                        }
                        $listbrand = load_all_thuonghieu();       
                include './admin/thuonghieu/list-thuonghieu.php';
                break;             
        case 'updateth' :
                if(isset($_POST['btnUpdatethuonghieu'])){
                        $id_brand = $_POST['id'];
                        $name_brand = $_POST['inputnameth'];
                        $image_brand =$_FILES['inputimageth']['name'];
                        $target_dir = "./upload/thuonghieu/";
                        $target_file = $target_dir . basename($_FILES["inputimageth"]["name"]);
                        if (move_uploaded_file($_FILES["inputimageth"]["tmp_name"], $target_file)) {
                            // echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
                          } else {
                            // echo "Sorry, there was an error uploading your file.";
                          }
                          update_thuonghieu($id_brand,$name_brand,$image_brand);
                         echo '<script>alert("Update thành công")</script>';
                        }
                        $listbrand = load_all_thuonghieu();       
                include './admin/thuonghieu/list-thuonghieu.php';
                break;  
                      
        // Loại
        case 'loai':
                $listloai = load_all_category();
                include './admin/loai/list-loai.php';
                break;
        case 'add-loai':
                if(isset($_POST['btnAddloai'])){
                        $name = $_POST['inputName'];
                        insert_category($name);
                        echo '<script>alert("Thêm thành công");location="index.php?act=loai";</script>';
                        }
                include './admin/loai/add-loai.php';
                break;
        case 'sual' :
                if(isset($_GET['id'])&& ($_GET['id'])>0) {
                        $loai =load_one_category($_GET['id']);
                        }
                include './admin/loai/edit-loai.php';
                break;  
        case 'xoal' :
                if(isset($_GET['id'])&&($_GET['id'] > 0)){
                        delete_category($_GET['id']);
                        }
                        $listloai = load_all_category();     
                include './admin/loai/list-loai.php';
                break;             
        case 'updatel' :
                if(isset($_POST['btnUpdateloai'])){
                $id_category = $_POST['id'];    
                $name = $_POST['inputName'];
                        update_category($id_category,$name);
                        echo '<script>alert("Update thành công")</script>';
                }
                $listloai = load_all_category();    
                include './admin/loai/list-loai.php';
                break;  
                              
        // Tài khoản
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
                echo '<script>alert("Thêm thành công");location="index.php?act=taikhoan";</script>';
              }
               $listtaikhoan = load_tk();
                include './admin/taikhoan/add-taikhoan.php';
                break;
        case 'suatk' :
                if(isset($_GET['id'])&& ($_GET['id'])>0) {
                        $taikhoan =load_one_tk($_GET['id']);
                }
                $listtaikhoan = load_tk();
                include './admin/taikhoan/edit-taikhoan.php';
                break;  
        case 'xoatk' :
                if(isset($_GET['id'])&&($_GET['id'] > 0)){
                        delete_tk($_GET['id']);
                      }
                $listtaikhoan = load_tk();      
                include './admin/taikhoan/list-taikhoan.php';
                break;             
        case 'updatetk' :
                if(isset($_POST['btnUpdateUser']) ){
                        $id_user = $_POST['id'];
                        $fullname = $_POST['inputFullName'];
                        $username = $_POST['inputUser'];
                        $password = $_POST['inputPassword'];
                        $phone = $_POST['inputPhone'];
                        $email = $_POST['inputEmail'];
                        $address = $_POST['inputAddress'];
                        $role = $_POST['inputVaitro'];
                        update_taikhoan($id_user,$fullname,$username,$password,$phone,$email,$address,$role);
                        // var_dump($fullname,$username,$password,$phone,$email,$address,$role);
                        echo '<script>alert("Update thành công")</script>';
                      }
                      $listtaikhoan = load_tk();
                        include './admin/taikhoan/list-taikhoan.php';
                        break;  
        case 'search':
                if(isset($_POST['kyw'])&&($_POST['kyw'])!=""){
                        $kyw=$_POST['kyw'];
                     }else{
                         $kyw="";    
                     }
                $sql = "SELECT * from users where users.user LIKE '%".$kyw."'";
                include './admin/taikhoan/list-taikhoan.php';
                break;                                   
        
        
        // sản phẩm
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