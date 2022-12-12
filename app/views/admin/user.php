<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h3 class="card-title">Danh Sách Tài Khoản</h3>
                                    <a href="<?php echo _WEB_ROOT . '/admin/uer/' ?>" class="btn btn-primary">Thêm Tài Khoản</a>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>Mã</th>
                                            <th>Tài khoản</th>
                                            <th>Họ và tên</th>
                                            <th>Vai trò</th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($users as $item)
                                                 { // echo '<pre>';
                                                //      print_r($product) ;
                                                //      echo '</pre>';
                                                     ?>
                                                
                                                   <tr>
                                                            <td><?php echo $item['id'] ?></td>
                                                            <td ><?php echo $item['username'] ?></td>
                                                            <td ><?php echo $item['fullname'] ?></td>
                                                            <td><?php echo $item['uid'] ?></td>
                                                            <td style="display:none" class="invisible"><?php echo $item['password'] ?></td>
                                                            <td>
                                                                <a  class =" btn btn-success" href="<?php echo _WEB_ROOT . '/admin/user/resetPass/'. $item['id'] ?> "><i class="fa fa-edit"></i> Reset mật khẩu</a>
                                                            
                                                                <a class="btn btn-warning" href="<?php echo _WEB_ROOT . '/admin/news/changePass/'. $item['id'] ?> "><i class="fa fa-times"></i>Thay đổi mật khẩu</a></td>
                                                            
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
