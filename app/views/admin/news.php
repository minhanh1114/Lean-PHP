       <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h3 class="card-title">Danh Sách Tin Tức</h3>
                                    <a href="<?php echo _WEB_ROOT . '/admin/news/addNews/' ?>" class="btn btn-primary">Thêm Tin Tức</a>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>Mã</th>
                                            <th>Hình ảnh</th>
                                            <th>Tiêu đề</th>
                                            <th>Mô tả</th>
                                            <th>Lượt xem</th>
                                            <th>Ngày đăng</th>
                                            <th>Plug</th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($news as $item)
                                                 { // echo '<pre>';
                                                //      print_r($product) ;
                                                //      echo '</pre>';
                                                     ?>
                                                
                                                   <tr>
                                                            <td><?php echo $item['id'] ?></td>
                                                            <td><img src="<?php echo _WEB_ROOT . '/public/assets/news/'. $item['img'] ?>" width="100px"/></td>
                                                            <td style="max-width: 150px;" class="text-truncate"><?php echo $item['title'] ?></td>
                                                            <td style="max-width: 450px;" class="text-truncate"><?php echo $item['description'] ?></td>
                                                            <td><?php echo $item['view'] ?></td>
                                                            <td><?php echo $item['date'] ?></td>
                                                            <td><?php echo $item['slug'] ?></td>
                                                            <td>
                                                                <a  class =" btn btn-success" href="<?php echo _WEB_ROOT . '/admin/news/edit/'. $item['id'] ?> "><i class="fa fa-edit"></i> Sửa</a>
                                                            
                                                                <a class="btn btn-warning" href="<?php echo _WEB_ROOT . '/admin/news/del/'. $item['id'] ?> "><i class="fa fa-times"></i>Xóa</a></td>
                                                            
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

    <script>
        <?php 
        if(!empty($mess))
        {
            echo "alert('".$mess."')";
        }
        ?>
    </script>
           