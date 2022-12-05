<style>
                .home-news{
                    display: block;
                    margin: 20px 0;
                }
                .home-news_heading{
                    

                }
                .home-news_continer{
                    display: flex;
                    justify-content: center;
                    margin-top: 10px;
                }
                .home-news_img{
                    max-width: 200px;
                    max-height: 150px;
                    padding: 3px;
                    border: 1px solid #999;
                }
                .home-new_content{
                    
                    padding-left: 20px;
                    color: var(--text-gray);
                    font-size: 1.3rem;
                }
                .home-news_date{
                    font-size: 1.4rem;
                    font-weight: 500;
                    color: #999;
                    line-height: 3rem;
                }
                .hom-news-des{
                    font-size: 1.6rem;
                    font-weight: 600;
                    line-height: 2.2rem;
                }
                .home-new_offer{
                    display: flex;

                }
                .new_offer-main{
                flex: 1;
                }
                .new_offer-sub{
                flex:1
                }
                .home-news_img.offer-img{
                   max-width: 100%;
                   margin-left: auto;
                   width: 200px;
                   display: block;
                }
            </style>
                    <div class="product-catalog">
                        <h1 class="promo-product_heading">
                            <a href="" class="promo-text_link" >Trang chủ > Tin tức </a>
                        </h1>
                        <div class="row">
                            <div class="col l-8 m-12 c-12" style=" border-right: 2px solid #ccc;">   
                                                   <!--  item new-->
                            <?php
                                foreach($dataNews as $news)
                                {
                            ?>
                                             <div class="new_offer">
                                                <a href="<?php echo _WEB_ROOT.'/tin-tuc/'. $news['slug'] . '.html' ?> " class="home-news">
                                                    <div class="row no-gutters">
                                                       <div class="col l-5 m-5 c-5">
                                                           <img class="home-news_img offer-img" src="<?php echo _WEB_ROOT . '/public/assets/news/'. $news['img'] ?>"></img>
                                                       </div> 
                                                       <div class="col l-7 m-7 c-7">
                                                            <div class="home-new_content offer-content">
                                                                <p class="hom-news-des"><?php echo $news['title'] ?></p>
                                                                <p class="home-news_date">Ngày đăng: <?php $dt = new DateTime($news['date']); echo $dt->format('m/d/Y');?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                 </a>
                                             </div>
                                             <?php 
                                             }
                                             ?>
                                
                            </div>
                            <div class="col l-4 m-12 c-12">
                                <h2 class="new_offer-heading">Tin tức nổi bật</h2>
                                                 <!--  item new-->
                                             <?php
                                                foreach($dataNewsOffer as $news)
                                                {
                                            ?>
                                                <div class="new_offer">
                                                    <a href="<?php echo _WEB_ROOT . '/tin-tuc/'  . $news['slug'] .'.html' ?>" class="home-news">
                                                        <div class="row no-gutters">
                                                        <div class="col l-5 m-5 c-5">
                                                            <img class="home-news_img offer-img" src="<?php echo _WEB_ROOT . '/public/assets/news/' . $news['img'] ?>"></img>
                                                        </div> 
                                                        <div class="col l-7 m-7 c-7">
                                                                <div class="home-new_content offer-content">
                                                                    <p class="hom-news-des"><?php echo $news['title'] ?></p>
                                                                    <p class="home-news_date">Ngày đăng: <?php $dt = new DateTime($news['date']); echo $dt->format('m/d/Y');?> </p>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </a>
                                                </div>
                                             <?php
                                                }
                                            ?>
                                             
                                            
                             </div>
                        </div>
                    </div>

                <div class="pagination">
                    <?php
                        for( $i = 1 ; $i <= $totalPage ; $i++)
                        {
                    ?>
                        <p class="pagination-item">
                            <a href="<?php echo _WEB_ROOT . '/tin-tuc?page='.$i ?>" class="pagination_item-link <?php if($i = $page_index+1){ echo 'active';} ?>">
                                <?php echo $i; ?>
                            </a>
                        </p>
                    <?php 
                        }
                    ?>
                </div>

                