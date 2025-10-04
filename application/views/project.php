<!-- GLightbox CSS & JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

<style>
    .main-heading {
        font-size: 32px;
        font-weight: bold;
        margin-bottom: 30px;
    }

    .main-heading .teal {
        color: #269595;
        /* primary teal color */
    }

    .sub-heading {
        font-size: 20px;
        font-weight: bold;
        margin-top: 20px;
        color: #269595;
    }

    .description {
        font-size: 15px;
        line-height: 1.7;
        margin-top: 10px;
        color: #000;
    }

    .description a {
        color: #269595;
        text-decoration: none;
    }

    .description a:hover {
        text-decoration: underline;
    }

    .highlight-box {
        background: #f0f8f8;
        border-radius: 8px;
        padding: 20px;
        margin-top: 20px;
        border: 1px solid #cce0df;
    }

    .highlight-box h4 {
        font-weight: bold;
        color: #269595;
        margin-bottom: 10px;
    }

    .highlight-box p {
        color: #000;
        font-size: 14px;
    }

    .btn-custom {
        background-color: #269595;
        color: #fff;
        border-radius: 4px;
        padding: 10px 20px;
        margin-top: 10px;
        display: inline-block;
        text-decoration: none;
    }

    .btn-custom:hover {
        background-color: #1f7a7a;
        color: #fff;
    }

    .project-banner {

        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }

    .project-banner img {
        max-width: 100%;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .project-show {
        background-image: url("<?php echo base_url('assets/img/project/project-bg1.webp'); ?>");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
        overflow: hidden;
        /* background-attachment: fixed; */
    }



    .project-show::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        animation: gradientShift 15s ease infinite;
    }

    @keyframes gradientShift {

        0%,
        100% {
            transform: translate(0, 0);
        }

        50% {
            transform: translate(10%, 10%);
        }
    }

    /* Floating shapes background */
    .floating-shapes {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 0;
    }

    .shape {
        position: absolute;
        opacity: 0.1;
        animation: float 20s infinite ease-in-out;
    }

    .shape:nth-child(1) {
        top: 10%;
        left: 10%;
        animation-delay: 0s;
    }

    .shape:nth-child(2) {
        top: 60%;
        left: 70%;
        animation-delay: 5s;
    }

    .shape:nth-child(3) {
        top: 80%;
        left: 20%;
        animation-delay: 10s;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
        }

        50% {
            transform: translateY(-30px) rotate(180deg);
        }
    }

    /* Modern Badge for Category */
    .project-category {
        display: inline-block;
        background: grey;
        color: white;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        padding: 8px 20px;
        border-radius: 50px;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }



    /* Center Nav Tabs */
    .nav-tabs {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        background: transparent;
        padding: 2rem 0;
        border: none;

    }

    .nav-tabs li {
        float: none;
        display: inline-block;
    }

    .nav-tabs li a {
        background: black;
        color: white;
        border-radius: 50px;
        padding: 12px 28px;
        margin: 5px;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        font-weight: 600;
        position: relative;
        overflow: hidden;
    }


    .nav-tabs li a:hover {
        background: #269595;
        color: white !important;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
    }

    .nav-tabs li.active a {
        background: #269595;
        color: white !important;
        border-color: #fff;
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.5);
    }

    /* Project Cards with Modern Design */
    .project-full-width {
        display: flex;
        align-items: center;
        margin-bottom: 80px;
        border-bottom: none;
        position: relative;
        background: linear-gradient(to right, rgba(102, 126, 234, 0.02) 0%, transparent 100%);
        border-radius: 20px;
    }

    .project-full-width.reverse {
        flex-direction: row-reverse;
        background: linear-gradient(to left, rgba(118, 75, 162, 0.02) 0%, transparent 100%);
    }

    .project-content {
        padding-right: 60px;
        animation: fadeInLeft 0.8s ease;
    }

    .project-full-width.reverse .project-content {
        padding-right: 0;
        padding-left: 60px;
        animation: fadeInRight 0.8s ease;
    }

    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-50px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(50px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .project-title {
        font-size: 36px;
        font-weight: 900;
        margin-bottom: 25px;
        color: #269595;
    }



    /* Enhanced Carousel */
    /* .project-carousel {
        animation: fadeInRight 0.8s ease;
        background-color: red;
        height: 50vh;
    }

    .project-carousel img {
        width: auto;
        height: 100%;
    }

    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .project-full-width.reverse .project-carousel {
        animation: fadeInLeft 0.8s ease;
    }

    .project-carousel .swiper {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease;
    }

    .project-carousel .swiper:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 70px rgba(0, 0, 0, 0.2);
    } */

    /* Default slide style */
    .splide__slide img {
        height: 260px;
        width: auto;
        object-fit: cover;
        border-radius: 10px;
        display: block;
        margin: 0 auto;
    }


    /* Arrows: black arrow on white circle */
    .splide__arrow {
        background: white;
        color: black;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }

    .splide__arrow svg {
        fill: black;
        width: 18px;
        height: 18px;
    }

    /* Pagination dots */
    .splide__pagination__page {
        background: #000;
        opacity: 0.5;
    }

    .splide__pagination__page.is-active {
        opacity: 1;
    }


    /* Icon Animations */
    .icon-float {
        display: inline-block;
        animation: iconFloat 3s ease-in-out infinite;
    }

    .glightbox-close {
        font-size: 28px;
        color: #fff;
        background: rgba(0, 0, 0, 0.5);
        border-radius: 50%;
        width: 40px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        top: 15px !important;
        right: 15px !important;
    }

    @keyframes iconFloat {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    /* Responsive Design */
    @media (max-width: 991px) {

        .project-full-width,
        .project-full-width.reverse {
            flex-direction: column;
            padding: 40px 20px;
        }

        .project-content,
        .project-full-width.reverse .project-content {
            padding: 0 20px;
            margin-bottom: 30px;
            text-align: center;
        }

        .project-category {
            margin: 0 auto 20px;
        }

        .project-title {
            font-size: 28px;
        }

        .project-carousel {
            width: 100%;
            padding: 0 20px;
        }

        .nav-tabs li a {
            padding: 10px 20px;
            font-size: 14px;
            margin: 3px;
        }
    }

    @media (max-width: 767px) {
        .main-heading {
            font-size: 24px;
        }

        .project-title {
            font-size: 24px;
        }

        .project-banner {
            height: unset;
        }

        .project-description {
            font-size: 14px;
        }

        .swiper-button-next,
        .swiper-button-prev {
            width: 40px;
            height: 40px;
        }

        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 16px;
        }

        .nav-tabs {
            padding: 1rem 0;
        }

        .nav-tabs li a {
            padding: 8px 16px;
            font-size: 12px;
        }

        .project-full-width {
            margin-bottom: 40px;
            padding: 30px 10px;
        }
    }

    @media (max-width: 480px) {
        .project-banner {
            height: unset;
        }

        .project-category {
            font-size: 10px;
            padding: 6px 15px;
            letter-spacing: 1px;
        }

        .project-title {
            font-size: 20px;
        }

        .project-carousel img {
            height: 250px;
        }
    }
</style>



<div class="container">
    <div class="row align-items-center">
        <!-- Left Column -->
        <div class="col-sm-6">
            <h2 class="main-heading">
                Innovative <span class="teal">Projects</span> that Solve Problems and Drive Results
            </h2>

            <h3 class="sub-heading">Our Project Approach</h3>
            <p class="description">
                At Positive Quadrant Technologies, we create solutions that deliver measurable results.
                Our projects combine innovative technology, user-centric design, and strategic planning
                to help businesses succeed in the digital world.
            </p>

            <div class="highlight-box">
                <div class="row">

                    <!-- Left content -->
                    <div class="col-xs-8">
                        <h4>Explore Our Work!</h4>
                        <p>
                            Discover how our projects have transformed businesses, improved processes, and enhanced
                            user
                            experience.
                            Schedule a free consultation to see how we can help your business grow.
                        </p>
                        <a href="<?php echo base_url(); ?>contact-us" class="btn-custom">Schedule Free Call →</a>
                    </div>

                    <!-- Right image -->
                    <div class="col-xs-4 text-center">
                        <img src="<?php echo base_url() . 'assets/img/project/project-arrow.webp' ?>"
                            alt="Project Arrow" class="img-responsive" style="max-height:120px;">
                    </div>

                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-sm-6 project-banner">
            <img src="<?php echo base_url() . 'assets/img/project/project-banner2.webp' ?>" alt="Project Mockup">
        </div>
    </div>
</div>



<section>

    <div class="project-show">
        <!-- Floating SVG Shapes -->
        <div class="floating-shapes">
            <svg class="shape" width="200" height="200" viewBox="0 0 200 200">
                <circle cx="100" cy="100" r="80" fill="#667eea" />
            </svg>
            <svg class="shape" width="150" height="150" viewBox="0 0 150 150">
                <polygon points="75,0 150,130 0,130" fill="#764ba2" />
            </svg>
            <svg class="shape" width="180" height="180" viewBox="0 0 180 180">
                <rect x="20" y="20" width="140" height="140" rx="20" fill="#667eea" />
            </svg>
        </div>

        <div class="container text-center bg-light" style="padding: 50px 0; position: relative; z-index: 1;">
            <h5 style="color: #667eea; font-weight: bold; letter-spacing: 2px; margin-bottom: 15px;"
                data-aos="fade-down">
                <span class="icon-float">✨</span> OUR WORK <span class="icon-float">✨</span>
            </h5>
            <h1 style="font-weight: 900; line-height: 1.2;" data-aos="fade-up" data-aos-delay="200">
                Showcasing Our <span style="color: #269595;">Remarkable</span>
                Client Projects
            </h1>
        </div>
    </div>

    <div class="container">
        <!-- Tabs -->
        <ul class="nav nav-tabs" data-aos="fade-up">
            <li class="active"><a data-toggle="tab" href="#all">All</a></li>
            <?php foreach ($industries as $industry): ?>
                <li><a data-toggle="tab" href="#industry<?= $industry->id; ?>"><?= $industry->name; ?></a></li>
            <?php endforeach; ?>
        </ul>

        <div class="tab-content" style="margin-top:40px;">

            <!-- All Projects -->
            <div id="all" class="tab-pane fade in active">
                <?php if (!empty($projects)): ?>
                    <?php foreach ($projects as $index => $proj): ?>
                        <div class="project-full-width <?= ($index % 2 != 0) ? 'reverse' : ''; ?>" data-aos="fade-up">
                            <div class="col-sm-6 project-content">
                                <div class="project-category">
                                    <?= !empty($proj->industry_name) ? $proj->industry_name : 'General'; ?>
                                </div>
                                <h2 class="project-title"><?= $proj->name; ?></h2>
                                <p class="pq_p"><?= $proj->description; ?></p>
                            </div>
                            <div class="col-sm-6 project-carousel">
                                <?php if (!empty($proj->images)): ?>
                                    <div class="splide" id="project-slider-<?= $proj->id; ?>">
                                        <div class="splide__track">
                                            <ul class="splide__list">
                                                <?php foreach ($proj->images as $img): ?>
                                                    <li class="splide__slide">
                                                        <a href="<?= base_url('/admin/uploads/projects/' . $img->image_path); ?>"
                                                            class="glightbox" data-gallery="proj<?= $proj->id; ?>">
                                                            <img src="<?= base_url('/admin/uploads/projects/' . $img->image_path); ?>"
                                                                alt="<?= $proj->name; ?>">
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="alert alert-info" style="margin:20px; text-align:center;">
                                        This project currently has no images. Stay tuned for updates! 🚀
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="alert alert-info" style="margin:20px; text-align:center;">
                        No projects are available at the moment. Please check back soon! 🌟
                    </div>
                <?php endif; ?>
            </div>

            <!-- Projects by Industry -->
            <?php foreach ($industries as $industry): ?>
                <div id="industry<?= $industry->id; ?>" class="tab-pane fade">
                    <?php if (!empty($industry_projects[$industry->id])): ?>
                        <?php foreach ($industry_projects[$industry->id] as $index => $proj): ?>
                            <div class="project-full-width <?= ($index % 2 != 0) ? 'reverse' : ''; ?>" data-aos="fade-up">
                                <div class="col-sm-6 project-content">
                                    <div class="project-category">
                                        <?= !empty($proj->industry_name) ? $proj->industry_name : $industry->name; ?>
                                    </div>
                                    <h2 class="project-title"><?= $proj->name; ?></h2>
                                    <p class="pq_p"><?= $proj->description; ?></p>
                                </div>
                                <div class="col-sm-6 project-carousel">
                                    <?php if (!empty($proj->images)): ?>
                                        <div class="splide" id="project-slider-<?= $proj->id; ?>">
                                            <div class="splide__track">
                                                <ul class="splide__list">
                                                    <?php foreach ($proj->images as $img): ?>
                                                        <li class="splide__slide">
                                                            <a href="<?= base_url('/admin/uploads/projects/' . $img->image_path); ?>"
                                                                class="glightbox" data-gallery="proj<?= $proj->id; ?>">
                                                                <img src="<?= base_url('/admin/uploads/projects/' . $img->image_path); ?>"
                                                                    alt="<?= $proj->name; ?>">
                                                            </a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="alert alert-info" style="margin:20px; text-align:center;">
                                            This project currently has no images. Stay tuned for updates! 🚀
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="alert alert-info" style="margin:20px; text-align:center;">
                            No projects available for <?= $industry->name; ?> at the moment. 🌟
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>

        </div>
    </div>

</section>



<!-- JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/css/splide.min.css">
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/js/splide.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Init sliders that are already visible (All tab)
        document.querySelectorAll('#all .splide').forEach(function (el) {
            new Splide(el, {
                type: 'loop',
                perPage: 1,
                gap: '1rem',
                autoplay: true,
                interval: 3500,
                pauseOnHover: true,
                arrows: true,
                pagination: true,
                padding: 0
            }).mount();
        });

        // Init GLightbox
        const lightbox = GLightbox({
            selector: '.glightbox',
            touchNavigation: true,
            loop: true,
            closeButton: 'top',
            autoplayVideos: true,
        });

        // When an Industry tab is shown, init Splide inside it
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var target = $(e.target).attr("href"); // e.g., #industry1
            $(target).find('.splide').each(function () {
                if (!$(this).hasClass('is-initialized')) {
                    new Splide(this, {
                        type: 'loop',
                        perPage: 1,
                        gap: '1rem',
                        autoplay: true,
                        interval: 3500,
                        pauseOnHover: true,
                        arrows: true,
                        pagination: true,
                        padding: 0
                    }).mount();
                    $(this).addClass('is-initialized'); // avoid double init
                }
            });
        });
    });


</script>