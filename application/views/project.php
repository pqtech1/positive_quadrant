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
        border-bottom-right-radius: 10%;
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
    /* background-attachment: fixed; */
}
    .nav-tabs {
    justify-content: center !important; /* center all li elements */
    /* background-color: red; */
    padding: 1rem 0;
    /* border-radius: 50%; */
}

/* Style the links */
.nav-tabs li a {
    background-color: black;  /* black background */
    color: white;             /* white text */
    border-radius: 20px;      /* rounded corners */
    padding: 10px 20px;       /* some padding */
    margin: 0 5px;            /* spacing between tabs */
    transition: all 0.3s ease; /* smooth hover effect */
}

/* Hover effect */
.nav-tabs li a:hover {
    background-color: #333; /* slightly lighter on hover */
    text-decoration: none;
}

/* Active tab style */
.nav-tabs li.active a {
    background-color: #555; /* different shade for active tab */
    color: white;
}
     


  /* Swiper Container */
  .swiper {
    width: 100%;
    height: 280px;
    position: relative;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    margin-bottom: 0;
  }

  .swiper-wrapper {
    transition-timing-function: ease-in-out;
  }

  .swiper-slide {
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
    opacity: 0;
    transition: opacity 0.8s ease-in-out;
  }

  .swiper-slide-active {
    opacity: 1;
  }

  .swiper-slide::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(180deg, transparent 0%, rgba(0,0,0,0.3) 100%);
    opacity: 0;
    transition: opacity 0.3s;
    z-index: 1;
  }

  .swiper-slide:hover::before {
    opacity: 1;
  }

  .swiper-slide img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    cursor: pointer;
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
  }

  .swiper-slide:hover img {
    transform: scale(1.08);
  }

  /* Progress Bar Indicator */
  .swiper-pagination-progressbar {
    background: rgba(255,255,255,0.3);
    height: 4px;
    bottom: 0;
    top: auto;
  }

  .swiper-pagination-progressbar-fill {
    background: linear-gradient(90deg, #667eea, #764ba2);
    box-shadow: 0 0 10px rgba(102, 126, 234, 0.6);
  }

  /* Modern Card Styles */
.project-card {
    border: none;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    margin-bottom: 30px;
    background-color: #fff;
}

.project-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.2);
}

.project-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.project-card .card-body {
    padding: 15px;
}

.project-card .card-title {
    font-size: 18px;
    font-weight: 600;
    color: #269595; /* Primary color */
    margin-bottom: 10px;
}

.project-card .card-text {
    font-size: 14px;
    color: #333;
    line-height: 1.5;
}

/* Swiper adjustments */
.mySwiper {
    margin-bottom: 15px;
}

    @media (max-width: 767px) {
        .main-heading {
            font-size: 28px;
        }

        .sub-heading {
            font-size: 18px;
        }

        .highlight-box .row {
            display: block;
        }

        .highlight-box .col-xs-8,
        .highlight-box .col-xs-4 {
            width: 100%;
            text-align: center;
            margin-bottom: 15px;
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
                        <a href="#" class="btn-custom">Schedule Free Call →</a>
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



<section class="project-show">

    <div class="container text-center bg-light" style="padding: 50px 0;">
        <h5 style="color: #269595; font-weight: bold; letter-spacing: 1px; margin-bottom: 15px;">
            OUR WORK
        </h5>
        <h1 style="font-weight: 900; line-height: 1.2;">
            Showcasing Our <span style="color: #269595;">Remarkable</span> Client Projects
        </h1>
    </div>

    
    <div class="container">
    <!-- Tabs -->
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#all">All</a></li>
        <?php foreach ($industries as $industry): ?>
            <li><a data-toggle="tab" href="#industry<?= $industry->id; ?>"><?= $industry->name; ?></a></li>
        <?php endforeach; ?>
    </ul>

    <div class="tab-content" style="margin-top:20px;">

        <!-- All Projects -->
        <div id="all" class="tab-pane fade in active">
            <div class="row">
                <?php foreach ($projects as $proj): ?>
                    <div class="col-sm-4">
                        <div class="project-card">
                            <?php if (!empty($proj->images)): ?>
                                <div class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($proj->images as $img): ?>
                                            <div class="swiper-slide">
                                                <a href="<?= base_url('/admin/uploads/projects/' . $img->image_path); ?>" class="glightbox" data-gallery="proj<?= $proj->id; ?>">
                                                    <img src="<?= base_url('/admin/uploads/projects/' . $img->image_path); ?>" alt="<?= $proj->name; ?>">
                                                </a>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            <?php endif; ?>
                            <div class="card-body">
                                <div class="card-title"><?= $proj->name; ?></div>
                                <div class="card-text"><?= $proj->description; ?></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Projects by Industry -->
        <?php foreach ($industries as $industry): ?>
            <div id="industry<?= $industry->id; ?>" class="tab-pane fade">
                <div class="row">
                    <?php if (!empty($industry_projects[$industry->id])): ?>
                        <?php foreach ($industry_projects[$industry->id] as $proj): ?>
                            <div class="col-sm-4">
                                <div class="project-card">
                                    <?php if (!empty($proj->images)): ?>
                                        <div class="swiper mySwiper">
                                            <div class="swiper-wrapper">
                                                <?php foreach ($proj->images as $img): ?>
                                                    <div class="swiper-slide">
                                                        <a href="<?= base_url('/admin/uploads/projects/' . $img->image_name); ?>" class="glightbox" data-gallery="proj<?= $proj->id; ?>">
                                                            <img src="<?= base_url('/admin/uploads/projects/' . $img->image_name); ?>" alt="<?= $proj->name; ?>">
                                                        </a>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <div class="card-title"><?= $proj->name; ?></div>
                                        <div class="card-text"><?= $proj->description; ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-sm-12">
                            <p>No projects available for <?= $industry->name; ?>.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
    </div>
</section>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  // Init all Swipers with smooth fade effect
  var swipers = document.querySelectorAll('.mySwiper');
  swipers.forEach(function(el){
    new Swiper(el, {
      loop: true,
      effect: 'fade',
      fadeEffect: {
        crossFade: true
      },
      autoplay: { 
        delay: 3500, 
        disableOnInteraction: false 
      },
      speed: 800,
      pagination: {
        el: el.querySelector('.swiper-pagination'),
        type: 'progressbar',
      }
    });
  });

  // Init GLightbox
  const lightbox = GLightbox({
    selector: '.glightbox',
    touchNavigation: true,
    loop: true,
    autoplayVideos: true,
  });
</script>