

            <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Liên hệ từ khách hàng</h3>
                            
                        </div>
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <h4>Tên KH</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Số điện thoại</h4>
                            </div>
                            <div class="col-md-7">
                                <h4>Nội dung</h4>
                        </div>
                        </div>
                        <?php foreach($dataContact as $item)
                            {
                        ?>
                            <div class="row">
                            
                                
                                <div class="col-md-3">
                                    
                                    
                                    <div class="alert alert-success">
                                        
                                        <span><?php echo $item['name']?></span>
                                    </div>
                                    
                                </div>
                                <div class="col-md-2">
                                    
                                    
                                    <div class="alert alert-primary">
                                        
                                        <span><?php echo $item['phone']?></span>
                                    </div>
                                    
                                </div>
                                <div class="col-md-7">
                                    
                                    
                                    <div class="alert alert-info">
                                        <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                                            <i class="nc-icon nc-simple-remove"></i>
                                        </button>
                                        <span> 
                                            <small><?php echo "Ngày: ".$item['date'] ?></small>
                                            <br>
                                            <?php echo $item['content']?>
                                        </span>
                                    </div>
                                    
                                
                                
                            </div>
                            </div>
                                <?php
                                    }
                                    ?>
                            <br>
                            <br>
                            
                            
                        </div>
                    </div>
                   
                </div>
            </div>
            
