
<?php 
 if(!defined('SECURITY'))
 {
     die('ban khong the truy cap');
 }

 $id_mon=$_GET['id_mon'];

  //cap nhat
  if(isset($_POST['btn']))
  {
      $qua_trinh=$_POST['trong_so1'];
     $sql="UPDATE mon_hoc
     SET qua_trinh =  $qua_trinh
     WHERE id=$id_mon";
     queryStr($sql);
  }

  
 $sql="SELECT * FROM mon_hoc where id=$id_mon";
 $mon_hoc=getData($sql)[0];



 ?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Thiết lập trọng số</li>
            </ol>
        </div>
        <!--/.row-->


        <div class="panel panel-container">
             <!-- phần riêng -->
            <div class="panel panel-primary">
                <div class="panel-heading">Thiết lập trong số môn : Môn <?php echo $mon_hoc['ten_mon'] ?></div>
                <div class="panel-body">
                    <form action="index.php?page_layout=thiet_lap_trong_so&id_mon=<?php echo $id_mon; ?>" class="form-horizontal row-border"  method="POST">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Điểm quá trình</label>
                            <div class="col-md-10">
                                <select name="trong_so1" onchange="getPoint()" id="trong_so1" class="form-control">
                                    <option <?php if($mon_hoc['qua_trinh']==30) echo 'selected' ?> value="30">30 %</option>
                                    <option <?php if($mon_hoc['qua_trinh']==40) echo 'selected' ?> value="40">40 %</option>
                                    <option <?php if($mon_hoc['qua_trinh']==50) echo 'selected' ?> value="50">50 %</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Điểm thi</label>
                            <div class="col-md-10">
                                <input id="trong_so2" class="form-control" type="text"  readonly="" value="<?php if($mon_hoc['qua_trinh']!=NULL) echo 100-$mon_hoc['qua_trinh']; else echo 70; ?> %">
                            </div>
                        </div>
                      
                        <div style="text-align: right;"> 
                            <button name="btn" class="btn btn-primary" type="submit">Cập Nhật</button>
                        
                        </div>
                    </form>
                </div>
            </div>
           

        </div>

    </div>
    <!--/.main-->
    <script>
        function getPoint(){
            let trong_so1=document.getElementById('trong_so1').value;
            trong_so2=100-trong_so1;
            document.getElementById('trong_so2').value=trong_so2+' %';
        }
        
    </script>
