<?php 
$sql = "SELECT * FROM tin_tuc";
$data = getData($sql);

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
                <div class="panel-heading">Danh Sách Tin Tức</div>
                <div class="panel-body btn-margins">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            
                            <div class="panel-body">
                             <div class="add" style="padding: 15px 0px;">  <a class="btn btn-default btn-circle margin" href="index.php?page_layout=them_bai_viet"><span style="width:30px;"
                                                        class="fa fa-plus"></span></a></div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Danh Mục</th>
                                            <th>Tiêu đề bài viết</th>
                                            <th>Ảnh minh họa</th>
                                            <th>Nội dung</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                      
                                       foreach($data as $value)
                                       {?>
                                        <tr>
                                            <td><?php echo $value['id']; ?></td>
                                            <td><a href="index.php?page_layout=sua_bai_viet&id_baiviet=<?php echo $value['id'];?>"><?php if($value['danh_muc']==0){echo 'Tin Tức';} else{echo 'Thông Báo';}?></a></td>
                                            <td><?php echo $value['tieu_de']; ?></td>
                                            <td style="text-align: center"><img width="130" height="180" src="../uploaded/<?php echo $value['ten_anh'];?>" /></td>
                                            <td><?php echo $value['noi_dung']; ?></td>

                                            <td>
                                                <a class="btn btn-default btn-circle margin" href="modules/bai-viet/xoa-bai-viet.php?id_baiviet=<?php echo $value['id']; ?>"><span
                                                        class="fa fa-trash"></span></a></td>
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

   