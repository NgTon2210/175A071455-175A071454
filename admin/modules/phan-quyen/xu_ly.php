<?php
    include "../../../config/connect.php";
    include "../../../function/function.php";
    $level=$_GET['level'];
    $id=$_GET['id'];
    
    $sql="UPDATE thanh_vien SET level='$level' WHERE id='$id'";
   if ( queryStr($sql)) {
       echo 'success';
   }
   else{
        echo 'error';
   }

?>