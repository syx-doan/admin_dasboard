<div class="card shadow mb-4 p-3">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputAddress">Tên</label>
            <input type="text" class="form-control" name="inputName" value="" required>
        </div>
        <input type="hidden" name="id" value="<?php if(isset($id_user)&&($fullname!="")) echo $id_user;?>">
        <button type="submit" name="btnAddloai" class="btn btn-primary">Thêm</button>
    </form>
</div>