
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
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/client/css/styles.css">
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
                    <a class="menu_mobile__link" href="<?php echo _WEB_ROOT . '/gioi-thieu' ?>">GIỚI THIỆU</a>
                </li>
                <li class="menu_mobile__item">
                    <a class="menu_mobile__link" href="#">SẢN PHẨM <span class="menu_mobile-icon"><i class="fa-sharp fa-solid fa-chevron-down"></i></span></a>
                    
                    <ul class="menu_mobile_submenu">
                    <?php foreach ($typesProduct as $type)
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
                    <a class="menu_mobile__link" href="<?php echo _WEB_ROOT . '/lien-he' ?>">LIÊN HỆ</a>
                </li>
        </ul>
        <form class="bar_search-mobile" action=" " method="">
            <input type="text" name="search" placeholder="Tìm kiếm... " class="bar_mobile__input">
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
                        <a href="" class="header-logo"><img src="<?php echo _WEB_ROOT ?>/public/assets/client/images/logo.jpg" alt="" ></a>
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
                
                <div class="row">
                    <div class="col  l-3 m-0 c-0" style="margin-right: -12px;">
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
                                            <?php foreach ($typesProduct as $type)
                                            {
                                            ?>
                                                 <li class="category_item">
                                                    <a href="<?php echo _WEB_ROOT . '/loai-san-pham/'.$type['slug_type']. '.html'?>" class="category_link"><?php echo $type['name_type'] ?></a>
                                                 </li>
                                            <?php
                                                }
                                            ?>
                              
                                
                            </ul>
                        </nav>
                    </div>
                    <div class="col  l-9 m-12 c-12 " style="margin-left: -12px;">
                        <nav class="navigation-content">
                            <ul class="navigation-content__list">
                                    <li class="navigation-content__item">
                                        <a class="navigation-content__link" href="<?php echo _WEB_ROOT  ?>"><i class="fa-sharp fa-solid fa-house-chimney"></i> TRANG CHỦ</a>
                                    </li>
                                    <li class="navigation-content__item">
                                        <a class="navigation-content__link" href="<?php echo _WEB_ROOT . '/gioi-thieu' ?>">GIỚI THIỆU</a>
                                    </li>
                                    <li class="navigation-content__item nav-content_dropdown">
                                        <a class="navigation-content__link" href="#">SẢN PHẨM</a>
                                        <ul class="nav-content_submenu">
                                            <?php foreach ($typesProduct as $type)
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
                            <form method="POST" action="<?php echo _WEB_ROOT ?>/home/search" class="navigation-search">
                                <input type="text" name="key" placeholder="Tìm kiếm sản phẩm" class="navigation-search__input">
                                <button type="submit" class="navigation-search__submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </nav>
                        <div class="slider-content">
                            <!-- slide 1 -->
                            <div class="slide">
                              <img src="https://source.unsplash.com/random?landscape,mountain" alt="" />
                            </div>
                          
                            <!-- slide 2 -->
                            <div class="slide">
                              <img src="https://source.unsplash.com/random?landscape,cars" alt="" />
                            </div>
                          
                            <!-- slide 3 -->
                            <div class="slide">
                              <img src="https://source.unsplash.com/random?landscape,night" alt="" />
                            </div>
                          
                            <!-- slide 4 -->
                            <div class="slide">
                              <img src="https://source.unsplash.com/random?landscape,city" alt="" />
                            </div>
                          
                            <!-- Control buttons -->
                            <button class="btn-slide btn-next"> <i class="fa-solid fa-chevron-right"></i> </button>
                            <button class="btn-slide btn-prev"> <i class="fa-solid fa-chevron-left"></i></i></button>
                          </div>
                    </div>
                </div>
               <div class="promo-product">
                    <h1 class="promo-product_heading"><a href="" class="promo-text_link" >Sản Phẩm Khuyến Mãi</a></h1>
                    <div class="row">
                        <div class="col l-4 m-6 c-12">
                            <a href=""  class ="promo-product_link">
                                <img class="promo-product-img" src="https://nhualaysang.com/uploads/images/slide/dang-dac-polycarbonate.jpg" alt="" >
                            </a>
                        </div>
                        <div class="col l-4 m-6 c-12">
                            <a href="">
                                <img class="promo-product-img"  src="https://nhualaysang.com/uploads/images/slide/dang-dac-polycarbonate.jpg" alt="">
                            </a>
                        </div>
                        <div class="col l-4 m-6 c-12">
                            <a href="">
                            <img class="promo-product-img"  src="https://nhualaysang.com/uploads/images/slide/tam-nhua-lay-sang.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- product catalog -->
                <div class="product-catalog">
                    <h1 class="promo-product_heading"><a href="<?php echo $typesProduct[0]['slug_type'] ?>" class="promo-text_link" ><?php echo $typesProduct[0]['name_type'] ?></a></h1>
                    <div class="row">
                        <div class="col l-2 m-0 c-0">
                            <a href=""  class ="promo-product_link">
                                <img class="product-catalog_img" src="<?php echo _WEB_ROOT ?>/public/assets/client/images/banner-home.png" alt="" >
                            </a>
                        </div>
                        <div class="col l-10 m-12 c-12">
                            <div class="home-product">
                                <div class="row sm-gutter">
                                    <?php foreach($productList['one'] as $product )
                                    {
                                    ?>
                                    <div class="col l-3 m-4 c-6">
                                        <a href="<?php echo _WEB_ROOT . '/san-pham/'. $product['slug'] .'.html' ?>" class="home-product_item">
                                            <img class="home-product_img" src="<?php echo _WEB_ROOT . '/public/assets/products/'.$product['img'] ?>"></img>
                                            <h4 class="home-product_heading"><?php echo $product['name']  ?></h4>
                                            <p class="home-product_code">Mã sản phẩm: <?php echo $product['code']  ?></p>
                                            <p class="hom-product-price">Liên hệ</p>
                                        </a>
                                    </div>
                                    <?php } ?>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- !end product catalog -->

                <!-- product catalog -->
                <div class="product-catalog">
                    <h1 class="promo-product_heading"><a href="<?php echo $typesProduct[1]['slug_type'] ?>" class="promo-text_link" ><?php echo $typesProduct[1]['name_type'] ?></a></h1>
                    <div class="row">
                        <div class="col l-2 m-0 c-0">
                            <a href=""  class ="promo-product_link">
                                <img class="product-catalog_img" src="<?php echo _WEB_ROOT ?>/public/assets/client/images/banner-home.png" alt="" >
                            </a>
                        </div>
                        <div class="col l-10 m-12 c-12">
                            <div class="home-product">
                                <div class="row sm-gutter">
                                <?php foreach($productList['two'] as $product )
                                    {
                                    ?>
                                    <div class="col l-3 m-4 c-6">
                                        <a href="<?php echo _WEB_ROOT . '/san-pham/'. $product['slug'] .'.html' ?>" class="home-product_item">
                                            <img class="home-product_img" src="<?php echo _WEB_ROOT . '/public/assets/products/'.$product['img'] ?>"></img>
                                            <h4 class="home-product_heading"><?php echo $product['name']  ?></h4>
                                            <p class="home-product_code">Mã sản phẩm: <?php echo $product['code']  ?></p>
                                            <p class="hom-product-price">Liên hệ</p>
                                        </a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- !end product catalog  two-->

                <!-- product catalog three -->
                <div class="product-catalog">
                    <h1 class="promo-product_heading"><a href="<?php echo $typesProduct[2]['slug_type'] ?>" class="promo-text_link" ><?php echo $typesProduct[2]['name_type'] ?></a></h1>
                    <div class="row">
                        <div class="col l-2 m-0 c-0">
                            <a href=""  class ="promo-product_link">
                                <img class="product-catalog_img" src="<?php echo _WEB_ROOT ?>/public/assets/client/images/banner-home.png" alt="" >
                            </a>
                        </div>
                        <div class="col l-10 m-12 c-12">
                            <div class="home-product">
                                <div class="row sm-gutter">
                                <?php foreach($productList['three'] as $product )
                                    {
                                    ?>
                                    <div class="col l-3 m-4 c-6">
                                        <a href="<?php echo _WEB_ROOT . '/san-pham/'. $product['slug'] .'.html' ?>" class="home-product_item">
                                            <img class="home-product_img" src="<?php echo _WEB_ROOT . '/public/assets/products/'.$product['img'] ?>"></img>
                                            <h4 class="home-product_heading"><?php echo $product['name']  ?></h4>
                                            <p class="home-product_code">Mã sản phẩm: <?php echo $product['code']  ?></p>
                                            <p class="hom-product-price">Liên hệ</p>
                                        </a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- !end product catalog -->

                <!-- product catalog four -->
                <div class="product-catalog">
                    <h1 class="promo-product_heading"><a href="<?php echo $typesProduct[3]['slug_type'] ?>" class="promo-text_link" ><?php echo $typesProduct[3]['name_type'] ?></a></h1>
                    <div class="row">
                        <div class="col l-2 m-0 c-0">
                            <a href=""  class ="promo-product_link">
                                <img class="product-catalog_img" src="<?php echo _WEB_ROOT ?>/public/assets/client/images/banner-home.png" alt="" >
                            </a>
                        </div>
                        <div class="col l-10 m-12 c-12">
                            <div class="home-product">
                                <div class="row sm-gutter">
                                <?php foreach($productList['four'] as $product )
                                    {
                                    ?>
                                    <div class="col l-3 m-4 c-6">
                                        <a href="<?php echo _WEB_ROOT . '/san-pham/'. $product['slug'] .'.html' ?>" class="home-product_item">
                                            <img class="home-product_img" src="<?php echo _WEB_ROOT . '/public/assets/products/'.$product['img'] ?>"></img>
                                            <h4 class="home-product_heading"><?php echo $product['name']  ?></h4>
                                            <p class="home-product_code">Mã sản phẩm: <?php echo $product['code']  ?></p>
                                            <p class="hom-product-price">Liên hệ</p>
                                        </a>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- !end product catalog -->
                
                <!-- start news -->
                <div class="product-catalog">
                    <h1 class="promo-product_heading"><a href="" class="promo-text_link" >Tin Tức - Sự Kiện</a></h1>
                    <div class="row">
                        
                        <div class="col l-8 m-12 c-12">                      
                                <a href="<?php echo _WEB_ROOT .'/tin-tuc/'.$news[0]['slug'] .'.html' ?>" class="home-news">
                                    <h1 class="home-news_heading"><?php echo $news[0]['title']?></h1>
                                    <div class="home-news_continer">
                                        <img width="280px" class="home-news_img" src="<?php echo _WEB_ROOT .'/public/assets/news/'.$news[0]['img']  ?>"></img>
                                        <div class="home-new_content">
                                            <p class="home-news_date">Ngày đăng: <?php $dt = new DateTime($news[0]['date']); echo $dt->format('m/d/Y');?></p>
                                            <p class="hom-news-des">Chi tiết các bước thi công tấm nhựa ốp tường nano Lion</p>
                                        </div>
                                        
                                    </div>
                                    
                                </a>
                            
                        </div>
                        <div class="col l-4 m-12 c-12">
                                        <div class="new_offer">
                                            <a href="<?php echo _WEB_ROOT .'/tin-tuc/'.$news[1]['slug'] .'.html' ?>" class="home-news">
                                                <div class="row ">

                                                   <div class="col l-5 m-5 c-5">
                                                       <img class="home-news_img offer-img" src="<?php echo _WEB_ROOT .'/public/assets/news/'.$news[1]['img']  ?>"></img>
                                                   </div> 
                                                   <div class="col l-7 m-6 c-6">
                                                        <div class="home-new_content offer-content">
                                                            <p class="hom-news-des"><?php echo $news[1]['title']?></p>
                                                            <p class="home-news_date">Ngày đăng: <?php $dt = new DateTime($news[1]['date']); echo $dt->format('m/d/Y');?></p>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                
                                            </a>
                                         </div>
                                        <div class="new_offer">
                                            <a href="<?php echo _WEB_ROOT .'/tin-tuc/'.$news[2]['slug'] .'.html' ?>" class="home-news">
                                                <div class="row ">

                                                   <div class="col l-5 m-5 c-5">
                                                       <img class="home-news_img offer-img" src="<?php echo _WEB_ROOT .'/public/assets/news/'.$news[2]['img']  ?>"></img>
                                                   </div> 
                                                    
                                                   <div class="col l-7 m-6 c-6">
                                                        <div class="home-new_content offer-content">
                                                            <p class="hom-news-des"><?php echo $news[2]['title']?></p>
                                                            <p class="home-news_date">Ngày đăng: <?php $dt = new DateTime($news[2]['date']); echo $dt->format('m/d/Y');?></p>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                
                                            </a>
                                        
                                         </div>
                                </div>
                    </div>
                </div>

                </div>
        </div>
        
        <!-- slide two -->
        <div class="slide-two">
            <h1 class="slide-two_heading">ĐỐI TÁC</h1>
            <div class="display-area">
                <div class="cards-wrapper">
                  <div class="card"><img src="<?php echo _WEB_ROOT ?>/public/assets/client/images/vingroup.jpg" alt=""></div>
                  <div class="card"><img src="<?php echo _WEB_ROOT ?>/public/assets/client/images/sungroup.jpg" alt=""></div>  
                  <div class="card"><img src="<?php echo _WEB_ROOT ?>/public/assets/client/images/tonhoasen.jpg" alt=""></div>
                  <div class="card"><img src="<?php echo _WEB_ROOT ?>/public/assets/client/images/vinamilk.jpg" alt=""></div>
              
                  <div class="card"><img src="<?php echo _WEB_ROOT ?>/public/assets/client/images/makrolon-bayer.png" alt=""></div>
                  <div class="card"><img src="<?php echo _WEB_ROOT ?>/public/assets/client/images/plogo6.jpg" alt=""></div>  
                  <div class="card"><img src="<?php echo _WEB_ROOT ?>/public/assets/client/images/plogo5.jpg" alt=""></div>
                  <div class="card"><img src="<?php echo _WEB_ROOT ?>/public/assets/client/images/plogo4.jpg" alt=""></div>
                  
                  <div class="card"><img src="<?php echo _WEB_ROOT ?>/public/assets/client/images/plogo3.jpg" alt=""></div>
                  <div class="card"><img src="<?php echo _WEB_ROOT ?>/public/assets/client/images/vingroup.jpg" alt=""></div>
                  <div class="card"><img src="<?php echo _WEB_ROOT ?>/public/assets/client/images/plogo2.jpg" alt=""></div>  
                  <div class="card"><img src="<?php echo _WEB_ROOT ?>/public/assets/client/images/makrolon-bayer.png" alt=""></div>

                </div> 
              </div>
              <button class="slider-two_left"> <i class="fa-solid fa-chevron-left"></i> </button>
              <button class="slider-two_right"> <i class="fa-solid fa-chevron-right"></i></i></button>
              
              <div class="dots-wrapper">
                <button class="dot active"></button>
                <button class="dot"></button>
                <button class="dot"></button>
                <button class="dot dot-mobile"></button>
              </div>
              
        </div>
        <!-- footer -->
        <footer class="footer">
            <div class="grid wide footer__content">
                <div class="row">
                    <div class="col l-4 m-4 c-12">
                        <h3 class="footer__hedding">VỀ CHÚNG TÔI</h3>
                        <ul class="footer-list">
                            <li class="footer-item">
                                <a href="#" class="footer-name_cty " >Công ty TNHH Thương Mại Và Dịch Vụ Tân Minh Nhật</a>
                            </li>
                            <li class="footer-item footer-flexbox">
                                <a href="#" class="footer-item_link">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <p class="footer-item_location">
                                        Văn Phòng Giao Dịch: Số 32, Thanh Lân, Thanh Trì, Hoàng Mai, Hà Nội
                                    </p>
                                     
                            </li>
                            <li class="footer-item">
                                <a href="tel:0973 022 983" class="footer-item_link" style="color: #006600; margin-left: 15px; font-weight: 600;">Tel: 0973 022 983 </a>
                            </li>
                            <li class="footer-item footer-flexbox">
                                <a href="#" class="footer-item_link">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <p class="footer-item_location">
                                        Nhà Máy: Số 32, Thanh Lân, Thanh Trì, Hoàng Mai, Hà Nội
                                    </p>
                                     
                            </li>
                            <li class="footer-item">
                                <a href="tel:0964 297 683" class="footer-item_link" style="color: #006600; margin-left: 15px; font-weight: 600;">Tel: 0964 297 683  </a>
                            </li>
                            <li class="footer-item">
                                <h1  class="footer-item_link" style="margin-left: 15px; font-size: 2rem;">HOTLINE:  <a href="tel:0905988900" style=" font-weight: bold ;font-family: 'Open Sans'; color: #ce0000; display: block;"> 0973 022 983</a></h1>
                            </li>
                           
                            
                        </ul>
                    </div>
                    <div class="col l-3 m-4 c-12">
                        <h3 class="footer__hedding">Chăm sóc khách hàng</h3>
                        <ul class="footer-list">
                            <li class="footer-item">
                                <a href="#" class="footer-item_link">Giới Thiệu</a>
                            </li>
                            <li class="footer-item">
                                <a href="#" class="footer-item_link">Trung Tâm Trợ Giúp</a>
                            </li>
                            <li class="footer-item">
                                <a href="#" class="footer-item_link">Hướng dẫn thi công</a>
                            </li>
                            
                            <li class="footer-item">
                                <a href="#" class="footer-item_link">Hướng Dẫn Mua Hàng</a>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="col l-2 m-4 c-12">
                        <h3 class="footer__hedding">THANH TOÁN</h3>
                        <ul class="footer-list-tt">
                            <li class="footer-item-tt">
                                <div class="footer-vn-background footer-vn-visa-png" style="width: 55px; height: 18px;"></div>
                            </li>
                            <li class="footer-item-tt">
                                <div class="footer-vn-background footer-vn-mastercard-png" style="width: 55px; height: 29px;"></div>
                            </li>
                            <li class="footer-item-tt">
                                <div class="footer-vn-background footer-vn-jcb-png" style="width: 55px; height: 23px;"></div>
                            </li>
                            <li class="footer-item-tt">
                               <img src="<?php echo _WEB_ROOT ?>/public/assets/client/images/logo-vnpay.png" alt="">
                            </li>
                            <li class="footer-item-tt">
                                <div class="footer-vn-background footer-vn-vn_cod_footer-png" style="width: 50px; height: 29px;"></div>
                            </li>
                            <li class="footer-item-tt">
                                <img src="<?php echo _WEB_ROOT ?>/public/assets/client/images/logo-atm.png" alt="">
                            </li>
                            <li class="footer-item-tt">
                                <img src="<?php echo _WEB_ROOT ?>/public/assets/client/images/bct.png" alt="" width="100%">
                            </li>
                        </ul>
                       
                    </div>
                     
                    <div class="col l-3 m-4 c-12">
                        <h3 class="footer__hedding">Vị trí </h3>
                        <div class="footer-dowload">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d930.3682103180541!2d106.42420572922792!3d21.133572950026743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313579167eaf0125%3A0xb9c9b66790e5035e!2zQ8O0bmcgdHkgVE5ISCBUaMawxqFuZyBtYcyjaSB2YcyAIHNhzIluIHh1w6LMgXQgVMOibiBNaW5oIE5ow6LMo3Q!5e0!3m2!1svi!2s!4v1669120955913!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="footer__bottom">
                <div class="grid wide">
                    <p class="footer__text">© Bản quyền thuộc về Công ty TNHH Thương mại và sản xuất Tân Minh Nhật</p>
                </div>
            </div>
        </footer>
        
    </div>
    <!-- zalo ring -->
    <div class="hotline-zalo_ring">
        <div class="hotline-phone-ring">
            <div class="hotline-zalo-ring-circle"></div>
            <div class="hotline-zalo-ring-circle-fill"></div>
            <div class="hotline-zalo-ring-icon">
                <a href="https://zalo.me/0973 022 983">
                    <img class="hotline-phone-ring-img" src="<?php echo _WEB_ROOT ?>/public/assets/client/images/zalo.png" alt="">
                </a>
            </div>
        </div>

    </div>
    <!-- phone ring -->
    <div class="hotline-phone_ring">
        <div class="hotline-phone-ring">
            <div class="hotline-phone-ring-circle"></div>
            <div class="hotline-phone-ring-circle-fill"></div>
            <div class="hotline-phone-ring-icon">
                <a href="tel:0973 022 983">
                    <img class="hotline-phone-ring-img" src="<?php echo _WEB_ROOT ?>/public/assets/client/images/icon-ring-phone.png" alt="">
                </a>
            </div>
        </div>

        <div class="hotline-phone-bar">
            <a href="tel:0973 022 983">
                0973 022 983
            </a>
        </div>
    </div>
        <script src="<?php echo _WEB_ROOT ?>/public/assets/client/js/script.js"></script>
        <script src="<?php echo _WEB_ROOT ?>/public/assets/client/js/carousel.js"></script>

</body>
</html>
