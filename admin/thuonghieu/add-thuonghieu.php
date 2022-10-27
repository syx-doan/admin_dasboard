<?php 
    // if (is_array($taikhoan)) {
    //     extract($taikhoan);
    // }
?>
<div class="card shadow mb-4 p-3">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputEmail4">Ảnh</label>
            <input type="file" class="form-control" name="inputimageth" value="" required>
        </div>
        <div class="form-group">
            <label for="inputimageth">Tên</label>
            <input type="text" class="form-control" name="inputnameth" value="" required>
        </div>

        <!-- <input type="hidden" name="id" value="<?php if(isset($id_user)&&($fullname!="")) echo $id_user;?>"> -->
        <button type="submit" name="btnAddthuonghieu" class="btn btn-primary">Thêm</button>
    </form>
</div>