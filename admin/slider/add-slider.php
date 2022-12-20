<div class="card shadow mb-4 p-3">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputAddress">Tên</label>
            <input type="text" class="form-control" name="inputTitle" value="" required>
        </div>
        <div class="form-group">
            <label for="inputAddress">Ảnh</label>
            <input type="file" class="form-control" name="inputImagesl" value="" required>
        </div>
        <div class="form-group">
            <label for="inputAddress">Mô tả</label>
            <input type="text" class="form-control" name="inputDescription" value="" required>
        </div>
        <input type="hidden" name="id" value="<?php if(isset($id_slider)&&($description!="")) echo $id_slider;?>">
        <button type="submit" name="btnAddSlider" class="btn btn-primary">Thêm</button>
    </form>
</div>