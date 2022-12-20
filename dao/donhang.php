<?php 

// Load tất cả đơn hàng
function load_all_donhang(){
    $row = 5;
    if (isset($_GET['pagedh'])) {
        $page = $_GET['pagedh'];
    }else{
        $page = 1 ; 
    }
    $from = ($page - 1) * $row; 
    $sql = "SELECT * from bill limit $from,$row";
    $loadAllDonhang = pdo_query($sql);
    return $loadAllDonhang;
}

// Load đơn hàng chi tiết
function load_one_donhang($id_bill) {
    $sql="SELECT * FROM bill_dentail inner join products on bill_dentail.id_product= products.id_product  where id_bill=".$id_bill;
    $listdonhangchitiet=pdo_query($sql);
    return $listdonhangchitiet;
}

// Lấy giá ,số lượng của sản phẩm trong hàng
function layprice($id_bill) {
    $sql="SELECT price,total FROM bill_dentail where id_bill=".$id_bill;
    $layprice=pdo_query($sql); 
    return $layprice;
}

// Load trạng thái đơn hàng
function load_trangthaidonhang($id_bill){
    $sql="SELECT * FROM bill where id_bill=".$id_bill;
    $sanpham=pdo_query_one($sql);
    return $sanpham;
}

// update trạng thái của đơn hàng: đang xử lí, đang giao ,đã hủy
function updateTrangthai($id_bill,$id_user,$fullname,$status,$address) {
    $sql="UPDATE bill set fullname='".$fullname."', status='".$status."', address='".$address."' where id_bill=".$id_bill ;
    var_dump($sql);
    pdo_execute($sql);
}
?>