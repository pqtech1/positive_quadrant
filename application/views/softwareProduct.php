<div class="container technologyTopContainer">
    <div class="technologyTopContainerLeft">
        <h1 class="pq_h1 pq_left">Empowering Innovation with Cutting-Edge Software Solutions</h1>
        <p class="pq_p">At Positive Quadrant Technologies, we are dedicated to delivering high-quality software products that drive
            innovation and optimize business operations. Our solutions are designed to meet the evolving needs of
            industries worldwide, providing robust, scalable, and efficient tools that empower companies to unlock their
            full potential. With a focus on reliability and performance, we transform challenges into opportunities
            through our advanced technology.</p>
    </div>
    <div class="technologyTopContainerRight">
        <picture class="lazyload">
            <!-- WebP version -->
            <source data-srcset="<?= base_url('assets/img/technologyimagebackground.webp') ?>" type="image/webp">
            
            <!-- JPG fallback -->
            <img 
                data-src="<?= base_url('noWebpAssets/assets/img/technologyimagebackground.jpg') ?>" 
                alt="Software Products" 
                class="lazyload img-responsive" 
            />
        </picture>


    </div>

</div>

<div class="container weAreExpertInTech">
    <h2 class="pq_h2">Our Software Products</h2>
</div>

<div class="container technolgyParentContainer">
    <?php
    $index = 0; // Initialize a counter to track even/odd cards
    foreach ($software_products as $sp):
        // Determine the animation based on the counter for a zig-zag effect
        $animation_effect = ($index % 2 == 0) ? 'fade-right' : 'fade-left';
        ?>
        <div class="technologyCard" data-aos="<?php echo $animation_effect; ?>" data-aos-duration="800">
            <div class="technologyImage">
                <img 
                    class="lazyload img-responsive" 
                    data-src="<?php echo base_url('admin/uploads/softwareproducts/' . $sp['image']); ?>" 
                    alt="<?php echo htmlspecialchars($sp['image']); ?>" 
                />
            </div>
            <div class="technologyDetailContainer">
                <h2 class="pq_h2"><?php echo $sp['title']; ?></h2>
                <p class="pq_p"><?php echo $sp['description']; ?></p>
            </div>
        </div>
        <?php
        $index++; // Increment counter for the next card
    endforeach;
    ?>
</div>

<div class="courseBuy">
    <a href="<?php echo base_url(); ?>contact-us"><button><i class="fa fa-rocket"></i> Contact Us
        </button></a>
</div>