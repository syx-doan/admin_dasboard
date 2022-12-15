<?php 
    // if (is_array($taikhoan)) {
    //     extract($taikhoan);
    // }
?>
<div class="card shadow mb-4 p-3">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputEmail4">Ảnh</label>
            <input type="file" class="form-control" name="inputimagenews" value="" required>
        </div>
        <div class="form-group">
            <label for="inputimageth">Title</label>
            <input type="text" class="form-control" name="inputTitle" value="" required>
        </div>
        <div class="form-group">
            <label for="inputimageth">Content</label>
            <textarea name="inputContent" class="form-control" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="inputDate">Ngày đăng</label>
            <input type="date" name="inputDate">
        </div>
        <!-- <input type="hidden" name="id" value="<?php if(isset($id_news)&&($content!="")) echo $id_news;?>"> -->
        <button type="submit" name="btnAddnews" class="btn btn-primary">Thêm</button>
    </form>
</div>