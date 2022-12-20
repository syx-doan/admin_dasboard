<?php
$category = mysqli_query($connect, "SELECT * from category");

// 1 tính tổng bảng ghi của bảng
$total = mysqli_num_rows($category);
// 2 thiết lập số bảng ghi trong 1 trang
$row = 5;

// 3 tính số trang
$pages = ceil($total / $row);

if (isset($_GET['pagel'])) {
    $page = $_GET['pagel'];
} else {
    $page = 1;
}
$from = ($pages - 1) * $row;
$sql = mysqli_query($connect, "SELECT * from category order by id_category  limit $from,$row");
?>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-column">
        <h6 class="m-0 font-weight-bold text-primary">Loại hàng</h6>
        <div class="d-flex justify-content-between">
            <a href="index.php?act=add-loai"><button class="btn btn-primary mt-2">Thêm</button></a>
            <div>
                <form action="index.php?act=loai" method="get" class=" mr-auto w-200 navbar-search">
                    <div class="input-group">
                        <input type="text" name="searchl" class="form-control bg-light border-0 small"
                            placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" name="ok" value="searchp">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
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
                <?php
                $conn = mysqli_connect("localhost", "root", "", "do_an_tot_nghiep");
                if (isset($_GET['searchl']) && !empty($_GET['searchl'])) {
                    $key = $_GET['searchl'];
                    $sql = "SELECT * from category where name_category like '%$key%' ";
                    $result = mysqli_query($conn, $sql);
                    foreach ($result as $r) {
                        extract($r);
                        $xoal = "index.php?act=xoal&id=" . $id_category;
                        $sual = "index.php?act=sual&id=" . $id_category;
                        echo '
                   <tbody>
                        <tr>
                            <td>' . $id_category . '</td>
                            <td>' . $name_category . '</td>
                            <td>
                                <a style="color:green ;" href="' . $sual . '"> <i class="fa fa-pen">sửa</i></a>
                                -
                                <a style="color:red ;" href="' . $xoal . '"> <i class="fa fa-trash"> xóa</i></a>
                            </td>
                        </tr>
                    </tbody>
                   ';
                    }

                }else {
                    foreach ($listloai as $cate) {
                        extract($cate);
                        $xoal = "index.php?act=xoal&id=" . $id_category;
                        $sual = "index.php?act=sual&id=" . $id_category;
                        echo '
                   <tbody>
                        <tr>
                            <td>' . $id_category . '</td>
                            <td>' . $name_category . '</td>
                            <td>
                                <a style="color:green ;" href="' . $sual . '"> <i class="fa fa-pen">sửa</i></a>
                                -
                                <a style="color:red ;" href="' . $xoal . '"> <i class="fa fa-trash"> xóa</i></a>
                            </td>
                        </tr>
                    </tbody>
                   ';
                    }
                }
                ?>
            </table>
        </div>
        <nav aria-label="Page navigation example " class="float-right">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <?php for ($i = 1; $i <= $pages; $i++) { ?>
                <li class="page-item"><a class="page-link" href="index.php?pagel=<?php echo $i ?>"><?php echo $i ?></a>
                </li>
                <?php } ?>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>