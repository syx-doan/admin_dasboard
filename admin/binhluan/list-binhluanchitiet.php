<?php

// 1 tính tổng bảng ghi của bảng
// $total = mysqli_num_rows($id);
// var_dump($total);

// 2 thiết lập số bảng ghi trong 1 trang
// $row = 5;

// 3 tính số trang
// $pages = ceil($total / $row);
// var_dump($pages);

// if (isset($_GET['pagecmt'])) {
//     $page = $_GET['pagecmt'];
// } else {
//     $page = 1;
// }
// $from = ($pages - 1) * $row;
// $sql = mysqli_query($connect, "SELECT products.id_product,products.name, COUNT(comment.content) as 'soluong' FROM comment JOIN products ON comment.id_product = products.id_product GROUP BY products.id_product,products.name HAVING soluong > 0 ORDER BY soluong  limit $from,$row");
?>

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
                        <th>Nội dung</th>
                        <th>Ngày bình luận</th>
                        <th>Người bình luận</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <?php $id_detail = 0;

                foreach ($loadblct as $comment_detail) {
                    extract($comment_detail);
                    // extract($comment); 
                    $xoabl = "index.php?act=xoabl&id=" . $id_comment;
                    echo '
                        <tbody>
                        <tr>
                        <td>' . $id_detail++ . '</td>
                            <td>' . $content . '</td>
                            <td>' . $ngaybinhluan . '</td>
                            <td>' . $fullname . '</td>
                            <td>
                                <a href="' . $xoabl . '"> <i class="fa fa-trash"> xóa</i></a>
                            </td>
                        </tr>
                    </tbody>
                        ';
                }
                ;

                // $total = count($id_detail);
                // var_dump($id_detail);
                // $row = 5;
                // $pages = ceil($id_detail / $row);
                // var_dump($pages);
                // $from = ($page - 1) * $row;
                ?>

            </table>
        </div>
        <!-- <nav aria-label="Page navigation example " class="float-right">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <?php for ($i = 1; $i <= $pages; $i++) { ?>
                <li class="page-item"><a class="page-link" href="index.php?pagecmtct=<?php echo $i ?>">
                        <?php echo $i ?>
                    </a></li>
                <?php } ?>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav> -->
    </div>
</div>