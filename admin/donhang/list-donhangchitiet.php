
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Đơn Hàng Chi tiết</h6>
        <div>
            <button class="btn btn-primary mt-2">Thêm</button>
            <form class="pl-5 d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Mã Đơn</th>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
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
                $totalP = 0;
                foreach ($listdonhangchitiet as $donhangchitiet) {
                    extract($donhangchitiet);
                    $pricen=$price * $total;
                    $totalP += $pricen;
                    $img = "./upload/product/" . $image;
                    if (is_file($img)) {
                        $image = "<img src='" . $img . "' height='60px'>";
                    } else {
                        $image = " <img src='" . $img . "' height='60px'> NO IMAGES";
                    }
                    echo '
            <tbody>
                <tr>
                  <td>' . $id_bill . '</td>
                  <td>' . $id_product . '</td>
                  <td>' . $name . '</td>
                  <td>' . $image . '</td>
                  <td>' . $total . '</td>
                  <td>' . currency_format($pricen) . '</td>
                </tr>
            </tbody>';
                }
                ?>
                <tr>
                    <td>Tổng giá: <?php echo currency_format($totalP)?></td>
                </tr>
            </table>
        </div>
        <!-- <nav aria-label="Page navigation example " class="float-right">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul> -->
        </nav>
    </div>
</div>