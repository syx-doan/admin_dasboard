<?php
if (is_array($taikhoan)) {
    extract($taikhoan);
}
$img = "./upload/product/".$image;
if(is_file($img)){
    $image = "<img  src='".$img."' height='80px'>";
  }else{
    $image ="NO IMAGES";
  }
?>
<div class="card shadow mb-4 p-3">
    <form action="index.php?act=updatetk" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputAddress">Id</label>
            <input type="text" class="form-control" name="inputId" value="<?= $id_user ?>" disabled>
        </div>
        <div class="form-group">
            <label for="inputAddress">Họ và tên</label>
            <input type="text" class="form-control" name="inputFullName" value="<?= $fullname ?>" required>
        </div>
        <div class="form-group">
            <label for="inputAddress">Ảnh đại diện</label>
            <input type="file" class="form-control" name="inputImage" value="" required><?= $image?>
        </div>
        <div class="form-row">
            <div class="form-group col-6">
                <label for="inputEmail">Email</label>
                <input type="text" class="form-control" name="inputEmail" value="<?= $email ?>" required>
            </div>
            <div class="form-group col-6">
                <label for="inputPassword">Mật khẩu</label>
                <input type="text" class="form-control" name="inputPassword" value="<?= $password ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPhone">SĐT</label>
            <input type="text" class="form-control" name="inputPhone" value="<?= $phone ?>" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputVaitro">Vai trò</label>
            </div>
            <select class="custom-select" name="inputVaitro" value="<?= $role ?>">
                <?php
                if ($role == 1) {
                    echo
                        '<option value="1" selected>Admin</option>
                 <option value="0">Khách hàng</option>';
                } else {
                    echo
                        '<option value="1" >Admin</option>
                 <option value="0" selected>Khách hàng</option>';
                }
                ?>
            </select>
        </div>
        <input type="hidden" name="id" value="<?php if (isset($id_user) && ($fullname != ""))
            echo $id_user; ?>">
        <button type="submit" name="btnUpdateUser" class="btn btn-primary">Update</button>
    </form>
</div>