<div class="container technologyTopContainer">
    <div class="technologyTopContainerLeft">
        <h1 class="pq_h1 pq_left">Innovative Solutions, Empowering Industries</h1>
        <p class="pq_p">At Positive Quadrant Technologies, we specialize in delivering cutting-edge technical solutions tailored to
            meet the unique needs of industries such as banking, pharmaceuticals, manufacturing, and jewelry. With a
            deep commitment to innovation, precision, and excellence, we empower businesses to unlock new growth
            opportunities, streamline operations, and achieve sustainable success. Our team of experts combines industry
            knowledge with advanced technologies to provide seamless, scalable solutions that drive efficiency,
            security, and transformation. Let us help you stay ahead of the curve in today’s fast-paced digital
            landscape.</p>
    </div>
    <div class="technologyTopContainerRight">
        <picture class="lazyload">
            <!-- WebP version -->
            <source data-srcset="<?= base_url('assets/img/our_industries.webp') ?>" type="image/webp">
            
            <!-- JPG fallback -->
            <img 
                data-src="<?= base_url('noWebpAssets/assets/img/our_industries.jpg') ?>" 
                alt="Our Industries" 
                class="lazyload img-responsive" 
            />
        </picture>
    </div>

</div>

<div class="container weAreExpertInTech">
    <h2 class="pq_h2">Industries We Serve with Excellence</h2>
</div>

<div class=" container technolgyParentContainer">
    <?php foreach ($industries as $industry): ?>
        <div class="technologyCard">
            <div class="technologyImage">
                <img 
  class="lazyload img-responsive" 
  data-src="<?php echo base_url('admin/uploads/industries/' . $industry['image']); ?>" 
  alt="<?php echo htmlspecialchars($industry['image']); ?>"
/>

            </div>
            <div class="technologyDetailContainer">
                <h2 class="pq_h2"><?php echo $industry['title']; ?></h2>
                <p class="pq_p"><?php echo $industry['description']; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>


<div class="courseBuy">
	<a href="<?php echo base_url(); ?>contact-us"><button><i class="fa fa-rocket"></i> Contact Us
		</button></a>
</div>