<?php

?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-column">
        <h6 class="m-0 font-weight-bold text-primary">Tài khoản</h6>
        <div>
            <a href="index.php?act=add-taikhoan"><button class="btn btn-primary mt-2">Thêm</button></a>
            <form action="index.php?act=search" method="POST" class="pl-5 d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" name="kyw" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" name="search">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tableId" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Tài khoản</th>
                        <th>Mật khẩu</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Vai trò</th>
                        <th>Address</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <?php 
        foreach($listtaikhoan as $taikhoan){
         extract($taikhoan);
         $xoatk="index.php?act=xoatk&id=".$id_user;
         $suatk="index.php?act=suatk&id=".$id_user;
         if($role == 1){
            $role = 'Admin';
          }else{
              $role =  "Khách hàng" ;
          }
          echo '
          <tbody>
                    <tr>
                        <td>'.$id_user.'</td>
                        <td>'.$fullname.'</td>
                        <td>'.$username.'</td>
                        <td>'.$password.'</td>
                        <td>'.$phone.'</td>
                        <td>'.$email.'</td>
                        <td>'.$role.'</td>
                        <td>'.$address.'</td>
                        <td>
                            <a style="color:green ;" href="'.$suatk.'"> <i class="fa fa-pen">sửa</i></a>
                            -
                            <a style="color:red ;" href="'.$xoatk.'"> <i class="fa fa-trash"> xóa</i></a>
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