<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                <div class="row">
                                    <div class="col-md-7">
                                        <h3 class="card-title">Danh sách các sản phẩm (<?php echo empty($totalProduct)? count($typesProduct): $totalProduct ?>)</h3>
                                        <a href="./typeProduct/add" class="btn btn-primary">Thêm loại sản phẩm</a>
                                    </div>
                                   
                                </div>
                                   
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>Mã</th>
                                            <th>Tên loại sản phẩm</th>
                                            <th>Vị trí</th>
                                            <th>Ngày tạo</th>
                                            <th>Plug</th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($typesProduct as $product)
                                                 { // echo '<pre>';
                                                //      print_r($product) ;
                                                //      echo '</pre>';
                                                     ?>
                                                
                                                   <tr>
                                                            <td><?php echo $product['id_type'] ?></td>
                                                            <td><?php echo $product['name_type'] ?></td>
                                                            <td><?php echo $product['display_order'] ?></td>
                                                            <td><?php echo $product['date_type'] ?></td>
                                                            <td style="max-width: 150px;" class="text-truncate"> <a href="<?php echo _WEB_ROOT .'/loai-san-pham/'. $product['slug_type'].'.html' ?>"><?php echo _WEB_ROOT .'/loai-san-pham/' . $product['slug_type'].'.html' ?> </a></td>
                                                            <td>
                                                                <a  class =" btn btn-success" href="<?php echo _WEB_ROOT . '/admin/typeProduct/edit/'. $product['id_type'] ?> "><i class="fa fa-edit"></i> Sửa</a>
                                                            
                                                                <a class="btn btn-warning" href="<?php echo _WEB_ROOT . '/admin/typeProduct/del/'. $product['id_type'] ?> "><i class="fa fa-times"></i>Xóa</a></td>
                                                            
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
        document.querySelectorAll('.btn.btn-warning').forEach((item=>{
            item.addEventListener('click', function(event){
            var confirmDel = confirm("Bạn có chắc chắn muốn xóa không ?");  
            if (confirmDel == true) {  
                 console.log("You have selected OK!") ;  
            } else {  
                event.preventDefault();
                console.log("You have selected Cancelled!");  
            }  
        })
        }));
    </script>
           