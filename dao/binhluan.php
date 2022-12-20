<?php

// Load tất cả bình luận
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

// Load  bình luận theo id_peoduct
function load_blct($id_product){
    $row = 5;
    if (isset($_GET['pagecmtct'])) {
        $page = $_GET['pagecmtct'];
    }else{
        $page = 1 ; 
    }
    $from = ($page - 1) * $row;
    $sql = "SELECT comment.content,comment.ngaybinhluan,comment.id_comment,users.fullname,products.id_product  FROM comment JOIN users ON comment.id_user=users.id_user JOIN products ON comment.id_product=products.id_product  WHERE products.id_product=" . $id_product;
    $loadblct=pdo_query($sql);
    return $loadblct;
}

// xóa bình luận theo id_comment
function delete_bl($id_comment){
    $sql="DELETE FROM comment where id_comment=".$id_comment;
    pdo_execute($sql);
}
?> 