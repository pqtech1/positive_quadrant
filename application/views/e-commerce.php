<style>
    .e-commerce-container {
        background-color: aliceblue;
        padding: 2rem 0rem;
    }

    .e-commerce-tabs {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;



        padding: 0 !important;
        margin: 0 !important;
    }

    .e-commerce-tabs li {
        list-style: none;


    }

    .e-commerce-tabs a {
        padding: 1rem;
    }

    .e-commerce-tabs a:hover {
        /* border: solid 1px gainsboro; */
        background-color: unset;
    }

    .nav-tabs {
        border-bottom: none;
    }

    .tab-content {
        padding: 2rem 1rem;
    }
    
</style>
<div class="inner_main_header" id="inner_main_header">
    <div class="container">
        <h3>E COMMERCE WEBSITE DEVELOPMENT</h3>
    </div>
</div>

<div class="container">
    <div class="row machine-learning-top">
        <div class="col-md-6 wow fadeInLeft" data-wow-delay="0.2s">
            <div>
                <div>
                    <h1 class="pq_h1"><strong>E-Commerce Website Development</strong></h1>
                </div>
                <div class="panel-body">
                    <p class="pq_p">
                        Build a powerful and scalable online store tailored to your business needs.
                        At <strong>Positive Quadrant</strong>, we craft high-performance e-commerce platforms
                        focused on exceptional UI/UX and seamless shopping experiences to help you convert more visitors
                        into customers.
                    </p>

                    <ul class="list-unstyled">
                        <li><i class="glyphicon glyphicon-ok text-success"></i> Mobile-optimized, responsive design</li>
                        <li><i class="glyphicon glyphicon-lock text-success"></i> Secure payment gateway integration
                        </li>
                        <li><i class="glyphicon glyphicon-tasks text-success"></i> Easy product & inventory management
                        </li>
                        <li><i class="glyphicon glyphicon-search text-success"></i> SEO-friendly site architecture</li>
                        <li><i class="glyphicon glyphicon-resize-full text-success"></i> Scalable solutions for business
                            growth</li>
                        <li><i class="glyphicon glyphicon-transfer text-success"></i> Integration with CRM, ERP,
                            shipping, and marketing tools</li>
                    </ul>

                    <p class="pq_p text-info">
                        Whether you're launching a new online store or revamping an existing one, our expert team is
                        ready to help you
                        <strong>sell smarter and grow faster</strong>.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <picture>
                <!-- WebP first -->
                <source data-srcset="<?php echo base_url('assets/img/ecommerce2.webp'); ?>" type="image/webp">

                <!-- PNG fallback -->
                <img data-src="<?php echo base_url('noWebpAssets/assets/img/ecommerce2.png'); ?>" 
                    alt="E-Commerce" 
                    class="lazyload">
            </picture>



        </div>
    </div>


    <!-- Tabs Navigation -->
    <div class="e-commerce-container">
        <h3 class="text-center"><strong>Choose From a Wide Range of Ecommerce Development Platforms</strong></h3>

        <ul class="nav-tabs e-commerce-tabs">
            <li class="active"><a data-toggle="tab" href="#woo">Woo Commerce</a></li>
            <li><a data-toggle="tab" href="#opencart">Open Cart</a></li>
            <li><a data-toggle="tab" href="#magento">Magento</a></li>
            <li><a data-toggle="tab" href="#shopify">Shopify</a></li>
            <li><a data-toggle="tab" href="#nop">nopCommerce</a></li>
            <li><a data-toggle="tab" href="#os">osCommerce</a></li>
            <li><a data-toggle="tab" href="#xcart">X-cart</a></li>
        </ul>

        <!-- Tabs Content -->
        <div class="tab-content">
            <div id="woo" class="tab-pane fade in active">
                <p class="pq_p">
                    We use WooCommerce to develop an impressive and functional shopping cart where you can sell products
                    in a hassle-free manner.
                    With this platform, you can easily run your business and make shopping a seamless experience for the
                    customers.
                    The ease of access and consumer-friendly interface it offers makes WooCommerce a popular web
                    development tool for online businesses.
                    It also keeps a tab on sales to provide informed decisions about your products.
                </p>
            </div>
            <div id="opencart" class="tab-pane fade">
                <p class="pq_p">
                    OpenCart is a lightweight, open-source e-commerce platform tailored for small to mid-sized
                    businesses looking for simplicity and flexibility. With a user-friendly admin interface, multiple
                    store management, and a wide range of extensions and themes, it’s perfect for merchants who want a
                    cost-effective yet customizable solution without complex technical requirements.
                </p>
            </div>

            <div id="magento" class="tab-pane fade">
                <p class="pq_p">
                    Magento is a feature-rich, enterprise-level e-commerce platform built for scalability and deep
                    customization. Ideal for large businesses and enterprises, Magento supports multi-store
                    functionality, advanced SEO, extensive third-party integrations, and custom modules. It's perfect
                    for brands looking to deliver high-volume, global commerce experiences with complete control over
                    the backend.
                </p>
            </div>

            <div id="shopify" class="tab-pane fade">
                <p class="pq_p">
                    Shopify is a leading cloud-based e-commerce platform known for its ease of use, fast setup, and
                    scalability. It's an excellent choice for entrepreneurs and growing businesses that want a secure,
                    mobile-optimized, and professionally designed online store. With thousands of apps and seamless
                    payment/shipping integration, Shopify simplifies store management while supporting rapid growth.
                </p>
            </div>

            <div id="nop" class="tab-pane fade">
                <p class="pq_p">
                    nopCommerce is a powerful, open-source e-commerce platform built on ASP.NET Core. It’s ideal for
                    businesses that need a stable, customizable, and feature-rich online store with Microsoft technology
                    stack compatibility. nopCommerce supports multi-vendor and multi-store features, advanced product
                    management, and has strong enterprise-level performance and security.
                </p>
            </div>

            <div id="os" class="tab-pane fade">
                <p class="pq_p">
                    osCommerce is one of the original open-source e-commerce platforms, offering a reliable foundation
                    with a vast library of add-ons and a large developer community. While it may require more manual
                    customization, it’s a solid choice for businesses that value flexibility, affordability, and
                    long-term support from a global user base.
                </p>
            </div>

            <div id="xcart" class="tab-pane fade">
                <p class="pq_p">
                    X-Cart is a secure and high-performance e-commerce platform that caters to businesses of all sizes,
                    from startups to enterprises. With built-in support for multi-language, multi-currency, real-time
                    shipping, and advanced SEO features, X-Cart allows for deep customization and scalability, making it
                    a strong option for merchants seeking performance and security.
                </p>
            </div>

        </div>
    </div>

</div>