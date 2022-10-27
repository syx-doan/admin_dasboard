<?php 
    if (is_array($brand)) {
        extract($brand);
    }
    $img = "./upload/thuonghieu/".$image_brand;
    if(is_file($img)){
        $image_brand = "<img  src='".$img."' height='80px'>";
      }else{
        $image_brand ="NO IMAGES";
      }
?>
<div class="card shadow mb-4 p-3">
    <form action="index.php?act=updateth" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputAddress">Id</label>
            <input type="text" class="form-control" name="inputId" value="<?=$id_brand?>" disabled>
        </div>
        <div class="form-group">
            <label for="inputEmail4">Ảnh</label>
            <input type="file" class="form-control" name="inputimageth" value="" ><?=$image_brand?>
        </div>
        <div class="form-group">
            <label for="inputnameth">Tên</label>
            <input type="text" class="form-control" name="inputnameth" value="<?=$name_brand?>" required>
        </div>
        <input type="hidden" name="id" value="<?php if(isset($id_brand)&&($name_brand!="")) echo $id_brand;?>">
        <button type="submit" name="btnUpdatethuonghieu" class="btn btn-primary">Update</button>
    </form>
</div>