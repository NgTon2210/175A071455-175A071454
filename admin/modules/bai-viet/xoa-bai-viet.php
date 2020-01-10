<?php
include_once("../../../config/connect.php");

$id_baiviet = $_GET['id_baiviet'];
$sql = "DELETE FROM tin_tuc WHERE id = '$id_baiviet' ";
$query = mysqli_query($conn,$sql);
header('location:../../index.php?page_layout=danh_sach_bai_viet');
  

?>