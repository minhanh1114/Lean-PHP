<div class="show-news-describe_container">
                    <div class="row">
                        <div class="col l-12 m-12 c-12">
                            <div class="show-news-describe">
                                
                                    <h1 class="show-news-heading"><?php  echo $dataNews[0]['title'] ?></h1>
                                    <p class="show-news-date"><i class="fa-solid fa-calendar-days"></i> Ngày đăng: <?php $dt = new DateTime($dataNews[0]['date']); echo $dt->format('m/d/Y');?>
                                        <span class="show-news_view">  <i class="fa-solid fa-eye"></i> Lượt xem: <?php  echo $dataNews[0]['view'] ?></span>
                                    </p>
                                    <div class="show-news_des-html">
                                        <?php echo htmlspecialchars_decode($dataNews[0]['description']) ?>
                                    </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>

               <!-- content -->
               <div class="product-offer_container">
                    <h2 class="product-offer_heading">
                        <span>Tin tức đề xuất</span>
                    </h2>
                    
                    <div class="row">

                        <?php
                        foreach($dataNewsOffer as $news)
                            if($news['id']!=$dataNews[0]['id'])
                            {
                        ?>
                        <div class="col l-2-4 m-4 c-6">
                           
                            <div  class="product-offer">
                                <a href="<?php echo _WEB_ROOT .'/tin-tuc/'.$news['slug'] .'.html' ?>" style="display: block;">
                                    <div class="product-offer_img">
                                        <img src="<?php echo _WEB_ROOT .'/public/assets/news/'.$news['img'] ?>" alt="<?php echo $news['title'] ?>">
                                    </div>
                                    <div class="product-offer_title">
                                        <h3><?php echo $news['title'] ?></h3>
                                    </div>
                                </a>
                                <div class="product-offer_code">
                                    Ngày đăng: <span><?php $dt = new DateTime($news['date']); echo $dt->format('m/d/Y');?></span>
                                </div>
                               
                             
                            </div>

                        </div>
                        <?php
                            }
                        ?>
                       
                        
                        
                    </div>
               </div>