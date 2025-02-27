
<div class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList"> 
                        <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <a itemprop="item" href="<?php echo _WEB_ROOT ?>">
                                <span itemprop="name">Trang chủ</span>
                            </a>  » 
                            <meta itemprop="position" content="1" />
                        </span>
                        <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <span class="breadcrumb_last" itemprop="name"> <?php if (!empty( $dataProductAll[0]['name_type'])) echo $dataProductAll[0]['name_type'] ?></span>
                            <meta itemprop="position" content="2" />
                        </span>
</div>
 <!-- show typeProduct -->
 <div class="product-catalog">
                    <h1 class="promo-product_heading">
                        <a href="" class="promo-text_link" > <?php  if (!empty($dataProductAll[0]['name_type'])){ echo $dataProductAll[0]['name_type'];} ?></a>
                    </h1>
                    <div class="product-catalog_fillter">
                        <p>Số lượng sản phẩm: <?php echo count($dataProductAll)<0? "0": count($dataProductAll) ?></p>
                        <form action="" method="get" class="product-catalog_form">
                            <select class="product-catalog_select" name="orderby" class="orderby" aria-label="Đơn hàng của cửa hàng" >
                                <?php 
                                foreach($dataSelectOrderby as $key => $value)
                                {
                                ?>
                                  <option value="<?php echo $key ?>" <?php if($orderby == $key) echo 'selected="selected"' ?>  ><?php echo $value ?></option>
                            <?php }?>
                            </select>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col l-2 m-0 c-0">
                            <a href=""  class ="promo-product_link">
                                <img class="promo-product-img" src=" <?php echo _WEB_ROOT .'/public/assets/client/images/banner-home.jpg' ?>" alt="banner-home" >
                            </a>
                            <div class="promo-product_contact">
                                <header class="promo-product-heading">
                                    <h2 class="promo-product_contact-heading">Hỗ trợ trực tuyến</h2>
                                </header>
                                <div class="promo-product_contact">
                                    <h4 class="promo-product_title">Hỗ trợ bán hàng</h4>
                                    <p class="promo-product_phone">0964 297 683</p>
                                </div>
                                <div class="promo-product_contact">
                                    <h4 class="promo-product_title">Hỗ trợ kĩ thuật</h4>
                                    <p class="promo-product_phone">0973 022 983</p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col l-10 m-12 c-12">
                            <div class="home-product">
                                <div class="row sm-gutter">
                                
                                   <?php 
                                   if(empty($dataProductAll))
                                   {
                                    echo '<h2 style="text-align: center; width: 100%; padding: 15px"> Không có sản phẩm nào </h2>';
                                   }
                                   else{
                                            foreach($dataProductAll as $product)
                                            {
                                            ?>
                                                <div class="col l-3 m-4 c-6">
                                                        <a href="<?php echo _WEB_ROOT . '/san-pham/'. $product['slug'] .'.html' ?>" class="home-product_item">
                                                            <img class="home-product_img" src="<?php echo _WEB_ROOT . '/public/assets/products/thumb/'. $product['img'] ?>" alt="<?php echo $product['name'] ?>"></img>
                                                            <h3 class="home-product_heading"><?php echo $product['name'] ?></h3>
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
                <!-- mô tả loại sản phẩm  -->
                <!-- <div class="product-describe_container">
                    <div class="row">
                        <div class="col l-12">
                            <div class="product-describe">
                                <p>I. GIỚI THIỆU TẤM LỢP LẤY SÁNG POLYCARBONATE
                                Tấm lợp lấy sáng polycarbonate còn được biết đến với tên gọi Tấm Polycarbonate. Đây là một trong những dạng tấm có những ưu điểm lớn như khả năng chống va đập cực kỳ cao, khả năng lấy ánh sáng từ mặt trời tốt.
                                
                                Đặc biệt, nó còn có một hệ thống màu sắc vô cùng phong phú mà những sản phẩm có cùng tính năng không có được. Chúng tôi tin rằng trong những năm sắp tới thì tấm lợp polycarbonate sẽ thay thế hoàn toàn so với các vật liệu lợp mái lấy sáng đang dùng như hiện nay.</p>
                            </div>
                            
                        </div>
                    </div>
                </div> -->
    <script>
        document.querySelector('.product-catalog_select').addEventListener('change', function(){
            // console.log('select ');
            document.querySelectorAll('.product-catalog_select option').forEach((item) =>{
               console.log(item.defaultSelected);
            })
            document.querySelector('.product-catalog_form').submit();
        })
    </script>