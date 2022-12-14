<?php 
$news = mysqli_query($connect,"SELECT * from news");
// 1 tính tổng bảng ghi của bảng
$total = mysqli_num_rows($news);
// var_dump($total);

// 2 thiết lập số bảng ghi trong 1 trang
$row = 5;

// 3 tính số trang
$pages = ceil($total/$row);
// var_dump($pages);

if (isset($_GET['pagett'])) {
    $page = $_GET['pagett'];
}else{
    $page = 1 ; 
}
$from = ($pages - 1) * $row; 
$sql = mysqli_query($connect,"SELECT * from news order by id_news  limit $from,$row");
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tin tức</h6>
        <div>
        <a href="index.php?act=add-tintuc"><button class="btn btn-primary mt-2">Thêm</button></a>
            <!-- <form class="pl-5 d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form> -->
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>image</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Ngày đăng</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php foreach($list_news as $news) { 
                    extract($news);
                    $xoan="index.php?act=xoan&id=".$id_news;
                    $suan="index.php?act=suan&id=".$id_news;
                    $img = "./upload/news/".$image;
                    if(is_file($img)){
                      $image = "<img src='".$img."' height='80px'>";
                    }else{
                      $image =" <img src='".$img."' height='80px'> NO IMAGES";
                    }
                echo'
                <tbody>
                    <tr>
                        <td>'.$id_news.'</td>
                        <td>'.$image.'</td>
                        <td>'.$title.'</td>
                        <td>'.$content.'</td>
                        <td>'.$date.'</td>
                        <td>
                            <a style="color:red ;" href="'.$xoan.'"> <i class="fa fa-trash"> xóa</i></a>
                            -
                            <a style="color:green ;" href="'.$suan.'"> <i class="fa fa-pen">sửa</i></a>
                        </td>
                    </tr>
                </tbody>
                ';
                }?>
                    
                
            </table>
        </div>
        <nav aria-label="Page navigation example " class="float-right">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <?php for($i=1;$i<=$pages;$i++){?>
                <li class="page-item"><a class="page-link" href="index.php?pagett=<?php echo $i?>"><?php echo $i ?></a></li>
                <?php } ?>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>