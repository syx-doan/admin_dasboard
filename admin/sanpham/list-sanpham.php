<?php
require './connect.php';


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
                        <td>'.$price.'</td>
                        <td>'.$name_brand.'</td>
                        <td>'.$name_category.'</td>
                        <td>'.$quantity.'</td>
                        <td>'.$description.'</td>
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
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>