<?php
function insert_category($name_category){
    $sql="INSERT INTO category(name_category) values('$name_category')";
    pdo_execute($sql);
}
function delete_category($id_category ){
    $sql="DELETE FROM category where id_category =".$id_category ;
    pdo_execute($sql);
}
// function load_all_category(){
//     $sql = "SELECT * FROM category order by id_category  ";
//     $list_category =pdo_query($sql);
//     return $list_category ;
// }
function load_all_category() {
    $row = 5;
    if (isset($_GET['pagel'])) {
        $page = $_GET['pagel'];
    }else{
        $page = 1 ; 
    }
    $from = ($page - 1) * $row; 
    $sql = "SELECT * from category order by id_category  limit $from,$row";
    $list_category =pdo_query($sql);
    return $list_category ;
}

function load_one_category($id_category ){
    $sql="SELECT * FROM category where id_category =".$id_category ;
    $id_category=pdo_query_one($sql);
    return $id_category;
}
function update_category($id_category,$name_category){
    $sql="UPDATE category set name_category='".$name_category."' where id_category =".$id_category ;
    // var_dump($sql);
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