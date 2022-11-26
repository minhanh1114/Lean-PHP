<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Thêm sản phẩm</h4>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="<?php echo _WEB_ROOT; ?>/admin/product/postAddProduct" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-2 pr-1">
                                                <div class="form-group">
                                                    <label>Mã sản phẩm</label>
                                                    <input type="text" name="code" class="form-control"  placeholder="Mã sản phẩm" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>Tên sản phẩm</label>
                                                    <input type="text" name="name" class="form-control" placeholder="Tên sản phẩm" >
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Loại sản phẩm</label>
                                                    <select name="type" class="form-control" id="sel1">
                                                        
                                                        <?php
                                                        
                                                         foreach ($typeProduct as $type)
                                                        {
                                                        ?>
                                                                <option value="<?php echo $type['id'] ?>"><?php echo $type['name_type']?></option>
                                                    <?php 
                                                        }
                                                    ?>
                                                 </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 pr-1">
                                                <div class="form-group">
                                                    <label>Tóm tắt</label>
                                                    <textarea name="des_short" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                   
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>Hình ảnh</label>
                                                    <input name="img" type="file" class="form-control-file">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Mô tả</label>
                                                    <textarea name ="description" id="editor" rows="4" cols="80" class="form-control" p ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Thêm sản phẩm</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            
         <script>
         CKEDITOR.replace( 'editor', {
                height: '500px',
                filebrowserBrowseUrl: '<?php echo _WEB_ROOT?>/public/assets/admin/ckfinder/ckfinder.html',
                filebrowserUploadUrl:   '<?php echo _WEB_ROOT?>/public/assets/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
            } );
               
        </script>
          