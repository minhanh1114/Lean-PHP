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
                                    <form class=" form-group input-group d-flex justify-content-center" method="GET" action="">
                                        <input type="search" name ="k" class="form-control rounded" placeholder="Tìm kiếm sản phẩm" aria-label="Search" aria-describedby="search-addon" />
                                        <input type="submit" class="btn btn-outline-primary" value="Tìm kiếm">
                                    </form>
                                    <form id="form-type_product" method="GET" action="">
                                                <!-- <span for="">Example select</span> -->
                                        <select name ="type" class="form-control" id="select-type_product">
                                        <option value="">Chọn loại sản phẩm</option>
                                        <?php
                                            foreach ($typesProduct as $type)
                                            {
                                        ?>
                                            <option <?php if($typeSelected==$type['slug_type']) echo 'selected ="selected"'; ?> value="<?php echo $type['slug_type'] ?>"><?php echo $type['name_type']?></option>
                                        <?php 
                                            } 
                                        ?>
                                        
                                        </select>
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
                                                            <td style="max-width: 150px;" class="text-truncate"> <a href="<?php echo _WEB_ROOT .'/san-pham/'. $product['slug'].'.html' ?>"><?php echo _WEB_ROOT .'/san-pham/' . $product['slug'].'.html' ?> </a></td>
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
        document.getElementById('select-type_product').addEventListener('change', function(){
            document.getElementById('form-type_product').submit();
        });
    </script>
           