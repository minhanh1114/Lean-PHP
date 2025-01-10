<!-- <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script> -->
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
                                                    <input required value="<?php echo $item['code'] ?>" type="text" name="code" class="form-control"  placeholder="Mã sản phẩm" >
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-1">
                                                <div class="form-group">
                                                    <label>Tên sản phẩm</label>
                                                    <input required value="<?php echo $item['name'] ?>" type="text" name="name" class="form-control" placeholder="Tên sản phẩm" >
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
                                        <div class="col-md-8">
                                            <label>Hình ảnh phụ</label>
                                        <div class="dropzone" id="myDropzone">

                                                <div class="dz-message">Kéo và thả (có thể ấn) hình ảnh vào đây</div>
                                            </div>
                                        </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Hình ảnh chính</label>
                                                    <input   name="img" type="file" class="form-control " id="customFile">
                                                </div>
                                                <div class="">
                                                    <img style="max-width:100px; max-height:80px" src="<?php echo _WEB_ROOT . '/public/assets/products/'. $item['img'] ?>" alt='hình ảnh sản phẩm' >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Giá Sản Phẩm</label>
                                                    <div class="input-group">
                                                    <input  required id="price" name="price" class="form-control" placeholder="100,000" value="<?php echo $item['price'] ?>">
                                                    <span class="input-group-text">VND</span>
                                                </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Phần Trăm giảm giá 0-100</label>
                                                <div class="input-group">
                                                    <input type="number" min="0" max="100" id="discount_percentage" class="form-control" name="discount_percentage" value="<?php echo $item['discount_percentage'] ?>">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Giá Chưa Sale</label>
                                                    <input disabled id="price_before"   required  class="form-control" placeholder="Giá khi chưa áp dụng giảm giá" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-4">
                                                <div class="form-group des_short">
                                                    <label>Tóm tắt</label>
                                                    <textarea   name="des_short" id="editor_short" maxlength="500" class="form-control"  rows="5" style="height: 100%;"><?php echo $item['des_short'] ?></textarea>
                                                   
                                                </div>
                                            </div>
                                            <div class="col-md-3 ">
                                                <div class="form-group">
                                                    <label>Lượt xem</label>
                                                    <input required name="view" type="text" placeholder="Nhập lượt xem" class="form-control" value="<?php echo $item['view'] ?>" >
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Meta-Description</label>
                                                    <textarea required name="meta_description" type="text" placeholder="Nhập Meta-Description " class="form-control" rows="3" maxlength="225"><?php echo $item['meta_description'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group description">
                                                    <label>Mô tả</label>
                                                    <textarea name ="description" id="editor" rows="4" cols="80" class="form-control" ><?php echo $item['description'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    
                                                    <input id="product_id" required class="invisible" name ="id"  class="form-control" value="<?php echo $item['id'] ?>" > 
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
            const discountPer = document.querySelector('#discount_percentage');
            const price = document.querySelector('#price');
            const priceBefore = document.querySelector('#price_before');
            discountPer.addEventListener('input',calculatorPrice)
           
            price.addEventListener('input',calculatorPrice)
            
            
            function calculatorPrice(e){
                
                        
                                    
                            const inputValue = parseInt(price.value) ;
                            
                              if(e.target.id.includes('discount_percentage')){
                                    if(e.target.value<0||e.target.value>100)
                                {
                                    alert('vui lòng nhập trong khoảng 0-100%')
                                    return
                                }
                               
                              } 
                          
                           
                            if(isValidNumber(e.target.value))
                            {


                                if(inputValue>0&&discountPer.value>0&&discountPer.value<100)
                                {
                                    const discountMultiplier = (100 - parseInt(discountPer.value)) / 100;
                                    priceBefore.value = formatCurrencyVND(roundToThousandDown(inputValue / discountMultiplier));
                                
                                    
                                }

                                
                            }
                            else{
                                e.target.value = e.target.value.replace(/[^0-9]/g, '');
                            }
                           
                                
                    
                    
                    }
            function isValidNumber(value) {
               const regex = /^[0-9]+$/;
                return regex.test(value);
            }
            function formatCurrencyVND(amount) {
            return amount.toLocaleString('vi-VN', { style: 'decimal' });
            }
            function roundToThousandDown(number) {
            return Math.floor(number / 1000) * 1000;
            }


            // document.getElementById('input_img_product').addEventListener('change',(e)=>{
            //     const files = e.target.files[0];
            //     const urlImg =  URL.createObjectURL(files)
            //     document.getElementById('img_product').src = urlImg;
            //     console.log(urlImg);
            //     // URL.revokeObjectURL(urlImg); 
            // });


            </script>
               <script>
            // document.getElementById('product_id').value = generateTemporaryId();
            var productId = document.getElementById('product_id').value;
            
                        var myDropzone = new Dropzone("#myDropzone", {
                            url: "<?php echo _WEB_ROOT; ?>/admin/product/ajaxAddProductImages/", // URL xử lý hình ảnh
                            maxFilesize: 5, // Kích thước file tối đa (MB)
                            acceptedFiles: "image/*", // Chỉ cho phép hình ảnh
                            addRemoveLinks: true // Hiển thị các liên kết thêm/xóa
                        });

                        myDropzone.on("sending", function(file, xhr, formData) {
                            if (productId) {
                                formData.append("product_id", productId); // Gửi id sản phẩm cùng file
                                formData.append("is_temp", 0); 
                            } else {
                                console.log('Không có sản phẩm ID.');
                            }
                        });

                        myDropzone.on("success", function(file, response) {
                            
                           if(response.id_images)
                           {
                                file.id_images = response.id_images;
                            
                           }
                           else
                           {
                            alert('ảnh tải lên không thành công ')
                           }
                        });
                        myDropzone.on("removedfile",function(file){
                            console.log(file);
                            
                            if(file.id_images){
                                let formData = new FormData();
                                formData.append("id", file.id_images);
                               fetch("<?php echo _WEB_ROOT; ?>/admin/product/ajaxDeleteProductImages/",{
                                    method: 'POST',
                                    
                                    body:formData  //gửi với dạng form dữ liệu
                                })
                                .then((response)=>response.json())
                                .then((data)=>console.log(data)
                                )
                                .catch(err => console.error("Lỗi xóa ảnh:", err));

                            }
                            else
                            {
                                console.log('ảnh thiếu thông tin');
                                
                            }
                        });

                        myDropzone.on("error", function(file, response) {
                            console.log("Error:", response);
                        });
                        <?php
                        $url = _DIR_ROOT;
                        $dataImages = $productImages; // $productImages là mảng ảnh sản phẩm từ backend.
                        
                        // echo 'var url = "' . $url . '";';
                        echo 'var dataImages = ' . json_encode($dataImages) . ';';
                    ?>
                    // dataImages = dataImages.JSON.parse(dataImages);
                    console.log(typeof dataImages);
                    dataImages.forEach((item)=>{
                        let mockFile = { 
                            id_images: item.id 
                            };
                            myDropzone.displayExistingFile(mockFile, <?php echo '"'._WEB_ROOT.'"'?>+"/public/assets/products/images/"+item.image_path);
                          // Thêm thuộc tính serverId vào previewElement
                            // mockFile.previewElement.dataset.serverId = item.id;    
                        })
                    
            //     function generateTemporaryId() {
            //     return  Date.now() + Math.floor(Math.random() * 100);
            // }
</script>
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
                


                



        
               
        </script>
          