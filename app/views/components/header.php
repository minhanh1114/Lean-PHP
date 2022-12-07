<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300ita‌​lic,400italic,500,500italic,700,700italic,900italic,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/client/css/product.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/client/css/slide.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/client/css/gird.css">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/client/css/response.css">
<title>Document</title>
</head>
<body>
    <!-- modal bar -->
    <div class="bar_menu-mobile">
        <div class="bar_container">
            <div class="close_bar-container"><p class="close_bar-mobile"><i class="fa-solid fa-x"></p></i></div>
            <ul class="menu_mobile-list">
                <li class="menu_mobile__item">
                    <a class="menu_mobile__link" href="<?php echo _WEB_ROOT ?>"><i class="fa-sharp fa-solid fa-house-chimney"></i> TRANG CHỦ</a>
                </li>
                <li class="menu_mobile__item">
                    <a class="<?php echo _WEB_ROOT . '/gioi-thieu' ?>" href="">GIỚI THIỆU</a>
                </li>
                <li class="menu_mobile__item">
                    <a class="menu_mobile__link" href="#">SẢN PHẨM <span class="menu_mobile-icon"><i class="fa-sharp fa-solid fa-chevron-down"></i></span></a>
                    
                    <ul class="menu_mobile_submenu">
                    <?php foreach ($sub_content['typesProduct'] as $type)
                        {
                        ?>
                        <li class="nav-submenu_item" ><a class="nav-submenu_link" href="<?php echo _WEB_ROOT . '/loai-san-pham/'.$type['slug_type']. '.html'?>"><?php echo $type['name_type'] ?></a></li>
                                                            
                        <?php
                            }
                        ?>
                
                        
                      </ul>
                </li>
                <li class="menu_mobile__item">
                    <a class="menu_mobile__link" href="<?php echo _WEB_ROOT . '/tin-tuc' ?>">TIN TỨC</a>
                </li>
                <li class="menu_mobile__item">
                    <a class="<?php echo _WEB_ROOT . '/lien-he' ?>" href="">LIÊN HỆ</a>
                </li>
        </ul>
        <form class="bar_search-mobile" action="<?php echo _WEB_ROOT . '/search' ?>" method="post">
            <input type="text" name="k" placeholder="Tìm kiếm... " class="bar_mobile__input">
            <button type="submit" class="bar_mobile__submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        </div>
</div>
<!-- app -->
    <div class="app">
        <header class="header">
        <div class="header-top">
            <div class="grid wide">
                <div class="row">
                    <div class=" col l-6 header-top_left">
                        <span class="header-top_wellcome">Well come to Tân Minh Nhật </span>
                        <span class="header-top_email"><i class="fa-solid fa-envelope"></i> tanminhnhat@gmail.com</span>
                    </div>
                    <div class="col l-6 header-top_right">
                        <span class="header-top_social">
                            <i class="fa-brands fa-facebook"></i>
                            <i class="fa-brands fa-twitter"></i>
                            <i class="fa-brands fa-google"></i>
                            <span class="header-top_language">
                                Tiếng việt <i class="fa-solid fa-chevron-down"></i>
    
                            </span>
                        </span >
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="grid wide ">
            <div class="row header-container">
                
                <div class=" col l-3 m-12 c-12 ">
                    <div class="header_mobile-contact">
                        <a href="tel:0973022983" class="header_mobile-phone">0973 022 983</a>
                        <p>Nhân viên tư vấn</p>
                        <p>(Hỗ trợ 24/7)</p>
                    </div>
                    <div class="bar-mobile"><i class="fa-solid fa-bars"></i> <br>Menu</div>
                    <a href="<?php echo _WEB_ROOT ?>" class="header-logo"><img src="<?php echo _WEB_ROOT ?>/public/assets/client/images/logo.jpg" alt="" ></a>
                 </div>
                 <div class="col l-9 m-0 c-0 header-right">
                    <div class=" header-content">
                        <a href=""  class=" header-content_item">
                             
                                <img src="<?php echo _WEB_ROOT ?>/public/assets/client/images/icon-dich-vu.png" alt="" class=" header-content_icon" >
                                <div class=" header-content_text">
                                    <h4 class="header-content_title">dịch vụ chuyên nghiệp</h4>
                                    <p class="header-content_des">Độ tin cậy, Năng lực, Tác phong</p>
                                </div>
                            
                        </a>
                        <a href="" class=" header-content_item">
                            
                                <img src="<?php echo _WEB_ROOT ?>/public/assets/client/images/icon-san-pham.jpg" alt="" class="  header-content_icon">
                                <div class=" header-content_text">
                                    <h4 class="header-content_title">SẢN PHẨM CHẤT LƯỢNG</h4>
                                    <p class="header-content_des">Bảo hành 10 năm</p>
                                </div>
                           
                        </a>
                        <a href="" class=" header-content_item">
                            
                                <img src="<?php echo _WEB_ROOT ?>/public/assets/client/images/icon-chat-luong.png" alt="" class="  header-content_icon">
                                <div class=" header-content_text">
                                    <h4 class="header-content_title">UY TÍN HÀNG ĐẦU</h4>
                                    <p class="header-content_des">Năng lực & Nhiệt huyết</p>
                                </div>
                            
                        </a>
                        <a href="" class=" header-content_item">
                           
                                <img src="<?php echo _WEB_ROOT ?>/public/assets/client/images/icon-handshake.png" alt="" class="  header-content_icon">
                                <div class=" header-content_text">
                                    <h4 class="header-content_title">MẪU MÃ ĐA DẠNG</h4>
                                    <p class="header-content_des">Sản phẩm chất lượng cao</p>
                                </div>
                          
                        </a>
                    </div>
                    
                  
                 </div>
            </div>
           
        </div>
         
        </header>
        <div class="main-content">
            <div class="grid wide">
                <div class="row no-gutters">
                    <div class="col  l-3 m-0 c-0" style="">
                        <nav class="category">
                            <h1 class="category_heading">
                                <div class="category_heading-title">
                                    <i class="fa-solid fa-bars"></i>
                                    <span class="category_heading-text">DANH MỤC</span>
                                </div>
                                <div class="category_heading-icon">
                                    <i class="fa-sharp fa-solid fa-chevron-down"></i>
                                </div>
                            </h1>
                            <ul class="category_list">
                                <?php foreach ($sub_content['typesProduct'] as $type)
                                        {
                                        ?>
                                         <li class="category_item" ><a class="category_link" href="<?php echo _WEB_ROOT . '/loai-san-pham/'.$type['slug_type']. '.html'?>"><?php echo $type['name_type'] ?></a></li>
                                                            
                                        <?php
                                            }
                                        ?>
                                
                            </ul>
                        </nav>
                    </div>
                    <div class="col  l-9 m-12 c-12 " style="">
                        <nav class="navigation-content">
                            <ul class="navigation-content__list">
                                    <li class="navigation-content__item">
                                        <a class="navigation-content__link" href="<?php echo _WEB_ROOT ?>"><i class="fa-sharp fa-solid fa-house-chimney"></i> TRANG CHỦ</a>
                                    </li>
                                    <li class="navigation-content__item">
                                        <a class="navigation-content__link" href="<?php echo _WEB_ROOT . '/gioi-thieu' ?>">GIỚI THIỆU</a>
                                    </li>
                                    <li class="navigation-content__item nav-content_dropdown">
                                        <a class="navigation-content__link" href="#">SẢN PHẨM</a>
                                        <ul class="nav-content_submenu">
                                        <?php foreach ($sub_content['typesProduct'] as $type)
                                        {
                                        ?>
                                         <li class="nav-submenu_item" ><a class="nav-submenu_link" href="<?php echo _WEB_ROOT . '/loai-san-pham/'.$type['slug_type']. '.html'?>"><?php echo $type['name_type'] ?></a></li>
                                                            
                                        <?php
                                            }
                                        ?>
       
                                          </ul>
                                    </li>
                                    <li class="navigation-content__item">
                                        <a class="navigation-content__link" href="<?php echo _WEB_ROOT . '/tin-tuc' ?>">TIN TỨC</a>
                                    </li>
                                    <li class="navigation-content__item">
                                        <a class="navigation-content__link" href="<?php echo _WEB_ROOT . '/lien-he' ?>">LIÊN HỆ</a>
                                    </li>
                            </ul>
                            <form class="navigation-search" method="POST" action="<?php echo _WEB_ROOT . '/search' ?>">

                                <input type="text" name="k" placeholder="Tìm kiếm sản phẩm" class="navigation-search__input">
                                <button type="submit" class="navigation-search__submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </nav>

                    </div>

                </div>