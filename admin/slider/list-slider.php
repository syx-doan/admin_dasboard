<?php
$slider = mysqli_query($connect, "SELECT * from slider");
// 1 tính tổng bảng ghi của bảng
$total = mysqli_num_rows($slider);

// 2 thiết lập số bảng ghi trong 1 trang
$row = 1;

// 3 tính số trang
$pagesl = ceil($total / $row);

if (isset($_GET['pagesl'])) {
    $page = $_GET['pagesl'];
} else {
    $page = 1;
}
$from = ($pagesl - 1) * $row;
$sql = mysqli_query($connect, "SELECT * from slider order by id_slider  limit $from,$row");
?>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-column">
        <h6 class="m-0 font-weight-bold text-primary">
            Slider
        </h6>
        <div class="d-flex justify-content-between">
            <a href="index.php?act=add-slider"><button class="btn btn-primary mt-2">Thêm</button></a>
            <div>
                <form action="index.php?act=slider" method="get" class=" mr-auto w-200 navbar-search">
                    <div class="input-group">
                        <input type="text" name="searchsl" class="form-control bg-light border-0 small"
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
                        <th>Title</th>
                        <th>Desscript</th>
                        <th>image</th>
                        <th>Acction</th>
                    </tr>
                </thead>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "do_an_tot_nghiep");
                if (isset($_GET['searchsl']) && !empty($_GET['searchsl'])) {
                    $key = $_GET['searchsl'];
                    $sql = "SELECT * from slider  where title like '%$key%' or description like '%$key%'";
                    $result = mysqli_query($conn, $sql);
                    foreach ($result as $r) {
                        extract($r);
                        $xoasl = "index.php?act=xoasl&id=" . $id_slider;
                        $suasl = "index.php?act=suasl&id=" . $id_slider;
                        $img = "./upload/slider/" . $image;
                        if (is_file($img)) {
                            $image = "<img src='" . $img . "' height='80px'>";
                        } else {
                            $image = " <img src='" . $img . "' height='80px'> NO IMAGES";
                        }
                        echo '
                   <tbody>
                        <tr>
                            <td>' . $id_slider . '</td>
                            <td>' . $title . '</td>
                            <td>' . $description . '</td>
                            <td>' . $image . '</td>
                            <td>
                                <a style="color:green ;" href="' . $suasl . '"> <i class="fa fa-pen">sửa</i></a>
                                -
                                <a style="color:red ;" href="' . $xoasl . '"> <i class="fa fa-trash"> xóa</i></a>
                            </td>
                        </tr>
                    </tbody>
                   ';
                    }
                }else {
                    foreach ($listslider as $slider) {
                        extract($slider);
                        $xoasl = "index.php?act=xoasl&id=" . $id_slider;
                        $suasl = "index.php?act=suasl&id=" . $id_slider;
                        $img = "./upload/slider/" . $image;
                        if (is_file($img)) {
                            $image = "<img src='" . $img . "' height='80px'>";
                        } else {
                            $image = " <img src='" . $img . "' height='80px'> NO IMAGES";
                        }
                        echo '
                   <tbody>
                        <tr>
                            <td>' . $id_slider . '</td>
                            <td>' . $title . '</td>
                            <td>' . $description . '</td>
                            <td>' . $image . '</td>
                            <td>
                                <a style="color:green ;" href="' . $suasl . '"> <i class="fa fa-pen">sửa</i></a>
                                -
                                <a style="color:red ;" href="' . $xoasl . '"> <i class="fa fa-trash"> xóa</i></a>
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
                <?php for ($i = 1; $i <= $pagesl; $i++) { ?>
                <li class="page-item"><a class="page-link" href="index.php?pagesl=<?php echo $i ?>"><?php echo $i ?></a>
                </li>
                <?php } ?>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>