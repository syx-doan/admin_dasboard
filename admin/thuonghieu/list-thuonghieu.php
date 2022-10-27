<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-column">
        <h6 class="m-0 font-weight-bold text-primary">Thương hiệu</h6>
        <div class="d-flex ">
            <a href="index.php?act=add-thuonghieu"><button class="btn btn-primary mt-2">Thêm</button></a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php 
                foreach($listbrand as $brand){
                    extract($brand);
                    $xoath="index.php?act=xoath&id=".$id_brand;
                    $suath="index.php?act=suath&id=".$id_brand;
                    $img = "./upload/thuonghieu/".$image_brand;
                    if(is_file($img)){
                      $image_brand = "<img src='".$img."' height='80px'>";
                    }else{
                      $image_brand ="NO IMAGES";
                    }
                     echo ' 
                     <tbody style="align-item:center;">
                     <tr >
                         <td>'.$id_brand.'</td>
                         <td>'.$image_brand.'</td>
                         <td>'.$name_brand.'</td>
                         <td>
                            <a style="color:green ;" href="'.$suath.'"> <i class="fa fa-pen">sửa</i></a>
                            -
                            <a style="color:red ;" href="'.$xoath.'"> <i class="fa fa-trash"> xóa</i></a>
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