<?php
$brand = mysqli_query($connect, "SELECT * from brand");
// 1 tính tổng bảng ghi của bảng
$total = mysqli_num_rows($brand);
// var_dump($total);
// 2 thiết lập số bảng ghi trong 1 trang
$row = 5;
// 3 tính số trang
$pages = ceil($total / $row);
// var_dump($pages);
if (isset($_GET['paget'])) {
    $page = $_GET['paget'];
} else {
    $page = 1;
}
$from = ($pages - 1) * $row;
$sql = mysqli_query($connect, "SELECT * from brand order by id_brand  limit $from,$row");
?>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-column">
        <h6 class="m-0 font-weight-bold text-primary">Thương hiệu</h6>
        <div class="d-flex  justify-content-between">
            <a href="index.php?act=add-thuonghieu"><button class="btn btn-primary mt-2">Thêm</button></a>
            <div></div>
            <div>
                <form action="index.php?act=thuonghieu" method="get" class=" mr-auto w-200 navbar-search">
                    <div class="input-group">
                        <input type="text" name="searcht" class="form-control bg-light border-0 small"
                            placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" name="ok" value="searcht">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "do_an_tot_nghiep");
                if (isset($_GET['searcht']) && !empty($_GET['searcht'])) {
                    $key = $_GET['searcht'];
                    $sql = "SELECT * from brand where name_brand like '%$key%' ";
                    $result = mysqli_query($conn, $sql);
                    foreach ($result as $r) {
                        // $id_brand = $row['id_brand'];
                        // $image_brand = $row['image_brand'];
                        // $name_brand = $row['name_brand'];
                        extract($r);
                        $xoath = "index.php?act=xoath&id=" . $id_brand;
                        $suath = "index.php?act=suath&id=" . $id_brand;
                        $img = "./upload/thuonghieu/" . $image_brand;
                        if (is_file($img)) {
                            $image_brand = "<img src='" . $img . "' height='80px'>";
                        } else {
                            $image_brand = "NO IMAGES";
                        }
                        echo '
                        <tr >
                        <td>' . $id_brand . '</td>
                        <td>' . $image_brand . '</td>
                        <td>' . $name_brand . '</td>
                        <td>
                           <a style="color:green ;" href="' . $suath . '"> <i class="fa fa-pen">sửa</i></a>
                           -
                           <a style="color:red ;" href="' . $xoath . '"> <i class="fa fa-trash"> xóa</i></a>
                       </td>
                    </tr>
                        ';
                    }
                 
               
                } else {
                    foreach ($listbrand as $brand) {
                        extract($brand);
                        $xoath = "index.php?act=xoath&id=" . $id_brand;
                        $suath = "index.php?act=suath&id=" . $id_brand;
                        $img = "./upload/thuonghieu/" . $image_brand;
                        if (is_file($img)) {
                            $image_brand = "<img src='" . $img . "' height='80px'>";
                        } else {
                            $image_brand = "NO IMAGES";
                        }
                        echo ' 
                     <tbody style="align-item:center;">
                     <tr >
                         <td>' . $id_brand . '</td>
                         <td>' . $image_brand . '</td>
                         <td>' . $name_brand . '</td>
                         <td>
                            <a style="color:green ;" href="' . $suath . '"> <i class="fa fa-pen">sửa</i></a>
                            -
                            <a style="color:red ;" href="' . $xoath . '"> <i class="fa fa-trash"> xóa</i></a>
                        </td>
                     </tr>
                     </tbody>
                     ';
                    }
                }
                ?>
                <!-- <tr>
                        <td><?php echo $id_brand ?></td>
                        <td><?php echo $image_brand ?></td>
                        <td><?php echo $name_brand ?></td>
                        <td>
                            <a style="color:green ;" href='index.php?act=suath&id=<?php echo $id_brand?>'> <i class="fa fa-pen">sửa</i></a>
                            -
                            <a style="color:red ;" href="' . $xoath . '"> <i class="fa fa-trash"> xóa</i></a>
                        </td>
                </tr> -->
            </table>
        </div>
        <nav aria-label="Page navigation example " class="float-right">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <?php for ($i = 1; $i <= $pages; $i++) { ?>
                <li class="page-item"><a class="page-link" href="index.php?paget=<?php echo $i ?>">
                        <?php echo $i ?>
                    </a></li>
                <?php } ?>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>