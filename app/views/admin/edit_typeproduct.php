<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Sửa Loại Sản Phẩm</h4>
                                </div>
                                <div class="card-body">
                               
                                    <form method="post" action="<?php echo _WEB_ROOT; ?>/admin/typeProduct/postEdit" enctype="multipart/form-data">
                                        <div class="row">
                                            
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>Tên Loại Sản Phẩm</label>
                                                    <input value="<?php echo $typeProduct['name_type'] ?>" required type="text" name="name_type" class="form-control" placeholder="Tên sản phẩm" >
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label>Vị trí trên trang chủ</label>
                                                    <select name="display_order" class="custom-select form-control">
                                                        <option <?php echo $typeProduct['display_order']==='0'? 'selected':'' ?> value="0">Không hiển thị</option>
                                                        <option <?php echo $typeProduct['display_order']==='1'? 'selected':'' ?> value="1">Vị trí 1</option>
                                                        <option <?php echo $typeProduct['display_order']==='2'? 'selected':'' ?> value="2">Vị trí 2</option>
                                                        <option <?php echo $typeProduct['display_order']==='3'? 'selected':'' ?> value="3">Vị trí 3</option>
                                                        <option <?php echo $typeProduct['display_order']==='4'? 'selected':'' ?> value="4">Vị trí 4</option>
                                                        <option <?php echo $typeProduct['display_order']==='5'? 'selected':'' ?> value="5">Vị trí 5</option>
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
                                                    <textarea  name ="des_type" id="editor" rows="4" cols="80" class="form-control" ><?php echo $typeProduct['des_type']?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                            <input required class="invisible" name ="id_type"  class="form-control" value="<?php echo $typeProduct['id_type'] ?>" > 
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Sửa Loại Sản Phẩm</button>
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
          