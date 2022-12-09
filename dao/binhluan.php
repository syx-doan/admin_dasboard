<?php
// function insert_category($name_category){
//     $sql="INSERT INTO category(name_category) values('$name_category')";
//     pdo_execute($sql);
// }
// function delete_category($id_category ){
//     $sql="DELETE FROM category where id_category =".$id_category ;
//     pdo_execute($sql);
// }
// function load_all_comment(){
//     $sql = "SELECT * FROM comment order by id_comment desc";
//     $listcomment =pdo_query($sql);
//     return $listcomment ;
// }
// function load_all_comment_idproduct($id_product){
//     $sql = "SELECT comment.content,comment.ngaybinhluan,comment.id_comment ,users.fullname,products.id_product FROM comment JOIN users ON comment.id_user=user.id_user JOIN products ON comment.id_product=product.id_product WHERE product.id_product=".$id_product;
//      if($id_product > 0)$sql.=" AND id_product='".$id_product."' ";
//      $sql.=" order by id_comment desc";
//      $listbinhluan=pdo_query($sql);
//      return $listbinhluan;
//  }
 function load_bl($id_comment){
    $row = 5;
    if (isset($_GET['pagecmt'])) {
        $page = $_GET['pagecmt'];
    }else{
        $page = 1 ; 
    }
    $from = ($page - 1) * $row; 
    $sql = "SELECT products.id_product,products.name, COUNT(comment.content) as 'soluong' FROM comment JOIN products ON comment.id_product = products.id_product GROUP BY products.id_product,products.name HAVING soluong > 0 ORDER BY soluong  limit $from,$row";
    $listbinhluan=pdo_query($sql);
    return $listbinhluan;
}

function load_blct($id_product){
    $row = 5;
    if (isset($_GET['pagecmtct'])) {
        $page = $_GET['pagecmtct'];
    }else{
        $page = 1 ; 
    }
    $from = ($page - 1) * $row;
    $sql = "SELECT comment.content,comment.ngaybinhluan,comment.id_comment,users.fullname,products.id_product  FROM comment JOIN users ON comment.id_user=users.id_user JOIN products ON comment.id_product=products.id_product  WHERE products.id_product=" . $id_product;
    // $sql .= " limit $from,$row"; 
    $loadblct=pdo_query($sql);
    // var_dump($loadblct);
    return $loadblct;
}
function delete_bl($id_comment){
    $sql="DELETE FROM comment where id_comment=".$id_comment;
    pdo_execute($sql);
}
?> 