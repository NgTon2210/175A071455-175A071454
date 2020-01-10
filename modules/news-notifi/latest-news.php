<?php 
$sql = "SELECT * FROM tin_tuc ORDER BY ID DESC LIMIT 3";
$query = mysqli_query($conn,$sql);
 ?>
<div class="news">
    <h3>Tin Mới Nhất</h3>
    <div class="row">
        <?php 
        while($row = mysqli_fetch_assoc($query))
        {?>
         <div class="col-lg-4">
            <div class="latest-new">
                <a href="">
                    <img style="width: 350px; height:233.33px;" src="uploaded/<?php echo $row['ten_anh']; ?>" alt="" class="img-fluid">
                    <p><?php echo $row['tieu_de']; ?></p>
                    <a href="index.php?page_layout=detail&id_baiviet=<?php echo $row['id']; ?>"><div class="link"><span><i class="fas fa-eye"></i></span></div></a>
                </a>
            </div>
        </div>
        <?php } ?>
    </div>
</div>