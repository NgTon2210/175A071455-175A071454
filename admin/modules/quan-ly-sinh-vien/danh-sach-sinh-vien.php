<?php
if (!defined('SECURITY')) {
    die('ban khong the truy cap');
}
$id_lop=$_GET['id_lop'];
$sql="SELECT ho_ten,so_cmt,so_dien_thoai,dia_chi,thanh_vien.id
FROM
    lop_hoc 
    INNER JOIN lop_hoc_sinh_vien ON lop_hoc.id = lop_hoc_sinh_vien.lop_hoc_id
    INNER JOIN thanh_vien ON thanh_vien.id = lop_hoc_sinh_vien.sinh_vien_id

WHERE lop_hoc.id = $id_lop

";
$data=getData($sql);
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
            <div class="panel-heading">Danh Sách Sinh Viên</div>
            <div class="panel-body btn-margins">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <?php  ?>
                        <div class="panel-heading text-light"> 59TH2 - Môn web <a class="btn btn-default btn-circle margin" href="index.php?page_layout=them_sinh_vien#"><span class="fa fa-plus"></span> Thêm sinh viên</a></div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã Sinh Viên</th>
                                        <th>Số CMT</th>
                                        <th>Họ Tên</th>
                                        <th>Chức Năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach($data as $value) {?>
                                    <tr>
                                        <td>1</td>
                                        <td><a href="#">#<?php echo $value['id'] ?></a></td>
                                        <td><?php echo $value['so_cmt'] ?></td>
                                        <td><?php echo $value['ho_ten'] ?></td>


                                        <td>
                                            <a class="btn btn-default btn-circle margin" href="#"><span class="fa fa-trash"></span></a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div style="text-align: right;">

                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
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