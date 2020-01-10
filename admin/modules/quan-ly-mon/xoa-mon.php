<?php

include_once("../../../config/connect.php");
session_start();
if(isset($_SESSION['mail']))
{
    $id_mon = $_GET['id_mon'];
    $sql = "DELETE FROM mon_hoc WHERE id = $id_mon";
    $query = mysqli_query($conn,$sql);
    header('location:../../index.php?page_layout=quan_ly_mon');

}
 ?>