<?php
$donhang = mysqli_query($connect,"SELECT * from bill");
$totaldongia =  mysqli_query($connect,"SELECT * FROM bill,bill_dentail where  bill.id_bill = bill_dentail.id_bill order by price");

// 1 tính tổng bảng ghi của bảng
// $total = mysqli_num_rows($donhang);
// var_dump($total);

// 2 thiết lập số bảng ghi trong 1 trang
// $row = 5;

// 3 tính số trang
// $pages = ceil($total/$row);
// var_dump($pages);

// if (isset($_GET['pagepr'])) {
//     $page = $_GET['pagepr'];
// }else{
//     $page = 1 ; 
// }
// $from = ($pages - 1) * $row; 
// $sql = mysqli_query($connect,"SELECT * FROM bill");
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Đơn Hàng</h6>
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
                        <th>Người Đặt Hàng</th>
                        <th>Trạng Thái</th>
                        <th>Tổng giá</th>
                        <th>Xem Chi Tiết</th>
                    </tr>
                </thead>
                <?php foreach($list_donhang as $donhang) {
                extract($donhang);
                $donhangchitiet="index.php?act=donhangchitiet&id=".$id_bill;
                echo '
                     <tbody>
                           <tr>
                              <td>'.$id_bill.'</td>
                              <td>'.$fullname.'</td>
                              <td>
                                  <select name="" id="">
                                  <option value="">Đang duyệt đơn</option>
                                  <option value="">Đang giao</option>
                                  <option value="">Hủy đơn</option>
                                  </select>
                              </td>
                              <td>100</td>
                              <td>
                              <a style="" href="'.$donhangchitiet.'"> <i class="fa fa-eye">Xem chi tiết</i></a>
                              </td>
                          </tr>
                     </tbody>';
                   } ?>
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