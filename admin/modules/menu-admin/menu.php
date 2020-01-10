<?php
 if(!defined('SECURITY'))
 {
     die('ban khong the truy cap');
 }
//phan quyen 
$level = $_SESSION['level'];
$mail = $_SESSION['mail'];

?>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <?php
            $sql = "SELECT * FROM thanh_vien WHERE email = '$mail'";
            $query = mysqli_query($conn,$sql) ;
            $row = mysqli_fetch_assoc($query);
             ?> 
            <div class="profile-usertitle-name"><?php echo $row['ho_ten']; ?></div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>

        </div>
        <div class="clear"></div>
        <a class="btn btn-primary" href="#" role="button"> Đổi Mật Khẩu </a>
    </div>
    <div class="divider"></div>
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <?php if ($level == 3) { ?>
            <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                    Quản Lý Sinh Viên <span data-toggle="collapse" href="" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-1">
                    <?php 
                    $sql="SELECT lop_hoc.id,lop_hoc.ten_lop
                    FROM
                        thanh_vien 
                        INNER JOIN lop_hoc_giang_vien ON thanh_vien.id = lop_hoc_giang_vien.giang_vien_id
                        INNER JOIN lop_hoc ON lop_hoc.id = lop_hoc_giang_vien.lop_hoc_id
                    
                    WHERE thanh_vien.id = ".$_SESSION['id']."
                    ";
                    $data=getData($sql);
                    foreach($data as $value)
                    {
                    ?>
                    <li><a class="" href="index.php?page_layout=danh_sach_sinh_vien&id_lop=<?php echo $value['id'] ?>">
                            <span class="fa fa-arrow-right">&nbsp;</span> Lớp <?php echo $value['ten_lop'] ?>
                        </a></li>
                    <?php } ?>
                 
                </ul>
            </li>

            <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                    Quản Lý Điểm <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-2">
                    <?php    foreach($data as $value)
                    { ?>
                    <li><a class="" href="index.php?page_layout=quan_ly_diem">
                            <span class="fa fa-arrow-right">&nbsp;</span> Lớp <?php echo $value['ten_lop'] ?>
                        </a></li>
                    <?php } ?>
                    <li>
                </ul>
            </li>




            <?php
            $sql = "SELECT * FROM mon_hoc";
            $data = getData($sql);
            ?>
            <li class="parent "><a data-toggle="collapse" href="#sub-item-3">
                    Điểm và trọng số <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-3">
                    <?php
                    foreach ($data as $value) { ?>
                        <li><a class="" href="index.php?page_layout=thiet_lap_trong_so&id_mon=<?php echo $value['id']; ?>">
                                <span class="fa fa-arrow-right">&nbsp;</span> <?php echo $value['ten_mon']; ?>
                            </a></li>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>

        <?php
        if ($level == 2) {
        ?>
            <li><a href="index.php?page_layout=quan_ly_nganh">Quản lý ngành</a></li>
            <li><a href="index.php?page_layout=quan_ly_mon">Quản lý Môn học</a></li>
            <li><a href="index.php?page_layout=quan_ly_lop">Quản lý lớp</a></li>
        <?php } ?>

        
        <?php
        if ($level == 1) {
        ?>
            <li><a href="index.php?page_layout=danh_sach_bai_viet">Quản lý bài viết</a></li>
            <li><a href="index.php?page_layout=phan_quyen">Phân Quyền</a></li>
        <?php } ?>
        <li><a href="modules/dang-xuat/dang-xuat.php">Đăng Xuất</a></li>
    </ul>
</div>