    <div class="inner_main_header" id="inner_main_header">
        <div class="container">
            <h3>DEVELOPMENT</h3>
        </div>
    </div>
<style type="text/css">
#services { color:#1a9c9b; }
#services.hvr-underline-from-center:before { left:0; right:0; }
</style>
    <div class="development_main_page">
    <?php $count = 1; foreach($development as $value) { if($count%2 == 0) {$class= "inner_services_app";}else{$class="inner_services_develpt";} ?>
    <div class="<?php echo $class ?>">
    <div class="container">
        <div class="row inner_development_count_one"> 
            <div class="development_margin ">        
                <div class="col-md-4">
                    <img src="<?php echo $this->config->item('image_path');?>/uploads/services/<?php echo $value['serv_image']?>"/>    
                </div>
                <div class="col-md-8">
                    <div class="inner_services_develpt_cont">
                        <h3><?php echo $value['serv_heading']?></h3>
                        <p><?php echo $value['serv_description']?></p>
                        <div class="all_a"><a href="<?= base_url().'home/contact'?>" class="wow fadein">Enquiry Now</a></div>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</div>
 <?php $count++; } ?>
</div>
