<?php

// thêm loại
function insert_category($name_category){
    $sql="INSERT INTO category(name_category) values('$name_category')";
    pdo_execute($sql);
}
// xóa loại
function delete_category($id_category ){
    $sql="DELETE FROM category where id_category =".$id_category ;
    pdo_execute($sql);
}

// Load tất cả loại
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
function load_all_category_product() {

    $sql = "SELECT * from category order by id_category ";
    $list_category =pdo_query($sql);
    return $list_category ;
}

// Load chi tiết loại
function load_one_category($id_category ){
    $sql="SELECT * FROM category where id_category =".$id_category ;
    $id_category=pdo_query_one($sql);
    return $id_category;
}

// update loại
function update_category($id_category,$name_category){
    $sql="UPDATE category set name_category='".$name_category."' where id_category =".$id_category ;
    pdo_execute($sql);
}
?> 