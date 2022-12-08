<?php 
function load_all_donhang(){
    $sql = "SELECT * from bill";
    $loadAllDonhang = pdo_query($sql);
    return $loadAllDonhang;
}
function load_one_donhang($id_bill) {
    $sql="SELECT * FROM bill_dentail  where id_bill=".$id_bill;
    $listdonhangchitiet=pdo_query($sql);
    // var_dump($sql);
    return $listdonhangchitiet;
}

function layprice($id_bill) {
    $sql="SELECT price,total FROM bill_dentail where id_bill=".$id_bill;
    $layprice=pdo_query($sql); 
    return $layprice;
}

function load_trangthaidonhang($id_bill){
    $sql="SELECT * FROM bill where id_bill=".$id_bill;
    $sanpham=pdo_query_one($sql);
    return $sanpham;
}
function updateTrangthai($id_bill,$id_user,$fullname,$status,$address) {
    $sql="UPDATE bill set fullname='".$fullname."', status='".$status."', address='".$address."' where id_bill=".$id_bill ;
    var_dump($sql);
    // die();
    pdo_execute($sql);
}
?>