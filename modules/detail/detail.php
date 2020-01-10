<?php
$id_baiviet = $_GET['id_baiviet'];
$sql = "SELECT * FROM tin_tuc WHERE id = $id_baiviet";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($query);
 ?>
        <div class="news-notification">
            <div class="location">
                <div class="container"><span>Tin Tức Thông Báo > <?php if($row['danh_muc']==0){echo 'TIN TỨC';} else{echo 'THÔNG BÁO';}?></span></div>
            </div>
            <div class="main-n-noti">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="news-menu">
                                <h3 class="left">Tin tức & Thông báo</h3>
                                <div class="menu">
                                    <ul>
                                        <li><a href="index.php?page_layout=news_notify">> Tin tức</a></li>
                                        <li><a href="index.php?page_layout=notify">>Thông báo</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="title-detail">
                                <h4><?php echo $row['tieu_de']; ?></h4>
                            </div>
                            <div class="content-detail">
                                <p class="p-p1">
                                   <?php echo $row['noi_dung']; ?>
                                </p>
                                <img src="uploaded/<?php echo $row['ten_anh']; ?>" alt="" class="img-fluid">
                            
                            </div>
                           <div style="padding:25px 0px; color:gray;">--------------------------------------------------------------------------HẾT----------------------------------------------------------------------</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   