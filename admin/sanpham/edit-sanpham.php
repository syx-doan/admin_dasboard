<?php 
    if (is_array($data)) {
        extract($data);
    }
    $img = "./upload/product/".$image;
    if(is_file($img)){
        $image = "<img  src='".$img."' height='80px'>";
      }else{
        $image ="NO IMAGES";
      }
      if (isset($_GET['id'])){
        $id = $_GET['id'];
        $img_pro = mysqli_query($connect,"SELECT * from product_image where id_product = $id");
    }   

?>

<div class="card shadow mb-4 p-3">
    <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputAddress">Tên</label>
            <input type="text" class="form-control" name="inputName" value="<?=$name?>" required>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputLoai">Loại</label>
            </div>
            <select class="custom-select" name="inputLoai" required>
                <?php
               foreach($listloai as $loai){
                extract($loai);
                if ($id_category == $category_id) {
                    echo '
                <option value="'.$id_category.'" selected>'.$name_category.'</option> ';
                }else{
                    echo '
                    <option value="'.$id_category.'">'.$name_category.'</option> ';
                }
               }
               ?>
            </select>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputThuonghieu">Thương hiệu</label>
            </div>
            <select class="custom-select" name="inputThuonghieu" required>
                <!-- <option value="">Choose...</option> -->
                <?php
               foreach($listbrand as $brand){
                extract($brand);
                if ($id_brand == $brand_id) {
                    echo ' <option value="'.$id_brand.'" selected>'.$name_brand.'</option> ';
                }else{
                    echo ' <option value="'.$id_brand.'">'.$name_brand.'</option> ';
                }
               }
               ?>
            </select>
        </div>
        <div class="form-group">
            <label for="inputEmail">Ảnh</label>
            <input type="hidden" name="old_image" id="" value="<?php echo $data['image'] ?>">
            <input type="file" class="form-control" name="inputImage" value="" ><?=$image?>
        </div>
        <div class="form-group" >
            <label for="inputEmail">Ảnh mô tả</label>
            <input type="file" class="form-control" name="inputImageMT[]" multiple="multiple"  >
           
                <div class="" style="display:flex;">
                <?php foreach($img_pro as $key => $value){ ?>
                   <img src="upload/product/<?php echo $value['image']?>" alt="" style="height: 200px; width: 250px;margin-left: 10px;">
                   <?php }?>
                </div>
        </div>
        <div class="form-group">
            <label for="inputEmail">Giá</label>
            <input type="text" class="form-control" name="inputPrice" value="<?=$price?>" required>
        </div>
        <div class="form-group">
            <label for="inputEmail">Số lượng</label>
            <input type="text" class="form-control" name="inputQuantity" value="<?=$quantity?>" required >
        </div>
        <div class="form-group">
            <label for="inputAddress">Mô tả</label>
            <textarea class="form-control" name="inputDescription" value="<?=$description?>" required><?=$description?></textarea>
        </div>
        <div class="form-group">
            <label for="inputAddress">Ưu đãi (%)</label>
            <input type="text" class="form-control" name="sale" value="<?=$sale?>">
        </div>
        <input type="hidden" name="id" value="<?php if(isset($id_product)&&($name!="")) echo $id_product;?>">
        <button type="submit" name="btnUpdateSanpham" class="btn btn-primary">Update</button>
    </form>
</div>