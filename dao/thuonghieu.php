<?php
function insert_thuonghieu($name_brand,$image_brand){
    $sql="INSERT INTO brand(name_brand,image_brand) values('$name_brand','$image_brand')";
    pdo_execute($sql);
}
function delete_thuonghieu($id_brand){
    $sql="DELETE FROM brand where id_brand =".$id_brand ;
    pdo_execute($sql);
}
// function load_all_thuonghieu(){
//     $sql = "SELECT * FROM brand order by id_brand  desc";
//     $listbrand =pdo_query($sql);
//     return $listbrand ;
//     var_dump($listbrand);
// }
function load_all_thuonghieu(){
    $row = 5;
    if (isset($_GET['paget'])) {
        $page = $_GET['paget'];
    }else{
        $page = 1 ; 
    }
    $from = ($page - 1) * $row; 
    $sql = "SELECT * FROM brand order by id_brand limit  $from,$row";
    $listbrand =pdo_query($sql);
    return $listbrand ;
}
function load_all_thuonghieu_product(){
    
    $sql = "SELECT * FROM brand order by id_brand   ";
    $listbrand =pdo_query($sql);
    return $listbrand ;
}
function load_one_thuonghieu($id_brand){
    $sql="SELECT * FROM brand where id_brand=".$id_brand;
    $brand=pdo_query_one($sql);
    return $brand;
}
function update_thuonghieu($id_brand,$name_brand,$image_brand){
    if($image_brand != "")
    $sql="UPDATE brand set name_brand='".$name_brand."', image_brand='".$image_brand."' where id_brand=".$id_brand;
    else
    $sql="UPDATE brand set name_brand='".$name_brand."' where id_brand=".$id_brand;
    pdo_execute($sql);
}

// function navigation(){
// $brand = mysqli_query($connect,"SELECT * from brand");
// $total = mysqli_num_rows($brand);
// var_dump($total);
// }
?> 