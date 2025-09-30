<div class="inner_main_header" id="inner_main_header">
    <div class="container">
        <h3>Our Clients</h3>
    </div>
</div>
<div class="clients_main_page">
    <div class="container">

        <?php foreach ($clients as $value) { ?>
            <div class="col-md-2">
                <div class="client_home_logo_img">
                    <img
                        src="<?php echo $this->config->item('image_path') ?>/uploads/client/<?php echo $value['client_image']; ?>">
                </div>
            </div>
        <?php } ?>



    </div>
</div>