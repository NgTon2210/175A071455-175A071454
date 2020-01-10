<?php
if (isset($_POST['sbm'])) {
    $news_title = $_POST['news_title'];
    $news_category = $_POST['news_category'];
    $news_image = $_FILES['news_image']['name'];
    $news_image_tmp_name = $_FILES['news_image']['tmp_name'];
    $news_detail = $_POST['news_detail'];
    if (isset($_POST['news_featured'])) {
        $news_featured = $_POST['news_featured'];
    } else {
        $news_featured = 0;
    }


    $sql = "INSERT INTO tin_tuc(tieu_de,noi_dung,noi_bat,danh_muc,ten_anh) VALUES('$news_title','$news_detail','$news_featured','$news_category','$news_image')";
    queryStr($sql);

    move_uploaded_file($news_image_tmp_name, '../uploaded/' . $news_image);
    header("location:index.php?page_layout=danh_sach_bai_viet");
}
?>
<script src="ckeditor/ckeditor.js"></script>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Quản Lý Sinh Viên/Thêm Bài Viết</li>
        </ol>
    </div>
    <!--/.row-->


    <div class="panel panel-container">
        <!-- phần riêng -->
        <div class="panel panel-primary">
            <div class="panel-heading">Thêm Bài Viết</div>
            <div class="panel-body">
                <form class="form-horizontal row-border" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Tiêu đề</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="news_title" placeholder="Tiêu đề">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Danh Mục</label>
                        <div class="col-md-10">
                            <select class="form-control" name="news_category">
                                <option value="0">
                                    Tin Tức
                                </option>
                                <option value="1">
                                    Thông Báo
                                </option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Ảnh bài viết</label>
                        <div class="col-md-10">
                            <input class="hidden" id="img" onchange="changeImg(this)" required name="news_image" type="file"> <br>
                            <div class="upload-image">
                                <img id="avatar" src="image/no-image-slide.webp">
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Nội dung</label>
                        <div class="col-md-10">
                            <textarea required name="news_detail" class="form-control" rows="3"></textarea>
                        </div>
                        <script>
                            CKEDITOR.replace('news_detail');
                        </script>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Tin nổi bật</label>
                        <div class="checkbox  col-md-10">
                            <label>
                                <input name="news_featured" type="checkbox" value="1">Nổi bật
                            </label>
                        </div>
                    </div>
                    <div style="text-align: right;">
                        <button class="btn btn-primary" type="submit" name="sbm">Thêm bài viết</button>
                        <button class="btn btn-primary" type="reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>


    </div>

</div>

<!--/.main-->