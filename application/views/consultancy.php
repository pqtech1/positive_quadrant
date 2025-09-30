<div class="inner_main_header" id="inner_main_header">
        <div class="container">
            <h3>Consultancy</h3>
        </div>
    </div>
<style type="text/css">
#services { color:#1a9c9b; }
#services.hvr-underline-from-center:before { left:0; right:0; }
</style>
<div class="inner_services_training">
    <div class="container">
            <?php  $new_chunk =  array_chunk($consultancy, 3); 
                  
                    if(count($new_chunk)>1)
                    {   
                            $i=0;
                            foreach ($new_chunk as  $value) {  $class_add = ($i >= 1) ?  'ma_top': '';?>
                                    
                                
                                    <?php foreach($value as $data) {?>
                                            <div class="col-md-4">
                                            <div class="inner_services_training_cont">
                                                <!-- adding images -->
                                                <img src="assets/img/banner4.jpeg" alt="Image" class="img-responsive"> 
                                                <h3><?php echo $data['serv_heading']; ?></h3>
                                                <?php echo $data['serv_description']; ?>
                                            </div>
                                        </div>                                     
                                    <?php ?>
                                
                       <?php } $i++;}
                    }else
                    {?>
                    <?php
                     foreach($consultancy as $consult) { ?>
                    <div class="col-md-4">
                        <div class="inner_services_training_cont">
                            <h3><?php echo $consult['serv_heading']; ?></h3>
                            <?php echo $consult['serv_description']; ?>
                        </div>
                    </div>
                            
            <?php } }?>
            
        
  
    </div>
</div>