<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-column">
        <h6 class="m-0 font-weight-bold text-primary">Loại hàng</h6>
        <div>
            <a href="index.php?act=add-loai"><button class="btn btn-primary mt-2">Thêm</button></a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Acction</th>
                    </tr>
                </thead>
                <?php foreach ($listloai as $loai) {
               extract($loai);
               $xoal="index.php?act=xoal&id=".$id_category;
               $sual="index.php?act=sual&id=".$id_category;
               echo '
               <tbody>
                    <tr>
                        <td>'.$id_category.'</td>
                        <td>'.$name_category.'</td>
                        <td>
                            <a style="color:green ;" href="'.$sual.'"> <i class="fa fa-pen">sửa</i></a>
                            -
                            <a style="color:red ;" href="'.$xoal.'"> <i class="fa fa-trash"> xóa</i></a>
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