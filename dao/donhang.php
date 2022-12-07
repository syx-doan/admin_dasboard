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

function tongdongia() {
    $sql="SELECT * FROM bill,bill_dentail  where bill.id_bill=bill_dentail.id_bill";
    $listdonhangchitiet=pdo_query($sql);
    return $listdonhangchitiet;
}
?>