<?php
function totalUser()
{
    $sql = "SELECT * from users";
    $loadalltaikhoan = pdo_query($sql);
    return $loadalltaikhoan;
    
}


?>