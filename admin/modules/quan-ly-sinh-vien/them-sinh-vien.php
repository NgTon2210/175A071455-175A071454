<?php
 if(!defined('SECURITY'))
 {
     die('ban khong the truy cap');
 } 

 if(isset($_POST['sbm']))
 {
     $ho_ten = $_POST['ho_ten'];
     $cmt = $_POST['cmt'];
     $email = $_POST['email'];
     $sdt = $_POST['sdt'];
     $dia_chi  = $_POST['dia_chi'];
    
    
 }
 ?>

 
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Quản Lý Sinh Viên/Thêm Sinh Viên</li>
        </ol>
    </div>
    <!--/.row-->


    <div class="panel panel-container">
        <!-- phần riêng -->
        <div class="panel panel-primary">
            <div class="panel-heading">Thêm Sinh Viên</div>
            <div class="panel-body">
                <form class="form-horizontal row-border" action="#" method="post">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Họ Tên</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="ho_ten" placeholder="Họ Tên">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Số Chứng Minh Thư</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="cmt" placeholder="Số Chứng Minh Thư">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Email</label>
                        <div class="col-md-10">
                            <input class="form-control" type="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Số Điện Thoại</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="sdt" placeholder="Số Điện Thoại">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Địa Chỉ</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="dia_chi" placeholder="Địa Chỉ">
                        </div>
                    </div>
                    <div style="text-align: right;">
                        <button class="btn btn-primary" type="submit" name="sbm">Thêm Sinh Viên</button>
                        <button class="btn btn-primary" type="reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>


    </div>

</div>
<!--/.main-->