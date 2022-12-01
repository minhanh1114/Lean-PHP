<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Sửa sản phẩm</h4>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="<?php echo _WEB_ROOT; ?>/admin/product/postEdit" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-2 pr-1">
                                                <div class="form-group">
                                                    <?php
                                                     foreach($product as $item)
                                                        {
                                                            
                                                        
                                                    ?>
                                                    <label>Mã sản phẩm</label>
                                                    <input value="<?php echo $item['code'] ?>" type="text" name="code" class="form-control"  placeholder="Mã sản phẩm" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>Tên sản phẩm</label>
                                                    <input value="<?php echo $item['name'] ?>" type="text" name="name" class="form-control" placeholder="Tên sản phẩm" >
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
                                                                <option <?php if($type['id_type']==$item['type'])  echo 'selected'; ?> value="<?php echo $type['id_type'] ?>"><?php echo $type['name_type']?></option>
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
                                                    <textarea name="des_short"  class="form-control" id="exampleFormControlTextarea1" rows="3"> <?php echo $item['des_short'] ?> </textarea>
                                                   
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label>Hình ảnh</label>
                                                    <input  name="img" type="file" class="form-control " id="customFile">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Mô tả</label>
                                                    <textarea name ="description" id="editor" rows="4" cols="80" class="form-control" > <?php echo $item['description'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    
                                                    <input class="invisible" name ="id"  class="form-control" value="<?php echo $item['id'] ?>" > 
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <?php 
                                             }
                                        ?>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Sửa sản phẩm</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            
            <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ), {
                    // minHeight: '300px',
                    ckfinder: {
                        uploadUrl: '<?php echo _WEB_ROOT?>/public/assets/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
                    },
                  
                    toolbar: [ 'ckfinder', 'imageUpload', '|', 'heading', '|',
                        'fontfamily', 'fontsize', '|',
                        'alignment', '|',
                        'fontColor', 'fontBackgroundColor', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                        'link', '|',
                        'outdent', 'indent', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'code', 'codeBlock', '|',
                        'insertTable', '|',
                         'blockQuote', '|',
                        'undo', 'redo','sourceEditing' ],
                       
                } )
                .catch( error => {
                    console.error( error );
                } );



        
               
        </script>
          