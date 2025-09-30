<script async src="https://www.googletagmanager.com/gtag/js?id=G-68JGDKE8D1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'G-68JGDKE8D1');
</script>
<style>
    * {
        box-sizing: border-box;
    }

    .animateds {
        -webkit-animation-duration: 2s;
        animation-duration: 2s;
    }

    #home {
        color: #1a9c9b;
    }

    #home.hvr-underline-from-center:before {
        left: 0;
        right: 0;
    }

    /* Add this CSS for the scaling effect */
    .slick-center .work_slider_1 img {
        margin-top: 25px;
        transform: scale(1.2);

        transition: transform 0.5s ease;



    }

    .slick-center .work_slider_1 p {
        margin-top: 40px;
        transform: scale(1.2);
        font-weight: 500;
        text-align: justify;
        padding: 10px;
        transition: transform 0.5s ease;

    }

    .work_slider_1 img {
        transition: transform 0.5s ease;

        object-fit: cover;
        border-radius: 10px;

    }


    .work_slider_1 {
        height: 70vh;

        padding-left: 30px;
        padding-right: 30px;
        /* Small space between images */
    }


    .services-section {
        padding: 0 5rem;
        text-align: center;
    }

    .service-box {
        height: 40%;

        /* background-color: rebeccapurple; */
        box-shadow: 0 8px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        padding: 20px;
        border-bottom: solid 3px coral;
        transition: all 0.3s ease;
    }

    .service-box:hover {
        border-color: teal;

        /* box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15); */
    }

    .service-box:hover .service-icon span {
        color: black;
    }

    .service-icon {

        padding: 20px;

        margin-bottom: 20px;
        height: 130px;
        display: flex;
        align-items: center;
        justify-content: center;


    }

    .service-icon span {
        color: gray;
        font-size: 5rem;
        transition: all 0.3s ease;
    }

    .service-icon img {
        max-height: 80px;
    }

    .service-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .service-desc {
        font-size: 14px;
        color: #666;
    }

    .section-title {
        font-size: 3em;
        font-weight: 600;
        margin-bottom: 30px;
        border-bottom: 2px solid gray;
        display: inline-block;
        padding-bottom: 10px;
        color: #2bb0ae;
    }

    /* Main heading for card's front cover */
    .card-front__heading {
        font-size: 1.5rem;
        margin-top: .25rem;
        color: white;
    }

    /* Main heading for inside page */
    .inside-page__heading {
        padding-bottom: 1rem;
        width: 100%;
    }

    /* Mixed */

    /* For both inside page's main heading and 'view me' text on card front cover */
    .inside-page__heading,
    .card-front__text-view {
        font-size: 1.3rem;
        font-weight: 800;
        margin-top: .2rem;
    }

    .inside-page__heading--city,
    .card-front__text-view--city {
        color: #ff62b2;
    }

    .inside-page__heading--ski,
    .card-front__text-view--ski {
        color: #2aaac1;
    }

    .inside-page__heading--beach,
    .card-front__text-view--beach {
        color: #fa7f67;
    }

    .inside-page__heading--camping,
    .card-front__text-view--camping {
        color: #00b97c;
    }

    /* Front cover */

    .card-front__tp {
        color: #fafbfa;
    }

    /* For pricing text on card front cover */
    .card-front__text-price {
        font-size: 1.2rem;
        margin-top: -.2rem;
    }

    /* Back cover */

    /* For inside page's body text */
    .inside-page__text {
        color: #333;
    }

    /* Icons ===========================================*/

    .card-front__icon {
        fill: #fafbfa;
        font-size: 3vw;
        height: 3.25rem;
        margin-top: -.5rem;
        width: 3.25rem;
    }

    /* Buttons =================================================*/

    .inside-page__btn {
        background-color: transparent;
        border: 3px solid;
        border-radius: .5rem;
        font-size: 1.2rem;
        font-weight: 600;
        margin-top: 2rem;
        overflow: hidden;
        padding: .7rem .75rem;
        position: relative;
        text-decoration: none;
        transition: all .3s ease;
        width: 90%;
        z-index: 10;
    }

    .inside-page__btn::before {
        content: "";
        height: 100%;
        left: 0;
        position: absolute;
        top: 0;
        transform: scaleY(0);
        transition: all .3s ease;
        width: 100%;
        z-index: -1;
    }

    .inside-page__btn--city {
        border-color: #ff40a1;
        color: #ff40a1;
    }

    .inside-page__btn--city::before {
        background-color: #ff40a1;
    }

    .inside-page__btn--ski {
        border-color: #279eb2;
        color: #279eb2;
    }

    .inside-page__btn--ski::before {
        background-color: #279eb2;
    }

    .inside-page__btn--beach {
        border-color: #fa7f67;
        color: #fa7f67;
    }

    .inside-page__btn--beach::before {
        background-color: #fa7f67;
    }

    .inside-page__btn--camping {
        border-color: #00b97d;
        color: #00b97d;
    }

    .inside-page__btn--camping::before {
        background-color: #00b97d;
    }

    .inside-page__btn:hover {
        color: #fafbfa;
    }

    .inside-page__btn:hover::before {
        transform: scaleY(1);
    }

    /* Layout Structure=========================================*/

    .main {

        display: flex;
        flex-direction: column;
        justify-content: center;
        height: auto;
        width: 100%;
        overflow: hidden;
    }

    /* Container to hold all cards in one place */
    .card-area {
        align-items: center;
        display: flex;
        flex-wrap: nowrap;
        height: 100%;
        justify-content: space-evenly;
        padding: 1rem;
    }

    /* Card ============================================*/

    /* Area to hold an individual card */
    .card-section {
        align-items: center;
        display: flex;
        height: 100%;
        justify-content: center;
        width: 100%;
    }

    /* A container to hold the flip card and the inside page */
    .card {
        background-color: rgba(0, 0, 0, .05);
        box-shadow: -.1rem 1.7rem 6.6rem -3.2rem rgba(0, 0, 0, 0.5);
        height: 15rem;
        position: relative;
        transition: all 1s ease;
        width: 15rem;
    }

    /* Flip card - covering both the front and inside front page */

    /* An outer container to hold the flip card. This excludes the inside page */
    .flip-card {
        height: 15rem;
        perspective: 100rem;
        position: absolute;
        right: 0;
        transition: all 1s ease;
        visibility: hidden;
        width: 15rem;
        z-index: 100;
    }

    /* The outer container's visibility is set to hidden. This is to make everything within the container NOT set to hidden  */
    /* This is done so content in the inside page can be selected */
    .flip-card>* {
        visibility: visible;
    }

    /* An inner container to hold the flip card. This excludes the inside page */
    .flip-card__container {
        height: 100%;
        position: absolute;
        right: 0;
        transform-origin: left;
        transform-style: preserve-3d;
        transition: all 1s ease;
        width: 100%;
    }

    .card-front,
    .card-back {
        backface-visibility: hidden;
        height: 100%;
        left: 0;
        position: absolute;
        top: 0;
        width: 100%;
    }

    .card-back img {
        width: 100%;
        height: 100%;
        aspect-ratio: 3/2;
    }

    /* Styling for the front side of the flip card */

    /* container for the front side */
    .card-front {
        background-color: #fafbfa;
        height: 15rem;
        width: 15rem;
    }

    /* Front side's top section */
    .card-front__tp {
        align-items: center;
        clip-path: polygon(0 0, 100% 0, 100% 90%, 57% 90%, 50% 100%, 43% 90%, 0 90%);
        display: flex;
        flex-direction: column;
        height: 12rem;
        justify-content: center;
        padding: .75rem;
    }

    .card-front__tp--city {
        background: linear-gradient(to bottom,
                #ff73b9,
                #ff40a1);
    }

    .card-front__tp--ski {
        background: linear-gradient(to bottom,
                #47c2d7,
                #279eb2);
    }

    .card-front__tp--beach {
        background: linear-gradient(to bottom,
                #fb9b88,
                #f86647);
    }

    .card-front__tp--camping {
        background: linear-gradient(to bottom,
                #00db93,
                #00b97d);
    }

    /* Front card's bottom section */
    .card-front__bt {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    /* Styling for the back side of the flip card */

    .card-back {
        background-color: #fafbfa;
        transform: rotateY(180deg);
    }

    /* Specifically targeting the <video> element */
    .video__container {
        clip-path: polygon(0% 0%, 100% 0%, 90% 50%, 100% 100%, 0% 100%);
        height: auto;
        min-height: 100%;
        object-fit: cover;
        width: 100%;
    }

    /* Inside page */

    .inside-page {
        background-color: #fafbfa;
        box-shadow: inset 20rem 0px 5rem -2.5rem rgba(0, 0, 0, 0.25);
        height: 100%;
        padding: 1rem;
        position: absolute;
        right: 0;
        transition: all 1s ease;
        width: 15rem;
        z-index: 1;
    }

    .inside-page__container {
        align-items: center;
        display: flex;
        flex-direction: column;
        height: 100%;
        text-align: center;
        width: 100%;
    }

    /* Functionality ====================================*/

    /* This is to keep the card centered (within its container) when opened */
    .card:hover {
        box-shadow:
            -.1rem 1.7rem 6.6rem -3.2rem rgba(0, 0, 0, 0.75);
        width: 30rem;
    }

    /* When the card is hovered, the flip card container will rotate */
    .card:hover .flip-card__container {
        transform: rotateY(-180deg);
    }

    /* When the card is hovered, the shadow on the inside page will shrink to the left */
    .card:hover .inside-page {
        box-shadow: inset 1rem 0px 5rem -2.5rem rgba(0, 0, 0, 0.1);
    }

    /* Footer ====================================*/
</style>

<div class="video_banner">
    <div class="video-container">
        <video class="video-background" autoplay loop muted
            poster="<?php echo base_url() ?>assets/img/video-poster.webp">
            <source src="<?php echo base_url() ?>assets/video/home-video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <div class="text-overlay">
            <h2 class="fill-animate" data-text="Transforming the Future with Technology">
                Transforming the Future with Technology
            </h2>
            <div class="description">
                At Positive Quadrant Technologies, we strive to empower businesses and individuals by leveraging
                cutting-edge technologies to enhance operations, foster innovation, and drive digital transformation.
            </div>
            <!-- Home descriptions will be rendered here by JavaScript -->
            <div class="home-desc-container"></div>
        </div>
    </div>
</div>



<!-- new about us starts here -->


<section class="about-section">
    <div class="container">
        <div class="row">
            <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
                <div class="inner-column">
                    <div class="sec-title">
                        <span class="title">About Company</span>
                        <h2>Transforming Businesses Through <br>Comprehensive IT Solutions</h2>

                    </div>
                    <div class="text pq_p">At Positive Quadrant Technologies, we are an IT company dedicated to
                        delivering cutting-edge
                        solutions across a spectrum of industries. From real estate to pharmaceuticals, banking and
                        finance
                        to e-commerce, industrial solutions, public sectors, and government, we bring and develop
                        the best
                        software and digital services tailored to our clients' needs. Our expertise spans various
                        technologies,
                        including mobile app development, digital media such as
                        augmented reality, virtual reality, and gaming, digital payments and e-wallets, e-commerce
                        platforms, and other interactive mediums. Additionally, we provide training programs to
                        corporate
                        entities, top colleges, and beyond, ensuring a skilled workforce for the digital age.What
                        sets us apart
                        is
                        our unwavering commitment to quality and customer satisfaction. We take a
                        hands-on approach with our clients and partners, ensuring that every project yields
                        exemplary
                        results.As we strive to stay at the forefront of innovation, we continue to offer services
                        with fresh
                        and
                        innovative ideas to companies worldwide. Our hallmark lies in delivering custom solutions
                        for
                        digital storage, ensuring that our clients' data is secure and easily accessible. At
                        Positive
                        Quadrant Technologies, we're not just a service provider; we're your partner in navigating
                        the
                        ever-evolving landscape of technology.</div>
                    <ul class="list-style-one">
                        <li>Expert software consulting and support</li>
                        <li>Customized solutions for every industry</li>
                        <li>Commitment to innovation and quality</li>
                    </ul>
                    <div class="btn-box">
                        <a href="<?php echo base_url(); ?>contact-us" class="theme-btn btn-style-one">Contact Us</a>
                    </div>
                </div>
            </div>

            <!-- Image Column -->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInLeft">
                    <figure class="image-1">
                        <a href="<?= base_url() ?>/assets/img/aboutus1.webp" class="lightbox-image"
                            data-fancybox="images">
                            <img data-src="<?= base_url() ?>/assets/img/aboutus1.webp" class="lazyload"
                                alt="about us Image">
                        </a>
                    </figure>
                    <figure class="image-2">
                        <a href="<?= base_url() ?>/assets/img/aboutus2.webp" class="lightbox-image"
                            data-fancybox="images">
                            <img data-src="<?= base_url() ?>/assets/img/aboutus2.webp" class="lazyload"
                                alt="about us Image">
                        </a>
                    </figure>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- our mission vision and goal starts here  -->


<div class="container aboutUsMiddleContainer section-mt-mb">
    <h2 class="pq_h1 text-center">Empowering Your Success</h2>
    <span class="pq_span pq_center">Our Mission, Vision and Goal</span>
    <p class="pq_p">With a user-centric approach, we're dedicated to delivering solutions that amplify your
        business
        value,
        driving growth and excellence every step of the way. Your success is our ultimate achievement.</p>


    <!-- Mission Card -->
    <div class="aboutUsCardContainer">
        <div class="aboutUsCard wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
            <div class="our_mission_vision_goal_card">
                <div class="our_mission_vision_goal_card_image">
                    <img data-src="<?= base_url() ?>/assets/img/our_mission_card.webp" class="lazyload"
                        alt="Mission Image">

                    <div class="our_mission_vision_goal_overlay"></div>
                    <div class="our_mission_vision_goal_text">
                        <h3><span class="glyphicon glyphicon-send"></span> Mission</h3>
                        Our mission is to empower businesses through innovative IT consultancy,
                        and hands-on training solutions. We help clients transform their technological
                        landscape with scalable,
                        cost-effective strategies. Our commitment lies in simplifying digital challenges and
                        enabling smarter operations
                        so that every business we serve becomes more agile, productive, and future-ready.
                    </div>
                </div>
            </div>
        </div>

        <!-- Vision Card -->
        <div class="aboutUsCard wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
            <div class="our_mission_vision_goal_card">
                <div class="our_mission_vision_goal_card_image">
                    <img data-src="<?= base_url() ?>/assets/img/our_vision_card.webp" class="lazyload"
                        alt="Vision Image">

                    <div class="our_mission_vision_goal_overlay"></div>
                    <div class="our_mission_vision_goal_text">
                        <h3><span class="glyphicon glyphicon-eye-open"></span> Vision</h3>
                        Our vision is to be a globally recognized IT partner driving sustainable digital
                        transformation.
                        We aspire to redefine how technology empowers organizations, building a world where
                        businesses leverage tech
                        not just to survive but to lead. Through continuous innovation and deep client
                        partnerships, we aim to shape
                        a smarter, more connected future.
                    </div>
                </div>
            </div>
        </div>

        <!-- Goal Card -->
        <div class="aboutUsCard wow animate__animated animate__fadeInUp" data-wow-delay="0.6s">
            <div class="our_mission_vision_goal_card">
                <div class="our_mission_vision_goal_card_image">
                    <img data-src="<?= base_url() ?>/assets/img/our_goal_card.webp" class="lazyload" alt="Goal Image">

                    <div class="our_mission_vision_goal_overlay"></div>
                    <div class="our_mission_vision_goal_text">
                        <h3><span class="glyphicon glyphicon-flag"></span> Goal</h3>
                        Our goal is to deliver impactful IT solutions that generate real business value. We
                        focus on helping clients
                        improve operations, enhance digital presence, and develop skilled talent. Through
                        measurable outcomes,
                        trusted advisory, and continuous support, we aim to become a catalyst for every
                        client’s long-term growth
                        and digital success.
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>



<!-- our mission vision and goal ends here  -->








<div class="abouUsContainer">


    <div class=" container  ">
        <div class="aboutUsBottomContainer">
            <h2 class="pq_h1">Our <span class="pq_span">Core Strength</span></h2>
            <p class="pq_p">At Positive Quadrant Technologies, we take great pride in our core strength, which fuel our
                dedication to
                quality work and client satisfaction.Our creative approach is driven by ongoing research and
                development,
                guaranteeing that we provide the best solutions customized to your particular requirements.</p>
            <a href="<?php echo base_url(); ?>contact-us">Get in touch today to explore the possibilities. Your success,
                our
                commitment <span>&rarr;</span></a>
            <br />
        </div>

    </div>

</div>







<div class="aboutus-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <div class="aboutus">
                    <h1 class="pq_h1 pq_left pq_center_mobile">Organizational Vision</h1>
                    <p class="pq_p">At Positive Quadrant Technologies, our vision is to be a global leader in
                        delivering transformative digital solutions that empower industries and enrich lives. We
                        envision a future where technology seamlessly enhances every aspect of business and society, and
                        where our innovations drive sustainable growth, security, and digital excellence across the
                        globe.</p>
                    <p class="pq_p">We aspire to continuously push the boundaries of technology—through
                        immersive digital experiences, secure data solutions, and future-ready platforms—while nurturing
                        a culture of learning, collaboration, and quality. Our goal is not just to meet client
                        expectations but to exceed them, shaping a smarter, more connected world.</p>

                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="aboutus-banner">
                    <!--<img -->
                    <!--  data-src="http://themeinnovation.com/demo2/html/build-up/img/home1/about1.webp" -->
                    <!--  class="lazyload" -->
                    <!--  alt="About Us Image">-->

                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="feature">
                    <div class="feature-box">
                        <div class="clearfix">
                            <div class="iconset">
                                <span class="glyphicon glyphicon-cog icon"></span>
                            </div>
                            <div class="feature-content">
                                <h4>Work with Heart</h4>
                                <p>We bring passion and dedication to every project, ensuring that our solutions reflect
                                    not only technical excellence but also a deep understanding of our clients’ goals.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="feature-box">
                        <div class="clearfix">
                            <div class="iconset">
                                <span class="glyphicon glyphicon-cog icon"></span>
                            </div>
                            <div class="feature-content">
                                <h4>Reliable Services</h4>
                                <p>Our clients trust us for dependable, consistent service delivery backed by strong
                                    technical expertise and a commitment to excellence in every phase of development.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="feature-box">
                        <div class="clearfix">
                            <div class="iconset">
                                <span class="glyphicon glyphicon-cog icon"></span>
                            </div>
                            <div class="feature-content">
                                <h4>Great Support</h4>
                                <p>We provide proactive and responsive support to ensure that your digital platforms and
                                    software solutions run smoothly at all times.</p>
                            </div>
                        </div>
                    </div>
                    <div class="feature-box">
                        <div class="clearfix">
                            <div class="iconset">
                                <span class="glyphicon glyphicon-cog icon"></span>
                            </div>
                            <div class="feature-content">
                                <h4>Innovative Solutions</h4>
                                <p>We stay ahead of the curve by delivering forward-thinking solutions, from immersive
                                    technologies like AR/VR to secure digital payments and custom enterprise platforms.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- new about us ends here -->

<div class="container text-center industriesWeServe section-mt-mb">
    <h2 class="pq_h1" style="margin-bottom: 30px;">
        INDUSTRIES SERVED
        <div style="width: 200px; margin: 10px auto; border-bottom: 2px solid teal;"></div>
    </h2>
    <div class="industryServedParent">
        <?php
        $industries = [
            ['img' => 'bfsi.webp', 'alt' => 'BFSI'],
            ['img' => 'e_commerce.webp', 'alt' => 'E-Commerce'],
            ['img' => 'education.webp', 'alt' => 'Education'],
            ['img' => 'finance.webp', 'alt' => 'Finance'],
            ['img' => 'fmcg.webp', 'alt' => 'FMCG'],
            ['img' => 'gems.webp', 'alt' => 'Gems & Jewellery'],
            ['img' => 'healthcare.webp', 'alt' => 'Healthcare'],
            ['img' => 'hr.webp', 'alt' => 'Human Resources'],
            ['img' => 'infrastructure.webp', 'alt' => 'Infrastructure'],
            ['img' => 'it.webp', 'alt' => 'Information Technology'],
            ['img' => 'logistics.webp', 'alt' => 'Logistics'],
            ['img' => 'manufacturig.webp', 'alt' => 'Manufacturing'],
            ['img' => 'media.webp', 'alt' => 'Media'],
            ['img' => 'oil_gas.webp', 'alt' => 'Oil & Gas'],
            ['img' => 'pharma.webp', 'alt' => 'Pharmaceuticals'],
            ['img' => 'real_estate.webp', 'alt' => 'Real Estate'],
            ['img' => 'renewable_energy.webp', 'alt' => 'Renewable Energy'],
            ['img' => 'retail.webp', 'alt' => 'Retail'],
            ['img' => 'shipping.webp', 'alt' => 'Shipping'],
            ['img' => 'textile.webp', 'alt' => 'Textile'],
            ['img' => 'tourism.webp', 'alt' => 'Tourism'],
        ];

        foreach ($industries as $industry): ?>
            <div class="industryItem">
                <img data-src="<?= base_url() ?>/assets/img/<?= $industry['img'] ?>" class="lazyload"
                    alt="<?= $industry['alt'] ?>">
                <div class="overlay"><?= $industry['alt'] ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<section class="section-services">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="header-section">
                    <h2 class="title pq_h1">Exclusive <span>Services We Provide</span></h2>
                    <p class="description">We offer a wide range of tailored IT solutions designed to streamline
                        operations, enhance efficiency, and drive digital transformation across industries.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Web Development -->
            <div class="col-sm-6 col-lg-4">
                <div class="single-service">
                    <div class="part-1">
                        <i class="fa fa-code"></i>
                        <h3 class="title">Web Development</h3>
                    </div>
                    <div class="part-2">
                        <p class="description">We build fast, responsive, and scalable websites using the latest web
                            technologies tailored to your business goals.</p>
                        <a href="<?php echo base_url() ?>web-development"><i class="fa fa-arrow-circle-right"></i> Read
                            More</a>
                    </div>
                </div>
            </div>

            <!-- SEO -->
            <div class="col-sm-6 col-lg-4">
                <div class="single-service">
                    <div class="part-1">
                        <i class="fa fa-search"></i>
                        <h3 class="title">SEO</h3>
                    </div>
                    <div class="part-2">
                        <p class="description">Boost your online visibility and drive organic traffic with our
                            data-driven SEO strategies and analytics tools.</p>
                        <a href="<?php echo base_url() ?>seo"><i class="fa fa-arrow-circle-right"></i> Read More</a>
                    </div>
                </div>
            </div>

            <!-- Mobile Development -->
            <div class="col-sm-6 col-lg-4">
                <div class="single-service">
                    <div class="part-1">
                        <i class="fa fa-mobile"></i>
                        <h3 class="title">Mobile Development</h3>
                    </div>
                    <div class="part-2">
                        <p class="description">We create high-performance mobile apps for iOS and Android, delivering
                            seamless experiences across all devices.</p>
                        <a href="<?php echo base_url() ?>mobile-development"><i class="fa fa-arrow-circle-right"></i>
                            Read More</a>
                    </div>
                </div>
            </div>

            <!-- Web Design -->
            <div class="col-sm-6 col-lg-4">
                <div class="single-service">
                    <div class="part-1">
                        <i class="fa fa-paint-brush"></i>
                        <h3 class="title">Web Design</h3>
                    </div>
                    <div class="part-2">
                        <p class="description">Our design team crafts visually stunning, user-centered interfaces that
                            align with your brand identity.</p>
                        <a href="<?php echo base_url() ?>web-design"><i class="fa fa-arrow-circle-right"></i> Read
                            More</a>
                    </div>
                </div>
            </div>

            <!-- Machine Learning -->
            <div class="col-sm-6 col-lg-4">
                <div class="single-service">
                    <div class="part-1">
                        <i class="fa fa-android"></i>
                        <h3 class="title">Machine Learning</h3>
                    </div>
                    <div class="part-2">
                        <p class="description">Leverage AI and machine learning to automate processes, gain insights,
                            and enhance business intelligence.</p>
                        <a href="<?php echo base_url() ?>machine-learning"><i class="fa fa-arrow-circle-right"></i> Read
                            More</a>
                    </div>
                </div>
            </div>

            <!-- E-commerce -->
            <div class="col-sm-6 col-lg-4">
                <div class="single-service">
                    <div class="part-1">
                        <i class="fa fa-shopping-cart"></i>
                        <h3 class="title">E-commerce</h3>
                    </div>
                    <div class="part-2">
                        <p class="description">We develop secure, scalable e-commerce platforms that optimize shopping
                            experiences and drive online sales.</p>
                        <a href="<?php echo base_url() ?>e-commerce"><i class="fa fa-arrow-circle-right"></i> Read
                            More</a>
                    </div>
                </div>
            </div>

            <!-- Managed Hosting -->
            <div class="col-sm-6 col-lg-4">
                <div class="single-service">
                    <div class="part-1">
                        <i class="fa fa-server"></i>
                        <h3 class="title">Managed Hosting</h3>
                    </div>
                    <div class="part-2">
                        <p class="description">Reliable, secure, and fully managed hosting services to keep your
                            applications running smoothly 24/7.</p>
                        <a href="<?php echo base_url() ?>managed-hosting"><i class="fa fa-arrow-circle-right"></i> Read
                            More</a>
                    </div>
                </div>
            </div>

            <!-- Website Maintenance -->
            <div class="col-sm-6 col-lg-4">
                <div class="single-service">
                    <div class="part-1">
                        <i class="fa fa-wrench"></i>
                        <h3 class="title">Website Maintenance</h3>
                    </div>
                    <div class="part-2">
                        <p class="description">We provide ongoing website updates, backups, and performance monitoring
                            to ensure optimal uptime and user experience.</p>
                        <a href="<?php echo base_url() ?>website-maintainance"><i class="fa fa-arrow-circle-right"></i>
                            Read More</a>
                    </div>
                </div>
            </div>

            <!-- Search Engine Maintenance -->
            <div class="col-sm-6 col-lg-4">
                <div class="single-service">
                    <div class="part-1">
                        <i class="fa fa-line-chart"></i>
                        <h3 class="title">Search Engine Maintenance</h3>
                    </div>
                    <div class="part-2">
                        <p class="description">Stay ahead in search rankings with regular SEO audits, content updates,
                            and performance tracking.</p>
                        <a href="<?php echo base_url() ?>search-engine-maintenance"><i
                                class="fa fa-arrow-circle-right"></i> Read More</a>
                    </div>
                </div>
            </div>

            <!-- Web Application -->
            <div class="col-sm-6 col-lg-4">
                <div class="single-service">
                    <div class="part-1">
                        <i class="fa fa-desktop"></i>
                        <h3 class="title">Web Application</h3>
                    </div>
                    <div class="part-2">
                        <p class="description">We design and develop robust web applications that are scalable, secure,
                            and tailored to your business workflows.</p>
                        <a href="<?php echo base_url() ?>web-application"><i class="fa fa-arrow-circle-right"></i> Read
                            More</a>
                    </div>
                </div>
            </div>

            <!-- IoT -->
            <div class="col-sm-6 col-lg-4">
                <div class="single-service">
                    <div class="part-1">
                        <i class="fa fa-sitemap"></i>
                        <h3 class="title">IoT Solutions</h3>
                    </div>
                    <div class="part-2">
                        <p class="description">Connect, monitor, and control smart devices with our secure and scalable
                            Internet of Things development services.</p>
                        <a href="<?php echo base_url() ?>iot"><i class="fa fa-arrow-circle-right"></i> Read More</a>
                    </div>
                </div>
            </div>

            <!-- Technology Consulting -->
            <div class="col-sm-6 col-lg-4">
                <div class="single-service">
                    <div class="part-1">
                        <i class="fa fa-lightbulb-o"></i>
                        <h3 class="title">Technology Consulting</h3>
                    </div>
                    <div class="part-2">
                        <p class="description">Strategic IT consulting to help you adopt the right technologies and
                            future-proof your digital infrastructure.</p>
                        <a href="<?php echo base_url() ?>it-development"><i class="fa fa-arrow-circle-right"></i> Read
                            More</a>
                    </div>
                </div>
            </div>

            <!-- Industry Solutions -->
            <div class="col-sm-6 col-lg-4">
                <div class="single-service">
                    <div class="part-1">
                        <i class="fa fa-industry"></i>
                        <h3 class="title">Industry Solutions</h3>
                    </div>
                    <div class="part-2">
                        <p class="description">Custom-tailored IT solutions for healthcare, finance, manufacturing,
                            government, and other key industries.</p>
                        <a href="<?php echo base_url() ?>it-consultancy"><i class="fa fa-arrow-circle-right"></i> Read
                            More</a>
                    </div>
                </div>
            </div>

            <!-- Software Products -->
            <div class="col-sm-6 col-lg-4">
                <div class="single-service">
                    <div class="part-1">
                        <i class="fa fa-cubes"></i>
                        <h3 class="title">Software Products</h3>
                    </div>
                    <div class="part-2">
                        <p class="description">We build reliable, scalable, and feature-rich software products that
                            solve real-world business challenges.</p>
                        <a href="<?php echo base_url() ?>software-products"><i class="fa fa-arrow-circle-right"></i>
                            Read More</a>
                    </div>
                </div>
            </div>

            <!-- Trainings -->
            <div class="col-sm-6 col-lg-4">
                <div class="single-service">
                    <div class="part-1">
                        <i class="fa fa-graduation-cap"></i>
                        <h3 class="title">Trainings</h3>
                    </div>
                    <div class="part-2">
                        <p class="description">Empower your team with hands-on training in modern technologies, tools,
                            and digital best practices.</p>
                        <a href="<?php echo base_url() ?>it-training-and-placement"><i
                                class="fa fa-arrow-circle-right"></i> Read More</a>
                    </div>
                </div>
            </div>
            <!-- End Single Services -->
        </div>
    </div>
</section>



<!--team section starts here -->


<?php if (!empty($team_members)): ?>
    <section class="team-section text-center">
        <div class="container">
            <h2 class="pq_h1">
                Meet Our Team
            </h2>
            <br />
            <div class="row">
                <div class="col-sm-6">
                    <p class="pq_p text-justify">
                        At <strong>Positive Quadrant</strong>, our team consists of highly skilled and passionate IT
                        professionals
                        committed to delivering cutting-edge technology solutions across various industries. Whether you're
                        a startup
                        or an established enterprise, our expert developers, designers, and consultants are here to empower
                        your digital transformation.
                        <br><br>
                        Based in <strong>Mumbai</strong>, we collaborate with clients from around the globe through seamless
                        remote engagement,
                        and we also offer on-site support, tech workshops, and consultations to drive innovation wherever
                        it's needed.
                        <br><br>
                        Our services span <strong>custom software development, web and mobile app development, UI/UX design,
                            cloud solutions,
                            and AI-driven automation</strong>. We focus on delivering scalable, secure, and future-ready
                        solutions tailored to meet your unique business goals.
                        <br><br>
                        At Positive Quadrant, we believe in building long-term partnerships rooted in trust, transparency,
                        and a shared vision of success.
                        Our agile approach ensures rapid delivery and continuous improvement, empowering our clients to stay
                        ahead in a fast-evolving digital world.
                    </p>


                </div>
                <div class="col-sm-6">
                    <img data-src="<?php echo base_url('assets/img/our_team.webp') ?>" alt="Positive Quadrant"
                        class="img-responsive lazyload" />

                </div>
            </div>
        </div>
    </section>

    <section class="team text-center">
        <div class="container">
            <h2 class="pq_h1">Our Team</h2>
            <br />
            <div class="row">
                <?php foreach ($team_members as $index => $member): ?>
                    <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="<?= ($index + 1) * 100 ?>">
                        <div class="our-team">
                            <img data-src="<?= base_url('admin/uploads/team_member/' . $member['image']) ?>"
                                alt="<?= htmlspecialchars($member['name']) ?>" class="img-responsive lazyload" />
                            <div class="team-content">
                                <h3 class="title"><?= htmlspecialchars($member['name']) ?></h3>
                                <span class="post"><?= htmlspecialchars($member['position']) ?></span>
                                <ul class="social-links">
                                    <?php if (!empty($member['facebook'])): ?>
                                        <li><a href="<?= htmlspecialchars($member['facebook']) ?>"><i
                                                    class="fab fa-facebook"></i></a></li>
                                    <?php endif; ?>
                                    <?php if (!empty($member['twitter'])): ?>
                                        <li><a href="<?= htmlspecialchars($member['twitter']) ?>"><i class="fab fa-twitter"></i></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($member['linkedinurl'])): ?>
                                        <li><a href="<?= htmlspecialchars($member['linkedinurl']) ?>"><i
                                                    class="fab fa-linkedin"></i></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


<?php endif; ?>




<!--team section ends here -->


<!-- workshop code start here  -->
<div class="index_workshop">
    <div>
        <h2 class="pq_h1">Trainings and WorkShops</h2>
    </div>
    <div class="container">
        <div class="row">

            <div class="autoplay wow fadeinRight" data-wow-delay="0.3s">
                <?php foreach ($workshop as $value) { ?>
                    <div class="work_slider_1 ">
                        <img data-src="<?php echo $this->config->item('image_path'); ?>/uploads/workshop/<?php echo $value['work_image'] ?>"
                            class="lazyload" alt="Workshop Image">

                        <p class="pq_p"><?php echo $value['work_desc'] ?> </p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {
        if ($(window).width() < 1024) {
            $('.autoplay').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                centerMode: true,  // Center the active slide
                focusOnSelect: true,  // Focus on the selected slide
                centerPadding: '20px',  // Space around the centered slide
                responsive: [{
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 2000,
                    }
                }]
            });

            $('.exper-auto').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 500,
            });

            $('.placed_auto').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
            });

            $('.brands-auto').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 500,
            });

            $('.facts_auto').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 500,
            });

        } else {
            $('.autoplay').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                centerMode: true,  // Center the active slide
                focusOnSelect: true,  // Focus on the selected slide
                centerPadding: '50px',  // Space around the centered slide
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 2000,
                    }
                }]
            });

            $('.exper-auto').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 500,
            });

            $('.placed_auto').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 500,
            });

            $('.brands-auto').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 500,
            });

            $('.facts_auto').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 500,
            });
        }
    });

</script>
<!-- workshop code end here  -->


<!--our recently placed code start here  -->
<div class="main-index-placed section-mt-mb">
    <div>
        <h2 class="pq_h1">OUR RECENTLY PLACED</h2>
    </div>
    <div class="container">
        <div class="row placed_auto wow fadeInRight" data-wow-delay="0.3s">
            <?php if (!empty($recently_placed)): ?>
                <?php foreach ($recently_placed as $rp): ?>
                    <?php if ($rp['status'] == 1): ?>
                        <div class="col-md-4">
                            <div class="placed-card">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="<?php echo base_url('./admin/uploads/RecentlyPlaced/') . $rp['student_image']; ?>"
                                            alt="<?= htmlspecialchars($rp['student_name']); ?>" class="placed_img">
                                    </div>
                                    <div class="col-md-6">
                                        <a href="<?= htmlspecialchars($rp['student_linkedin_link']); ?>" target="_blank">
                                            <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <h3><?= htmlspecialchars($rp['student_name']); ?></h3>
                                <div class="mybox">
                                    <p class="pq_p">
                                        <?= htmlspecialchars($rp['student_description']); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="pq_p">No recently placed students available.</p>
            <?php endif; ?>
        </div>
    </div>
</div>



<!--our recently placed code end here  -->

<!--testimonials code end here  -->
<div class="index_testimonials">
    <div class="container">
        <div class="row testimonial_main_content">
            <div class="col-md-6 col-sm-6 testimonial_left">
                <h3><strong>TESTIMONIALS</strong></h3>
                <h4>Our Client and Their</h4>
                <h4 class="testimonial_opinion">Opinion.</h4>
                <p class="pq_p" style="color: white;">Partnering with Positive Quadrant for our web-based solution needs
                    has been a game-changer for our
                    business.
                    Their distinct and clear approach to consultancy and development ensured that every aspect of our
                    project was handled with precision and expertise. The team at
                    Positive Quadrant took the time to understand our specific requirements and delivered a customized
                    solution that exceeded our expectations.</p>
            </div>
            <div class="col-md-6 col-sm-6 testimonial_right">
                <div id="myCarousel2" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner carousel_testimonial">
                        <div class="item active">
                            <div class="row">
                                <div class="col-md-3 testimonial_image">
                                    <img data-src="assets/new_img/sun_pharma.webp" class="lazyload" alt="Sun Pharma">


                                </div>
                                <div class="col-md-6 testimonial_heading">
                                    <h3>Sun Pharma</h3>
                                </div>
                                <div class="col-md-3 testimonial_icon">
                                    <i class="fa fa-quote-right" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="testimonials_text">
                                <p class="pq_p" style="color: black;">Launching our new product with the Interactive
                                    Multi-Touch Screen Slider was an
                                    incredible experience.
                                    The technology's ability to scan and display our product's images and videos in such
                                    an interactive manner really captured the attention of our audience.
                                    It was an ideal installation that effectively showcased our product’s features and
                                    specifications.
                                    Working with Positive Quadrant Technologies LLP was a breeze. They handled the
                                    content development,
                                    gaming PC, and slider mechanism professionally and promptly.
                                </p>
                            </div>
                        </div>

                        <?php if (!empty($testimonials)): ?>
                            <?php foreach ($testimonials as $testimonial): ?>
                                <div class="item ">
                                    <div class="row">
                                        <div class="col-md-3 testimonial_image">
                                            <img data-src="<?php echo base_url('admin/uploads/testimonials/') . $testimonial['client_image']; ?>"
                                                class="lazyload" alt="Client Image">


                                        </div>
                                        <div class="col-md-6 testimonial_heading">
                                            <h3><?= $testimonial['client_name']; ?></h3>
                                        </div>
                                        <div class="col-md-3 testimonial_icon">
                                            <i class="fa fa-quote-right" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="testimonials_text">
                                        <p class="pq_p" style="color: black;"><?= $testimonial['client_description']; ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="pq_p">No testimonials available.</p>
                        <?php endif; ?>

                        <div class="control_testimonial">

                            <a class="right carousel-control" href="#myCarousel2" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right right_testimonial"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            <a class="left carousel-control" href="#myCarousel2" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left left_testimonial"></span>
                                <span class="sr-only">Previous</span>
                            </a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--testimonials code end here  -->

<!--some important facts code start here  -->
<div class="main-important-facts section-mt-mb">
    <div class="fact_head">
        <h2 class="pq_h1">SOME IMPORTANT FACTS</h2>
    </div>
    <div class="container">
        <div class="row facts_auto wow fadeinRight" data-wow-delay="0.3s">
            <div class="col-md-4">
                <div class="fact-card">
                    <div class="row">
                        <div class="col-md-4 col-sm-3">
                            <img data-src="assets/new_img/developers.webp" class="lazyload" alt="Developers">

                        </div>
                        <div class="col-md-8 col-sm-9">
                            <h3>Development Team</h3>
                        </div>
                    </div>
                    <h2><span>250+</span></h2>

                </div>
            </div>
            <div class="col-md-4">
                <div class="fact-card">
                    <div class="row">
                        <div class="col-md-4">
                            <img data-src="assets/new_img/conversation.webp" class="lazyload" alt="Conversation">

                        </div>
                        <div class="col-md-8">
                            <h3>Software Consulting</h3>
                        </div>
                    </div>
                    <h2><span>200+</span></h2>

                </div>
            </div>
            <div class="col-md-4">
                <div class="fact-card">
                    <div class="row">
                        <div class="col-md-4">
                            <img data-src="assets/new_img/app-development.webp" class="lazyload" alt="App Development">

                        </div>
                        <div class="col-md-8">
                            <h3>Apps Developed</h3>
                        </div>
                    </div>
                    <h2><span>100+</span></h2>

                </div>
            </div>
            <div class="col-md-4">
                <div class="fact-card">
                    <div class="row">
                        <div class="col-md-4">
                            <img data-src="assets/new_img/developer.webp" class="lazyload" alt="Developer">

                        </div>
                        <div class="col-md-8">
                            <h3>Placed Students</h3>
                        </div>
                    </div>
                    <h2><span>350+</span></h2>

                </div>
            </div>
            <div class="col-md-4">
                <div class="fact-card">
                    <div class="row">
                        <div class="col-md-4">
                            <img data-src="assets/new_img/conversation_one.webp" class="lazyload" alt="Conversation One">

                        </div>
                        <div class="col-md-8">
                            <h3>Clients</h3>
                        </div>
                    </div>
                    <h2><span>50+</span></h2>

                </div>
            </div>
            <div class="col-md-4">
                <div class="fact-card">
                    <div class="row">
                        <div class="col-md-4">
                            <img data-src="assets/new_img/trustworthiness.webp" class="lazyload" alt="Trustworthiness">

                        </div>
                        <div class="col-md-8">
                            <h3>Engineering College Tieups</h3>
                        </div>
                    </div>
                    <h2><span>450+</span></h2>

                </div>
            </div>
            <div class="col-md-4">
                <div class="fact-card">
                    <div class="row">
                        <div class="col-md-4">
                            <img data-src="assets/new_img/soft-skills.webp" class="lazyload" alt="Soft Skills">

                        </div>
                        <div class="col-md-8">
                            <h3>Trained</h3>
                        </div>
                    </div>
                    <h2><span>25000+</span></h2>

                </div>
            </div>

        </div>
    </div>
</div>
<!--some important facts code end here  -->

<!-- Our Expertise Start Here -->
<div class="main-exper-auto">
    <div>
        <h1 class="pq_h1">OUR EXPERTISE</h>
    </div>
    <div class="container">
        <div class="showcase">
            <div class="slider clearfix">
                <img data-src="<?php echo base_url('assets/new_img/agile-graphic_0.webp'); ?>" alt="Agile Graphic"
                    class="itemSlider lazyload" />
                <img data-src="<?php echo base_url('assets/new_img/ang.webp'); ?>" alt="Angular Logo"
                    class="itemSlider lazyload" />
                <img data-src="<?php echo base_url('assets/new_img/Aws-DevOps.webp'); ?>" alt="AWS DevOps"
                    class="itemSlider lazyload" />
                <img data-src="<?php echo base_url('assets/new_img/AWS.webp'); ?>" alt="AWS"
                    class="itemSlider lazyload" />
                <img data-src="<?php echo base_url('assets/new_img/Azure-Logo-webp-Images.webp'); ?>" alt="Azure Logo"
                    class="itemSlider lazyload" />
                <img data-src="<?php echo base_url('assets/new_img/datascience.webp'); ?>" alt="Data Science"
                    class="itemSlider lazyload" />
                <img data-src="<?php echo base_url('assets/new_img/DJANGO.webp'); ?>" alt="Django"
                    class="itemSlider lazyload" />
                <img data-src="<?php echo base_url('assets/new_img/Drupal.webp'); ?>" alt="Drupal"
                    class="itemSlider lazyload" />
                <img data-src="<?php echo base_url('assets/new_img/flutter.webp'); ?>" alt="Flutter"
                    class="itemSlider lazyload" />
                <img data-src="<?php echo base_url('assets/new_img/git_gitlab.webp'); ?>" alt="Git & GitLab"
                    class="itemSlider lazyload" />
                <img data-src="<?php echo base_url('assets/new_img/hybrid-top.webp'); ?>" alt="Hybrid Top"
                    class="itemSlider lazyload" />
                <img data-src="<?php echo base_url('assets/new_img/iot.webp'); ?>" alt="IoT"
                    class="itemSlider lazyload" />
                <img data-src="<?php echo base_url('assets/new_img/linux.webp'); ?>" alt="Linux"
                    class="itemSlider lazyload" />
                <img data-src="<?php echo base_url('assets/new_img/magento.webp'); ?>" alt="Magento"
                    class="itemSlider lazyload" />
                <img data-src="<?php echo base_url('assets/new_img/meanstack.webp'); ?>" alt="MEAN Stack"
                    class="itemSlider lazyload" />
                <img data-src="<?php echo base_url('assets/new_img/mongodB.webp'); ?>" alt="MongoDB"
                    class="itemSlider lazyload" />
                <img data-src="<?php echo base_url('assets/new_img/MS-SQL-Server.webp'); ?>" alt="MS SQL Server"
                    class="itemSlider lazyload" />
                <img data-src="<?php echo base_url('assets/new_img/MERN-logo.webp'); ?>" alt="MERN Stack"
                    class="itemSlider lazyload" />
                <img data-src="<?php echo base_url('assets/new_img/Node.js_logo_2015.svg.webp'); ?>" alt="Node.js"
                    class="itemSlider lazyload" />
                <img data-src="<?php echo base_url('assets/new_img/Official_unity_logo.webp'); ?>" alt="Unity Logo"
                    class="itemSlider lazyload" />
                <img data-src="<?php echo base_url('assets/new_img/R.webp'); ?>" alt="R Language"
                    class="itemSlider lazyload" />
                <img data-src="<?php echo base_url('assets/new_img/Tableau-Logo-webp-HD.webp'); ?>" alt="Tableau Logo"
                    class="itemSlider lazyload" />
                <img data-src="<?php echo base_url('assets/new_img/ux-ui-logo.webp'); ?>" alt="UX UI Logo"
                    class="itemSlider lazyload" />
                <img data-src="<?php echo base_url('assets/new_img/Microsoft-Power-BI-Logo.webp'); ?>"
                    alt="Microsoft Power BI" class="itemSlider lazyload" />

            </div>
        </div>


    </div>
</div>



<!-- Our Expertise End Here -->

<!-- faq code start here  -->
<div class="index_faq section-mt-mb">
    <div class="container">
        <br />
        <div>
            <h2 class="pq_h1" style="color:white;">F.A.Q</h2>
        </div>
        <div class="row index_faq_one">
            <div class="acd-items acd-arrow">
                <div class="panel-group symb" id="accordion">
                    <div class="panel panel-default" style="margin-top: 2rem;">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#ac1">
                                    What services does Positive Quadrant Technologies LLP offer?
                                    <i class="fa fa-chevron-right icon-show" aria-hidden="true"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="ac1" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p class="pq_p">
                                    Positive Quadrant Technologies LLP offers a range of services including IT
                                    consultancy, training programs,
                                    and placement services for students. We specialize in delivering customized
                                    solutions to meet your specific business needs.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#ac2">
                                    How can I contact Positive Quadrant Technologies LLP for consultancy services?
                                    <i class="fa fa-chevron-right icon-show" aria-hidden="true"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="ac2" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p class="pq_p">
                                    You can contact us via email at <a href="">info@positivequadrant.in</a> or call us
                                    at +91-7219623991.
                                    Our team is available to assist you with any queries or to schedule a consultation.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#ac3">
                                    What kind of IT training programs do you provide?
                                    <i class="fa fa-chevron-right icon-show" aria-hidden="true"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="ac3" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p class="pq_p">
                                    We offer a variety of IT training programs, including software development, data
                                    science, full stack development, cloud computing, and more.
                                    Our training programs are designed to cater to beginners as well as advanced
                                    learners.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#ac4">
                                    Are your training programs available online?
                                    <i class="fa fa-chevron-right icon-show" aria-hidden="true"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="ac4" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p class="pq_p">
                                    Yes, we provide both online and offline training programs to accommodate the diverse
                                    needs of our students.
                                    You can choose the mode of learning that best suits your schedule and preferences.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#ac5">
                                    Do you offer placement services for students?
                                    <i class="fa fa-chevron-right icon-show" aria-hidden="true"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="ac5" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p class="pq_p">
                                    Yes, we offer comprehensive placement services to help students secure jobs in their
                                    respective fields.
                                    Our placement cell works closely with leading companies to ensure our students get
                                    the best opportunities.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#ac6">
                                    How do you support students during the placement process?
                                    <i class="fa fa-chevron-right icon-show" aria-hidden="true"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="ac6" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p class="pq_p">
                                    We provide a range of support services including resume building, interview
                                    preparation,
                                    and career counseling to ensure our students are well-prepared and confident when
                                    applying for jobs.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#ac7">
                                    How can I stay updated on the latest training programs and placement opportunities?
                                    <i class="fa fa-chevron-right icon-show" aria-hidden="true"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="ac7" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p class="pq_p">
                                    You can stay updated by subscribing to our newsletter, following us on social media,
                                    and regularly visiting our website.
                                    We frequently update our offerings and share the latest news and opportunities with
                                    our community.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
</div>
<!-- faq code end here  -->

<!-- contact code start here  -->
<div class="contact_index">
    <div class="container">
        <div class="alert alert-success" style="text-align: center;display: none;">
            <p class="pq_p">Thank you for contacting us. We will be in touch with you very soon.</p>
        </div>
        <div class="row">
            <div class="col-sm-8 contact_form_one_index">
                <img data-src="assets/new_img/contact.webp" class="img-responsive lazyload" alt="Contact Image">
            </div>
            <div class="col-sm-4 contact_form_two_index">
                <div class="section_title">
                    <h6 class="sub_title">GET IN TOUCH</h6>
                    <h2 class="contact_index_title">Bringing Your <span style="color:#1a9c9b">Vision</span> To Life</h2>
                    <p class="pq_p index_contact_content">
                        Everything IT — from strategy and design to support and solutions. Trusted by those who prefer
                        the best.
                    </p>
                    <form class="contact_frm" id="createIndexForm">
                        <input type="hidden" name="submitted_from" value="<?= current_url() ?>">

                        <input type="text" name="website" style="display:none">

                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="name" id="name" placeholder="Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" id="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="number" name="phone" id="phone" placeholder="Phone" required>
                            </div>
                            <div class="col-md-6">
                                <select name="services" id="services" required onchange="change_myselect(this.value)">
                                    <option value=""> Select Services </option>
                                    <option value="Development"> Development </option>
                                    <option value="Consultancy"> Consultancy </option>
                                    <option value="Training"> Training </option>
                                    <option value="Manufacturing"> Manufacturing </option>
                                    <option value="Technology"> Technology </option>
                                    <option value="Software_Products"> Software Products </option>
                                    <option value="Other"> Other </option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea type="text" name="message" id="name" placeholder="Message"></textarea>
                            </div>
                        </div>

                        <input type="hidden" name="services2" id="services2" value="">

                        <div class="col-md-12 text-center">
                            <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-info" style="padding: 7px 44px;margin-top:17px; background-color: #1a9c9b;
border-radius: 1.64rem 0 1.64rem 0;border-color: #1a9c9b;">
                                SUBMIT
                            </button>


                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact code end here  -->

<!-- what we do code start here  -->
<div class="what_we_do section-mt-mb main-exper">
    <div class="what_we_do_title " data-wow-delay="0.3s"
        style="background-image: url('assets/img/background_what_we_do.webp');">
        <div class="container">
            <!-- <h1>hi srushti</h1> -->
            <div class="row justify-content-center ">
                <div class="col-md-12 col-sm-12">
                    <div class="section_title_what text-centre">
                        <h2 class="pq_h1" style="color: white;">WHAT WE DO</h2>
                        <p class="pq_p" style="color: white;">
                            Positive Quadrant Technologies LLP is an innovative consultancy and technology services firm
                            based in Ambernath West, Thane.
                            We are a team of highly passionate, dynamic young professionals specializing in consultancy,
                            training, and development.
                            Our commitment is to deliver top-notch services to our clients, ensuring excellence in every
                            project we undertake.
                        </p>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="what_we_content">
        <div class="sub_what_we_content container">
            <!-- <h1>hihhhhhhhhhhhhhhhhhhh</h1> -->
            <div class="row what_we_row exper-auto row exper-auto wow fadeinRight">
                <div class="col-sm-3 what_we_content_box exper-card">
                    <div class="single_img">
                        <img data-src="assets/new_img/web-development.webp" class="img-responsive lazyload"
                            alt="Web Development">

                    </div>
                    <h3>Web Development</h3>
                    <p class="pq_p">Web development is a dynamic field encompassing the creation and maintenance of
                        websites and web
                        applications, involving several core technologies.
                        At its foundation are HTML for structure, CSS for presentation, and JavaScript for
                        interactivity.
                    </p>
                    <div class="what_we_btn"><a href="https://positivequadrant.in/Home/training_details/40"
                            class="wow fadein development_enquiry">Read More</a></div>
                </div>

                <div class="col-sm-3 what_we_content_box  exper-card">
                    <div class="single_img">
                        <img data-src="assets/new_img/DYNAMIC-MOBILE-APPLICATION.webp" class="img-responsive lazyload"
                            alt="Dynamic Mobile Application">

                    </div>
                    <h3>Mobile App Development</h3>
                    <p class="pq_p">Mobile app development involves creating software applications that run on mobile
                        devices, and it
                        encompasses various technologies, and tools.
                        At its core, development can be platform-specific, using Swift or Objective-C for iOS and Java
                        or Kotlin for Android.
                    </p>
                    <div class="what_we_btn"><a href="https://positivequadrant.in/Home/training_details/2"
                            class="wow fadein development_enquiry">Read More</a></div>
                </div>

                <div class="col-sm-3 what_we_content_box  exper-card">
                    <div class="single_img">
                        <img data-src="assets/new_img/DJANGO.webp" class="img-responsive lazyload"
                            alt="Django Framework">

                    </div>
                    <h3>Python Django Development</h3>
                    <p class="pq_p">Python Django development focuses on building robust and scalable web applications
                        using the
                        Django framework, known for its simplicity, flexibility, and "batteries-included" philosophy.
                        Django promotes rapid development and clean, pragmatic design.
                    </p>
                    <div class="what_we_btn"><a href="https://positivequadrant.in/Home/training_details/64"
                            class="wow fadein development_enquiry">Read More</a></div>
                </div>

                <div class="col-sm-3 what_we_content_box  exper-card">
                    <div class="single_img">
                        <img data-src="assets/new_img/MEAN.webp" class="img-responsive lazyload" alt="MEAN Stack">

                    </div>
                    <h3>MEAN Stack Development</h3>
                    <p class="pq_p">It is a collection of technologies: MongoDB, Express.js, Angular, and Node.js.
                        MongoDB serves as the NoSQL database, Express.js, a minimalist web framework for Node.js,
                        Angular, a powerful front-end framework developed, Node.js provides the runtime environment.
                    </p>
                    <div class="what_we_btn"><a href="https://positivequadrant.in/Home/training_details/54"
                            class="wow fadein development_enquiry centre">Read More</a></div>
                </div>

                <div class="col-sm-3 what_we_content_box  exper-card">
                    <div class="single_img">
                        <img data-src="assets/new_img/mern.webp" class="img-responsive lazyload" alt="MERN Stack">

                    </div>
                    <h3>MERN Stack Development</h3>
                    <p class="pq_p">The MERN stack consists of MongoDB, Express.js, React, and Node.js
                        MongoDB is used for JSON-like document storage, Express.js, a web application framework for
                        Node.js,
                        React is used for creating responsive and interactive user interfaces.
                    </p>
                    <div class="what_we_btn"><a href="https://positivequadrant.in/Home/training_details/55"
                            class="wow fadein development_enquiry centre">Read More</a></div>
                </div>

                <div class="col-sm-3 what_we_content_box  exper-card">
                    <div class="single_img">
                        <img data-src="assets/new_img/R.webp" class="img-responsive lazyload"
                            alt="R Programming Language Logo">

                    </div>
                    <h3>R Development</h3>
                    <p class="pq_p">R development focuses on utilizing the R programming language for statistical
                        computing, data
                        analysis, and visualization, making it a favorite among data scientists and statisticians.
                        R is a powerful tool for comprehensive data analysis and application deployment.
                    </p>
                    <div class="what_we_btn"><a href="https://positivequadrant.in/Home/training_details/44"
                            class="wow fadein development_enquiry centre">Read More</a></div>
                </div>

                <div class="col-sm-3 what_we_content_box  exper-card">
                    <div class="single_img">
                        <img data-src="assets/new_img/oracle-database-10g-administration-ii.webp"
                            class="img-responsive lazyload" alt="Oracle Database 10g Administration II">

                    </div>
                    <h3>Oracle 10g Administration</h3>
                    <p class="pq_p">Oracle 10g administration involves managing and maintaining Oracle 10g databases to
                        ensure their
                        optimal performance,
                        security, and availability. Key responsibilities include installing and configuring the Oracle
                        10g software,
                        creating and managing databases.
                    </p>
                    <div class="what_we_btn"><a href="https://positivequadrant.in/Home/training_details/52"
                            class="wow fadein development_enquiry centre">Read More</a></div>
                </div>

                <div class="col-sm-3 what_we_content_box  exper-card">
                    <div class="single_img">
                        <img data-src="assets/new_img/hybrid-top.webp" class="img-responsive lazyload"
                            alt="Hybrid Technology">

                    </div>
                    <h3>Hybrid Development</h3>
                    <p class="pq_p">Hybrid development focuses on creating mobile applications that can run on multiple
                        platforms,
                        such as iOS and Android.
                        This approach combines elements of both native and web development, leveraging technologies like
                        HTML, CSS, and JavaScript.
                    </p>
                    <div class="what_we_btn"><a href="https://positivequadrant.in/Home/training_details/48"
                            class="wow fadein development_enquiry centre">Read More</a></div>
                </div>


            </div>
        </div>
    </div>

</div>
<!-- what we do code end here  -->


<!-- our placement partner code start here  -->
<div class="our_partners section-mt-mb">
    <div class="container">
        <div class="row align-items-center justify-content-between partner_one">
            <div class="col-md-6">
                <h3>OUR PLACEMENT PARTNERS</h3>
                <div class="sub_partner">
                    <i class="fa fa-circle" aria-hidden="true"></i>
                    <i class="fa fa-circle" aria-hidden="true"></i>
                    <i class="fa fa-circle img_one" aria-hidden="true"></i>
                    <i class="fa fa-circle" aria-hidden="true"></i>
                    <i class="fa fa-circle" aria-hidden="true"></i>
                </div>
            </div>
            <div class="col-md-6">
                <p class="pq_p">Explore a wide range of cutting-edge candidates for
                    <br>
                    a competitive edge in your workforce.
                </p>
            </div>
        </div>
        <div class="partnerImage">
            <?php if (!empty($partners)): ?>
                <?php foreach ($partners as $partner): ?>

                    <div class="partner_image wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                        <img data-src="<?php echo base_url('./admin/uploads/partners/') . $partner['partner_image']; ?>"
                            alt="<?php echo isset($partner['name']) ? htmlspecialchars($partner['name']) : 'Partner Image'; ?>"
                            class="lazyload img-responsive" />


                    </div>



                <?php endforeach; ?>
            <?php else: ?>
                <p class="pq_p">No partners available.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- our placement partner code end here  -->


<div class="container section-mt-mb">
    <div>
        <h2 class="pq_h1">OUR Clients</h2>
    </div>
    <div class="container">
        <div class="row">
            <?php if (!empty($clients)): ?>
                <div class="client-slider-wrapper">
                    <?php foreach ($clients as $client): ?>
                        <div class="client-item">
                            <div class="client-card client-images">
                                <img data-src="<?php echo base_url('./admin/uploads/client/') . $client['client_image']; ?>"
                                    alt="<?php echo isset($client['name']) ? htmlspecialchars($client['name']) : 'Client Image'; ?>"
                                    class="lazyload img-responsive" />


                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="pq_p">No client available.</p>
            <?php endif; ?>
        </div>
    </div>
</div>




<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="http://bfintal.github.io/Counter-Up/jquery.counterup.min.js"></script>


<!-- client image slider animation starts here -->
<script>
    $(function () {
        function initializeSlider(selector) {
            var $slider = $(selector);
            var $items = $slider.children();
            var sizeImage = 220; // Width of each item including margin
            var itemsCount = $items.length;

            // Clone all items for seamless looping
            $slider.append($items.clone());

            // Set the total width of the slider
            var totalWidth = itemsCount * sizeImage * 2; // Original + cloned items
            $slider.css('width', totalWidth);

            var sliderSpeed = 50; // Pixels per second (adjust for faster/slower scrolling)
            var currentMargin = 0; // Track the current margin-left value
            var animationFrame; // Store the requestAnimationFrame ID
            var isPaused = false; // Track if the slider is paused

            function smoothScroll() {
                if (!isPaused) {
                    currentMargin -= 1; // Move 1px at a time for smooth scrolling

                    if (Math.abs(currentMargin) >= itemsCount * sizeImage) {
                        // Reset to the start for seamless looping
                        currentMargin = 0;
                    }

                    $slider.css('margin-left', currentMargin + 'px');
                }

                // Use requestAnimationFrame for smooth, precise scrolling
                animationFrame = requestAnimationFrame(smoothScroll);
            }

            // Stop scrolling on hover
            $slider.on('mouseenter', function () {
                isPaused = true; // Pause the slider
                cancelAnimationFrame(animationFrame); // Stop the animation loop
            });

            // Resume scrolling on hover leave
            $slider.on('mouseleave', function () {
                isPaused = false; // Resume the slider
                smoothScroll(); // Restart the animation loop
            });

            // Start the slider initially
            smoothScroll();
        }

        // Initialize all sliders
        $('.client-slider-wrapper').each(function () {
            initializeSlider(this);
        });
    });
</script>

<!-- client image slider animation ends here -->



<!-- script code for dribble like smooth starts -->


<script>


    $(function () {
        function initializeSlider(selector) {
            var $slider = $(selector);
            var sizeImage = 200; // Width of each slider item
            var items = $slider.children().length;
            var itemsWidth = items * sizeImage; // Total width of slider
            $slider.css('width', itemsWidth);

            var rotating = true;
            var sliderSpeed = 2000; // Adjust speed here
            var interval;

            function startSlider() {
                interval = setInterval(rotateSlider, sliderSpeed);
            }

            function stopSlider() {
                clearInterval(interval);
            }

            function rotateSlider() {
                if (rotating) {
                    $slider.animate({ 'margin-left': '-' + sizeImage + 'px' }, sliderSpeed, "linear", function () {
                        // Move the first item to the end
                        $slider.append($slider.find('.itemSlider:first'));
                        // Reset margin-left to maintain smoothness
                        $slider.css('margin-left', '0px');
                    });
                }
            }

            // Stop the animation immediately on hover
            $slider.on('mouseenter', '.itemSlider', function () {
                rotating = false;
                $slider.stop(true, false); // Stop ongoing animation immediately
                stopSlider();
            });

            // Restart the animation on mouse leave
            $slider.on('mouseleave', '.itemSlider', function () {
                rotating = true;
                // Trigger immediate slider movement
                rotateSlider(); // Manually call the rotateSlider function to continue the animation immediately
                startSlider(); // Restart the interval
            });

            // Start the slider initially
            startSlider();
        }

        // Initialize all sliders
        $('.slider').each(function () {
            initializeSlider(this);
        });
    });




</script>


<!-- script code for dribble like smooth ends -->




<script>


    jQuery(document).ready(function ($) {
        $('.counter').counterUp({
            delay: 10,
            time: 1500
        });
    });
</script>

<script>
    function changeReadMore() {
        // console.log("Button clicked!");
        const mycontent = document.getElementById('mybox1id');
        const mybutton = document.getElementById('mybuttonid');
        const placedCard = document.querySelector('.placed-card');

        if (mycontent.style.display === 'none' || mycontent.style.display === '') {
            mycontent.style.display = 'block';
            mybutton.textContent = 'Read Less';
            placedCard.style.width = '100%';
        } else {
            mycontent.style.display = 'none';
            mybutton.textContent = 'Read More';
            placedCard.style.width = '';
        }
    }
</script>



<script>
    $("#createIndexForm").submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        var formData = new FormData(this);
        formData.append('<?= $this->security->get_csrf_token_name(); ?>', '<?= $this->security->get_csrf_hash(); ?>');
        var $submitBtn = $("#singlebutton");

        // Store original text and change it to 'Sending...'
        var originalText = $submitBtn.html();
        $submitBtn.prop("disabled", true).html("Sending...");

        // Optional loader in center of screen
        var loader = $('<div>', {
            id: 'ajax-loader',
            text: 'Processing...',
            css: {
                position: 'fixed',
                top: '50%',
                left: '50%',
                transform: 'translate(-50%, -50%)',
                background: 'rgba(0, 0, 0, 0.7)',
                color: 'white',
                padding: '10px 20px',
                borderRadius: '5px',
                zIndex: '9999',
                fontSize: '16px',
                fontWeight: 'bold',
                textAlign: 'center',
            }
        }).appendTo('body');

        $.ajax({
            url: "<?php echo base_url('Home/saveData'); ?>",
            data: formData,
            type: "post",
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (response) {
                $('#ajax-loader').remove();
                $submitBtn.prop("disabled", false).html(originalText);

                if (response.status === 'success') {
                    $('#createIndexForm')[0].reset();
                    toastr.success(response.message);
                } else if (response.status === 'error') {
                    toastr.error(response.message);
                }
                if (response.csrf_token) {
                    $('input[name="<?= $this->security->get_csrf_token_name(); ?>"]').val(response.csrf_token);
                }
            },
            error: function (xhr, status, error) {
                $('#ajax-loader').remove();
                $submitBtn.prop("disabled", false).html(originalText);
                toastr.error("Unexpected error: " + xhr.responseText);
            }
        });
    });

</script>


<script>
    setInterval(() => {
        fetch("<?php echo base_url('Home/processEmailQueue'); ?>"')
            .then(response => response.json())
            .then(data => console.log(data.message))
            .catch(error => console.error('Error processing email queue:', error));
        // alert("Cron job called")
    }, 6000); // Trigger every 6 seconds

</script>



<script>
    // Function to check if the element is in the viewport
    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return rect.top >= 0 && rect.bottom <= window.innerHeight;
    }

    // Function to trigger the animation
    function animateOnScroll() {
        const industries = document.querySelectorAll('.industry');

        industries.forEach(industry => {
            if (isInViewport(industry)) {
                industry.style.opacity = 1;
                industry.style.transform = 'translateX(0)';  // Bring the element back to its original position
            }
        });
    }

    // Listen for scroll events
    window.addEventListener('scroll', animateOnScroll);

    // Trigger the animation initially in case elements are already in view
    animateOnScroll();

</script>



<script>
    $(document).ready(function () {
        $(".panel-title a").click(function () {
            // Toggle the icon when clicking the accordion header
            $(this).find(".icon-show").toggleClass("fa-chevron-right fa-chevron-down");

            // Close other panels and reset their icons
            $(".panel-title a").not(this).find(".icon-show").removeClass("fa-chevron-down").addClass("fa-chevron-right");
        });
    });

</script>

<script>
    gsap.registerPlugin(ScrollTrigger);

    const paragraph = document.getElementById('scrollParagraph');
    const text = paragraph.textContent;
    paragraph.textContent = '';

    // Wrap each character in a span
    text.split('').forEach(char => {
        const span = document.createElement('span');
        span.textContent = char;
        span.classList.add('char');
        paragraph.appendChild(span);
    });

    // Animate each character as you scroll
    gsap.to('.char', {
        scrollTrigger: {
            trigger: paragraph,
            start: 'top 95%',
            end: 'bottom 70%',
            scrub: 1,
            markers: true,
        },
        opacity: 1,
        y: 0,
        stagger: {
            each: 0.02,
        },
        ease: 'power2.out',
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let currentIndex = 0;
        const items = document.querySelectorAll('.home-desc-item');
        const totalItems = items.length;

        function showNextItem() {
            // Hide the current item
            if (currentIndex > 0) {
                items[currentIndex - 1].classList.remove('active');
            }

            // Show the next item
            items[currentIndex].classList.add('active');

            // Move to the next index, and loop back when reaching the end
            currentIndex = (currentIndex + 1) % totalItems;
        }

        // Initially show the first item
        showNextItem();

        // Use setInterval to show next item every 3 seconds (adjust timing as needed)
        setInterval(showNextItem, 3000); // 3000ms = 3 seconds
    });
</script>
<script>
    const homeData = <?php echo json_encode($home); ?>;
    let currentDescIndex = 0;

    function resetHomeDescription() {
        const container = document.querySelector('.home-desc-container');
        container.innerHTML = ''; // Clear previous items

        // Create and append description items
        homeData.forEach((value, index) => {
            const descItem = document.createElement('div');
            descItem.classList.add('home-desc-item');
            if (index === 0) descItem.classList.add('active'); // Only first one visible initially
            descItem.innerHTML = `<h3>${value.home_desc}</h3>`;
            container.appendChild(descItem);
        });

        currentDescIndex = 0;
    }

    function cycleDescriptions() {
        const items = document.querySelectorAll('.home-desc-item');
        if (items.length === 0) return;

        // Remove active from current
        items[currentDescIndex].classList.remove('active');

        // Move to next index, wrap around
        currentDescIndex = (currentDescIndex + 1) % items.length;

        // Show next
        items[currentDescIndex].classList.add('active');
    }

    document.addEventListener("DOMContentLoaded", function () {
        document.querySelector(".text-overlay h2").classList.add("fill-animate");

        // Init desc items once
        resetHomeDescription();

        // Handle video ending (reset + rotate cycle start)
        const video = document.querySelector('.video-background');
        video.addEventListener('ended', function () {
            resetHomeDescription();
        });

        // Optional: keep rotating every few seconds
        setInterval(cycleDescriptions, 4000); // 4 seconds
    });
</script>