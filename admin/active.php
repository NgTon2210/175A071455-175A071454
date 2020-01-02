<?php 
include_once('../config/connect.php');
$passkey = $_GET["passkey"];
$sql = "select * from thanh_vien where code = '$passkey'";
$query = mysqli_query($conn,$sql);
$numrow = mysqli_num_rows($query);
if($numrow==1)
{
    $sql_state = "UPDATE thanh_vien SET trang_thai = '1' WHERE code = '$passkey'";
    $query_state = mysqli_query($conn,$sql_state);
}
?>

<h1>ok rồi đấy</h1>
 
