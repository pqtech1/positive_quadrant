<style>
    body{
        overflow-x: hidden;
    }
</style>

<div class="container technologyTopContainer">
    <div class="technologyTopContainerLeft">
        <h1 class="pq_h1 pq_left">Empowering Innovation with Cutting-Edge Technologies at Positive Quadrant Technologies</h1>
        <p class="pq_p">At Positive Quadrant Technologies, we specialize in delivering innovative and tailored software solutions
            using a wide range of modern technologies. From front-end frameworks like React and Angular to full-stack
            solutions with MERN and MEAN, we bring your vision to life with expertise in Drupal and beyond. Our team is
            committed to driving success through advanced, scalable, and efficient development practices, ensuring your
            business stays ahead in the fast-evolving digital landscape.</p>
    </div>
    <div class="technologyTopContainerRight">
        <picture class="lazyload">
            <!-- WebP version -->
            <source data-srcset="<?= base_url('assets/img/technologyimagebackground.webp') ?>" type="image/webp">
            
            <!-- JPG fallback -->
            <img 
                data-src="<?= base_url('noWebpAssets/assets/img/technologyimagebackground.jpg') ?>" 
                alt="Technology Background Image" 
                class="lazyload img-responsive" 
            />
        </picture>
    </div>

</div>

<div class="container weAreExpertInTech">
    <h2 class="pq_h2">Our Technological Solutions for Your Success</h2>
</div>

<div class="container technolgyParentContainer">
    <?php
    $index = 0; // Initialize a counter to track even/odd cards
    foreach ($technologies as $tech):
        // Determine the animation based on the counter
        $animation_effect = ($index % 2 == 0) ? 'fade-right' : 'fade-left';
        ?>
        <div class="technologyCard" data-aos="<?php echo $animation_effect; ?>" data-aos-duration="800">
            <div class="technologyImage">
                <img class="img-responsive" src="<?php echo base_url('admin/uploads/technology/' . $tech['image']); ?>"
                     alt="<?php echo isset($tech['name']) ? htmlspecialchars($tech['name']) : 'Technology Image'; ?>">
            </div>
            <div class="technologyDetailContainer">
                <h2 class="pq_h2"><?php echo $tech['title']; ?></h2>
                <p class="pq_p"><?php echo $tech['description']; ?></p>
            </div>
        </div>
        <?php
        $index++; // Increment counter for the next loop iteration
    endforeach;
    ?>
</div>

<div class="courseBuy">
    <a href="<?php echo base_url(); ?>contact-us"><button><i class="fa fa-rocket"></i> Contact Us
        </button></a>
</div>