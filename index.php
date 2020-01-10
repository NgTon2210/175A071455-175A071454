<?php include_once('config/connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/newstyle.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/repon.css">
    <link rel="stylesheet" href="css/login_student.css">
    

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
        integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
   
</head>

<body>
    <header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                   <?php include_once('modules/contact/phone.php'); ?>
                    <?php include_once('modules/contact/internet.php'); ?>
                    <?php include_once('modules/contact/sigin.php');?>
                </div>
            </div>
        </div>
        <!--end header-top-->

        <div class="container">
            <div class="header-bottom ">
                <div class="row">
                  <?php include_once('modules/logo/logo-top.php'); ?>
                   <?php include_once('modules/studen-login/studen-login.php'); ?>
                </div>

                <!--menu-->
                <div class="row">
                    <?php include_once('modules/menu/menu-main.php'); ?>
                </div>
            </div>
        </div>
        
        
          
        <!--slide-->
     <?php 
     if(!isset($_GET['page_layout']))
     {
        include_once('modules/slide/slide.php');
     }
      ?>
    </header>
    <!--end header-->
    <main>
        <div class="container">
            <div class="row">
                <!--menu mid-->
              <?php if(!isset($_GET['page_layout'])){include_once('modules/menu/menu-mid.php');} ?>
                <!--end menu mid-->
            </div>

            <!--news main-->
            <div class="content-main">
                <?php
                if(isset($_GET['page_layout']))
                {
                    switch ($_GET['page_layout']) {
                        case 'news_notify':include_once("modules/news-notifi/news.php");break;
                        case 'notify':include_once("modules/news-notifi/notification.php");break;
                        case 'detail':include_once("modules/detail/detail.php");
                    }
                }
                else
                {
                    include_once("modules/news-notifi/latest-news.php");
                    include_once("modules/news-notifi/feature-news.php");
                }
                 ?>
            </div>
    </main>
    <footer>
       <?php include_once('modules/footer/footer-top.php'); ?>
       <?php include_once('modules/footer/footer-bottom.php'); ?>
    
    </footer>
    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/rp.js"></script>
</body>

</html>