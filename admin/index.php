<?php
session_start();
include_once('../config/connect.php');
if(isset($_SESSION['mail']) && isset($_SESSION['pass']))
{
    include_once('admin.php');
}
else
{
    include_once('modules/dang-nhap/dang-nhap.php');
}

 ?>