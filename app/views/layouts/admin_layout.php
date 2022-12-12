
 <!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo empty($sub_content['title']) ? "Trang quản trị" : $sub_content['title'] ?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!-- add -->
    <link href="<?php echo _WEB_ROOT?>/public/assets/admin/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo _WEB_ROOT?>/public/assets/admin/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?php echo _WEB_ROOT?>/public/assets/admin/assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo _WEB_ROOT?>/public/assets/admin/assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo _WEB_ROOT?>/public/assets/admin/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <!-- end -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- ckeditor -->
    <script src="<?php echo _WEB_ROOT?>/public/assets/admin/ckfinder/ckfinder.js" >
    </script>
    <script src="<?php echo _WEB_ROOT?>/public/assets/admin/ckeditor5/ckeditor.js" >
    </script>


    <style>
        .description .ck-editor__editable {
                min-height: 500px !important;
            }
        /* .des_short .ck-editor__editable {
                min-height: 200px !important;
            } */
        </style>
</head>

<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                   Hệ thống quản trị
                </a>
            </div>

            <ul class="nav">
                <li >
                    <a href="<?php echo _WEB_ROOT . '/quantri'?>">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo _WEB_ROOT . '/admin/product' ?>">
                        <i class="pe-7s-user"></i>
                        <p>Sản Phẩm</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo _WEB_ROOT . '/admin/news' ?>">
                        <i class="pe-7s-news-paper"></i>
                        <p>Tin Tức</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo _WEB_ROOT . '/admin/user' ?>">
                        <i class="pe-7s-user"></i>
                        <p>Tài Khoản</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo _WEB_ROOT . '/admin/Dashboard/icons'?>">
                        <i class="pe-7s-science"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <!-- <li>
                    <a href="maps.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li> -->
                <li>
                    <a href="<?php echo _WEB_ROOT . '/admin/Dashboard/notification'?>">
                        <i class="pe-7s-bell"></i>
                        <p>Notification</p>
                    </a>
                </li>
				
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class=" d-inline-flex align-items-center">
                    
                    <h4 class="d-flex align-items-center" style="margin:17px 0">Xin chào:</h4>
                    <div class="dropdown">
                    
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php if(!empty(Session::data('loginAdmin')))
                                        {
                                               if(Session::data('loginAdmin') == 1)
                                               {
                                                 echo 'Quản Lí';
                                               }
                                        }
                                    ?>
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo _WEB_ROOT . '/admin/login/logout' ?>">
                                        <p>Đăng xuất</p>
                                    </a></li>
                            </ul>
                    </div>
                    <button style="margin-top:30px" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- <p class="navbar-brand" >
                                    
                    </p> -->
                    
                               
                                   
                                
                </div>
                
                <div class="collapse navbar-collapse">
                   
                    <ul class="nav row navbar-right">
                        <li>
                           <a href="">
                               
                            </a>
                        </li>
                        
                        
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>
            <!-- End Navbar -->

            <!-- Nội dung  -->
            <?php
        
                     $this->render($content,$sub_content);
            ?>
            
            <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="">Creative Tân Minh Nhật</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

<!-- add -->
 <!--   Core JS Files   -->
 <script src="<?php echo _WEB_ROOT?>/public/assets/admin/assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="<?php echo _WEB_ROOT?>/public/assets/admin/assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="<?php echo _WEB_ROOT?>/public/assets/admin/assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo _WEB_ROOT?>/public/assets/admin/assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="<?php echo _WEB_ROOT?>/public/assets/admin/assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="<?php echo _WEB_ROOT?>/public/assets/admin/assets/js/demo.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();
            <?php
             if(!empty($mess)) 
                 {echo "$.notify({icon: 'pe-7s-gift',message: '".$mess."'},{type: 'info',timer: 2000});";}
             
             
             ?>

        	
    	});
	</script>


</html>
