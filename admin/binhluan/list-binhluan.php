<?php
$comment = mysqli_query($connect, "SELECT products.id_product,products.name, COUNT(comment.content) as 'soluong' FROM comment JOIN products ON comment.id_product = products.id_product GROUP BY products.id_product,products.name HAVING soluong > 0 ORDER BY soluong desc");

// 1 tính tổng bảng ghi của bảng
$total = mysqli_num_rows($comment);
// var_dump($total);

// 2 thiết lập số bảng ghi trong 1 trang
$row = 5;

// 3 tính số trang
$pages = ceil($total / $row);
// var_dump($pages);

if (isset($_GET['pagecmt'])) {
    $page = $_GET['pagecmt'];
} else {
    $page = 1;
}
$from = ($pages - 1) * $row;
$sql = mysqli_query($connect, "SELECT products.id_product,products.name, COUNT(comment.content) as 'soluong' FROM comment JOIN products ON comment.id_product = products.id_product GROUP BY products.id_product,products.name HAVING soluong > 0 ORDER BY soluong  limit $from,$row");
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
                        <th>Id-sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php foreach ($listcomment as $comment) {
                    extract($comment);
                    $blct = "index.php?act=binhluanchitiet&id=" . $id_product;
                    echo '
                    <tbody>
                    <tr>
                        <td>' . $id_product . '</td>
                        <td>' . $name . '</td>
                        <td>' . $soluong . '</td>
                        <td>
                            <a href="' . $blct . '"><i class="fa fa-eye">Xem chi tiết </i></a>
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
                <?php for ($i = 1; $i <= $pages; $i++) { ?>
                <li class="page-item"><a class="page-link" href="index.php?pagecmt=<?php echo $i ?>">
                        <?php echo $i ?>
                    </a></li>
                <?php } ?>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>