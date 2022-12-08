<?php
if (is_array($loadtrangthaidonhang)) {
    extract($loadtrangthaidonhang);
}
?>

<div class="card shadow mb-4 p-3">
    <form action="index.php?act=updatetrangthai" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputAddress">Người đặt hàng</label>
            <input type="text" class="form-control" name="inputName" value="<?= $fullname ?>" required>
        </div>
        <div class="form-group">
            <label for="inputAddress">Địa chỉ</label>
            <input type="text" class="form-control" name="inputAddress" value="<?= $address ?>" required>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputTrangthai">Trạng thái </label>
            </div>
            <select name="inputTrangthai" id="">
                <?php if ($status == 0) {
                    echo '
                <option value="0"  class="form-group">Đang duyệt đơn</option>
                <option value="1" class="form-group">Đang giao</option>
                <option value="2" class="form-group">Hủy đơn</option>
                    ';
                } else if ($status == 1) {
                    echo '
                <option value="1"  class="form-group">Đang giao</option>
                <option value="0"  class="form-group">Đang duyệt đơn</option>
                <option value="2" class="form-group">Hủy đơn</option>
                    ';
                }else {
                    echo '
                <option value="2" class="form-group">Hủy đơn</option>
                <option value="0"  class="form-group">Đang duyệt đơn</option>
                <option value="1"  class="form-group">Đang giao</option>
                    ';
                }
                ?>
            </select>
        </div>
        <input type="hidden" name="id_bill" value="<?php if (isset($id_bill))
            echo $id_bill; ?>">
        <input type="hidden" name="id_user" value="<?php if (isset($id_user))
            echo $id_user; ?>">
        <button type="submit" name="btnUpdatetrangthai" class="btn btn-primary">Update</button>
    </form>
</div>