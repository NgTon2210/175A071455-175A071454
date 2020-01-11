


    <!--main-->
 <?php
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
$sql = "SELECT * FROM tin_tuc WHERE danh_muc=0";
$query_nganh = mysqli_query($conn,$sql);
$total_rows = mysqli_num_rows($query_nganh);
$total_pages = ceil($total_rows/$rows_per_page);
$list_pages = "";
$page_prev = $page - 1;
if($page_prev<1)
{
    $page_prev = 1;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=news_notify&page='.$page_prev.'">&laquo;</a></li>';

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
    $list_pages .= '<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=news_notify&page='.$i.'">'.$i.'</a></li>';
}


$page_next = $page +1;
if($page_next > $total_pages)
{
    $page_next = $total_pages;
}
$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=news_notify&page='.$page_next.'">&raquo;</a></li>';


 
?>
        <div class="news-notification">
            <div class="location">
                <div class="container"><span>Tin Tức Thông Báo > Tin Tức</span></div>
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
                            <div class="list-news">
                                <h3>Tin Tức</h3>
                              <?php 
                              $sql = "SELECT * FROM tin_tuc WHERE danh_muc= 0  ORDER BY id DESC LIMIT $per_row,$rows_per_page";
                              $query = mysqli_query($conn,$sql);
                              while($row = mysqli_fetch_assoc($query))
                              {?>
                                <div class="news1">
                                    <div class="img-news">
                                        <a href="">
                                            <img style="width: 200px; height:126px;"src="uploaded/<?php echo $row['ten_anh']; ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="title-news">
                                        <h5><a href="index.php?page_layout=detail&id_baiviet=<?php echo $row['id']; ?>"> <?php echo $row['tieu_de']; ?>
                                                </a></h5>
                                        <p class="p-content"><?php echo $row['tieu_de']; ?></p>
                                        <p class="p-view"><a href="index.php?page_layout=detail&id_baiviet=<?php echo $row['id']; ?>">>Xem chi tiết</a></p>
                                    </div>
                                </div>
                              <?php } ?>
                            </div>
                            <div id="pagination" class="text-right">
                                <ul class="pagination">
                                   <?php echo $list_pages; ?>
                                </ul> 
                            </div>     
                        </div>
                    </div>
                </div>
            </div>
        </div>
   