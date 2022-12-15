<?php
function load_quantity_product()
{
    $sql = "SELECT * from products";
    $quantityproducts = pdo_query($sql);
    // var_dump($quantityproducts);
    return $quantityproducts;
    
}


?>