       <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                <div class="row">
                                    <div class="col-md-7">
                                        <h3 class="card-title">Danh sách các sản phẩm (<?php echo empty($totalProduct)? count($products): $totalProduct ?>)</h3>
                                        <a href="./product/addProduct" class="btn btn-primary">Thêm sản phẩm</a>
                                    </div>
                                    <div class="col-md-5">
                                    <form class="input-group d-flex justify-content-center" method="GET" action="">
                                        <input type="search" name ="k" class="form-control rounded" placeholder="Tìm kiếm sản phẩm" aria-label="Search" aria-describedby="search-addon" />
                                        <input type="submit" class="btn btn-outline-primary" value="Tìm kiếm">
                                    </form>
                                    </div>
                                </div>
                                   
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>Mã</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Tóm tắt</th>
                                            <!-- <th>Mô tả</th> -->
                                            <th>Loại sản phẩm</th>
                                            <th>Ngày đăng</th>
                                            <th>Plug</th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($products as $product)
                                                 { // echo '<pre>';
                                                //      print_r($product) ;
                                                //      echo '</pre>';
                                                     ?>
                                                
                                                   <tr>
                                                            <td><?php echo $product['code'] ?></td>
                                                            <td><img src="<?php echo _WEB_ROOT . '/public/assets/products/'. $product['img'] ?>" width="100px"/></td>
                                                            <td><?php echo $product['name'] ?></td>
                                                            <td style="max-width: 150px;" class="text-truncate"><?php echo $product['des_short'] ?></td>
                                                            <!-- <td style="max-width: 250px;" class="text-truncate"><?php //echo $product['description'] ?></td> -->
                                                            <td><?php echo $product['name_type'] ?></td>
                                                            <td><?php echo $product['date'] ?></td>
                                                            <td><?php echo $product['slug'] ?></td>
                                                            <td>
                                                                <a  class =" btn btn-success" href="<?php echo _WEB_ROOT . '/admin/product/edit/'. $product['id'] ?> "><i class="fa fa-edit"></i> Sửa</a>
                                                            
                                                                <a class="btn btn-warning" href="<?php echo _WEB_ROOT . '/admin/product/del/'. $product['id'] ?> "><i class="fa fa-times"></i>Xóa</a></td>
                                                            
                                                 </tr>
                                                 <?php 
                                                }
                                            ?>
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-12">
                            <div class="card card-plain table-plain-bg">
                                <div class="card-header ">
                                    <h4 class="card-title">Table on Plain Background</h4>
                                    <p class="card-category">Here is a subtitle for this table</p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <th>ID</th>
                                            <th>Hình ảnh</th>
                                            <th>Name</th>
                                            <th>Salary</th>
                                            <th>Country</th>
                                            <th>City</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Dakota Rice</td>
                                                <td>$36,738</td>
                                                <td>Niger</td>
                                                <td>Oud-Turnhout</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Minerva Hooper</td>
                                                <td>$23,789</td>
                                                <td>Curaçao</td>
                                                <td>Sinaai-Waas</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Sage Rodriguez</td>
                                                <td>$56,142</td>
                                                <td>Netherlands</td>
                                                <td>Baileux</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Philip Chaney</td>
                                                <td>$38,735</td>
                                                <td>Korea, South</td>
                                                <td>Overland Park</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Doris Greene</td>
                                                <td>$63,542</td>
                                                <td>Malawi</td>
                                                <td>Feldkirchen in Kärnten</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Mason Porter</td>
                                                <td>$78,615</td>
                                                <td>Chile</td>
                                                <td>Gloucester</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php
                                    if(!empty($page_index)&&!empty($totalPage))
                                    {
                                        for($i=1;$i<=$totalPage;$i++)
                                        {
                                ?>
                                     <li class="page-item <?php if($i == $page_index)echo 'active'; ?>"><a class="page-link" href="<?php echo _WEB_ROOT .'/admin/product?page='.$i?>"><?php echo $i ?></a></li>
                                <?php
                                        } }
                                 ?>
                            </ul>
                    </nav>
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
           