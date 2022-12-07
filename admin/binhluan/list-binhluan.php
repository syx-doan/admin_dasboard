<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Bình luận</h6>


    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Id-tài khoản</th>
                        <th>Id-sản phẩm</th>
                        <th>Ngày bình luận</th>
                        <th>Nội dung</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php foreach($listcomment as $comment){
                    extract($comment);
                    $xoabl="index.php?act=xoabl&id=".$id_comment;
                    echo '
                    <tbody>
                    <tr>
                        <td>'.$id_comment.'</td>
                        <td>'.$id_user.'</td>
                        <td>'.$id_product.'</td>
                        <td>'.$ngaybinhluan.'</td>
                        <td>'.$comment.'</td>
                        <td>
                            <a href="'.$xoabl.'"> <i class="fa fa-trash"> xóa</i></a>
                        </td>
                    </tr>
                </tbody>
                    ';
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