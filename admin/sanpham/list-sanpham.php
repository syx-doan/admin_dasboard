<?php
$products = mysqli_query($connect, "SELECT * from products");

// 1 tính tổng bảng ghi của bảng
$total = mysqli_num_rows($products);

// 2 thiết lập số bảng ghi trong 1 trang
$row = 5;

// 3 tính số trang
$pages = ceil($total / $row);

if (isset($_GET['pagepr'])) {
    $page = $_GET['pagepr'];
} else {
    $page = 1;
}
$from = ($pages - 1) * $row;
$sql = mysqli_query($connect, "SELECT * FROM category,products,brand where  products.brand_id = brand.id_brand and products.category_id=category.id_category order by id_product limit $from,$row");
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Sản Phẩm
        </h6>
        <div class="d-flex justify-content-between">
            <a href="index.php?act=add-sanpham"><button class="btn btn-primary mt-2">Thêm</button></a>
            <div>
                <form action="index.php?act=sanpham" method="get" class=" mr-auto w-200 navbar-search">
                    <div class="input-group">
                        <input type="text" name="searchp" class="form-control bg-light border-0 small"
                            placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" name="ok" value="searchp">
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
                if (!function_exists('currency_format')) {
                    function currency_format($number, $suffix = '.vnđ') {
                        if (!empty($number)) {
                            return number_format($number, 0, ',', '.') . "{$suffix}";
                        }
                    }
                }
                $conn = mysqli_connect("localhost", "root", "", "do_an_tot_nghiep");
                if (isset($_GET['searchp']) && !empty($_GET['searchp'])) {
                    $key = $_GET['searchp'];
                    $sql = "SELECT * from products inner join category on products.category_id=category.id_category  inner join brand on  products.brand_id = brand.id_brand  where name like '%$key%' or name_category like '%$key%' or name_brand like '%$key%' ";
                    $result = mysqli_query($conn, $sql);
                    foreach ($result as $r) {
                        extract($r);
                        $xoasp = "index.php?act=xoasp&id=" . $id_product;
                        $suasp = "index.php?act=suasp&id=" . $id_product;
                        $img = "./upload/product/" . $image;
                        if (is_file($img)) {
                            $image = "<img src='" . $img . "' height='80px'>";
                        } else {
                            $image = " <img src='" . $img . "' height='80px'> NO IMAGES";
                        }
                        echo '
                    <tbody>
                        <tr>
                            <td>' . $id_product . '</td>
                            <td>' . $name . '</td>
                            <td>' . $image . '</td>
                            <td>' . currency_format($price) . '</td>
                            <td>' . $name_brand . '</td>
                            <td>' . $name_category . '</td>
                            <td>' . $quantity . '</td>
                            <td>' . $sale . '%</td>
                            <td>
                                <a style="color:green ;" href="' . $suasp . '"> <i class="fa fa-pen">sửa</i></a>
                                -
                                <a style="color:red ;" href="' . $xoasp . '"> <i class="fa fa-trash"> xóa</i></a>
                            </td>
                        </tr>
                    </tbody>
                    ';
                    }

                } else {
                    foreach ($listsanpham as $sanpham) {
                        extract($sanpham);
                        $xoasp = "index.php?act=xoasp&id=" . $id_product;
                        $suasp = "index.php?act=suasp&id=" . $id_product;
                        $img = "./upload/product/" . $image;
                        if (is_file($img)) {
                            $image = "<img src='" . $img . "' height='80px'>";
                        } else {
                            $image = " <img src='" . $img . "' height='80px'> NO IMAGES";
                        }
                        echo '
                    <tbody>
                        <tr>
                            <td>' . $id_product . '</td>
                            <td>' . $name . '</td>
                            <td>' . $image . '</td>
                            <td>' . currency_format($price) . '</td>
                            <td>' . $name_brand . '</td>
                            <td>' . $name_category . '</td>
                            <td>' . $quantity . '</td>
                            <td>' . $sale . '%</td>
                            <td>
                                <a style="color:green ;" href="' . $suasp . '"> <i class="fa fa-pen">sửa</i></a>
                                -
                                <a style="color:red ;" href="' . $xoasp . '"> <i class="fa fa-trash"> xóa</i></a>
                            </td>
                        </tr>
                    </tbody>
                    ';
                    }
                }


                ?>

            </table>
        </div>
        <nav aria-label="Page navigation example " class="float-right">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <?php for ($i = 1; $i <= $pages; $i++) { ?>
                <li class="page-item"><a class="page-link" href="index.php?pagepr=<?php echo $i ?>">
                        <?php echo $i ?>
                    </a></li>
                <?php } ?>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>