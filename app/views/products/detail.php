<div class="detail-product">
                        <div class="row">
                            
                            <div class="col l-6 m-12 c-12">
                                <div class="product-img_container">
                                    <img class="product-img" src="<?php  echo _WEB_ROOT . '/public/assets/products/'. $dataProduct[0]['img'] ?>" alt="<?php echo $dataProduct[0]['name'] ?>">
                                </div>
                            </div>
                            <div class="col l-6 m-12 c-12">
                                <div class="product-info">
                                    <h1 class="product-title"><?php  echo $dataProduct[0]['name'] ?></h1>
                                    <p class="product-des">
                                    <?php  echo $this->character_limiter ($dataProduct[0]['des_short'],501,false) ?>
                                    </p>
                                    <p class="product-status">Tình trạng: Còn hàng</p>
                                    <div class="product-submit">
                                        <a href="tel:0973 022 983" class="buy-product">Mua ngay</a>
                                        <a href="><?php  echo _WEB_ROOT . '/lien-he' ?>" class="product-contact">Liên hệ</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="product-offer_container">
                    <h2 class="product-offer_heading">
                        <span>Sản phẩm đề xuất</span>
                    </h2>
                    
                    <div class="row">

                        <?php foreach($dataProductOffer as $product)
                        {
                            if($product['id'] ==$dataProduct[0]['id'])
                            {
                                continue;
                            }
                        ?>
                        <div class="col l-2-4 m-4 c-6">
                           
                            <div  class="product-offer">
                                <a href="<?php  echo _WEB_ROOT .'/san-pham/'. $product['slug']?>.html" style="display: block;">
                                    <div class="product-offer_img">
                                        <img height="150px" src="<?php  echo _WEB_ROOT . '/public/assets/products/'. $product['img'] ?>" alt="<?php echo $product['name'] ?>">
                                    </div>
                                
                                    <h3  class="product-offer_title"><?php echo $product['name'] ?></h3>
                                
                                </a>
                                

                                <div class="product-offer_code">
                                    Mã sản phẩm: <span><?php echo $product['code'] ?></span>
                                </div>
                                <a href="lienhe" class="product-offer_contact">
                                   Liên hệ
                                </a>
                             
                            </div>

                        </div>
                       <?php } ?>
                        
                        
                    </div>
               </div>

                <div class="product-describe_container">
                    <h2 class="show-product-heading" >Mô tả sản phẩm</h2>
                    <div class="row">
                        <div class="col l-12 m-12 c-12">
                            <div class="show-news_des-html">
                                     <?php  echo htmlspecialchars_decode($dataProduct[0]['description']) ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
              