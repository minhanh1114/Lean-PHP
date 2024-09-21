
                            <!-- slide -->
                        <div class="swiper-container">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                <div class="swiper-slide"><img width="100%" height="100%" rel="preload" as="image" src="<?php echo _WEB_ROOT . '/public/assets/client/images/' ?>slider_4.jpg" alt="slider_4" /></div>
                                <div class="swiper-slide"><img width="100%" height="100%" rel="preload" as="image" src="<?php echo _WEB_ROOT . '/public/assets/client/images/' ?>slider_2.jpg" alt="slider_2" /></div>
                                <div class="swiper-slide"><img width="100%" height="100%" rel="preload" as="image" src="<?php echo _WEB_ROOT . '/public/assets/client/images/' ?>slider_1.jpg" alt="slider_1" /></div>
                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>

                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>

                            <!-- If we need scrollbar -->
                            <!--     <div class="swiper-scrollbar"></div> -->
                        </div>

                    </div>
                </div>

                <div class="promo-product">
                    <h2 class="promo-product_heading">
                        <p style="display: inline;" class="promo-text_link">Sản Phẩm Khuyến Mãi</p>
                    </h2>
                    <div class="row">
                        <div class="col l-4 m-6 c-12">
                            <a href="<?php echo _WEB_ROOT ?>/loai-san-pham/tam-lop-lay-sang-composite.html" title="tấm nhựa lấy sáng composite" class="promo-product_link">
                                <img width="100%" height="100%" loading="lazy" class="promo-product-img" src="<?php echo _WEB_ROOT ?>/public/assets/client/images/sp_khuyen_mai_1.jpg" alt="sp_khuyen_mai_1">
                            </a>
                        </div>
                        <div class="col l-4 m-6 c-12">
                            <a href="<?php echo _WEB_ROOT ?>/loai-san-pham/tam-nhua-lay-sang-polycarbonate.html" title="tấm nhựa dạng đặc poly">
                                <img width="100%" height="100%" loading="lazy" class="promo-product-img" src="<?php echo _WEB_ROOT ?>/public/assets/client/images/sp_khuyen_mai_2.jpg" alt="sp_khuyen_mai_2">
                            </a>
                        </div>
                        <div class="col l-4 m-6 c-12">
                            <a href="<?php echo _WEB_ROOT ?>/loai-san-pham/tam-nhua-polycarbonate-rong-ruot.html" title="tấm nhựa dạng rỗng poly">
                                <img width="100%" height="100%" loading="lazy" class="promo-product-img" src="<?php echo _WEB_ROOT ?>/public/assets/client/images/sp_khuyen_mai_3.jpg" alt="sp_khuyen_mai_3">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- product catalog -->
                <div class="product-catalog">
                    <h2 class="promo-product_heading"><a href="<?php echo _WEB_ROOT . '/loai-san-pham/' . $typesProduct[2]['slug_type'] . '.html' ?>" class="promo-text_link"><?php echo  $typesProduct[2]['name_type'] ?></a></h2>
                    <div class="row">
                        <div class="col l-2 m-0 c-0">
                            <div class="promo-product_link">
                                <img width="100%" height="100%" loading="lazy" class="product-catalog_img" src="<?php echo _WEB_ROOT ?>/public/assets/client/images/banner-home-2.jpg" alt="banner-home">
                            </div>
                        </div>
                        <div class="col l-10 m-12 c-12">
                            <div class="home-product">
                                <div class="row sm-gutter">
                                    <?php foreach ($productList['three'] as $product) {
                                    ?>
                                        <div class="col l-3 m-4 c-6">
                                            <a href="<?php echo _WEB_ROOT . '/san-pham/' . $product['slug'] . '.html' ?>" class="home-product_item">
                                                <img width="100%" height="100%" loading="lazy" loading="lazy" class="home-product_img" src="<?php echo _WEB_ROOT . '/public/assets/products/thumb/' . $product['img'] ?>" alt="<?php echo $product['slug'] ?>"></img>
                                                <h3 class="home-product_heading"><?php echo $product['name']  ?></h3>
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
                    <h2 class="promo-product_heading"><a href="<?php echo _WEB_ROOT . '/loai-san-pham/' . $typesProduct[1]['slug_type'] . '.html' ?>" class="promo-text_link"><?php echo  $typesProduct[1]['name_type'] ?></a></h2>
                    <div class="row">
                        <div class="col l-2 m-0 c-0">
                            <div class="promo-product_link">
                                <img width="100%" height="100%" loading="lazy" class="product-catalog_img" src="<?php echo _WEB_ROOT ?>/public/assets/client/images/banner-home.jpg" alt="banner-home">
                            </div>
                        </div>
                        <div class="col l-10 m-12 c-12">
                            <div class="home-product">
                                <div class="row sm-gutter">
                                    <?php foreach ($productList['two'] as $product) {
                                    ?>
                                        <div class="col l-3 m-4 c-6">
                                            <a href="<?php echo _WEB_ROOT . '/san-pham/' . $product['slug'] . '.html' ?>" class="home-product_item">
                                                <img width="100%" height="100%" loading="lazy" class="home-product_img" src="<?php echo _WEB_ROOT . '/public/assets/products/thumb/' . $product['img'] ?>" alt="<?php echo $product['slug'] ?>"></img>
                                                <h3 class="home-product_heading"><?php echo $product['name']  ?></h3>
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
                    <h2 class="promo-product_heading"><a href="<?php echo _WEB_ROOT . '/loai-san-pham/' . $typesProduct[0]['slug_type'] . '.html' ?>" class="promo-text_link"><?php echo $typesProduct[0]['name_type'] ?></a></h2>
                    <div class="row">
                        <div class="col l-2 m-0 c-0">
                            <div class="promo-product_link">
                                <img width="100%" height="100%" loading="lazy" class="product-catalog_img" src="<?php echo _WEB_ROOT ?>/public/assets/client/images/banner-home.jpg" alt="banner-home">
                            </div>
                        </div>
                        <div class="col l-10 m-12 c-12">
                            <div class="home-product">
                                <div class="row sm-gutter">
                                    <?php foreach ($productList['one'] as $product) {
                                    ?>
                                        <div class="col l-3 m-4 c-6">
                                            <a href="<?php echo _WEB_ROOT . '/san-pham/' . $product['slug'] . '.html' ?>" class="home-product_item">
                                                <img width="100%" height="100%" loading="lazy" class="home-product_img" src="<?php echo _WEB_ROOT . '/public/assets/products/thumb/' . $product['img'] ?>" alt="<?php echo $product['slug'] ?>"></img>
                                                <h3 class="home-product_heading"><?php echo $product['name']  ?></h3>
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
                    <h2 class="promo-product_heading"><a href="<?php echo _WEB_ROOT . '/loai-san-pham/' . $typesProduct[3]['slug_type'] . '.html' ?>" class="promo-text_link"><?php echo $typesProduct[3]['name_type'] ?></a></h2>
                    <div class="row">
                        <div class="col l-2 m-0 c-0">
                            <div class="promo-product_link">
                                <img width="100%" height="100%" loading="lazy" class="product-catalog_img" src="<?php echo _WEB_ROOT ?>/public/assets/client/images/banner-home-1.jpg" alt="banner-home">
                            </div>
                        </div>
                        <div class="col l-10 m-12 c-12">
                            <div class="home-product">
                                <div class="row sm-gutter">
                                    <?php foreach ($productList['four'] as $product) {
                                    ?>
                                        <div class="col l-3 m-4 c-6">
                                            <a href="<?php echo _WEB_ROOT . '/san-pham/' . $product['slug'] . '.html' ?>" class="home-product_item">
                                                <img width="100%" height="100%" loading="lazy" class="home-product_img" src="<?php echo _WEB_ROOT . '/public/assets/products/thumb/' . $product['img'] ?>" alt="<?php echo $product['slug'] ?>"></img>
                                                <h3 class="home-product_heading"><?php echo $product['name']  ?></h3>
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
                    <h2 class="promo-product_heading"><a href="<?php echo _WEB_ROOT . '/tin-tuc/' ?>" class="promo-text_link">Tin Tức - Sự Kiện</a></h2>
                    <div class="row">

                        <div class="col l-8 m-12 c-12">
                            <a href="<?php echo _WEB_ROOT . '/tin-tuc/' . $news[0]['slug'] . '.html' ?>" class="home-news">
                                <h3 class="home-news_heading"><?php echo $news[0]['title'] ?></h3>
                                <div class="home-news_continer">
                                    <img loading="lazy" width="100%" height="100%" class="home-news_img" src="<?php echo _WEB_ROOT . '/public/assets/news/thumb/' . $news[0]['img']  ?>" alt="<?php echo $news[0]['slug'] ?>"></img>
                                    <div class="home-new_content">
                                        <p class="home-news_date">Ngày đăng: <?php $dt = new DateTime($news[0]['date']);
                                                                                echo $dt->format('d/m/Y'); ?></p>
                                        <p class="hom-news-des"><?php echo $news[0]['description'] ?></p>
                                    </div>

                                </div>

                            </a>

                        </div>
                        <div class="col l-4 m-12 c-12">
                            <div class="new_offer">
                                <a href="<?php echo _WEB_ROOT . '/tin-tuc/' . $news[1]['slug'] . '.html' ?>" class="home-news">
                                    <div class="row no-gutters">

                                        <div class="col l-5 m-4 c-4">
                                            <img loading="lazy" class="home-news_img offer-img" src="<?php echo _WEB_ROOT . '/public/assets/news/thumb/' . $news[1]['img']  ?>" alt="<?php echo $news[1]['slug'] ?>"></img>
                                        </div>
                                        <div class="col l-7 m-8 c-8">
                                            <div class="home-new_content offer-content">
                                                <h3 class="hom-news-des"><?php echo $news[1]['title'] ?></h3>
                                                <p class="home-news_date">Ngày đăng: <?php $dt = new DateTime($news[1]['date']);
                                                                                        echo $dt->format('d/m/Y'); ?></p>
                                            </div>
                                        </div>

                                    </div>

                                </a>
                            </div>
                            <div class="new_offer">
                                <a href="<?php echo _WEB_ROOT . '/tin-tuc/' . $news[2]['slug'] . '.html' ?>" class="home-news">
                                    <div class="row no-gutters">

                                        <div class="col l-5 m-4 c-4">
                                            <img loading="lazy" class="home-news_img offer-img" src="<?php echo _WEB_ROOT . '/public/assets/news/thumb/' . $news[2]['img']  ?>" alt="<?php echo $news[2]['slug'] ?>"></img>
                                        </div>

                                        <div class="col l-7 m-8 c-8">
                                            <div class="home-new_content offer-content">
                                                <h3 class="hom-news-des"><?php echo $news[2]['title'] ?></h3>
                                                <p class="home-news_date">Ngày đăng: <?php $dt = new DateTime($news[2]['date']);
                                                                                        echo $dt->format('d/m/Y'); ?></p>
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