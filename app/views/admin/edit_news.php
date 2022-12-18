            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Thêm Tin Tức</h4>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="<?php echo _WEB_ROOT; ?>/admin/news/postEdit" enctype="multipart/form-data">
                                            <?php
                                                foreach($news as $item)
                                                {
                                            ?>
                                        <div class="row">

                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Tiêu đề tin tức</label>
                                                    <textarea placeholder="Nhập tiêu đề tin tức" name="title" maxlength="255" class="form-control"  rows="5" style="height: 100%;"><?php echo $item['title'] ?></textarea>
                                                   
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                   
                                                    <div class="form-group">
                                                        <label>Lượt xem</label>
                                                        <input type="text" name="view" class="form-control" placeholder="Số lượng lượt xem"  value="<?php echo $item['view'] ?>">
                                                    </div>
                                            </div>
                                            
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label>Meta-Description</label>
                                                    <textarea required name="meta_description" type="text" placeholder="Nhập Meta-Description " class="form-control" rows="3" maxlength="225"> <?php echo $item['meta_description'] ?></textarea>
                                                </div>
                                            </div>
                                       
                                            <!--  -->
                                        </div>
                                        
                                        <div class="row">
                                           
                                            <div class="col-md-2">
                                           
                                                <div class="form-group">
                                                <label> Hình ảnh hiện tại</label>
                                                    <img src="<?php echo _WEB_ROOT .'/public/assets/news/'.$item['img'] ; ?>" alt= "ảnh đại diện tin tức" width="100%">
                                                
                                                </div>
                                            </div>
                                            <div class="col-md-2 ">
                                                <div class="form-group">
                                                        <label>Hình ảnh đại diện</label>
                                                        <input name="img" type="file" class="form-control-file">
                                                </div>
                                            </div>
                                            

                                        </div>
                                        
                                        <!-- update  -->
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Mô tả</label>
                                                    <textarea name ="description" id="editor" rows="4" cols="80" class="form-control" p ><?php echo $item['description'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    
                                                    <input class="invisible" name ="id"  class="form-control" value="<?php echo $item['id'] ?>" > 
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Sửa tin tức</button>
                                        <div class="clearfix"></div>

                                        <?php
                                            
                                             }
                                        ?>
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
          