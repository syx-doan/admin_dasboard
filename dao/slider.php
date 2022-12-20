<?php

// thêm slider
function insert_slider($title,$image,$description){
    $sql="INSERT INTO slider(title,image,description) values('$title','$image','$description')";
    var_dump($sql);
    pdo_execute($sql);
}

// xóa slider
function delete_slider($id_slider){
    $sql="DELETE FROM slider where id_slider =".$id_slider ;
    pdo_execute($sql);
}

// load tất cả slider
function load_all_slider() {
    $row = 1;
    if (isset($_GET['pagesl'])) {
        $page = $_GET['pagesl'];
    }else{
        $page = 1 ; 
    }
    $from = ($page - 1) * $row; 
    $sql = "SELECT * from slider order by id_slider limit $from,$row";
    $list_slider =pdo_query($sql);
    return $list_slider ;
}

// load chi tiết slider
function load_one_slider($id_slider ){
    $sql="SELECT * FROM slider where id_slider =".$id_slider ;
    $id_slider=pdo_query_one($sql);
    return $id_slider;
}

// update slider
function update_slider($id_slider,$title,$image,$description){
    $sql="UPDATE slider set title='".$title."',image='".$image."',description='".$description."' where id_slider =".$id_slider ;
    pdo_execute($sql);
}
?> 