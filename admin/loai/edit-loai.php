<?php 
    if (is_array($loai)) {
        extract($loai);
    }
?>
<div class="card shadow mb-4 p-3">
    <form action="index.php?act=updatel" method="post" enctype="multipart/form-data">
    <div class="form-group">
            <label for="inputId">Id</label>
            <input type="text" class="form-control" name="inputId" value="<?=$id_category?>" disabled >
        </div>
        <div class="form-group">
            <label for="inputName">Tên</label>
            <input type="text" class="form-control" name="inputName" value="<?=$name?>" required>
        </div>
        <input type="hidden" name="id" value="<?php if(isset($id_category)&&($name!="")) echo $id_category;?>">
        <button type="submit" name="btnUpdateloai" class="btn btn-primary">Update</button>
    </form>
</div>