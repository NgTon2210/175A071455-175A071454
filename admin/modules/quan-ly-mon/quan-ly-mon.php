<?php 
 if(!defined('SECURITY'))
 {
     die('ban khong the truy cap');
 }
if(isset($_POST['sbm']))
{
    $ten_mon = $_POST['ten_mon'];
    $id_nganh = $_POST['id_nganh'];
    $sql = "INSERT INTO mon_hoc(ten_mon,qua_trinh) VALUES('$ten_mon',NULL)";
    queryStr($sql);

    $id_mon_hoc=mysqli_insert_id($conn);
    
    $sql2 = "INSERT INTO nganh_hoc_mon_hoc(nganh_hoc_id,mon_hoc_id) VALUES($id_nganh,$id_mon_hoc)";
    queryStr($sql2);


}
if(isset($_GET['page']))
{
    $page = $_GET['page'];
}
else
{
    $page = 1;
}

$rows_per_page = 5;
$per_row = $page*$rows_per_page - $rows_per_page;
$sql = "SELECT nganh_hoc_mon_hoc.mon_hoc_id, mon_hoc.id, mon_hoc.ten_mon, nganh_hoc.ten_nganh
FROM nganh_hoc_mon_hoc
INNER JOIN mon_hoc ON nganh_hoc_mon_hoc.mon_hoc_id = mon_hoc.id
INNER JOIN nganh_hoc ON nganh_hoc_mon_hoc.nganh_hoc_id = nganh_hoc.id  ";
$query_nganh = mysqli_query($conn,$sql);
$total_rows = mysqli_num_rows($query_nganh);
$total_pages = ceil($total_rows/$rows_per_page);
$list_pages = "";
$page_prev = $page - 1;
if($page_prev<1)
{
    $page_prev = 1;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=quan_ly_mon&page='.$page_prev.'">&laquo;</a></li>';

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
    $list_pages .= '<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=quan_ly_mon&page='.$i.'">'.$i.'</a></li>';
}


$page_next = $page +1;
if($page_next > $total_pages)
{
    $page_next = $total_pages;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=quan_ly_mon&page='.$page_next.'">&raquo;</a></li>';


 
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Quản Lý Môn</li>
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
                            <div class="panel-heading">Thêm Môn</div>
                            <div class="panel-body">
                                <form class="form-horizontal row-border" action="#" method="post">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tên Môn</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" name="ten_mon"
                                                placeholder="Tên Môn">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Thuộc Ngành</label>
                                        <div class="col-md-10">
                                            <?php 
                                                    $sql = "SELECT * FROM nganh_hoc ORDER BY id ASC";
                                                    $query = mysqli_query($conn,$sql);
                                                 ?>

                                            <select class="form-control" name="id_nganh">
                                                <?php while($row = mysqli_fetch_assoc($query)) {?>

                                                <option value="<?php echo $row['id']; ?>">
                                                    <?php echo $row['ten_nganh'] ?> 
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div style="text-align: right;">
                                        <button class="btn btn-primary" type="submit" name="sbm">Thêm Môn</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <th>Mã Môn</th>
                                        <th>Tên Môn</th>
                                        <th>Thuộc Ngành</th>
                                        <th>Chức Năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $sql = "SELECT nganh_hoc_mon_hoc.mon_hoc_id, mon_hoc.id, mon_hoc.ten_mon, nganh_hoc.ten_nganh
                                    FROM nganh_hoc_mon_hoc
                                    INNER JOIN mon_hoc ON nganh_hoc_mon_hoc.mon_hoc_id = mon_hoc.id
                                    INNER JOIN nganh_hoc ON nganh_hoc_mon_hoc.nganh_hoc_id = nganh_hoc.id   ORDER BY id DESC LIMIT $per_row,$rows_per_page";
                                    $query = mysqli_query($conn,$sql);
                                    while($row = mysqli_fetch_assoc($query)) {?>
                                    <tr>
                                        
                                        <td><?php echo $row['mon_hoc_id'] ?></td>
                                        <td><?php echo $row['ten_mon'] ?></td>
                                        <td>
                                            <?php echo $row['ten_nganh'] ?>
                                        </td>

                                        <td>
                                            <a class="btn btn-default btn-circle margin" href="modules/quan-ly-mon/xoa-mon.php?id_mon=<?php echo $row['id']; ?>"><span
                                                    class="fa fa-trash"></span></a></td>
                                    </tr>
                                    <?php } ?>

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