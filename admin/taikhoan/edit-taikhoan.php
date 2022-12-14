<?php 
    if (is_array($taikhoan)) {
        extract($taikhoan);
    }
?>
<div class="card shadow mb-4 p-3">
    <form action="index.php?act=updatetk" method="post" enctype="multipart/form-data">
    <div class="form-group">
            <label for="inputAddress">Id</label>
            <input type="text" class="form-control" name="inputId" value="<?=$id_user?>" disabled >
        </div>
        <div class="form-group">
            <label for="inputAddress">Họ và tên</label>
            <input type="text" class="form-control" name="inputFullName" value="<?=$fullname?>" required>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="inputPassword">Mật khẩu</label>
                <input type="text" class="form-control" name="inputPassword" value="<?=$password?>" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPhone">SĐT</label>
            <input type="text" class="form-control" name="inputPhone" value="<?=$phone?>" required>
        </div>
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="text" class="form-control" name="inputEmail" value="<?=$email?>" required>
        </div>
        <div class="form-group">
            <label for="inputAddress">Địa chỉ</label>
            <input type="text" class="form-control" name="inputAddress" value="<?=$address?>" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputVaitro">Vai trò</label>
            </div>
            <select class="custom-select" name="inputVaitro" value="<?=$role?>">
                <?php
               if ($role == 1) {
                echo 
                '<option value="1" selected>Admin</option>
                 <option value="0">Khách hàng</option>';
               }else {
                 echo 
                '<option value="1" >Admin</option>
                 <option value="0" selected>Khách hàng</option>';
               }
               ?>
            </select>
        </div>
        <input type="hidden" name="id" value="<?php if(isset($id_user)&&($fullname!="")) echo $id_user;?>">
        <button type="submit" name="btnUpdateUser" class="btn btn-primary">Update</button>
    </form>
</div>