            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
<<<<<<< HEAD
                                    <h4 class="card-title">Thêm Sản Phẩm</h4>
=======
                                    <h4 class="card-title">Thêm sản phẩm</h4>
>>>>>>> 73b293fda7e7c2ecf0d16e231ec9b57e48463000
                                </div>
                                <div class="card-body">
                                    <form method="post" action="<?php echo _WEB_ROOT; ?>/admin/product/postAddProduct" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-2 pr-1">
                                                <div class="form-group">
                                                    <label>Mã sản phẩm</label>
                                                    <input required type="text" name="code" class="form-control"  placeholder="Mã sản phẩm" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>Tên sản phẩm</label>
                                                    <input required type="text" name="name" class="form-control" placeholder="Tên sản phẩm" >
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
                                                                <option value="<?php echo $type['id_type'] ?>"><?php echo $type['name_type']?></option>
                                                    <?php 
                                                        }
                                                    ?>
                                                 </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 ">
                                                <div class="form-group des_short">
                                                    <label>Tóm tắt</label>
<<<<<<< HEAD
                                                    <textarea   name="des_short" id="editor_short" maxlength="500" class="form-control"  rows="5" style="height: 100%;"></textarea>
=======
                                                    <textarea  required name="des_short" id="editor_short" maxlength="500" class="form-control"  rows="5" style="height: 100%;"></textarea>
>>>>>>> 73b293fda7e7c2ecf0d16e231ec9b57e48463000
                                                   
                                                </div>
                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="form-group">
                                                    <label>Hình ảnh</label>
<<<<<<< HEAD
                                                    <input id='input_img_product' required name="img" type="file" class="form-control-file">
                                                    <img id ="img_product" style="max-width:150px ; max-height:200px" src="<?php echo _WEB_ROOT ?>/public/assets/admin/assets/img/img_noimg.png" alt="hình ảnh sản phẩm">
=======
                                                    <input required name="img" type="file" class="form-control-file">
>>>>>>> 73b293fda7e7c2ecf0d16e231ec9b57e48463000
                                                </div>
                                            </div>
                                        </div>
                                        <!-- view -->
                                        <div class="row">
                                            <div class="col-md-3 ">
                                                <div class="form-group">
                                                    <label>Lượt xem</label>
                                                    <input required name="view" type="text" placeholder="Nhập lượt xem" class="form-control" value="0">
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label>Meta-Description</label>
                                                    <textarea required name="meta_description" type="text" placeholder="Nhập Meta-Description " class="form-control" rows="3" maxlength="225"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group description">
                                                    <label>Mô tả</label>
                                                    <textarea  name ="description" id="editor" rows="4" cols="80" class="form-control" ></textarea>
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
            
<<<<<<< HEAD

        <script>
            document.getElementById('input_img_product').addEventListener('change',(e)=>{
                const files = e.target.files[0];
                const urlImg =  URL.createObjectURL(files)
                document.getElementById('img_product').src = urlImg;
                console.log(urlImg);
            });

        </script>
=======
>>>>>>> 73b293fda7e7c2ecf0d16e231ec9b57e48463000
         <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ), {
                    // minHeight: '500px',
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
<<<<<<< HEAD
                        'undo', 'redo','sourceEditing' ],

                    
=======
                        'code', 'codeBlock', '|',
                        'insertTable', '|',
                         'blockQuote', '|',
                        'undo', 'redo','sourceEditing' ],
>>>>>>> 73b293fda7e7c2ecf0d16e231ec9b57e48463000
                       
                } )
                .catch( error => {
                    console.error( error );
                } );
<<<<<<< HEAD
                
                ClassicEditor
                .create( document.querySelector( '#editor_short' ), {
                    // minHeight: '500px',
                    ckfinder: {
                        uploadUrl: '<?php echo _WEB_ROOT?>/public/assets/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
                    },
                  
                    toolbar: [  'heading', '|',
                        'fontfamily', 'fontsize', '|',
                        'alignment', '|',
                        'fontColor', 'fontBackgroundColor', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                        'link', '|',
                        'outdent', 'indent', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'undo', 'redo','sourceEditing' ],

                    
                       
                } )
                .catch( error => {
                    console.error( error );
                } );
           
                

=======
>>>>>>> 73b293fda7e7c2ecf0d16e231ec9b57e48463000

           
            



        
               
        </script>
          