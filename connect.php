<?php
$connect = mysqli_connect('localhost','root','','do_an_tot_nghiep');
if ($connect) {
  mysqli_query($connect,"SET NAMES 'UTF8'");
  echo "Ket noi thanh cong";
}else {
  echo "ket noi that bai";
}
?>