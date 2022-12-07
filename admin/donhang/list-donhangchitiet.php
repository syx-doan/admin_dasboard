<?php 


?>


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
                        <th>Số lượng</th>
                        <th>Giá</th>
                    </tr>
                </thead>
                <?php 
        foreach($listdonhangchitiet as $donhangchitiet){
         extract($donhangchitiet);
          echo 
          '
          <tbody>
          <tr>
              <td>'.$id_bill.'</td>
              <td>'.$id_product.'</td>
              <td>'.$total.'</td>
              <td>'.$price.' vnđ</td>
              <!-- <td>
                  <a style="" href="list-donhangchitiet.php"> <i class="fa fa-eye">Quay lai</i></a>
              </td> -->
          </tr>
      </tbody>
          ';
        }?>
    
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