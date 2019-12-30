<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

</head>

<body>
   <!--header-->
   <?php include_once('modules/logo-admin/logo-admin.php'); ?>
   <!--menu-->
   <?php include_once('modules/menu-admin/menu.php'); ?>
    <!--main-->
   <?php
   if(isset($_GET['page_layout']))
   {
      switch ($_GET['page_layout']) {
          case 'danh_sach_bai_viet':   include_once('modules/bai-viet/danh-sach-bai-viet.php'); break;
          case 'sua_bai_viet':   include_once('modules/bai-viet/sua-bai-viet.php');  break;
          case 'them_bai_viet':   include_once('modules/bai-viet/them-bai-viet.php');  break;

          case 'phan_quyen':   include_once('modules/phan-quyen/phan-quyen.php');  break;

          case 'quan_ly_diem':   include_once('modules/quan-ly-diem/quan-ly-diem.php');  break;
          case 'nhap_diem':   include_once('modules/quan-ly-diem/nhap-diem.php');  break;

          case 'quan_ly_lop':   include_once('modules/quan-ly-lop/quan-ly-lop.php');  break;

          case 'quan_ly_mon':   include_once('modules/quan-ly-mon/quan-ly-mon.php');  break;

          case 'quan_ly_nganh':   include_once('modules/quan-ly-nganh/quan-ly-nganh.php');  break;

          case 'danh_sach_sinh_vien':   include_once('modules/quan-ly-sinh-vien/danh-sach-sinh-vien.php');  break;
          case 'sua_sinh_vien':   include_once('modules/quan-ly-sinh-vien/sua-sinh-vien.php');  break;
          case 'them_sinh_vien':   include_once('modules/quan-ly-sinh-vien/them-sinh-vien.php');  break;

          case 'thiet_lap_trong_so':   include_once('modules/thiet-lap-trong-so/thiet-lap-trong-so.php');  break;


          
          default:
              # code...
              break;
      }
   }
   else
   {
       include_once('modules/gioi-thieu/gioi-thieu.php');
   }
    ?>
    <!--/.main-->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script>
        window.onload = function () {
            var chart1 = document.getElementById("line-chart").getContext("2d");
            window.myLine = new Chart(chart1).Line(lineChartData, {
                responsive: true,
                scaleLineColor: "rgba(0,0,0,.2)",
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleFontColor: "#c5c7cc"
            });
        };
    </script>

</body>

</html>