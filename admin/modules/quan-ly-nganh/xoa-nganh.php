<?php

include_once("../../../config/connect.php");
session_start();
if(isset($_SESSION['mail']))
{
    $id_nganh = $_GET['id_nganh'];
    $sql = "DELETE FROM nganh_hoc WHERE id = $id_nganh";
    $query = mysqli_query($conn,$sql);
    $sql1 = "DELETE FROM nganh_hoc_mon_hoc WHERE nganh_hoc_id = $id_nganh";
    $query1 = mysqli_query($conn,$sql1);
    header('location:../../index.php?page_layout=quan_ly_nganh');

}
 ?>