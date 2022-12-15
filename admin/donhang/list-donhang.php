<?php

$donhang = mysqli_query($connect, "SELECT * from bill");

// 1 tính tổng bảng ghi của bảng
$total = mysqli_num_rows($donhang);
// var_dump($total);

// 2 thiết lập số bảng ghi trong 1 trang
$row = 5;

// 3 tính số trang
$pages = ceil($total/$row);
// var_dump($pages);

if (isset($_GET['pagedh'])) {
    $page = $_GET['pagedh'];
}else{
    $page = 1 ; 
}
$from = ($pages - 1) * $row; 
$sql = mysqli_query($connect,"SELECT * FROM $from,$row");
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Đơn Hàng</h6>
        <div>
            <button class="btn btn-primary mt-2">Thêm</button>
            <form class="pl-5 d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <!-- <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">\                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div> -->
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Mã đơn</th>
                        <th>Người đặt hàng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Trạng thái</th>
                        <th>Xem chi tiết đơn hàng</th>
                    </tr>
                </thead>
                <?php foreach ($list_donhang as $donhang) {
                    extract($donhang);
                    if ($status == 0) {
                        $status = 'đang duyệt';
                    }else if($status == 1) {
                        $status = 'đang giao';
                    
                    }else{
                        $status ='Hủy đơn';
                    
                    }
                    $donhangchitiet = "index.php?act=donhangchitiet&id=" . $id_bill;
                    $xemtrangthai = "index.php?act=xemchitiet&id=" . $id_bill;

                    echo '
                <form action="index.php?act=updatedh" method="post" enctype="multipart/form-data">
                     <tbody>
                           <tr>
                              <td>' . $id_bill . '</td>
                              <td>' . $fullname . '</td>
                              <td>' . $ngaydathang . '</td>
                              <td class="d-flex justify-content-between;">
                                 <p class="gow-1">'.$status.'</p>
                                  <a  href="'.$xemtrangthai.'" class="ml-5">Xem trạng thái</a>
                              </td>
                              <td>
                              <a style="" href="' . $donhangchitiet . '"><i class="fa fa-eye">Xem chi tiết </i></a>
                              </td>
                          </tr>
                     </tbody>
                     </form>';
                } ?>
            </table>
        </div>
        <nav aria-label="Page navigation example " class="float-right">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <?php for ($i = 1; $i <= $pages; $i++) { ?>
                <li class="page-item"><a class="page-link" href="index.php?pagedh=<?php echo $i ?>">
                        <?php echo $i ?>
                    </a></li>
                <?php } ?>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>