<?php
function insert_category($name_category){
    $sql="INSERT INTO category(name_category) values('$name_category')";
    pdo_execute($sql);
}
function delete_category($id_category ){
    $sql="DELETE FROM category where id_category =".$id_category ;
    pdo_execute($sql);
}
function load_all_category(){
    $sql = "SELECT * FROM category order by id_category  desc";
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

?> 