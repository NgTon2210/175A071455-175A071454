<?php

$conn = mysqli_connect('localhost','root','','ql_diem');
if($conn)
{
    mysqli_query($conn, "SET NAMES 'utf8'");// giá trị kết nối
}
else
{
    die('kết nối thất bại');
    include_once('../admin/index.php');
}
 ?>