
<link href="<?php echo _WEB_ROOT?>/public/assets/admin/assets/css/bootstrap1.min.css" rel="stylesheet" />
<link href="<?php echo _WEB_ROOT?>/public/assets/admin/assets/css/sb-admin-2.min.css" rel="stylesheet" />

            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                <div class="white_card_body anlite_table p-0">
                <div class="row">
                <div class="col-lg-3">
                <div class="single_analite_content">
                    <h4>Tổng số sản phẩm</h4>
                <h3> <span class="counter"><?php echo count($recentProduct) ?></span> </h3>
                
                </div>
                </div>
                <div class="col-lg-3">
                <div class="single_analite_content">
                <h4>Tổng số bài viết</h4>
                <h3><span class="counter"><?php echo count($recentNews) ?></span> </h3>
                
                </div>
                </div>
                <div class="col-lg-3">
                <div class="single_analite_content">
                <h4>Tổng số loại sản phẩm</h4>
                <h3><span class="counter"><?php echo $countType ?></span> </h3>
                
                </div>
                </div>
                <div class="col-lg-3">
                <div class="single_analite_content">
                <h4>Tổng số tài khoản</h4>
                <h3><span class="counter"><?php echo $countAdmin ?></span> </h3>
                
                </div>
                </div>
                </div>
                </div>

                <!-- end1 -->
                <div class="row">
                <div class="col-lg-8">
                <div class="white_card mb_30 card_height_100">
                <div class="white_card_header ">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h3 class="m-0">Sản phẩm được thêm gần đây</h3>
                    </div>
<<<<<<< HEAD
                    <a href="<?php echo _WEB_ROOT . '/admin/product' ?>">
=======
                    <a href="#">
>>>>>>> 73b293fda7e7c2ecf0d16e231ec9b57e48463000
                    <p>View all</p>
                    </a>
                </div>
                </div>
                <div class="white_card_body pt-0">
                <div class="QA_section">
                <div class="QA_table mb-0 transaction-table">

                <div class="table-responsive">
                <table class="table  ">
                     <tbody>
                        <?php for($i=0;$i<=5;$i++){
                         ?>
                        <tr>
                            <td scope="row">
                            <span class="">
                            <img style="width: 30px;" class="small_img" src="<?php echo _WEB_ROOT . '/public/assets/products/' . $recentProduct[$i]['img'] ?>" alt=""> 
                            </span>
                            </td>
                            <td>
                            <span class="badge bg-success">Buy</span>
                            </td>
                            <td style="max-width: 250px;" class="text-truncate"><?php echo $recentProduct[$i]['name'] ?></td>
                            <td style="max-width: 150px;" class="text-truncate"><?php echo $recentProduct[$i]['des_short'] ?></td>
                            <td><?php echo 'Thể loại: '. $recentProduct[$i]['type'] ?></td>
                            <td><?php echo 'Lượt xem: '. $recentProduct[$i]['view'] ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                
                     </tbody>
                </table>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                        <div class="col-xl-4">
                        <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">
                        <div class="box_header m-0">
                        <div class="main-title">
                        <h3 class="m-0">Thông tin của tôi</h3>
                        </div>
                        
                        </div>
                        </div>
                        <div class="white_card_body">
                        <div class="row justify-content-center mb_30  ">
                        <div class="col-12 text-center">
                        <h4 class="f_s_22 f_w_700 mb-0"><?php echo Session::data('nameAdmin')?></h4>
                        <p class="f_s_11 f_w_400">Quản trị cấp <?php echo Session::data('loginAdmin')?></p>
                        </div>
                        </div>
                        <div class="social_media_list">
                        <div class="single_media d-flex justify-content-between align-items-center">
                        <span class="mediaName"> <img src="img/currency/1.svg" alt=""> Mã số</span>
                        <span class="earning_amount">
                        <h4><?php echo Session::data('idAdmin')?></h4>
                        </span>
                        </div>
                        <div class="single_media d-flex justify-content-between align-items-center">
                        <span class="mediaName"> <img src="img/currency/2.svg" alt=""> Họ & tên</span>
                        <span class="earning_amount">
                        <h4><?php echo Session::data('nameAdmin')?></h4>
                        
                        </span>
                        </div>
                        <div class="single_media d-flex justify-content-between align-items-center">
                        <span class="mediaName"> <img src="img/currency/3.svg" alt=""> Tài khoản</span>
                        <span class="earning_amount">
                        <h4><?php echo Session::data('usernameAdmin')?></h4>
                        
                        </span>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                </div>
                <!-- end2 -->
                    
                    <div class="row">
                        
                        <div class="col-xl-9">
                            <div class="row">
                                <div class="col-12">
                                    <div class="white_card mb_30">
                                        <div class="white_card_header">
                                        <div class="box_header m-0">
                                            <div class="main-title">
                                                <h3 class="m-0">Tin tức được thêm gần đây</h3>
                                            </div>
                                            <div class="erning_btn d-flex">
                                                <a href="#" class="small_blue_btn radius_0 border-right-0">Month</a>
                                                <a href="#" class="small_blue_btn radius_0">Week</a>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="white_card_body">
                                        <div class="QA_section">
                                            <div class="QA_table mb-0">
                                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                                                    <table class="table lms_table_active2 dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" style="width: 936px;">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 20px;" aria-label="Amount: activate to sort column ascending"  style="width: 10px;" >Mã</th>
                                                            <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 89px;" aria-label="Amount: activate to sort column ascending">Hình ảnh</th>
                                                            <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 300px;" aria-label="Plateform: activate to sort column ascending">Title</th>
                                                            <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 100px;" aria-label="Email: activate to sort column ascending">Date</th>
                                                            <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 50px;" aria-label="ID: activate to sort column ascending">View</th>
                                                            <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 50px;" aria-label="Status: activate to sort column ascending">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php for($i=0;$i<5;$i++)
                                                        {
                                                     ?>
                                                        <tr role="row" class="even">
                                                            <td ><?php echo $recentNews[$i]['id']?></td>
                                                            <td> <img style="width: 50px;"  src="<?php echo _WEB_ROOT . '/public/assets/news/' . $recentNews[$i]['img']?>" alt=""> </td>
                                                            <td><?php echo $recentNews[$i]['title']?></td>
                                                            <td><?php echo $recentNews[$i]['date'] ?></td>
                                                            <td><?php echo $recentNews[$i]['view']?></td>
                                                            <td><a href="#" class="status_btn">Success</a></td>
                                                        </tr>
                                                    <?php 
                                                        }
                                                     ?>
                                                    </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="white_card card_height_100 mb_30">
                                        <div class="white_card_header">
                                        <div class="box_header m-0">
                                            <div class="main-title">
                                                <h3 class="m-0">Exchange</h3>
                                            </div>
                                            <div class="header_more_tool">
                                                <div class="dropdown">
                                                    <span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                                    <i class="ti-more-alt"></i>
                                                    </span>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#"> <i class="ti-eye"></i> Action</a>
                                                    <a class="dropdown-item" href="#"> <i class="ti-trash"></i> Delete</a>
                                                    <a class="dropdown-item" href="#"> <i class="fas fa-edit"></i> Edit</a>
                                                    <a class="dropdown-item" href="#"> <i class="ti-printer"></i> Print</a>
                                                    <a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Download</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="white_card_body">
                                        <div class="Activity_timeline">
                                            <ul>
                                                <li>
                                                    <div class="activity_bell"></div>
                                                    <div class="timeLine_inner d-flex align-items-center">
                                                    <div class="activity_wrap">
                                                        <h6>5 min ago</h6>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque
                                                        </p>
                                                    </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="activity_bell "></div>
                                                    <div class="timeLine_inner d-flex align-items-center">
                                                    <div class="activity_wrap">
                                                        <h6>6 min ago</h6>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque</p>
                                                    </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="activity_bell bell_lite"></div>
                                                    <div class="timeLine_inner d-flex align-items-center">
                                                    <div class="activity_wrap">
                                                        <h6>7 min ago</h6>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque</p>
                                                    </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="activity_bell bell_lite"></div>
                                                    <div class="timeLine_inner d-flex align-items-center">
                                                    <div class="activity_wrap">
                                                        <h6>8 min ago</h6>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque</p>
                                                    </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="white_card card_height_100 mb_30">
                                        <div class="date_picker_wrapper">
                                        <div class="default-datepicker">
                                            <div class="datepicker-here" data-language="en">
                                                <div class="datepicker-inline">
                                                    <div class="datepicker">
                                                    <i class="datepicker--pointer"></i>
                                                    <nav class="datepicker--nav">
                                                        <div class="datepicker--nav-action" data-action="prev">
                                                            <svg>
                                                                <path d="M 17,12 l -5,5 l 5,5"></path>
                                                            </svg>
                                                        </div>
                                                        <div class="datepicker--nav-title">December,  <i> 2022  </i></div>
                                                        <div class="datepicker--nav-action" data-action="next">
                                                            <svg>
                                                                <path d="M 14,12 l 5,5 l -5,5"></path>
                                                            </svg>
                                                        </div>
                                                    </nav>
                                                    <div class="datepicker--content">
                                                        <div class="datepicker--days datepicker--body active">
                                                            <div class="datepicker--days-names">
                                                                <div class="datepicker--day-name -weekend-">Su</div>
                                                                <div class="datepicker--day-name">Mo</div>
                                                                <div class="datepicker--day-name">Tu</div>
                                                                <div class="datepicker--day-name">We</div>
                                                                <div class="datepicker--day-name">Th</div>
                                                                <div class="datepicker--day-name">Fr</div>
                                                                <div class="datepicker--day-name -weekend-">Sa</div>
                                                            </div>
                                                            <div class="datepicker--cells datepicker--cells-days">
                                                                <div class="datepicker--cell datepicker--cell-day -weekend- -other-month-" data-date="27" data-month="10" data-year="2022">27</div>
                                                                <div class="datepicker--cell datepicker--cell-day -other-month-" data-date="28" data-month="10" data-year="2022">28</div>
                                                                <div class="datepicker--cell datepicker--cell-day -other-month-" data-date="29" data-month="10" data-year="2022">29</div>
                                                                <div class="datepicker--cell datepicker--cell-day -other-month-" data-date="30" data-month="10" data-year="2022">30</div>
                                                                <div class="datepicker--cell datepicker--cell-day" data-date="1" data-month="11" data-year="2022">1</div>
                                                                <div class="datepicker--cell datepicker--cell-day" data-date="2" data-month="11" data-year="2022">2</div>
                                                                <div class="datepicker--cell datepicker--cell-day -weekend-" data-date="3" data-month="11" data-year="2022">3</div>
                                                                <div class="datepicker--cell datepicker--cell-day -weekend-" data-date="4" data-month="11" data-year="2022">4</div>
                                                                <div class="datepicker--cell datepicker--cell-day" data-date="5" data-month="11" data-year="2022">5</div>
                                                                <div class="datepicker--cell datepicker--cell-day" data-date="6" data-month="11" data-year="2022">6</div>
                                                                <div class="datepicker--cell datepicker--cell-day" data-date="7" data-month="11" data-year="2022">7</div>
                                                                <div class="datepicker--cell datepicker--cell-day" data-date="8" data-month="11" data-year="2022">8</div>
                                                                <div class="datepicker--cell datepicker--cell-day" data-date="9" data-month="11" data-year="2022">9</div>
                                                                <div class="datepicker--cell datepicker--cell-day -weekend-" data-date="10" data-month="11" data-year="2022">10</div>
                                                                <div class="datepicker--cell datepicker--cell-day -weekend-" data-date="11" data-month="11" data-year="2022">11</div>
                                                                <div class="datepicker--cell datepicker--cell-day" data-date="12" data-month="11" data-year="2022">12</div>
                                                                <div class="datepicker--cell datepicker--cell-day" data-date="13" data-month="11" data-year="2022">13</div>
                                                                <div class="datepicker--cell datepicker--cell-day" data-date="14" data-month="11" data-year="2022">14</div>
                                                                <div class="datepicker--cell datepicker--cell-day" data-date="15" data-month="11" data-year="2022">15</div>
                                                                <div class="datepicker--cell datepicker--cell-day" data-date="16" data-month="11" data-year="2022">16</div>
                                                                <div class="datepicker--cell datepicker--cell-day -weekend-" data-date="17" data-month="11" data-year="2022">17</div>
                                                                <div class="datepicker--cell datepicker--cell-day -weekend-" data-date="18" data-month="11" data-year="2022">18</div>
                                                                <div class="datepicker--cell datepicker--cell-day" data-date="19" data-month="11" data-year="2022">19</div>
                                                                <div class="datepicker--cell datepicker--cell-day" data-date="20" data-month="11" data-year="2022">20</div>
                                                                <div class="datepicker--cell datepicker--cell-day" data-date="21" data-month="11" data-year="2022">21</div>
                                                                <div class="datepicker--cell datepicker--cell-day" data-date="22" data-month="11" data-year="2022">22</div>
                                                                <div class="datepicker--cell datepicker--cell-day" data-date="23" data-month="11" data-year="2022">23</div>
                                                                <div class="datepicker--cell datepicker--cell-day -weekend-" data-date="24" data-month="11" data-year="2022">24</div>
                                                                <div class="datepicker--cell datepicker--cell-day -weekend-" data-date="25" data-month="11" data-year="2022">25</div>
                                                                <div class="datepicker--cell datepicker--cell-day" data-date="26" data-month="11" data-year="2022">26</div>
                                                                <div class="datepicker--cell datepicker--cell-day" data-date="27" data-month="11" data-year="2022">27</div>
                                                                <div class="datepicker--cell datepicker--cell-day -current-" data-date="28" data-month="11" data-year="2022">28</div>
                                                                <div class="datepicker--cell datepicker--cell-day" data-date="29" data-month="11" data-year="2022">29</div>
                                                                <div class="datepicker--cell datepicker--cell-day" data-date="30" data-month="11" data-year="2022">30</div>
                                                                <div class="datepicker--cell datepicker--cell-day -weekend-" data-date="31" data-month="11" data-year="2022">31</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
   <div class="white_card mb_30">
      <div class="white_card_header mb_20 pb-0">
         <div class="box_header m-0">
            <div class="main-title">
               <h3 class="m-0">Tin tức nổi bật</h3>
            </div>
         </div>
      </div>
      <div class="white_card_body ">
         <div class="news_widget_wrap">
            <?php foreach($popularNews as $newsPoul)
            { ?>
            <div class="single_news mb_20">
               <div class="thumb mb_20">
                  <a href="<?php echo _WEB_ROOT . '/tin-tuc/'.  $newsPoul['slug'].'.html' ?>"><img style="max-width:250px" class="img-fluid" src="<?php echo _WEB_ROOT . '/public/assets/news/' .  $newsPoul['img']?>" alt=""></a>
               </div>
               <a href="<?php echo _WEB_ROOT . '/tin-tuc/'.  $newsPoul['slug'].'.html' ?>">
                  <p class="f_s_18 f_w_400"><?php echo $newsPoul['title'] ?>
                  </p>
               </a>
            </div>
            <?php } ?>
            
            
         </div>
      </div>
   </div>
</div>
                    </div>
                </div>
            </div>
           
