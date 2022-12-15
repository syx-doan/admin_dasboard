<?php
function insert_slider($title,$image,$description){
    $sql="INSERT INTO slider(title,image,description) values('$title','$image','$description')";
    var_dump($sql);
    // die();
    pdo_execute($sql);
}
function delete_slider($id_slider){
    $sql="DELETE FROM slider where id_slider =".$id_slider ;
    pdo_execute($sql);
}

function load_all_slider() {
    // $row = 5;
    // if (isset($_GET['pagel'])) {
    //     $page = $_GET['pagel'];
    // }else{
    //     $page = 1 ; 
    // }
    // $from = ($page - 1) * $row; 
    // limit $from,$row
    $sql = "SELECT * from slider order by id_slider ";
    $list_slider =pdo_query($sql);
    // var_dump($list_slider);
    return $list_slider ;
}

function load_one_slider($id_slider ){
    $sql="SELECT * FROM slider where id_slider =".$id_slider ;
    $id_slider=pdo_query_one($sql);
    return $id_slider;
}
function update_slider($id_slider,$title,$image,$description){
    $sql="UPDATE slider set title='".$title."',image='".$image."',description='".$description."' where id_slider =".$id_slider ;
    // var_dump($sql);
    // die();
    pdo_execute($sql);
}
// function navigation()
// {
//     $category = "SELECT * from category";

//     // 1 tính tổng bảng ghi của bảng
//     $total = "SELECT count id_category from category ";
//     // var_dump($total);
    
//     // 2 thiết lập số bảng ghi trong 1 trang
//     $limit = 2;
//     // 3 tính số trang
//     $page = ceil($total/$limit);
//     // var_dump($page);
    
//     // 4 lấy trang hiện tại
//     $cr_page = (isset($_GET['page']) ? $_GET['page'] : 1 );
//     // $cr_page = if((isset($_GET['page']) ? $_GET['page'] : 1)) {
//     //     include '../loai/list-loai.php';
//     // };
//     echo $cr_page;
    
//     // 5 tính start
//     $start = ($cr_page - 1 )*$limit;
//     echo $start;
//     // 
//     $category = "SELECT * from category limit $start,$limit";
// }
?> 