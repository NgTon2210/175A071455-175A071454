<?php
ob_start();
$id_baiviet = $_GET['id_baiviet'];
$sql = "SELECT * FROM tin_tuc WHERE id='$id_baiviet'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($query);
 
if(isset($_POST['sbm']))
{
    $news_title = $_POST['news_title'];
    $news_category = $_POST['news_category'];

    if($news_image = $_FILES['news_image']['name']=='')
        {
            $news_image = $row['ten_anh'];
        }
    else
        {
            $news_image = $_FILES['news_image']['name'];
            $news_image_tmp_name = $_FILES['news_image']['tmp_name'];
            move_uploaded_file($news_image_tmp_name,'../uploaded'.$news_image);
        }
        $news_image = $_FILES['news_image']['name'];
        $news_image_tmp_name = $_FILES['news_image']['tmp_name'];

    $news_detail = $_POST['news_detail'];

    if(isset($_POST['news_featured']))
        {
            $news_featured = $_POST['news_featured'];
        }
    else
        {
            $news_featured = 0;
        }

        $sql_update = "UPDATE tin_tuc SET tieu_de='$news_title', noi_dung='$news_detail', noi_bat='$news_featured', danh_muc='$news_category', ten_anh='$news_image'  WHERE id ='$id_baiviet'";
        $query_update = mysqli_query($conn,$sql_update);
        
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
            <li class="active">Quản Lý Sinh Viên/Sửa Bài Viết</li>
        </ol>
    </div>
    <!--/.row-->


    <div class="panel panel-container">
        <!-- phần riêng -->
        <div class="panel panel-primary">
            <div class="panel-heading">Sửa Bài Viết</div>
            <div class="panel-body">
                <form class="form-horizontal row-border" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Tiêu đề</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="news_title" placeholder="Tiêu đề" value="<?php echo $row['tieu_de']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Danh Mục</label>
                        <div class="col-md-10">
                            <select class="form-control" name="news_category">
                                <option value="0">
                                    Tin Tức
                                </option>
                                <option value="<?php if($row['danh_muc']==1){echo '1';} ?>">
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
                                <img style="width: 350px; height:233.33px" id="avatar" src="../uploaded/<?php echo $row['ten_anh']; ?>">
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Nội dung</label>
                        <div class="col-md-10">
                            <textarea required name="news_detail" class="form-control" rows="3" value=""><?php echo $row['noi_dung']; ?></textarea>
                        </div>
                        <script>
                            CKEDITOR.replace('news_detail');
                        </script>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Tin nổi bật</label>
                        <div class="checkbox  col-md-10">
                            <label>
                                <input <?php if($row['noi_bat']==1){echo 'checked';} ?> name="news_featured" type="checkbox" value="1">Nổi bật
                            </label>
                        </div>
                    </div>
                    <div style="text-align: right;">
                        <button class="btn btn-primary" type="submit" name="sbm">Sửa bài viết</button>
                        <button class="btn btn-primary" type="reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>


    </div>

</div>

   