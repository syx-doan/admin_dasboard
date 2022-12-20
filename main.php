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
include './dao/slider.php';
include './connect.php';
include './dao/binhluan.php';

// Controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        // ------------------------------------------------------------ Thương hiệu ------------------------------------------------------------ //
        case 'thuonghieu':
            $listbrand = load_all_thuonghieu();
            include './admin/thuonghieu/list-thuonghieu.php';
            break;
        // thêm thương hiệu
        case 'add-thuonghieu':
            if (isset($_POST['btnAddthuonghieu'])) {
                $name_brand = $_POST['inputnameth'];
                $image_brand = $_FILES['inputimageth']['name'];
                $target_dir = "./upload/thuonghieu/";
                $target_file = $target_dir . basename($_FILES["inputimageth"]["name"]);
                if (move_uploaded_file($_FILES["inputimageth"]["tmp_name"], $target_file)) {
                } else {
                }
                insert_thuonghieu($name_brand, $image_brand);
                echo '<script>alert("Thêm thành công");location="index.php?act=thuonghieu";</script>';
            }
            include './admin/thuonghieu/add-thuonghieu.php';
            break;
        // sửa thương hiệu 
        case 'suath':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $brand = load_one_thuonghieu($_GET['id']);
            }
            include './admin/thuonghieu/edit-thuonghieu.php';
            break;
        // xóa thương hiệu    
        case 'xoath':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_thuonghieu($_GET['id']);
            }
            $listbrand = load_all_thuonghieu();
            include './admin/thuonghieu/list-thuonghieu.php';
            break;
        // update thương hiệu    
        case 'updateth':
            if (isset($_POST['btnUpdatethuonghieu'])) {
                $id_brand = $_POST['id'];
                $name_brand = $_POST['inputnameth'];
                $image_brand = $_FILES['inputimageth']['name'];
                // xử lí upload hình ảnh
                $target_dir = "./upload/thuonghieu/";
                $target_file = $target_dir . basename($_FILES["inputimageth"]["name"]);
                if (move_uploaded_file($_FILES["inputimageth"]["tmp_name"], $target_file)) {
                } else {
                }
                update_thuonghieu($id_brand, $name_brand, $image_brand);
                echo '<script>alert("Update thành công")</script>';
            }
            $listbrand = load_all_thuonghieu();
            include './admin/thuonghieu/list-thuonghieu.php';
            break;

        // ------------------------------------------------------------ Slider ------------------------------------------------------------ //
        case 'slider':
            $listslider = load_all_slider();
            include './admin/slider/list-slider.php';
            break;
        // thêm slider
        case 'add-slider':
            if (isset($_POST['btnAddSlider'])) {
                $title = $_POST['inputTitle'];
                $image = $_FILES['inputImagesl']['name'];
                $description = $_POST['inputDescription'];
                $target_dir = "./upload/slider/";
                $target_file = $target_dir . basename($_FILES["inputImagesl"]["name"]);
                if (move_uploaded_file($_FILES["inputImagesl"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                insert_slider($title, $image, $description);
                echo '<script>alert("Thêm thành công");location="index.php?act=slider";</script>';
            }
            include './admin/slider/add-slider.php';
            break;
        // sửa slider
        case 'suasl':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $slider = load_one_slider($_GET['id']);
            }
            include './admin/slider/edit-slider.php';
            break;
        // xóa slider
        case 'xoasl':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                delete_slider($_GET['id']);
            }
            $listslider = load_all_slider();
            include './admin/slider/list-slider.php';
            break;
        //update slider
        case 'updatesl':
            if (isset($_POST['btnUpdateslider'])) {
                $id_slider = $_POST['id'];
                $title = $_POST['inputTitle'];
                $image = $_FILES['inputImagesl']['name'];
                $description = $_POST['inputDescription'];
                // xử lí upload hình ảnh
                $target_dir = "./upload/slider/";
                $target_file = $target_dir . basename($_FILES["inputImagesl"]["name"]);
                if (move_uploaded_file($_FILES["inputImagesl"]["tmp_name"], $target_file)) {
                } else {
                }
                update_slider($id_slider, $title, $image, $description);
                echo '<script>alert("Update thành công")</script>';
            }
            $listslider = load_all_slider();
            include './admin/slider/list-slider.php';
            break;

        // ------------------------------------------------------------ Loại ------------------------------------------------------------ //     
        case 'loai':
            $listloai = load_all_category();
            include './admin/loai/list-loai.php';
            break;
        // thêm loại    
        case 'add-loai':
            if (isset($_POST['btnAddloai'])) {
                $name_category = $_POST['inputName'];
                insert_category($name_category);
                echo '<script>alert("Thêm thành công");location="index.php?act=loai";</script>';
            }
            include './admin/loai/add-loai.php';
            break;
        // sửa slider
        case 'sual':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $loai = load_one_category($_GET['id']);
            }
            include './admin/loai/edit-loai.php';
            break;
        // xóa loại
        case 'xoal':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_category($_GET['id']);
            }
            $listloai = load_all_category();
            include './admin/loai/list-loai.php';
            break;
        // update loại
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

        // ------------------------------------------------------------ Tài khoản ------------------------------------------------------------ //
        case 'taikhoan':
            $listtaikhoan = load_tk();
            include './admin/taikhoan/list-taikhoan.php';
            break;
        // thêm tài khoản
        case 'add-taikhoan':
            if (isset($_POST['btnAddUser'])) {
                $fullname = $_POST['inputFullName'];
                $image = $_FILES['inputImage']['name'];
                $password = $_POST['inputPassword'];
                $phone = $_POST['inputPhone'];
                $email = $_POST['inputEmail'];
                $role = $_POST['inputVaitro'];
                // xử lí upload hình ảnh
                $target_dir = "./upload/users/";
                $target_file = $target_dir . basename($_FILES["inputImage"]["name"]);
                if (move_uploaded_file($_FILES["inputImage"]["tmp_name"], $target_file)) {
                } else {
                }
                insert_taikhoan($fullname, $image, $password, $phone, $email, $role);
                echo '<script>alert("Thêm thành công");location="index.php?act=taikhoan";</script>';
            }
            $listtaikhoan = load_tk();
            include './admin/taikhoan/add-taikhoan.php';
            break;
        // sửa tài khoản 
        case 'suatk':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $taikhoan = load_one_tk($_GET['id']);
            }
            $listtaikhoan = load_tk();
            include './admin/taikhoan/edit-taikhoan.php';
            break;
        // xóa tài khoản
        case 'xoatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_tk($_GET['id']);
            }
            $listtaikhoan = load_tk();
            include './admin/taikhoan/list-taikhoan.php';
            break;
        // update tài khoản    
        case 'updatetk':
            if (isset($_POST['btnUpdateUser'])) {
                $id_user = $_POST['id'];
                $fullname = $_POST['inputFullName'];
                $image = $_FILES['inputImage']['name'];
                $password = $_POST['inputPassword'];
                $phone = $_POST['inputPhone'];
                $email = $_POST['inputEmail'];
                $role = $_POST['inputVaitro'];
                // xử lí upload hình ảnh
                $target_dir = "./upload/users/";
                $target_file = $target_dir . basename($_FILES["inputImage"]["name"]);
                if (move_uploaded_file($_FILES["inputImage"]["tmp_name"], $target_file)) {
                } else {
                }
                update_taikhoan($id_user, $fullname, $image, $password, $phone, $email, $role);
                echo '<script>alert("Update thành công")</script>';
            }
            $listtaikhoan = load_tk();
            include './admin/taikhoan/list-taikhoan.php';
            break;

        // ------------------------------------------------------------ Sản phẩm ------------------------------------------------------------ //
        case 'sanpham':
            $listsanpham = load_sanpham();
            include './admin/sanpham/list-sanpham.php';
            break;
        // thêm sản phẩm
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
                // xử lí upload hình ảnh
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
                $sql = "INSERT INTO products(name,category_id,brand_id,image,price,quantity,description,sale) values('$name','$category_id','$brand_id','$image','$price','$quantity','$description','$sale')";
                $query = mysqli_query($connect, $sql);
                $id_product = mysqli_insert_id($connect);
                // xử lí hình ảnh mô tả của sản phẩm
                foreach ($file_names as $key => $value) {
                    mysqli_query($connect, "INSERT INTO product_image(id_product,image) VALUES('$id_product','$value')");
                }
                echo '<script>alert("Thêm thành công");location="index.php?act=sanpham";</script>';
            }
            $listloai = load_all_category_product();
            $listbrand = load_all_thuonghieu_products();
            include './admin/sanpham/add-sanpham.php';
            break;
        // sửa sản phẩm
        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                // $sanpham =load_one_sanpham($_GET['id']);
                $id_product = $_GET['id'];
                $sanpham = mysqli_query($connect, "SELECT * from products where id_product = $id_product");
                $data = mysqli_fetch_assoc($sanpham);
            }
            $listloai = load_all_category_product();
            $listbrand = load_all_thuonghieu_products();
            include './admin/sanpham/edit-sanpham.php';
            break;
        // xóa sản phẩm
        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            $listsanpham = load_sanpham();
            include './admin/sanpham/list-sanpham.php';
            break;
        // update sản phẩm
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
                // update ảnh chính nếu ảnh không thay đổi thì sẽ lấy giá trị trước khi update
                if (isset($_FILES['inputImage'])) {
                    $file = $_FILES['inputImage'];
                    $file_name = $file['name'];
                    $old_image = $_POST['old_image'];
                    if (empty($file_name)) {
                        $image = $old_image;
                    } else {
                        move_uploaded_file($file['tmp_name'], './upload/product/' . $file_name);
                    }
                }
                // ảnh mô tả nếu ảnh không thay đổi thì sẽ lấy giá trị trước khi update
                if (isset($_FILES['inputImageMT'])) {
                    $files = $_FILES['inputImageMT'];
                    $file_names = $files['name'];
                    if (!empty($file_names[0])) {
                        mysqli_query($connect, "DELETE  from product_image where id_product=$id_product");
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
                echo '<script>alert("sửa thành công");location="index.php?act=sanpham";</script>';
            }
            break;

        // ------------------------------------------------------------ Đơn hàng ------------------------------------------------------------ //
        case 'donhang':
            $list_donhang = load_all_donhang();
            include './admin/donhang/list-donhang.php';
            break;
        // đơn hàng chi tiết 
        case 'xemchitiet':
            if (isset($_GET['id'])) {
                $loadtrangthaidonhang = load_trangthaidonhang($_GET['id']);
            }
            include './admin/donhang/edit-donhang.php';
            break;
        // update trạng thái đơn hàng : đang xử lí, đang giao, đã hủy     
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
            $layprice = layprice($_GET['id']);
            include './admin/donhang/list-donhangchitiet.php';
            break;
        // ------------------------------------------------------------ Bình luận ------------------------------------------------------------ //   
        case 'binhluan':
            $listcomment = load_bl(0);
            include './admin/binhluan/list-binhluan.php';
            break;
        // bình luận chi tiết     
        case 'binhluanchitiet':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $loadblct = load_blct($_GET['id']);
            }

            include './admin/binhluan/list-binhluanchitiet.php';
            break;
        // xóa bình luận 
        case 'xoabl':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_bl($_GET['id']);
            }
            echo '<script>alert("Xóa thành công");location="index.php?act=binhluan";</script>';
            include './admin/binhluan/list-binhluanchitiet.php';
            break;

        // ------------------------------------------------------------ Tin tức ------------------------------------------------------------ //
        case 'tintuc':
            $list_news = load_all_news();
            include './admin/tintuc/list-tintuc.php';
            break;
        // thêm tin tức     
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
                insert_news($title, $image, $content, $date);
                echo '<script>alert("Thêm thành công");location="index.php?act=tintuc";</script>';
            }
            include './admin/tintuc/add-tintuc.php';
            break;
        // sửa tin tức     
        case 'suan':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $news = load_one_news($_GET['id']);
            }
            include './admin/tintuc/edit-tintuc.php';
            break;
        // update tin tức    
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
                update_news($id_news, $title, $image, $content, $date);
                echo '<script>alert("Sửa thành công");location="index.php?act=tintuc";</script>';
            }
            include './admin/tintuc/add-tintuc.php';
            break;
        // xóa tin tức     
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

    // ------------------------------------------------------------ Phân trang $ tìm kiếm ------------------------------------------------------------ //
} else if ((isset($_GET['pagel'])) || (isset($_GET['searchl']))) {
    $listloai = load_all_category();
    include './admin/loai/list-loai.php';
} else if ((isset($_GET['paget'])) || (isset($_GET['searcht']))) {
    $listbrand = load_all_thuonghieu();
    include './admin/thuonghieu/list-thuonghieu.php';
} else if ((isset($_GET['pagetk'])) || (isset($_GET['searchtk']))) {
    $listtaikhoan = load_tk();
    include './admin/taikhoan/list-taikhoan.php';
} else if ((isset($_GET['pagepr'])) || (isset($_GET['searchp']))) {
    $listsanpham = load_sanpham();
    include './admin/sanpham/list-sanpham.php';
} else if ((isset($_GET['pagett'])) || (isset($_GET['searchtt'])) ) {
    $list_news = load_all_news();
    include './admin/tintuc/list-tintuc.php';
} else if (isset($_GET['pagecmt'])) {
    $listcomment = load_bl(0);
    include './admin/binhluan/list-binhluan.php';
} else if ((isset($_GET['pagedh'])) || (isset($_GET['searchdh'])) ) {
    $list_donhang = load_all_donhang();
    include './admin/donhang/list-donhang.php';
} else if ((isset($_GET['pagesl'])) || (isset($_GET['searchsl'])) ) {
    $listslider = load_all_slider();
    include './admin/slider/list-slider.php';
} else if (isset($_GET['search'])) {

} else {
    // ------------------------------------------------------------ Thống kê ------------------------------------------------------------ //
    $listthongke = load_thongke();
    $listloai = load_all_category_product();
    include './admin/thongke/list-thongke.php';
}