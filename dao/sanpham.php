<?php 
function insert_sanpham($name,$category_id,$brand_id,$image,$price,$quantity,$description){
    $sql="INSERT INTO products(name,category_id,brand_id,image,price,quantity,description) values('$name','$category_id','$brand_id','$image','$price','$quantity','$description')";
    pdo_execute($sql);
    // var_dump($sql);
    // die();
}
function load_sanpham(){
    $sql = "SELECT * FROM category,products,brand where  products.brand_id = brand.id_brand and products.category_id=category.id_category order by id_product desc";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function load_one_sanpham($id_product){
    $sql="SELECT * FROM products where id_product=".$id_product;
    $sanpham=pdo_query_one($sql);
    return $sanpham;
}
function delete_sanpham($id_product){
    $sql="DELETE FROM products where id_product=".$id_product;
    pdo_execute($sql);
}

// function update_sanpham($id_user,$fullname,$username,$password,$phone,$email,$address,$role){
//    $sql=" UPDATE users set fullname ='".$fullname."' , username='".$username."' , password='".$password."' ,phone='".$phone."' , email='".$email."', address='".$address."', role='".$role."' where id_user=".$id_user;
//    pdo_execute($sql);
// //    var_dump($sql);
// }
