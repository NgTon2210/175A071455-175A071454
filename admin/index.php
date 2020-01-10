<?php
ob_start();
session_start();
include_once('../config/connect.php');
include_once('../function/function.php');

if(isset($_SESSION['mail']))
{
    include_once('admin.php');
}
else
{
    include_once('modules/dang-nhap/dang-nhap.php');
}

 ?>