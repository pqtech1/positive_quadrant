<a href="" id="movetop" onclick="toTop()"><img src="<?= base_url() ?>assets/img/arrow_top.png"></a>
<style>
    #movetop {
        position: fixed;
        width: 39px;
        bottom: 1%;
        right: 2px;
    }

    #movetop {
        transition: all 0.5s ease 0s;
        -moz-transition: all 0.5s ease 0s;
        -webkit-transition: all 0.5s ease 0s;
        -o-transition: all 0.5s ease 0s;
        opacity: 0.8;
        display: none;
        cursor: pointer;
    }

    #movetop:hover {
        opacity: 1;
    }

    @keyframes glowEffectTelephone {
        0% {
            /* background: #ff284d; */
            box-shadow: 0 0 6px green;
        }

        50% {
            /* background: pink; */
            /* Glow effect gets stronger */
            box-shadow: 0 0 15px green;
        }

        100% {
            /* background: #ff284d; */
            box-shadow: 0 0 6px green;
        }
    }
    @keyframes glowEffectWhatsapp {
        0% {
            background: #00d757;
        }

        50% {
            background:rgb(2, 134, 55);
        }

        100% {
            background: #00d757;
        }
    }


    .telephone {
        position: fixed;
        top: 45%;
        /* Adjust as needed */
        right: 2px;
        width: 50px;
        height: 50px;
        /* aspect-ratio: 3/2; */
        height: auto;
        /*border: solid 2px green;*/
        border-radius: 50%;

        animation: glowEffectTelephone 1.5s ease-in-out infinite alternate;
        /* Animation */
        z-index: 9999999999;


    }

    .whatsapp {
        position: fixed;
        top: 60%;
        width: 50px;
        height: 50px;

        right: 2px;
        background-color: #25d366;
        color: #fff;
        border-radius: 50px;
        text-align: center;
        font-size: 20px;
        z-index: 9999999999;
        animation: glowEffectWhatsapp 1.5s ease-in-out infinite alternate;
        /* Animation */

    }


    .whatsapp:hover {
        color: #fff;
    }

    .my-float {
        margin-top: 16px;
    }

    .tidio-5hhiig {
        display: none !important;
    }

    .awesome-iframe .widget-position-right.bubbleWithLabel .widgetLabel {
        display: none !important;
    }
</style>

<script>
    $(document).ready(function () {
        $("#movetop").hide();
        $(function toTop() {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('#movetop').fadeIn();
                } else {
                    $('#movetop').fadeOut();
                }
            });

            $('#movetop').click(function () {
                $('body,html').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
        });

    });
</script>
<div class="footer" style="visibility: visible; animation-name: fadeInUp;">
    <div class="container">
        <div class="row footerInfo">
            <a href="tel:917219623991" target="_blank">
                <img class="telephone" src="<?= base_url() ?>/assets/img/phone.webp">
            </a>
            <a href="https://api.whatsapp.com/send?phone=917219623991" class="whatsapp" target="_blank">
                <i class="fa fa-whatsapp my-float"></i>
            </a>
        </div>
    </div>
</div>


<div class="positiveFooter">
    <div class="footerLeft">
        <img src="<?= base_url() ?>/assets/img/new_logo.webp">
        <!-- <h3>Positive quadrant</h3> -->
        <p>At Positive Quadrant Technologies we are a IT Company which brings and develops the best software
            development,digital services for clients ranging from reale-state,pharmaceuticals,banking
            &finance,ecommerce ,industrial solutions,public sectors & government at the best prices.
            .</p>
    </div>
    <div class="footerRight">
        <div class="footerRightLeft">
            <div class="footer_quick_links">
                <h3>Quick Links</h3>
                <a href="<?= base_url() ?>">Home</a>
                <a href="<?= base_url() ?>about-us">About</a>
                <!-- <a href="<?php echo base_url() ?>android-app-development-&-web-development">Services</a> -->
                <a href="<?php echo base_url(); ?>careers" class="" id="career">Careers</a>
                <a href="<?php echo base_url(); ?>contact-us">Contact Us</a>
            </div>
        </div>
        <div class="footerRightMiddle">
            <div class="footer_quick_links">
                <h3>Our Services</h3>

                <a href="<?php echo base_url() ?>it-development">Technology</a>
                <a href="<?php echo base_url() ?>it-training-and-placement">Trainings</a>
                <a href="<?php echo base_url() ?>software-products">Software Products</a>
                <a href="<?php echo base_url() ?>it-consultancy">Industries</a>
            </div>
        </div>
        <div class="footerRightRight">
            <div class="footer_quick_links">
                <h3>Contact Us</h3>
                <div class="address">
                    <ul class="list-unstyled">
                        <li>

                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <a href="tel:7219623991">
                                <span>
                                    7219623991
                                </span>
                            </a>


                        </li>
                        <li>

                            <i class="fa fa-envelope" aria-hidden="true"></i>

                            <a href="mailto:info@positivequadrant.in">
                                <span>
                                    info@positivequadrant.in
                                </span>
                            </a>


                        </li>
                        <li>

                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span style="color: white;">
                                Ambernath West , Thane–421501
                            </span>


                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="copy_right text-center">
    <div class="container">
        <p>©
            2016
            Positive Quadrant Technologie LLP.
        </p>
    </div>
</div>

<!--link of the chatbot-->
<!--<script src="//code.tidio.co/wufsp5j7yklsazepemx6tfch1zjhv5rw.js" async></script>-->
<!--link of the chatbot-->



<script>
    particlesJS("inner_main_header", {
        "particles": {
            "number": {
                "value": 80,
                "density": {
                    "enable": true,
                    "value_area": 800
                }
            },
            "color": {
                "value": "#ffffff" // Particle color
            },
            "shape": {
                "type": "circle",
                "stroke": {
                    "width": 0,
                    "color": "#000000"
                },
                "polygon": {
                    "nb_sides": 5
                }
            },
            "opacity": {
                "value": 0.5,
                "random": false,
                "anim": {
                    "enable": false,
                    "speed": 1,
                    "opacity_min": 0.1,
                    "sync": false
                }
            },
            "size": {
                "value": 3,
                "random": true,
                "anim": {
                    "enable": false,
                    "speed": 40,
                    "size_min": 0.1,
                    "sync": false
                }
            },
            "line_linked": {
                "enable": true,
                "distance": 150,
                "color": "#ffffff",
                "opacity": 0.4,
                "width": 1
            },
            "move": {
                "enable": true,
                "speed": 6,
                "direction": "none",
                "random": false,
                "straight": false,
                "out_mode": "out",
                "bounce": false,
                "attract": {
                    "enable": false,
                    "rotateX": 600,
                    "rotateY": 1200
                }
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "repulse"
                },
                "onclick": {
                    "enable": true,
                    "mode": "push"
                },
                "resize": true
            },
            "modes": {
                "grab": {
                    "distance": 400,
                    "line_linked": {
                        "opacity": 1
                    }
                },
                "bubble": {
                    "distance": 400,
                    "size": 40,
                    "duration": 2,
                    "opacity": 8,
                    "speed": 3
                },
                "repulse": {
                    "distance": 100,
                    "duration": 0.4
                },
                "push": {
                    "particles_nb": 4
                },
                "remove": {
                    "particles_nb": 2
                }
            }
        },
        "retina_detect": true
    });
</script>
</body>

</html>