<?php 
 if(!defined('SECURITY'))
 {
     die('ban khong the truy cap');
 }

 //phan trang
 if(isset($_GET['page']))
{
    $page = $_GET['page'];
}
else
{
    $page = 1;
}

$rows_per_page = 3;
$per_row = $page*$rows_per_page - $rows_per_page;
$sql =   "SELECT lop_hoc.id, lop_hoc.ten_lop, mon_hoc.ten_mon, thanh_vien.ho_ten
FROM lop_hoc
INNER JOIN mon_hoc_lop_hoc ON mon_hoc_lop_hoc.lop_hoc_id = lop_hoc.id
INNER JOIN mon_hoc ON mon_hoc_lop_hoc.mon_hoc_id = mon_hoc.id
INNER JOIN lop_hoc_giang_vien ON lop_hoc_giang_vien.lop_hoc_id = lop_hoc.id
INNER JOIN thanh_vien ON lop_hoc_giang_vien.giang_vien_id = thanh_vien.id";
$query_nganh = mysqli_query($conn,$sql);
$total_rows = mysqli_num_rows($query_nganh);
$total_pages = ceil($total_rows/$rows_per_page);
$list_pages = "";
$page_prev = $page - 1;
if($page_prev<1)
{
    $page_prev = 1;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=quan_ly_lop&page='.$page_prev.'">&laquo;</a></li>';

for($i = 1; $i<=$total_pages; $i++)
{
    if($i == $page)
    {
        $active = 'active';
    }
    else
    {  
        $active = '';
    }
    $list_pages .= '<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=quan_ly_lop&page='.$i.'">'.$i.'</a></li>';
}


$page_next = $page +1;
if($page_next > $total_pages)
{
    $page_next = $total_pages;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=quan_ly_lop&page='.$page_next.'">&raquo;</a></li>';
//het phant trang

 
if(isset($_POST['sbm']))
{
    $ten_lop = $_POST['ten_lop'];
    $id_mon = $_POST['id_mon'];
    $id_giang_vien = $_POST['id_gv'];
    $sql = "INSERT INTO lop_hoc(ten_lop) VALUES('$ten_lop')";
    queryStr($sql);

    $id_lop_hoc=mysqli_insert_id($conn);
    
    $sql2 = "INSERT INTO mon_hoc_lop_hoc(mon_hoc_id,lop_hoc_id) VALUES($id_mon,$id_lop_hoc)";
    queryStr($sql2);

    $sql3 = "INSERT INTO lop_hoc_giang_vien(lop_hoc_id,giang_vien_id) VALUES($id_lop_hoc,$id_giang_vien)";
    queryStr($sql3);


}
?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Quản lý lớp</li>
            </ol>
        </div>
        <!--/.row-->


        <div class="panel panel-container">
            <!-- phần riêng -->
            <div class="panel panel-default">

                <div class="panel-body btn-margins">
                    <div class="col-md-12">
                        <div class="panel panel-primary">

                            <div class="panel panel-primary" style="width: 80%; margin: auto; ">
                                <div class="panel-heading">Thêm Lớp Học</div>
                                <div class="panel-body">
                                    <form class="form-horizontal row-border" action="#" method="POST">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Tên Lớp</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="ten_lop"
                                                    placeholder="Tên lớp học">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Chọn môn học</label>
                                            <div class="col-md-10">
                                            <?php 
                                                $sql = "SELECT * FROM mon_hoc ORDER BY id ASC";
                                                $query = mysqli_query($conn, $sql);
                                            ?>
                                                <select class="form-control" name="id_mon">
                                                <?php while($row = mysqli_fetch_assoc($query)) {?>
                                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['ten_mon'] ?></option>
                                                    <!-- <option value="">Công nghệ Web</option>
                                                    <option value="">Phân tích thiết kế hệ thống thông tin</option> -->
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Chọn Giảng Viên</label>
                                            <div class="col-md-10">

                                            <?php 
                                            $sql = "SELECT * FROM thanh_vien WHERE level=3"; 
                                            $query = mysqli_query($conn,$sql);
                                            ?>
                                            
                                                <select class="form-control" name="id_gv">
                                                    <?php while($row = mysqli_fetch_assoc($query)) {?>

                                                    <option value="<?php echo $row['id'] ?>">
                                                    <?php echo $row['ho_ten'] ?></option>
                                                    <!-- <option value="">Nguyễn Văn Linh</option> -->
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div style="text-align: right;">
                                            <button class="btn btn-primary" type="submit" name="sbm">Thêm Lớp</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Mã Lớp</th>
                                            <th>Tên Lớp</th>
                                            <th>Môn học</th>
                                            <th>Giảng Viên</th>
                                            <th>Chức Năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $sql = "SELECT lop_hoc.id, lop_hoc.ten_lop, mon_hoc.ten_mon, thanh_vien.ho_ten
                                    FROM lop_hoc
                                    INNER JOIN mon_hoc_lop_hoc ON mon_hoc_lop_hoc.lop_hoc_id = lop_hoc.id
                                    INNER JOIN mon_hoc ON mon_hoc_lop_hoc.mon_hoc_id = mon_hoc.id
                                    INNER JOIN lop_hoc_giang_vien ON lop_hoc_giang_vien.lop_hoc_id = lop_hoc.id
                                    INNER JOIN thanh_vien ON lop_hoc_giang_vien.giang_vien_id = thanh_vien.id  ORDER BY id DESC LIMIT $per_row,$rows_per_page";
                                    $query= mysqli_query($conn,$sql);
                                    while($row = mysqli_fetch_assoc($query)) {?>
                                        <tr>
                                            <td><?php echo$row['id']?></td>
                                            <td><?php echo $row['ten_lop']?></td>
                                            <td><?php echo $row['ten_mon'] ?></td>
                                            <td>
                                            <?php echo $row['ho_ten'] ?>
                                            </td>

                                            <td>
                                                <a class="btn btn-default btn-circle margin" href="modules/quan-ly-lop/xoa-lop.php?id_lop=<?php echo $row['id']; ?>"><span
                                                        class="fa fa-trash"></span></a></td>
                                        </tr>
                                    <?php }?>
                                       
                                    </tbody>
                                </table>
                                <div style="text-align: right;">

                                    <ul class="pagination">
                                    <?php echo $list_pages; ?>
                                    </ul>

                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--/.main-->
