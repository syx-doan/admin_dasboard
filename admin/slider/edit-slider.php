<?php 
    if (is_array($slider)) {
        extract($slider);
    }
?>
<div class="card shadow mb-4 p-3">
    <form action="index.php?act=updatesl" method="post" enctype="multipart/form-data">
    <div class="form-group">
            <label for="inputId">Id</label>
            <input type="text" class="form-control" name="inputId" value="<?=$id_slider?>" disabled >
        </div>
        <div class="form-group">
            <label for="inputName">Title</label>
            <input type="text" class="form-control" name="inputTitle" value="<?=$title?>" required>
        </div>
        <div class="form-group">
            <label for="inputName">Ảnh</label>
            <input type="file" class="form-control" name="inputImagesl" value="<?=$image?>" required>
        </div>
        <div class="form-group">
            <label for="inputName">Mô tả</label>
            <input type="text" class="form-control" name="inputDescription" value="<?=$description?>" required>
        </div>
        <input type="hidden" name="id" value="<?php if(isset($id_slider)&&($description!="")) echo $id_slider;?>">
        <button type="submit" name="btnUpdateslider" class="btn btn-primary">Update</button>
    </form>
</div>