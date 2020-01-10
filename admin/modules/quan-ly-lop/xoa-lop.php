<?php

include_once("../../../config/connect.php");
session_start();
if(isset($_SESSION['mail']))
{
    $id_lop = $_GET['id_lop'];
    $sql = "DELETE FROM lop_hoc WHERE id = $id_lop";
    $query = mysqli_query($conn,$sql);
    $sql1 = "DELETE FROM mon_hoc_lop_hoc WHERE lop_hoc_id = $id_lop";
    $query1 = mysqli_query($conn,$sql1);
    $sql2 = "DELETE FROM lop_hoc_giang_vien WHERE lop_hoc_id = $id_lop";
    $query = mysqli_query($conn,$sql2);
    header('location:../../index.php?page_layout=quan_ly_lop');

}
 ?>