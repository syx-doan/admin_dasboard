<?php 
    if (is_array($news)) {
        extract($news);
    }
    $img = "./upload/news/".$image;
    if(is_file($img)){
        $image = "<img  src='".$img."' height='80px'>";
      }else{
        $image ="NO IMAGES";
      }
        
?>
<div class="card shadow mb-4 p-3">
    <form action="index.php?act=updateNews" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputEmail4">Ảnh</label>
            <input type="hidden" name="old_image" id="" value="<?php echo $news['image'] ?>">
            <input type="file" class="form-control" name="inputimagenews" value="" ></br><?=$image?>
        </div>
        <div class="form-group">
            <label for="inputimageth">Title</label>
            <input type="text" class="form-control" name="inputTitle" value="<?=$title?>" required>
        </div>
        <div class="form-group">
            <label for="inputimageth">Content</label>
            <textarea name="inputContent" class="form-control" id="" cols="30" rows="10" value=""><?=$content?></textarea>
        </div>

        <input type="hidden" name="id" value="<?php if(isset($id_news)&&($content!="")) echo $id_news;?>">
        <button type="submit" name="btnAddnews" class="btn btn-primary">Update</button>
    </form>
</div>