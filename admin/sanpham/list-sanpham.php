<?php
$products = mysqli_query($connect,"SELECT * from products");

// 1 tính tổng bảng ghi của bảng
$total = mysqli_num_rows($products);
// var_dump($total);

// 2 thiết lập số bảng ghi trong 1 trang
$row = 5;

// 3 tính số trang
$pages = ceil($total/$row);
// var_dump($pages);

if (isset($_GET['pagepr'])) {
    $page = $_GET['pagepr'];
}else{
    $page = 1 ; 
}
$from = ($pages - 1) * $row; 
$sql = mysqli_query($connect,"SELECT * FROM category,products,brand where  products.brand_id = brand.id_brand and products.category_id=category.id_category order by id_product limit $from,$row");
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Danh Mục Sản Phẩm
        </h6>
        <div>
            <a href="index.php?act=add-sanpham"><button class="btn btn-primary mt-2">Thêm</button></a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Ảnh</th>
                        <th>Giá Tiền</th>
                        <th>Thương hiệu</th>
                        <th>Loại</th>
                        <th>Số Lượng</th>
                        <th>Mô tả</th>
                        <th>Ưu đãi</th>
                        <th>Action</th>
                    </tr>
                </thead>
            <?php 
            foreach($listsanpham as $sanpham){
                extract($sanpham);
                $xoasp="index.php?act=xoasp&id=".$id_product;
                $suasp="index.php?act=suasp&id=".$id_product;
                $img = "./upload/product/".$image;
                if(is_file($img)){
                  $image = "<img src='".$img."' height='80px'>";
                }else{
                  $image =" <img src='".$img."' height='80px'> NO IMAGES";
                }
                echo '
                <tbody>
                    <tr>
                        <td>'.$id_product.'</td>
                        <td>'.$name.'</td>
                        <td>'.$image.'</td>
                        <td>'.$price.'<sup>vnđ</sup></td>
                        <td>'.$name_brand.'</td>
                        <td>'.$name_category.'</td>
                        <td>'.$quantity.'</td>
                        <td>'.$description.'</td>
                        <td>'.$sale.'%</td>
                        <td>
                            <a style="color:green ;" href="'.$suasp.'"> <i class="fa fa-pen">sửa</i></a>
                            -
                            <a style="color:red ;" href="'.$xoasp.'"> <i class="fa fa-trash"> xóa</i></a>
                        </td>
                    </tr>
                </tbody>
                ';
            }
            
            ?>
                
            </table>
        </div>
        <nav aria-label="Page navigation example " class="float-right">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <?php for($i=1;$i<=$pages;$i++){?>
                <li class="page-item"><a class="page-link" href="index.php?pagepr=<?php echo $i?>"><?php echo $i ?></a></li>
                <?php } ?>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>