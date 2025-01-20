<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Thêm Loại Sản Phẩm</h4>
                                </div>
                                <div class="card-body">
                               
                                    <form method="post" action="<?php echo _WEB_ROOT; ?>/admin/typeProduct/postAdd" enctype="multipart/form-data">
                                        <div class="row">
                                            
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>Tên Loại Sản Phẩm</label>
                                                    <input required type="text" name="name_type" class="form-control" placeholder="Tên sản phẩm" >
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label>Vị trí trên trang chủ</label>
                                                    <select name="display_order" class="custom-select form-control">
                                                        <option  value="0">Không hiển thị</option>
                                                        <option  value="1">Vị trí 1</option>
                                                        <option  value="2">Vị trí 2</option>
                                                        <option  value="3">Vị trí 3</option>
                                                        <option  value="4">Vị trí 4</option>
                                                        <option  value="5">Vị trí 5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 px-1">
                                                
                                            </div>
                                           
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group description">
                                                    <label>Mô tả</label>
                                                    <textarea  name ="des_type" id="editor" rows="4" cols="80" class="form-control" ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Thêm Loại Sản Phẩm</button>
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
                        'undo', 'redo','sourceEditing' ],

                    
                       
                } )
                .catch( error => {
                    console.error( error );
                } );
                
               
           
                


           
            



        
               
        </script>
          