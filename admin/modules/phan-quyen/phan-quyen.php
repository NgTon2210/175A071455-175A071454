
<?php 
$sql = "SELECT * FROM thanh_vien WHERE level != '1'";
$query = mysqli_query($conn,$sql);

//phan trang
if(isset($_GET['page']))
{
    $page = $_GET['page'];
}
else
{
    $page = 1;
}

$rows_per_page = 2; //sô bản ghi trên 1 trang
$per_row = $page*$rows_per_page - $rows_per_page;
$total_rows = mysqli_num_rows($query);
$total_pages = ceil($total_rows/$rows_per_page);
$list_pages = "";
$page_prev = $page - 1;
if($page_prev<1)
{
    $page_prev = 1;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=phan_quyen&page='.$page_prev.'">&laquo;</a></li>';

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
    $list_pages .= '<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=phan_quyen&page='.$i.'">'.$i.'</a></li>';
}


$page_next = $page +1;
if($page_next > $total_pages)
{
    $page_next = $total_pages;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=phan_quyen&page='.$page_next.'">&raquo;</a></li>';


?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Phân Quyền</li>
            </ol>
        </div>
        <!--/.row-->


        <div class="panel panel-container">
            <!-- phần riêng -->
            <div class="panel panel-default">
                <div class="panel-heading">Danh Sách Sinh Viên</div>
                <div class="panel-body btn-margins">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading"> 59TH2 - Môn web</div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Email</th>
                                            <th>Họ Tên</th>
                                            <th>Chức Vụ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM thanh_vien WHERE level != '1' ORDER BY level ASC LIMIT $per_row,$rows_per_page";
                                        $query = mysqli_query($conn,$sql);
                                         while($row = mysqli_fetch_assoc($query)){ ?>
                                        <tr>
                                            <td><?php echo $row['id'];?></td>
                                            <td><?php echo $row['email'];?></td>
                                            <td><?php echo $row['ho_ten'];?></td>
                                            <td>
                                               
                                                <form method="POST">
                                                <select data-id="<?php echo $row['id']; ?>" class="form-control phan_quyen" name="quyen">

                                                    <option  value="2" <?php if($row['level']==2){echo 'selected="selected"';} ?>>Quan ly</option>
                                                    <option  value="4" <?php if($row['level']==4){echo 'selected="selected"';} ?>>Hoc ISnh</option>
                                                    <option  value="3" <?php if($row['level']==3){echo 'selected="selected"';} ?>>Giao Vien</option>

                                                    
                                                </select>
                                                </form>
                                             
                                               
                                             </td>
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

 