<div class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList"> 
                        <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <a itemprop="item" href="<?php echo _WEB_ROOT ?>">
                                <span itemprop="name">Trang chủ</span>
                            </a>  » 
                            <meta itemprop="position" content="1" />
                        </span>
                        <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" > 
                            <a itemprop="item" itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo _WEB_ROOT . '/tin-tuc' ?>" href="<?php echo _WEB_ROOT . '/tin-tuc' ?>">
                                <span itemprop="name">Tin tức</span>  
                            </a> »
                            <meta itemprop="position" content="2" />
                        </span>
                        <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <span class="breadcrumb_last" itemprop="name"><?php echo $dataNews[0]['title'] ?></span>
                            <meta itemprop="position" content="3" />
                        </span>
</div>
<div class="show-news-describe_container">
                    <div class="row">
                        <div class="col l-12 m-12 c-12">
                            <div class="show-news-describe" itemscope itemtype="https://schema.org/Article">
                                
                                    <h1 class="show-news-heading" itemprop="headline"><?php  echo $dataNews[0]['title'] ?></h1>
                                    <meta itemprop="image" content="<?php echo _WEB_ROOT .'/public/assets/news/'.$dataNews[0]['img'] ?>" />
                                    <meta itemprop="articleSection" content="Tin tức" />
                                    <meta itemprop="inLanguage" content="vi" />
                                    <p class="show-news-date" itemprop="datePublished" content="<?php echo $dataNews[0]['date'] ?>"><i class="fa-solid fa-calendar-days"></i> Ngày đăng: <?php $dt = new DateTime($dataNews[0]['date']); echo $dt->format('d/m/Y');?>
                                        <span class="show-news_view">  <i class="fa-solid fa-eye"></i> Lượt xem: <?php  echo $dataNews[0]['view'] ?></span>
                                    </p>
                                    <span style="display:none" itemprop="dateModified" content="<?php echo $dataNews[0]['date'] ?>">
                                        <?php $dt = new DateTime($dataNews[0]['date']); echo $dt->format('d/m/Y');?>
                                    </span>
                                    <div class="show-news_des-html active-tab_content" itemprop="description" content = "<?php echo Controller::character_limiter($dataNews[0]['description'],999999,false) ?>">
                                        <?php echo htmlspecialchars_decode($dataNews[0]['description']) ?>
                                    </div>
                                    <span style="font-size:1.5rem" itemprop="author" itemscope itemtype="https://schema.org/Person">
                                        <a itemprop="url" href="https://www.facebook.com/tamnhualaysangcomposite">
                                           Tác giả: <span itemprop="name">Quản Trị Viên TMN</span>
                                        </a>
                                    </span>
                                
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
                                    Ngày đăng: <span><?php $dt = new DateTime($news['date']); echo $dt->format('d/m/Y');?></span>
                                </div>
                               
                             
                            </div>

                        </div>
                        <?php
                            }
                        ?>
                       
                        
                        
                    </div>
               </div>