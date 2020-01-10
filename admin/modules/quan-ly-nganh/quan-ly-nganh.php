
<?php
if(isset($_POST['sbm']))
{
    $ten_nganh = $_POST['ten_nganh'];
    $id_mon = $_POST['id_mon'];
    if(isset($id_mon)){
    $sql = "INSERT INTO nganh_hoc(ten_nganh) VALUES('$ten_nganh')";
    queryStr($sql);

    $id_nganh_hoc=mysqli_insert_id($conn);
    
    $sql2 = "INSERT INTO nganh_hoc_mon_hoc(nganh_hoc_id,mon_hoc_id) VALUES($id_nganh_hoc,$id_mon)";
    queryStr($sql2);
    }
    else{
        $sql = "INSERT INTO nganh_hoc(ten_nganh) VALUES('$ten_nganh')";
    queryStr($sql);
    }
}

//code phan trang
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
$sql = "SELECT * FROM nganh_hoc";
$query_nganh = mysqli_query($conn,$sql);
$total_rows = mysqli_num_rows($query_nganh);
$total_pages = ceil($total_rows/$rows_per_page);
$list_pages = "";
$page_prev = $page - 1;
if($page_prev<1)
{
    $page_prev = 1;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=quan_ly_nganh&page='.$page_prev.'">&laquo;</a></li>';

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
    $list_pages .= '<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=quan_ly_nganh&page='.$i.'">'.$i.'</a></li>';
}


$page_next = $page +1;
if($page_next > $total_pages)
{
    $page_next = $total_pages;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=quan_ly_nganh&page='.$page_next.'">&raquo;</a></li>';


 ?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Quản Lý Sinh Viên</li>
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
                                <div class="panel-heading">Thêm Ngành</div>
                                <div class="panel-body">
                                    <form class="form-horizontal row-border" action="#" method="post">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Tên Ngành</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="ten_nganh" placeholder="Tên Ngành">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                        <label class="col-md-2 control-label">Môn Thuộc Ngành</label>
                                        <div class="col-md-10">
                                            <?php 
                                                    $sql = "SELECT * FROM mon_hoc ORDER BY id ASC";
                                                    $query = mysqli_query($conn,$sql);
                                                 ?>

                                            <select class="form-control" name="id_mon">
                                                <?php while($row = mysqli_fetch_assoc($query)) {?>
                                                <option value="" <?php echo'selected="selected"' ?>>
                                                </option>

                                                <option value="<?php echo $row['id']; ?>">
                                                    <?php echo $row['ten_mon'] ?> 
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        </div>
                                     
                                        <div style="text-align: right;"> 
                                            <button class="btn btn-primary" type="submit" name="sbm">Thêm Ngành</button>
                                         
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                          
                                            <th>Mã Ngành</th>
                                            <th>Tên Ngành</th>
                                            <!-- <th>Môn</th> -->
                                            <th>Chức Năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <?php
                                        $sql = "SELECT * FROM nganh_hoc ORDER BY id DESC LIMIT $per_row,$rows_per_page";
                                        // $sql = "SELECT nganh_hoc_mon_hoc.nganh_hoc_id, nganh_hoc.id, nganh_hoc.ten_nganh, mon_hoc.ten_mon
                                        // FROM nganh_hoc_mon_hoc
                                        // INNER JOIN nganh_hoc ON nganh_hoc_mon_hoc.nganh_hoc_id = nganh_hoc.id
                                        // INNER JOIN mon_hoc ON nganh_hoc_mon_hoc.mon_hoc_id = mon_hoc.id";
                                        $query = mysqli_query($conn,$sql);
                                         while($row = mysqli_fetch_assoc($query)) {?>
                                
                                            <tr>
                                           
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['ten_nganh'] ?></td>
                                            <td>
                                                <a class="btn btn-default btn-circle margin" href="modules/quan-ly-nganh/xoa-nganh.php?id_nganh=<?php echo $row['id']; ?>">
                                                <span class="fa fa-trash"></span></a></td>
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

    