<?php


// function load_quantity_product()
// {
//     $sql = "SELECT * from products";
//     $quantityproducts = pdo_query($sql);
//     // var_dump($quantityproducts);
//     return $quantityproducts;

// }

function load_thongke(){
    $sql="SELECT category.name_category as tenloai , category.id_category as maloai, count(products.id_product) as soluong, min(products.price) as giathapnhat,  max(products.price) as giacaonhat, avg(products.price) as giatrungbinh";
    $sql.=" from products left join category on category.id_category = products.category_id";
    $sql.=" group by category.id_category order by category.id_Category desc";
    $listtk = pdo_query($sql);
    return $listtk;
}
?>