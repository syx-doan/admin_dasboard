<div class="card shadow mb-4 p-3">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputAddress">Tên</label>
            <input type="text" class="form-control" name="inputName" required>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputLoai">Loại</label>
            </div>
            <select class="custom-select" name="inputLoai" required>
                <option value="">Choose...</option>
                <?php
               foreach($listloai as $loai){
                extract($loai);
                echo ' <option value="'.$id_category.'">'.$name_category.'</option> ';
               }
               ?>
            </select>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputThuonghieu">Thương hiệu</label>
            </div>
            <select class="custom-select" name="inputThuonghieu" required>
                <option value="">Choose...</option>
                <?php
               foreach($listbrand as $brand){
                extract($brand);
                echo ' <option value="'.$id_brand.'">'.$name_brand.'</option> ';
               }
               ?>
            </select>
        </div>
        <div class="form-group">
            <label for="inputEmail">Ảnh</label>
            <input type="file" class="form-control" name="inputImage" required>
        </div>
        <div class="form-group">
            <label for="inputEmail">Ảnh mô tả</label>
            <input type="file" class="form-control" name="inputImageMT[]" multiple="multiple" >
            
        </div>
        <div class="form-group">
            <label for="inputEmail">Giá</label>
            <input type="text" class="form-control" name="inputPrice" required>
        </div>
        <div class="form-group">
            <label for="inputEmail">Số lượng</label>
            <input type="text" class="form-control" name="inputQuantity" required>
        </div>
        <div class="form-group">
            <label for="inputAddress">Mô tả</label>
            <textarea class="form-control" name="inputDescription" required> </textarea>
        </div>
        <div class="form-group">
            <label for="inputAddress">Ưu đãi (%)</label>
            <input type="text" class="form-control" name="sale" >
        </div>
        <button type="submit" name="btnAddSanpham" class="btn btn-primary">Thêm</button>
    </form>
</div>