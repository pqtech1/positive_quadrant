<div class="inner_main_header" id="inner_main_header">
    <div class="container">
        <h3>About us</h3>
    </div>
</div>
<style>

    body{
        overflow-x: hidden ;
    }

    #about {
        color: #1a9c9b;
    }

    #about.hvr-underline-from-center:before {
        left: 0;
        right: 0;
    }

    #inner_main_header {
        display: none;
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
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 30px;
        border-bottom: 2px solid gray;
        display: inline-block;
        padding-bottom: 10px;
    }
</style>

<div class="container aboutUsPageMainContainer">
    <div class="left">
        <h1 class="pq_h1" 
            data-aos="fade-right" 
            data-aos-duration="800">
            About Positive Quadrant Technologies
        </h1>

        <p class="pq_p" 
           data-aos="fade-right" 
           data-aos-delay="200" 
           data-aos-duration="800">
            With a user-centric approach, we're dedicated to delivering solutions that amplify your business
            value,
            driving growth and excellence every step of the way. Your success is our ultimate achievement. We
            collaborate closely with you to understand your unique needs and craft tailored strategies that ensure
            long-term success. Our commitment to innovation and quality empowers you to stay ahead in a rapidly evolving
            market, unlocking new opportunities at every turn. Together, we’ll build a brighter future for your
            business.
        </p>

        <div class="buttonContainer" 
             data-aos="fade-up" 
             data-aos-delay="400" 
             data-aos-duration="600">
            <button onclick="scrollToGoalAndVision()"><i class="fa fa-question"></i>
                Why Us</button>
            <button><i class="fa fa-phone"></i>
                <a href="<?php echo base_url(); ?>contact-us">Book a Free Consultation</a></button>
        </div>
    </div>

    <div class="right" 
         data-aos="zoom-in-left" 
         data-aos-delay="500" 
         data-aos-duration="800">
        <picture>
            <source data-srcset="<?= base_url('assets/img/about-us/about-us3.webp'); ?>" type="image/webp">

            <img data-src="<?= base_url('noWebpAssets/assets/img/about-us3.jpg'); ?>" 
                 class="lazyload" 
                 alt="About Us Main Image">
        </picture>
    </div>
</div>


<div class="container effectiveEfficient">
    <div class="cardDetails">
        <h1 class="pq_h1" data-aos="fade-right" data-aos-duration="800">Effective and Efficient</h1>
        <p class="pq_p" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
            The results speak for themselves—90% of our clients from all corners of the globe choose us again and again.
            But don't just take our word for it—ask them!

            At Positive Quadrant Technologies, we are more than just a service provider; we’re your strategic partner in
            business growth. We offer a complete suite of solutions that amplify your brand presence, build your digital
            footprint, and engage your audience like never before. Whether you're looking to refine your branding,
            create a powerful website, or leverage digital marketing to expand your reach, we have the tools and
            expertise to help your business thrive in a competitive digital landscape.
        </p>
    </div>

    <div class="detailsImage" data-aos="zoom-in-left" data-aos-delay="300" data-aos-duration="800">
        <picture>
            <source data-srcset="<?= base_url('assets/img/about-us/about-us4.webp'); ?>" 
                    type="image/webp" 
                    alt="Social Media Marketing" />

            <img data-src="<?= base_url('noWebpAssets/assets/img/about-us4.jpg'); ?>" 
                 class="lazyload" 
                 alt="Social Media Marketing">
        </picture>
    </div>
</div>


<div class="container aboutUsPageMainContainer">
    <div class="left">
        <h1 class="pq_h1" data-aos="fade-right" data-aos-duration="800">Our Mission</h1>
        <p class="pq_p" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
            At Positive Quadrant Technologies, our mission is simple: to provide exactly what your
            business needs to succeed. We are a dynamic team of creative professionals, dedicated to driving 
            your company’s growth.

            Why waste time and resources working with multiple agencies when we offer everything you need 
            under one roof? From strategy to execution, we provide comprehensive solutions that cover every 
            aspect of your business, all in-house.

            Our team of experts works closely with you to ensure your growth is not only effective and efficient 
            but also sustainable—at a cost that aligns with your business’s needs. With Positive Quadrant 
            Technologies, it's all worry-free, hassle-free, and most importantly, affordable!
        </p>
        <div class="buttonContainer">
            <button style="display:none;"><i class="fa fa-question"></i>
                Why Us</button>
            <button data-aos="fade-up" data-aos-delay="400" data-aos-duration="600">
                <i class="fa fa-phone"></i>
                <a href="<?php echo base_url(); ?>contact-us">Book a Free Consultation</a>
            </button>
        </div>
    </div>

    <div class="right" data-aos="zoom-in-left" data-aos-delay="300" data-aos-duration="800">
        <picture>
            <source data-srcset="<?= base_url('assets/img/aboutusmission.webp'); ?>" type="image/webp">

            <img data-src="<?= base_url('noWebpAssets/assets/img/aboutusmission.png'); ?>" 
                 class="lazyload" 
                 alt="About Us Mission">
        </picture>
    </div>
</div>




<div class="container goalAndVisionHeader">
    <h1 class="pq_h1">Organizational Vision</h1>
</div>
<div class="container goalAndVision">

    <div class="wrapper">

        <div class="left">
            <div class="scroll-cards">

                <article class="scroll-cards__item" aria-label="Wie - 1">
                    <div class="coreStrengthCard">
                        <picture>
                            <!-- WebP first -->
                            <source data-srcset="<?= base_url('assets/img/collaboration.webp'); ?>" type="image/webp">

                            <!-- PNG fallback -->
                            <img data-src="<?= base_url('noWebpAssets/assets/img/collaboration.png'); ?>" 
                                class="lazyload" 
                                alt="Collaboration">
                        </picture>


                        <h3>Innovation and R&D</h3>
                        <p class="pq_p">Driving innovation through continuous research and development to deliver
                            cutting-edge
                            solutions, ensuring our clients stay ahead in a rapidly evolving technological landscape.
                        </p>
                    </div>
                </article>
                <article class="scroll-cards__item" aria-label="Wie - 1">
                    <div class="coreStrengthCard">
                        <picture>
                            <!-- WebP first -->
                            <source data-srcset="<?= base_url('assets/img/scalability.webp'); ?>" type="image/webp">

                            <!-- PNG fallback -->
                            <img data-src="<?= base_url('noWebpAssets/assets/img/scalability.png'); ?>" 
                                class="lazyload" 
                                alt="Scalability">
                        </picture>
                        <h3>Scalability</h3>
                        <p class="pq_p">Designing flexible solutions that grow seamlessly with your business, ensuring
                            long-term
                            scalability and adaptability to changing market demands.</p>
                    </div>
                </article>
                <article class="scroll-cards__item" aria-label="Wie - 1">
                    <div class="coreStrengthCard">
                        <picture>
                            <!-- WebP first -->
                            <source data-srcset="<?= base_url('assets/img/customer_support.webp'); ?>" type="image/webp">

                            <!-- PNG fallback -->
                            <img data-src="<?= base_url('noWebpAssets/assets/img/customer_support.png'); ?>" 
                                class="lazyload" 
                                alt="Customer Support">
                        </picture>


                        <h3>Customer Support</h3>
                        <p class="pq_p">Providing exceptional support to ensure client success and satisfaction, with a
                            dedicated
                            team available to address your needs promptly.</p>
                    </div>
                </article>


            </div>
        </div>

        <div class="right">
            <div class="scroll-cards">
                <!-- <h1 style="opacity:0;padding-top:2rem;">Our Mission, Vision and Goal</h1> -->

                <article class="scroll-cards__item" aria-label="Wie - 1">
                    <div class="coreStrengthCard">
                    <picture>
                        <!-- WebP first -->
                        <source data-srcset="<?= base_url('assets/img/security.webp'); ?>" type="image/webp">

                        <!-- PNG fallback -->
                        <img data-src="<?= base_url('noWebpAssets/assets/img/security.png'); ?>" 
                            class="lazyload" 
                            alt="Security">
                    </picture>

                        <h3>Security and Compliance</h3>
                        <p class="pq_p">Implementation robust security measures and ensuring compliance with industry
                            standards,
                            safeguarding your data and maintaining trust and reliability.</p>
                    </div>
                </article>
                <article class="scroll-cards__item" aria-label="Wie - 1">
                    <div class="coreStrengthCard">
                    <picture>
                        <!-- WebP first -->
                        <source data-srcset="<?= base_url('assets/img/proactive_problem_solving.webp'); ?>" type="image/webp">

                        <!-- PNG fallback -->
                        <img data-src="<?= base_url('noWebpAssets/assets/img/proactive_problem_solving.png'); ?>" 
                            class="lazyload" 
                            alt="Proactive Problem Solving">
                    </picture>


                        <h3>Proactive Problem Solving</h3>
                        <p class="pq_p">Anticipating and resolving challenges swiftly to maintain project momentum and
                            client
                            satisfaction, ensuring smooth and efficient project delivery.</p>
                    </div>
                </article>
                <article class="scroll-cards__item" aria-label="Wie - 1">
                    <div class="coreStrengthCard">
                        <picture>
                            <!-- WebP first -->
                            <source data-srcset="<?= base_url('assets/img/deadline.webp'); ?>" type="image/webp">

                            <!-- PNG fallback -->
                            <img data-src="<?= base_url('noWebpAssets/assets/img/deadline.png'); ?>" 
                                class="lazyload" 
                                alt="Deadline">
                        </picture>

                        <h3>Commitment to deadlines</h3>
                        <p class="pq_p">Consistently meeting projects deadlines, ensuring timely delivery and client
                            satisfaction,
                            while maintaining the highest standards of quality.</p>
                    </div>
                </article>

            </div>
        </div>
    </div>
</div>


<section class="process pt-4 pb-0 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="about-us-title">
                    <h1 class="pq_h1" data-animate="fadeInUp" data-delay=".1" style="text-align:center;">Process</h1>

                    <div class="processMobileScroller pt-4">
                        <div class="wwdContainer">
                            <div class="icons-container">
                                <div class="icon-container">
                                    <!-- <img class="ico understanding" src="<?= base_url() ?>/assets/img/innovative.webp" alt="Image 1" /> -->
                                    <a href="#" class="ico understanding">Understanding</a>

                                </div>

                                <div class="icon-container">
                                    <!-- <img class="ico implementation" src="<?= base_url() ?>/assets/img/planning.webp" alt="Image 3" /> -->

                                    <a href="#" class="ico implementation">Implementation</a>
                                </div>

                                <div class="icon-container">
                                    <!-- <img class="ico testing" src="<?= base_url() ?>/assets/img/testing.webp" alt="Image 4" /> -->

                                    <a href="#" class="ico testing">Testing</a>
                                </div>

                                <div class="icon-container">
                                    <!-- <img class="ico development" src="<?= base_url() ?>/assets/img/app-development.webp" alt="Image 2" /> -->

                                    <a href="#" class="ico development">Development</a>
                                </div>

                                <div class="icon-container">
                                    <!-- <img class="ico promotion" src="<?= base_url() ?>/assets/img/promotion.webp" alt="Image 2" /> -->

                                    <a href="#" class="ico promotion">Promotion</a>
                                </div>

                                <div class="icon-container">
                                    <!-- <img class="ico adaptation" src="<?= base_url() ?>/assets/img/adaptation.webp" alt="Image 4" /> -->

                                    <a href="#" class="ico adaptation">Adaptation</a>
                                </div>
                            </div>

                            <div class="wwdBarContainer">
                                <div class="dots"></div>

                                <div class="wwdBar">
                                    <div class="black"></div>
                                </div>
                            </div>

                            <div class="texts">
                                <div class="text">
                                    Client, Industry, Competitors, Target audience,
                                    Objectives.
                                </div>

                                <div class="text">
                                    GUI design, Navigation structure, Overall design, Database
                                    structure, Development, Coding, Integration, Deployment.
                                </div>

                                <div class="text">
                                    User experience, Browser compatibility, Web standard
                                    compliance, Spelling & grammar, Design consistency,
                                    Functionality.
                                </div>

                                <div class="text">
                                    Demo server, Live server (beta launch), Live server (final
                                    launch), Systems training, Knowledge transfer,
                                    Documentation.
                                </div>

                                <div class="text">
                                    Online marketing strategy, Identifying mediums, Execution
                                    of SEO, Mailing lists, PPC campaigns, Forums, Data mining,
                                    Reporting and analysis.
                                </div>

                                <div class="text">
                                    Internal reviews, Industry reviews, Client feedback, User
                                    feedback, Data analysis, Conclusions, Future strategy.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="container text-center industriesWeServe">
    <h1 class="pq_h1" style="margin-bottom: 30px;" data-aos="fade-up" data-aos-duration="800">
        INDUSTRIES SERVED
        <div style="width: 200px; margin: 10px auto; border-bottom: 2px solid teal;"></div>
    </h1>
    <div class="row">
        <?php
        $industries = [
            "BFSI", "Textiles", "Financial Services", "Logistics", "Media & Entertainment", "Shipping",
            "Human Resource", "Ecommerce", "Gems & Jewelery", "Infrastructure", "Pharmaceutical",
            "Renewable Energy", "Manufacturing", "Healthcare", "FMCG", "Real Estate",
            "Tourism & Hospitality", "Retail", "Oil & Gas", "IT & ITES", "Education & Training"
        ];

        $i = 1;
        foreach ($industries as $industry) {
            // Calculate a delay that resets for each row of 4 items (0, 100, 200, 300, 0, 100...)
            // This creates a pleasant cascading "wave" effect as you scroll.
            $delay = (($i - 1) % 4) * 100;
            ?>
            
            <div class="col-xs-12 col-sm-4 col-md-3" 
                 style="margin-bottom: 30px;" 
                 data-aos="fade-up" 
                 data-aos-delay="<?= $delay ?>" 
                 data-aos-duration="600">

                <picture>
                    <source data-srcset="<?= base_url('assets/img/' . $i . '.webp'); ?>" type="image/webp">

                    <img data-src="<?= base_url('noWebpAssets/assets/img/' . $i . '.png'); ?>" 
                         class="lazyload" 
                         alt="<?= $industry ?>" 
                         style="height: 30px; margin-bottom: 10px;">
                </picture>
                <p style="font-size:1.5rem;"><?= $industry ?></p>
            </div>
            
            <?php $i++;
        } ?>
    </div>
</div>




<section class="section-services">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="header-section" data-aos="fade-up" data-aos-duration="800">
                    <h1 class="title pq_h1">Exclusive <span>Services We Provide</span></h1>
                    <p class="description">We offer a wide range of tailored IT solutions designed to streamline
                        operations, enhance efficiency, and drive digital transformation across industries.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-delay="100" data-aos-duration="600">
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

            <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-delay="200" data-aos-duration="600">
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

            <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-delay="300" data-aos-duration="600">
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

            <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-delay="100" data-aos-duration="600">
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

            <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-delay="200" data-aos-duration="600">
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

            <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-delay="300" data-aos-duration="600">
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

            <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-delay="100" data-aos-duration="600">
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

            <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-delay="200" data-aos-duration="600">
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

            <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-delay="300" data-aos-duration="600">
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

            <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-delay="100" data-aos-duration="600">
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

            <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-delay="200" data-aos-duration="600">
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

            <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-delay="300" data-aos-duration="600">
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

            <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-delay="100" data-aos-duration="600">
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

            <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-delay="200" data-aos-duration="600">
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

            <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-delay="300" data-aos-duration="600">
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
            </div>
    </div>
</section>
<!--welcome positive code end here  -->

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
                    <picture>
                        <!-- WebP first -->
                        <source data-srcset="<?php echo base_url('assets/img/our_team.webp'); ?>" type="image/webp">

                        <!-- JPG fallback -->
                        <img data-src="<?php echo base_url('noWebpAssets/assets/img/our_team.jpg'); ?>" 
                            alt="Positive Quadrant" 
                            class="img-responsive lazyload">
                    </picture>
                </div>
            </div>
        </div>
    </section>

    <section class="team text-center">
        <div class="container">
            <h2 class="pq_h1">
                Our Team
            </h2>
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
                                    <?php if (!empty($member['googleplus'])): ?>
                                        <li><a href="<?= htmlspecialchars($member['googleplus']) ?>"><i
                                                    class="fab fa-google-plus"></i></a></li>
                                    <?php endif; ?>
                                    <?php if (!empty($member['twitter'])): ?>
                                        <li><a href="<?= htmlspecialchars($member['twitter']) ?>"><i class="fab fa-twitter"></i></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($member['linkedinurl'])): ?>
                                        <li><a href="<?= htmlspecialchars($member['linkedinurl']) ?>"><i
                                                    class="fab fa-linkedin"></i></a></li>
                                    <?php endif; ?>
                                    <?php if (!empty($member['pinterest'])): ?>
                                        <li><a href="<?= htmlspecialchars($member['pinterest']) ?>"><i
                                                    class="fab fa-pinterest-p"></i></a></li>
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


<!--some important facts code start here  -->
<div class="main-important-facts section-mt-mb">
    <div class="fact_head">
        <h1 class="pq_h1">SOME IMPORTANT FACTS</h1>
    </div>
    <div class="container">
        <div class="row facts_auto wow fadeinRight" data-wow-delay="0.3s">
            <div class="col-md-4">
                <div class="fact-card">
                    <div class="row">
                        <div class="col-md-4 col-sm-3">
                            <picture>
                                <!-- WebP first -->
                                <source data-srcset="<?php echo base_url('assets/new_img/developers.webp'); ?>" type="image/webp">

                                <!-- PNG fallback -->
                                <img data-src="<?php echo base_url('noWebpAssets/assets/new_img/developers.png'); ?>" 
                                    class="lazyload" 
                                    alt="Developers">
                            </picture>

                        </div>
                        <div class="col-md-8 col-sm-9">
                            <h3>Development Team</h3>
                        </div>
                    </div>
                    <h1><span>250+</span></h1>

                </div>
            </div>
            <div class="col-md-4">
                <div class="fact-card">
                    <div class="row">
                        <div class="col-md-4">
                            <picture>
                                <!-- WebP first -->
                                <source data-srcset="<?php echo base_url('assets/new_img/conversation.webp'); ?>" type="image/webp">

                                <!-- PNG fallback -->
                                <img data-src="<?php echo base_url('noWebpAssets/assets/new_img/conversation.png'); ?>" 
                                    class="lazyload" 
                                    alt="Conversation">
                            </picture>
                        </div>
                        <div class="col-md-8">
                            <h3>Software Consulting</h3>
                        </div>
                    </div>
                    <h1><span>200+</span></h1>

                </div>
            </div>
            <div class="col-md-4">
                <div class="fact-card">
                    <div class="row">
                        <div class="col-md-4">
                            <picture>
                                <!-- WebP first -->
                                <source data-srcset="<?php echo base_url('assets/new_img/app-development.webp'); ?>" type="image/webp">

                                <!-- PNG fallback -->
                                <img data-src="<?php echo base_url('noWebpAssets/assets/new_img/app-development.png'); ?>" 
                                    class="lazyload" 
                                    alt="App Development">
                            </picture>

                        </div>
                        <div class="col-md-8">
                            <h3>Apps Developed</h3>
                        </div>
                    </div>
                    <h1><span>100+</span></h1>

                </div>
            </div>
            <div class="col-md-4">
                <div class="fact-card">
                    <div class="row">
                        <div class="col-md-4">
                            <picture>
                                <!-- WebP first -->
                                <source data-srcset="<?php echo base_url('assets/new_img/developer.webp'); ?>" type="image/webp">

                                <!-- PNG fallback -->
                                <img data-src="<?php echo base_url('noWebpAssets/assets/new_img/developer.png'); ?>" 
                                    class="lazyload" 
                                    alt="Developer">
                            </picture>
                        </div>
                        <div class="col-md-8">
                            <h3>Placed Students</h3>
                        </div>
                    </div>
                    <h1><span>350+</span></h1>

                </div>
            </div>
            <div class="col-md-4">
                <div class="fact-card">
                    <div class="row">
                        <div class="col-md-4">
                        <picture>
                            <!-- WebP first -->
                            <source data-srcset="<?php echo base_url('assets/new_img/conversation_one.webp'); ?>" type="image/webp">

                            <!-- PNG fallback -->
                            <img data-src="<?php echo base_url('noWebpAssets/assets/new_img/conversation_one.png'); ?>" 
                                class="lazyload" 
                                alt="Conversation One">
                        </picture>
                        </div>
                        <div class="col-md-8">
                            <h3>Clients</h3>
                        </div>
                    </div>
                    <h1><span>50+</span></h1>

                </div>
            </div>
            <div class="col-md-4">
                <div class="fact-card">
                    <div class="row">
                        <div class="col-md-4">
                            <picture>
                                <!-- WebP first -->
                                <source data-srcset="<?php echo base_url('assets/new_img/trustworthiness.webp'); ?>" type="image/webp">

                                <!-- PNG fallback -->
                                <img data-src="<?php echo base_url('noWebpAssets/assets/new_img/trustworthiness.png'); ?>" 
                                    class="lazyload" 
                                    alt="Trustworthiness">
                            </picture>
                        </div>
                        <div class="col-md-8">
                            <h3>Engineering College Tieups</h3>
                        </div>
                    </div>
                    <h1><span>450+</span></h1>

                </div>
            </div>
            <div class="col-md-4">
                <div class="fact-card">
                    <div class="row">
                        <div class="col-md-4">
                            <picture>
                                <!-- WebP first -->
                                <source data-srcset="<?php echo base_url('assets/new_img/soft-skills.webp'); ?>" type="image/webp">

                                <!-- PNG fallback -->
                                <img data-src="<?php echo base_url('noWebpAssets/assets/new_img/soft-skills.png'); ?>" 
                                    class="lazyload" 
                                    alt="Soft Skills">
                            </picture>

                        </div>
                        <div class="col-md-8">
                            <h3>Trained</h3>
                        </div>
                    </div>
                    <h1><span>25000+</span></h1>

                </div>
            </div>

        </div>
    </div>
</div>

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
                <p>Explore a wide range of cutting-edge candidates for
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
                            alt="Partner Image" class="lazyload" />

                    </div>



                <?php endforeach; ?>
            <?php else: ?>
                <p>No partners available.</p>
            <?php endif; ?>
        </div>
    </div>
</div>



<div class="container section-mt-mb">
    <div>
        <h1 class="pq_h1">OUR Clients</h1>
    </div>
    <div class="container">
        <div class="row">
            <?php if (!empty($clients)): ?>
                <div class="client-slider-wrapper">
                    <?php foreach ($clients as $client): ?>
                        <div class="client-item">
                            <div class="client-card client-images">
                                <img data-src="<?php echo base_url('./admin/uploads/client/') . $client['client_image']; ?>"
                                    alt="Client Image" class="lazyload" />

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>No client available.</p>
            <?php endif; ?>
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





<script>
    function wwdStart(t) {

        var e = parseInt($(".wwdContainer .wwdBar").width(), 20),
            a = 10 * e;
        wwdFullT = a;
        var n = 1 == t ? 4e3 : 0;
        (n = 0),
            $(".wwdContainer .dot")
                .removeClass("showed")
                .addClass("notShowed")
                .find(".black")
                .delay(n)
                .animate(
                    {
                        opacity: 0,
                    },
                    200,
                    function () {
                        $(this).css({
                            width: 0,
                            opacity: 1,
                        });
                    }
                );
        var i = 200;
        $(".wwdContainer").hasClass("r320")
            ? ((i = 800),
                $(".wwdContainer table").animate(
                    {
                        marginLeft: "-50px",
                    },
                    i
                ))
            : $(".wwdContainer table").css({
                marginLeft: "0px",
            }),
            $(".wwdContainer .wwdBar .black")
                .stop(!0, !0, !1)
                .delay(n)
                .animate(
                    {
                        height: 0,
                    },
                    i,
                    function () {
                        $.when(showDot($(".dot.notShowed:eq(0)"))).done(function () {
                            $(".wwdContainer .wwdBar .black").css({
                                height: "4px",
                                width: "0px",
                            }),
                                animateWWDblackBar(a);
                        });
                    }
                );
    }

    function animateWWDblackBar(t, e) {
        e || (e = "100%");
        var a = $(".wwdContainer .ico").length;
        $(".wwdContainer .wwdBar .black")
            .stop(!0, !1)
            .animate(
                {
                    width: e,
                },
                {
                    duration: t,
                    easing: "linear",
                    progress: function (t, e, a) {
                        wwdLeftTime = a;
                        var n = t.tweens[0].now,
                            i = parseInt($(".wwdContainer .wwdBar").css("width"), 10),
                            o = (i / 100) * n;
                        "hidden" == $("section.process").css("overflow")
                            ? $(".processMobileScroller").css({
                                marginLeft: -o + "px",
                            })
                            : $(".processMobileScroller").css({
                                marginLeft: "0px",
                            });
                        var r = $(".dot.notShowed").filter(function () {
                            return parseInt($(this).attr("data-pxl"), 10) <= o;
                        });
                        r.length && showDot(r);
                    },
                    complete: function () {
                        restart = setTimeout(function () {
                            wwdStart(!0);
                        }, wwdFullT / a);
                    },
                }
            );
    }

    function forceDot(t) {
        OBJ = $(".dot:eq(" + t + ")");
        var e = OBJ.attr("data-pxl");
        $(".wwdContainer .wwdBar .black").stop(!0, !1),
            restart && clearTimeout(restart),
            $(".wwdContainer .wwdBar .black").animate(
                {
                    width: e + "px",
                },
                {
                    duration: 400,
                    easing: "linear",
                    progress: function (t, e, a) {
                        var n = parseInt(t.tweens[0].now, 10);
                        "hidden" == $("section.process").css("overflow")
                            ? $(".processMobileScroller").css({
                                marginLeft: -n + "px",
                            })
                            : $(".processMobileScroller").css({
                                marginLeft: "0px",
                            });
                        var i = $(".dot.notShowed").filter(function () {
                            return parseInt($(this).attr("data-pxl"), 10) <= n;
                        });
                        i.length && showDot(i);
                        var i = $(".dot.showed").filter(function () {
                            return parseInt($(this).attr("data-pxl"), 10) + 8 >= n;
                        });
                        i.length && hideDot(i);
                    },
                    complete: function () {
                        var t = $(".dot.showed").filter(function () {
                            return parseInt($(this).attr("data-pxl"), 10) + 8 >= e;
                        });
                        t.length && hideDot(t);
                        var a =
                            100 /
                            (parseInt($(".wwdContainer .wwdBarContainer").width(), 10) / e),
                            n = wwdFullT - (wwdFullT / 100) * a;
                        animateWWDblackBar(n);
                    },
                }
            );
    }

    function hideDot(t) {
        var e = t.prevAll(".dot").length;
        t
            .stop(!0, !1)
            .addClass("notShowed")
            .removeClass("showed")
            .find(".black")
            .animate(
                {
                    width: "0px",
                },
                250
            ),
            $(".wwdContainer .ico").eq(e).stop(!0, !1).animate(
                {
                    opacity: 0.4,
                },
                300
            );
    }

    function showDot(t) {
        if ("object" == typeof t) var e = $.Deferred();
        else t = $(".dot:eq(" + t + ")");
        t.addClass("showed")
            .removeClass("notShowed")
            .find(".black")
            .stop(!0, !1)
            .animate(
                {
                    width: "15px",
                },
                250
            );
        var a = t.prevAll(".dot").length;
        return (
            $(".wwdContainer .ico").eq(a).stop(!0, !1).animate(
                {
                    opacity: 1,
                },
                300
            ),
            $(".wwdContainer .ico")
                .not($(".wwdContainer .ico").eq(a))
                .stop(!0, !1)
                .animate(
                    {
                        opacity: 0.4,
                    },
                    300
                ),
            $(".wwdContainer .text").eq(a).stop(!0, !1).delay(300).animate(
                {
                    opacity: 1,
                },
                300
            ),
            $(".wwdContainer .text")
                .not($(".wwdContainer .text").eq(a))
                .stop(!0, !1)
                .animate(
                    {
                        opacity: 0,
                    },
                    300
                ),
            e ? (setTimeout(e.resolve, 150), e.promise()) : void 0
        );
    }

    function updateWWDDots() {
        $(".wwdContainer .ico").each(function (t) {
            var e = (100 * t) / ($(".wwdContainer .ico").length - 1),
                a = $(".wwdContainer .wwdBarContainer .dots .dot:eq(" + t + ")"),
                n = parseInt($(".wwdContainer .wwdBar").css("width"), 10),
                i = (n / 100) * e;
            a.attr("data-pxl", i - 8);
        });
    }

    function homeResized() {
        if ("hidden" == $("section.process").css("overflow")) {
            var t = $(window).width();
            $(".wwdContainer").css({
                marginLeft: (t - 100) / 2 + "px",
            });
        } else
            $(".wwdContainer").css({
                marginLeft: "0px",
            });
        updateWWDDots();
    }
    $(document).ready(function () {
        $(".wwdContainer .text").css({
            opacity: 0,
            display: "block",
        }),
            $(".wwdContainer .ico").each(function (t) {
                t > 0 &&
                    $(this).css({
                        opacity: 0.4,
                    }),
                    $(this).attr("href", "javascript:forceDot(" + t + ");");
                var e = (100 * t) / ($(".wwdContainer .ico").length - 1),
                    a = $(
                        "<div class='dot'><div class='white'></div><div class='black'></div></div>"
                    );
                a.css({
                    left: e + "%",
                });
                var n = parseInt($(".wwdContainer .wwdBar").css("width"), 10),
                    i = (n / 100) * e;
                a.attr("data-pxl", i - 8),
                    a.appendTo(".wwdContainer .wwdBarContainer .dots");
            }),
            wwdStart(!0),
            $(window).resize(homeResized),
            homeResized();
    });
    var wwdFullT = 0,
        restart = null,
        wwdLeftTime = 0;

</script>


<!-- code to refer to goalAndVision div -->


<script>
    function scrollToGoalAndVision() {
        // console.log("Goal and vision");

        const goalAndVisionSection = document.querySelector('.goalAndVision'); // get the first element with this class
        // console.log(goalAndVisionSection);

        if (goalAndVisionSection) {
            goalAndVisionSection.scrollIntoView({ behavior: 'smooth' });
        }
    }
</script>



<!-- animation for industries we work -->
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




<!--some important facts code end here  -->

<!--our partner code start here  -->

<!--our partner code end here  -->