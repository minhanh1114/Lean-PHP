 <!-- show typeProduct -->
 <div class="breadcrumb">
                        <span class="">
                            <a href="<?php echo _WEB_ROOT ?>">Trang chủ</a>  » 
                            <span class="breadcrumb_last">Tìm kiếm sản phẩm</span>
                        </span>
</div>
 <div class="product-catalog">
                    <h1 class="promo-product_heading">
                        <a href="#" class="promo-text_link" >Tìm kiếm sản phẩm </a>
                    </h1>
                    <div class="product-catalog_fillter">
                        <h3 style="margin-right:15px ;color:#00a651;">Tìm kiếm sản phẩm: <?php echo empty($keySearch)?"": $keySearch ?></h3>
                        <p>Số lượng sản phẩm: <?php echo count($dataProductSearch)<0? "0": count($dataProductSearch) ?></p>
                        
                    </div>
                    <div class="row">
                        <div class="col l-2 m-0 c-0">
                            <a href=""  class ="promo-product_link">
                                <img class="promo-product-img" src="<?php echo _WEB_ROOT . '/public/assets/client/images/' ?>banner-home.jpg" alt="banner-home" >
                            </a>
                            <div class="promo-product_contact">
                                <header class="promo-product-heading">
                                    <h4 class="promo-product_contact-heading">Hỗ trợ trực tuyến</h4>
                                </header>
                                <div class="promo-product_contact">
                                    <h5 class="promo-product_title">Hỗ trợ bán hàng</h5>
                                    <p class="promo-product_phone">0964 297 683</p>
                                </div>
                                <div class="promo-product_contact">
                                    <h5 class="promo-product_title">Hỗ trợ kĩ thuật</h5>
                                    <p class="promo-product_phone">0973 022 983</p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col l-10 m-12 c-12">
                            <div class="home-product">
                                <div class="row sm-gutter">
                                
                                   <?php 
                                   if(empty($dataProductSearch))
                                   {
                                    echo '<h2 style="text-align: center; width: 100%; padding: 15px"> Không có sản phẩm nào </h2>';
                                   }
                                   else{
                                            foreach($dataProductSearch as $product)
                                            {
                                            ?>
                                                <div class="col l-3 m-4 c-6">
                                                        <a href="<?php echo _WEB_ROOT . '/san-pham/'. $product['slug'] .'.html' ?>" class="home-product_item">
                                                            <img class="home-product_img" src="<?php echo _WEB_ROOT . '/public/assets/products/'. $product['img'] ?>" alt="<?php echo $product['name'] ?>"></img>
                                                            <h2 class="home-product_heading"><?php echo $product['name'] ?></h2>
                                                            <p class="home-product_code">Mã sản phẩm: <?php echo $product['code'] ?></p>
                                                            <p class="hom-product-price">Liên hệ</p>
                                                        </a>
                                                    </div>                  
                                            <?php
                                                }
                                        }
                                   ?>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
 