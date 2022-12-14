<?php
include './helper/helper.php';
include './dao/pdo.php';
include './dao/loai.php';
include './dao/tintuc.php';
include './dao/thuonghieu.php';
include './dao/thongke.php';
include './dao/sanpham.php';
include './dao/taikhoan.php';
include './dao/donhang.php';
include './connect.php';
// include './admin/loai/list-loai.php';
// include './dao/thong-ke.php';
// include './admin/loai/list-loai.php';
include './dao/binhluan.php';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        //Thương hiệu 
        case 'thuonghieu':
            $listbrand = load_all_thuonghieu();
            include './admin/thuonghieu/list-thuonghieu.php';
            break;
        case 'add-thuonghieu':
            if (isset($_POST['btnAddthuonghieu'])) {
                $name_brand = $_POST['inputnameth'];
                $image_brand = $_FILES['inputimageth']['name'];
                $target_dir = "./upload/thuonghieu/";
                $target_file = $target_dir . basename($_FILES["inputimageth"]["name"]);
                if (move_uploaded_file($_FILES["inputimageth"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                insert_thuonghieu($name_brand, $image_brand);
                echo '<script>alert("Thêm thành công");location="index.php?act=thuonghieu";</script>';
            }
            include './admin/thuonghieu/add-thuonghieu.php';
            break;
        case 'suath':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $brand = load_one_thuonghieu($_GET['id']);
            }
            // $listbrand = load_all_thuonghieu();

            include './admin/thuonghieu/edit-thuonghieu.php';
            break;
        case 'xoath':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_thuonghieu($_GET['id']);
            }
            $listbrand = load_all_thuonghieu();
            include './admin/thuonghieu/list-thuonghieu.php';
            break;
        case 'updateth':
            if (isset($_POST['btnUpdatethuonghieu'])) {
                $id_brand = $_POST['id'];
                $name_brand = $_POST['inputnameth'];
                $image_brand = $_FILES['inputimageth']['name'];
                $target_dir = "./upload/thuonghieu/";
                $target_file = $target_dir . basename($_FILES["inputimageth"]["name"]);
                if (move_uploaded_file($_FILES["inputimageth"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                update_thuonghieu($id_brand, $name_brand, $image_brand);
                echo '<script>alert("Update thành công")</script>';
            }
            $listbrand = load_all_thuonghieu();
            include './admin/thuonghieu/list-thuonghieu.php';
            break;
        // Loại       
        case 'loai':
            $listloai = load_all_category();
            // $nav = navigation();
            include './admin/loai/list-loai.php';
            break;
        case 'add-loai':
            if (isset($_POST['btnAddloai'])) {
                $name_category = $_POST['inputName'];
                insert_category($name_category);
                echo '<script>alert("Thêm thành công");location="index.php?act=loai";</script>';
            }
            include './admin/loai/add-loai.php';
            break;
        case 'sual':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $loai = load_one_category($_GET['id']);
            }
            include './admin/loai/edit-loai.php';
            break;
        case 'xoal':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_category($_GET['id']);
            }
            $listloai = load_all_category();
            include './admin/loai/list-loai.php';
            break;
        case 'updatel':
            if (isset($_POST['btnUpdateloai'])) {
                $id_category = $_POST['id'];
                $name_category = $_POST['inputName'];
                update_category($id_category, $name_category);
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
            if (isset($_POST['btnAddUser'])) {
                $fullname = $_POST['inputFullName'];
                $password = $_POST['inputPassword'];
                $phone = $_POST['inputPhone'];
                $email = $_POST['inputEmail'];
                $address = $_POST['inputAddress'];
                $role = $_POST['inputVaitro'];
                insert_taikhoan($fullname, $password, $phone, $email, $address, $role);
                echo '<script>alert("Thêm thành công");location="index.php?act=taikhoan";</script>';
            }
            $listtaikhoan = load_tk();
            include './admin/taikhoan/add-taikhoan.php';
            break;
        case 'suatk':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $taikhoan = load_one_tk($_GET['id']);
            }
            $listtaikhoan = load_tk();
            include './admin/taikhoan/edit-taikhoan.php';
            break;
        case 'xoatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_tk($_GET['id']);
            }
            $listtaikhoan = load_tk();
            include './admin/taikhoan/list-taikhoan.php';
            break;
        case 'updatetk':
            if (isset($_POST['btnUpdateUser'])) {
                $id_user = $_POST['id'];
                $fullname = $_POST['inputFullName'];
                $password = $_POST['inputPassword'];
                $phone = $_POST['inputPhone'];
                $email = $_POST['inputEmail'];
                $address = $_POST['inputAddress'];
                $role = $_POST['inputVaitro'];
                update_taikhoan($id_user, $fullname,$password, $phone, $email, $address, $role);
                // var_dump($fullname,$username,$password,$phone,$email,$address,$role);
                echo '<script>alert("Update thành công")</script>';
            }
            $listtaikhoan = load_tk();
            include './admin/taikhoan/list-taikhoan.php';
            break;
        case 'search':
            if (isset($_POST['kyw']) && ($_POST['kyw']) != "") {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            $sql = "SELECT * from users where users.user LIKE '%" . $kyw . "'";
            include './admin/taikhoan/list-taikhoan.php';
            break;


        // sản phẩm
        case 'sanpham':
            $listsanpham = load_sanpham();
            include './admin/sanpham/list-sanpham.php';
            break;
        case 'add-sanpham':
            if (isset($_POST['btnAddSanpham'])) {
                $name = $_POST['inputName'];
                $category_id = $_POST['inputLoai'];
                $brand_id = $_POST['inputThuonghieu'];
                $image = $_FILES['inputImage']['name'];
                $price = $_POST['inputPrice'];
                $quantity = $_POST['inputQuantity'];
                $description = $_POST['inputDescription'];
                $sale = $_POST['sale'];
                if (isset($_FILES['inputImage'])) {
                    $file = $_FILES['inputImage'];
                    $file_name = $file['name'];
                    move_uploaded_file($file['tmp_name'], './upload/product/' . $file_name);
                }
                if (isset($_FILES['inputImageMT'])) {
                    $files = $_FILES['inputImageMT'];
                    $file_names = $files['name'];
                    foreach ($file_names as $key => $value) {
                        move_uploaded_file($files['tmp_name'][$key], './upload/product/' . $value);
                    }
                }
                //  die();
                $sql = "INSERT INTO products(name,category_id,brand_id,image,price,quantity,description,sale) values('$name','$category_id','$brand_id','$image','$price','$quantity','$description','$sale')";
                $query = mysqli_query($connect, $sql);
                $id_product = mysqli_insert_id($connect);
                //        var_dump($id_product);die();
                foreach ($file_names as $key => $value) {
                    mysqli_query($connect, "INSERT INTO product_image(id_product,image) VALUES('$id_product','$value')");
                }
                echo '<script>alert("Thêm thành công");location="index.php?act=sanpham";</script>';
            }


            $listloai = load_all_category();
            $listbrand = load_all_thuonghieu();
            include './admin/sanpham/add-sanpham.php';
            break;
        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                // $sanpham =load_one_sanpham($_GET['id']);
                $id_product = $_GET['id'];
                $sanpham = mysqli_query($connect, "SELECT * from products where id_product = $id_product");
                $data = mysqli_fetch_assoc($sanpham);
            }
            $listloai = load_all_category();
            $listbrand = load_all_thuonghieu();
            include './admin/sanpham/edit-sanpham.php';
            break;
        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            $listsanpham = load_sanpham();
            include './admin/sanpham/list-sanpham.php';
            break;
        case 'updatesp':
            if (isset($_POST['btnUpdateSanpham'])) {
                $id_product = $_POST['id'];
                $name = $_POST['inputName'];
                $category_id = $_POST['inputLoai'];
                $brand_id = $_POST['inputThuonghieu'];
                $image = $_FILES['inputImage']['name'];
                $price = $_POST['inputPrice'];
                $quantity = $_POST['inputQuantity'];
                $description = $_POST['inputDescription'];
                $sale = $_POST['sale'];
                // echo "<pre>";
                // print_r($_FILES);
                // var_dump(empty($_FILES['inputImage']['name']));
                // die();

                // ảnh chính
                if (isset($_FILES['inputImage'])) {
                    $file = $_FILES['inputImage'];
                    $file_name = $file['name'];
                    $old_image = $_POST['old_image'];
                    //        var_dump($file['size']);die();
                    if (empty($file_name)) {
                        $image = $old_image;
                    } else {
                        move_uploaded_file($file['tmp_name'], './upload/product/' . $file_name);
                    }
                }
                // ảnh mô tả
                if (isset($_FILES['inputImageMT'])) {
                    $files = $_FILES['inputImageMT'];
                    $file_names = $files['name'];
                    if (!empty($file_names[0])) {
                        mysqli_query($connect, "DELETE  from product_image where id_product=$id_product");
                        //   die(); 
                        foreach ($file_names as $key => $value) {
                            move_uploaded_file($files['tmp_name'][$key], './upload/product/' . $value);
                        }
                        foreach ($file_names as $key => $value) {
                            mysqli_query($connect, "INSERT INTO product_image(id_product,image) VALUES('$id_product','$value')");
                        }
                    }
                }
                $sql = "UPDATE products set name='$name', category_id = '$category_id', brand_id='$brand_id',image='$image',price='$price',quantity='$quantity',description='$description',sale='$sale' where id_product=$id_product";
                $query = mysqli_query($connect, $sql);
                //        $id_product = mysqli_insert_id($connect);
                // var_dump($sql);die();
                echo '<script>alert("sửa thành công");location="index.php?act=sanpham";</script>';
            }
            break;
        case 'donhang':
            $list_donhang = load_all_donhang();
            include './admin/donhang/list-donhang.php';
            break;
        case 'xemchitiet':
            if (isset($_GET['id'])) {
                $loadtrangthaidonhang = load_trangthaidonhang($_GET['id']);
            }
            include './admin/donhang/edit-donhang.php';
            break;
        case 'updatetrangthai':
            if (isset($_POST['btnUpdatetrangthai'])) {
                $id_bill = $_POST['id_bill'];
                $id_user = $_POST['id_user'];
                $fullname = $_POST['inputName'];
                $status = $_POST['inputTrangthai'];
                $address = $_POST['inputAddress'];
                updateTrangthai($id_bill, $id_user, $fullname, $status, $address);
                echo '<script>alert("Update thành công");location="index.php?act=donhang";</script>';
            }
            break;
        case 'donhangchitiet':
            if (isset($_GET['id'])) {
                $listdonhangchitiet = load_one_donhang($_GET['id']);
            }
            // $list_news = load_all_news();
            $layprice = layprice($_GET['id']);
            include './admin/donhang/list-donhangchitiet.php';
            break;
        case 'binhluan':
            $listcomment = load_bl(0);
            include './admin/binhluan/list-binhluan.php';
            break;
        case 'binhluanchitiet':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $loadblct = load_blct($_GET['id']);
            }

            include './admin/binhluan/list-binhluanchitiet.php';
            break;
        case 'xoabl':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_bl($_GET['id']);
            }
            echo '<script>alert("Xóa thành công");location="index.php?act=binhluan";</script>';
            include './admin/binhluan/list-binhluanchitiet.php';
            break;
        case 'tintuc':
            $list_news = load_all_news();
            include './admin/tintuc/list-tintuc.php';
            break;
        case 'add-tintuc':
            if (isset($_POST['btnAddnews'])) {
                $title = $_POST['inputTitle'];
                $image = $_FILES['inputimagenews']['name'];
                $content = $_POST['inputContent'];
                $date = $_POST['inputDate'];
                $target_dir = "./upload/news/";
                $target_file = $target_dir . basename($_FILES["inputimagenews"]["name"]);
                if (move_uploaded_file($_FILES["inputimagenews"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                insert_news($title, $image, $content, $date) ;
                echo '<script>alert("Thêm thành công");location="index.php?act=tintuc";</script>';
            }
            include './admin/tintuc/add-tintuc.php';
            break;
        case 'suan':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $news = load_one_news($_GET['id']);
            }
            // $list_news = load_all_news();
            include './admin/tintuc/edit-tintuc.php';
            break;
        case 'updateNews':
            if (isset($_POST['btnAddnews'])) {
                $id_news = $_POST['id'];
                $title = $_POST['inputTitle'];
                $image = $_FILES['inputimagenews']['name'];
                $content = $_POST['inputContent'];
                $date = $_POST['inputDate'];
                if (isset($_FILES['inputimagenews'])) {
                    $file = $_FILES['inputimagenews'];
                    $file_name = $file['name'];
                    $old_image = $_POST['old_image'];
                    //        var_dump($file['size']);die();
                    if (empty($file_name)) {
                        $image = $old_image;
                    } else {
                        move_uploaded_file($file['tmp_name'], './upload/news/' . $file_name);
                    }
                }
                update_news($id_news, $title, $image, $content,$date);
                echo '<script>alert("Sửa thành công");location="index.php?act=tintuc";</script>';
            }
            include './admin/tintuc/add-tintuc.php';
            break;
        case 'xoan':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                delete_news($_GET['id']);
            }
            $list_news = load_all_news();
            include './admin/tintuc/list-tintuc.php';
            break;
        default:
            include './admin/thongke/list-thongke.php';
    }
} else if (  (isset($_GET['pagel']))  ) {
    $listloai = load_all_category();
    include './admin/loai/list-loai.php';
} else if ( (isset($_GET['paget'])) || (isset($_GET['searcht']))  ) {
    $listbrand = load_all_thuonghieu();
    include './admin/thuonghieu/list-thuonghieu.php';
} else if (isset($_GET['pagetk'])) {
    $listtaikhoan = load_tk();
    include './admin/taikhoan/list-taikhoan.php';
} else if ( (isset($_GET['pagepr'])) || (isset($_GET['searchp']))   ) {
    $listsanpham = load_sanpham();
    include './admin/sanpham/list-sanpham.php';
} else if (isset($_GET['pagett'])) {
    $list_news = load_all_news();
    include './admin/tintuc/list-tintuc.php';
} else if (isset($_GET['pagecmt'])) {
    $listcomment = load_bl(0);
    include './admin/binhluan/list-binhluan.php';
} else if (isset($_GET['pagedh'])) {
    $list_donhang = load_all_donhang();
    include './admin/donhang/list-donhang.php';
}else if (isset($_GET['search'])){

} else {
    $quantityproducts=load_quantity_product();
    include './admin/thongke/list-thongke.php';
}