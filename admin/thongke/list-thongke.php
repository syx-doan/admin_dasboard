<?php
// tổng tài khoản
$users = mysqli_query($connect, "SELECT * from users");
$totalUser = mysqli_num_rows($users);
// var_dump($totalUser);

// tổng bình luận
$comment = mysqli_query($connect, "SELECT * from comment");
$totalComment = mysqli_num_rows($comment);
// var_dump($totalComment);

// tổng sản phẩm 
$products = mysqli_query($connect, "SELECT * from products");
$totalProducts = mysqli_num_rows($products);
// var_dump($totalProducts);

// tổng sản phẩm hien co
$quantityproducts = mysqli_query($connect, "SELECT * from products where quantity");
// $quantityProducts = mysqli_num_rows($quantityproducts);
// var_dump($quantityProducts);

// tổng đơn hàng
$bill = mysqli_query($connect, "SELECT * from bill");
$totalBill = mysqli_num_rows($bill);
// var_dump($totalBill);

// tổng tin tức
$news = mysqli_query($connect, "SELECT * from news");
$totalNews = mysqli_num_rows($news);
// var_dump($totalNews);

// include './carbon/autoload.php';

// 


// use Carbon\Carbon;
// use Carbon\CarbonInterval;

// printf('now: %s', Carbon::now('Asia/Ho_Chi_Minh'));
// printf('1day: %s', CarbonInterval::day()->forHumans());

// if (isset($_POST['thoigian'])){
//     $thoigian = $_POST['thoigian'];
// }else {
//     $thoigian = "";
//     $subdays = Carbon::now('Asia/Ho_Chi_Minh')-> subdays(365)->toDateString();
// }    
// if ($thoigian == '7ngay') {
//     $subdays=Carbon::now('Asia/Ho_Chi_Minh')-> subdays(365)->toDateString();
// }elseif ($thoigian == '28ngay') {
//     $subdays=Carbon::now('Asia/Ho_Chi_Minh')-> subdays(365)->toDateString();
// }else if ($thoigian == '90ngay') {
//     $subdays=Carbon::now('Asia/Ho_Chi_Minh')-> subdays(365)->toDateString();
// }else if ($thoigian == '365ngay') {
//     $subdays=Carbon::now('Asia/Ho_Chi_Minh')-> subdays(365)->toDateString();
// };

// $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
// $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

// $conn = mysqli_connect("localhost", "root", "", "do_an_tot_nghiep");


// $sql = "SELECT * from statistical where ngaydathang BETWEEN '$subdays' and '$now' ORDER BY ngaydathang";
// $sql_query = mysqli_query($conn, $sql);
// while ($val = mysqli_fetch_array($sql_query)) {
//     $chart_data[] = array(
//         'date' => $val['ngaydathang'],
//         'bill' => $val['donhang'],
//         'quantity' => $val['soluongban'],
//         'totalrevenue' => $val['doanhthu'],
//     );
// }
// echo $data = json_encode($chart_data);

?>
<!-- Content Row -->
<div class="row">

    <!-- Tong doanh thu (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <a href="index.php?act=sanpham">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tổng sản phẩm</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $totalProducts ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- Tong san pham hien co -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <a href="index.php?act=sanpham">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Hàng hiện có trong kho</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                // $quantityproducts = mysqli_query($connect, "SELECT * from products ");
                                $quantityT = 0;
                                foreach ($quantityproducts as $quantityTotal) {
                                    extract($quantityTotal);
                                    $quantityT += $quantity;
                                }
                                echo $quantityT;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- Tong doanh thu (Year) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <a href="index.php?act=donhang">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Tổng Đơn hàng</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $totalBill ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fa fa-dolly"></i> -->
                            <i class="fa fa-dolly fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Tong don hang (month) -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <a href="index.php?act=taikhoan">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tổng tài khoản
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">

                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php echo $totalUser ?>
                                    </div>

                                </div>
                                <div class="col">
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!--Tong binh luan -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <a href="index.php?act=binhluan">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Tổng bình luận</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $totalComment ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Tong tin tuc -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <a href="index.php?act=tintuc">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Tổng tin tức</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $totalNews ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-newspaper fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">
    <div id="piechart_3d" style="width: 100%; height: 500px;"></div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", { packages: ["corechart"] });
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Danh mục', 'Số lượng'],
                            <?php
                            $tongdm = count($listthongke);
                            $i = 1;
                            foreach ($listthongke as $thongke) {
                                extract($thongke);
                                if ($i == $tongdm)
                                    $dauphay = "";
                                else
                                    $dauphay = ",";
                                echo "['" . $thongke['tenloai'] . "' , " . $thongke['soluong'] . "]" . $dauphay;
                                $i += 1;
                            }
                            ?>
                        ]);

            var options = {
                title: 'THỐNG KÊ HÀNG HÓA THEO LOẠI',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>
</div>