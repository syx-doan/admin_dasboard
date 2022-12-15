<?php
// $slider = mysqli_query($connect,"SELECT * from slider");

// // 1 tính tổng bảng ghi của bảng
// $total = mysqli_num_rows($slider);
// // var_dump($total);

// // 2 thiết lập số bảng ghi trong 1 trang
// $row = 5;

// // 3 tính số trang
// $pages = ceil($total/$row);
// // var_dump($pages);

// if (isset($_GET['pagel'])) {
//     $page = $_GET['pagel'];
// }else{
//     $page = 1 ; 
// }
// $from = ($pages - 1) * $row; 
// $sql = mysqli_query($connect,"SELECT * from slider order by id_slider  limit $from,$row");
// ?>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-column">
        <h6 class="m-0 font-weight-bold text-primary">Slide</h6>
        <div>
            <a href="index.php?act=add-slider"><button class="btn btn-primary mt-2">Thêm</button></a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Title</th>
                        <th>Desscript</th>
                        <th>image</th>
                        <th>Acction</th>
                    </tr>
                </thead>
                <?php foreach ($listslider as $slider) {
               extract($slider);
               $xoasl="index.php?act=xoasl&id=".$id_slider;
               $suasl="index.php?act=suasl&id=".$id_slider;
               $img = "./upload/slider/" . $image;
               if (is_file($img)) {
                   $image = "<img src='" . $img . "' height='80px'>";
               } else {
                   $image = " <img src='" . $img . "' height='80px'> NO IMAGES";
               }
               echo '
               <tbody>
                    <tr>
                        <td>'.$id_slider.'</td>
                        <td>'.$title.'</td>
                        <td>'.$description.'</td>
                        <td>'.$image.'</td>
                        <td>
                            <a style="color:green ;" href="'.$suasl.'"> <i class="fa fa-pen">sửa</i></a>
                            -
                            <a style="color:red ;" href="'.$xoasl.'"> <i class="fa fa-trash"> xóa</i></a>
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
                <!-- <?php for($i=1;$i<=$pages;$i++){?>
                <li class="page-item"><a class="page-link" href="index.php?pagel=<?php echo $i?>"><?php echo $i ?></a></li>
                <?php } ?> -->
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>