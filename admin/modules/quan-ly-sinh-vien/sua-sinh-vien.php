<?php 
 if(!defined('SECURITY'))
 {
     die('ban khong the truy cap');
 }
 ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Quản Lý Sinh Viên/Sửa Sinh Viên</li>
        </ol>
    </div>
    <!--/.row-->


    <div class="panel panel-container">
        <div class="panel panel-primary">
            <div class="panel-heading">Sinh Viên :Nguyễn Văn Tôn</div>
            <div class="panel-body">
                <form class="form-horizontal row-border" action="#">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Họ Tên</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="placeholder" placeholder="Họ Tên"
                                value="Nguyễn Văn Tôn">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Số Chứng Minh Thư</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="placeholder" placeholder="Số Chứng Minh Thư"
                                value="017478331">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Email</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="placeholder" placeholder="Email"
                                value="ton@gmail.com">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Số Điện Thoại</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="placeholder" placeholder="Số Điện Thoại"
                                value="0121245485414">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Địa Chỉ</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="placeholder" placeholder="Địa Chỉ"
                                value="Vĩnh Phúc">
                        </div>
                    </div>
                    <div style="text-align: right;">
                        <button class="btn btn-primary" type="submit">Sửa Sinh Viên</button>

                    </div>
                </form>
            </div>
        </div>
        <!-- phần riêng -->

    </div>

</div>
<!--/.main-->