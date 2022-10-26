<?php 
// $sql_user = "SELECT * from users";
// require_once ('connect.php');
// $query_user = mysqli_query($connect,$sql_user);

?>

<div class="card shadow mb-4 p-3">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputAddress">Họ và tên</label>
            <input type="text" class="form-control" name="inputFullName" placeholder="Họ và tên" required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Tài khoản</label>
                <input type="text" class="form-control" name="inputUser" placeholder="Tài khoản" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword">Mật khẩu</label>
                <input type="password" class="form-control" name="inputPassword" placeholder="Mật khẩu" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPhone">SĐT</label>
            <input type="text" class="form-control" name="inputPhone" placeholder="Số điện thoại" required>
        </div>
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="text" class="form-control" name="inputEmail" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="inputAddress">Địa chỉ</label>
            <input type="text" class="form-control" name="inputAddress" placeholder="Địa chỉ" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputVaitro">Vai trò</label>
            </div>
            <select class="custom-select" name="inputVaitro">
                <option value="">Choose...</option>
                <option value="0">Khách hàng</option>
                <option value="1">Admin</option>
            </select>
        </div>
        <button type="submit" name="btnAddUser" class="btn btn-primary">Thêm</button>
        <button  class="btn btn-primary"><a href="index.php?act=taikhoan" style="color:white;text-decoration:none">Dánh sách</a></button>
    </form>
</div>