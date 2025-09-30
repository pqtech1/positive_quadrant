<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style type="text/css">
  #services {
    color: #1a9c9b;
  }

  #services.hvr-underline-from-center:before {
    left: 0;
    right: 0;
  }

  .star-rating {
    display: inline-block;
    font-size: 1.2rem;
    /* Adjust star size */
    color: gold;
    /* Color for filled stars */
  }

  /* Full stars */
  .star-rating .fas.fa-star {
    color: #C59E01;
    /* Full star color */
  }

  /* Half stars */
  .star-rating .fas.fa-star-half-alt {
    color: #C59E01;
  }

  /* Empty stars */
  .star-rating .far.fa-star {
    color: gray;
    /* Empty star color */
  }

  .batchname li.active {
    background-color: #ff7043;
    /* Highlight color */
    color: white;
    /* Text color for the highlighted item */
    border-radius: 4px;
    /* Optional */
    font-weight: bold;
    /* Optional */
  }

  .batchname li.active a {
    background-color: #ff7043;
    /* Highlight color */
    color: white;
    /* Text color for the highlighted item */
    border-radius: 4px;
    /* Optional */
    font-weight: bold;
    /* Optional */
  }

  .batchname li.active+i {
    color: #ff7043;
  }
  
     .slider-wrapper {
      overflow: hidden;
      position: relative;
      max-width: 100%;
    }

    .slider-track {
      display: flex;
      transition: transform 0.6s ease;
      will-change: transform;
    }

    .slider-item {
      flex: 0 0 100vw;
      max-width: 100vw;
      padding: 20px;
      box-sizing: border-box;
    }

    .slider-item-inner {
      background: #fff;
      border-radius: 10px;
      padding: 30px 20px;
      text-align: center;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      height: 100%;
    }

    .slider-item img {
      width: 60px;
      margin-bottom: 15px;
    }

    .slider-item h3 {
      font-size: 18px;
      margin-bottom: 10px;
    }

    .slider-item p {
      font-size: 14px;
      color: #555;
    }

    @media (min-width: 992px) {
      .slider-item {
        flex: 0 0 30%;
        max-width: 30%;
      }
    }
</style>

<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

<br/>
<div class="container trainingPageMainContainer">
  <div class="trainingPageMainContainerTop">
    <div class="trainingPageMainContainerTopLeft">
      <h2 class="pq_h2 pq_left">Unlock Your Potential with Our Expert-Led Training Programs</h2>
      <p class="pq_p">At Positive Quadrant Technologies, we believe in empowering professionals with the skills they need to thrive
        in the digital world. Our meticulously designed training programs cover a range of technologies, including MERN
        Stack, MEAN Stack, WordPress, Drupal, PHP, and more, to equip you with the tools and knowledge to succeed.
        Whether you're a beginner aiming to enter the tech industry or an experienced developer looking to upskill, our
        hands-on, industry-relevant courses will guide you through real-world projects and challenges. Join us to take
        your career to the next level with cutting-edge technologies and expert instructors who are committed to your
        success.</p>
    </div>
    <div class="trainingPageMainContainerTopRight">
<img 
  class="lazyload img-responsive" 
  data-src="<?= base_url() ?>/assets/img/trainingimage.png" 
  alt="Training Image" 
/>
    </div>
  </div>
</div>


<div class="container trainingPageMainContainerMiddle">
  <h2>Our Courses</h2>
  <div id="trainingPageParticlejs"></div>
  <div class="trainingAllCoursesContainer">
    <?php foreach ($trainings as $training) {
      // Generate random rating between 4.0 and 4.9
      $rating = round(rand(40, 49) / 10, 1);
      ?>
      <div class="trainingAllCoursesContainerCard">
        <div class="courseImageContainer">
          <img 
  class="lazyload img-responsive" 
  data-src="<?php echo $this->config->item('image_path'); ?>/uploads/courses/<?php echo $training['cimage']; ?>" 
  alt="Course Image" 
/>

        </div>
        <div class="courseDetailContainer">
          <h4><?php echo $training['cname'] ?></h4>
          <h5>
            <?php echo $rating; ?>
            <div class="star-rating">
              <?php
              // Display the stars based on rating
              $fullStars = floor($rating); // Number of full stars
              $halfStar = ($rating - $fullStars >= 0.5) ? true : false; // Check if half star is needed
              for ($i = 0; $i < $fullStars; $i++) {
                echo '<i class="fas fa-star"></i>'; // Full star
              }
              if ($halfStar) {
                echo '<i class="fas fa-star-half-alt"></i>'; // Half star
              }
              for ($i = $fullStars + $halfStar; $i < 5; $i++) {
                echo '<i class="far fa-star"></i>'; // Empty star
              }
              ?>
            </div>
          </h5>
          <h3>Mode: Online/Offline</h3>
          <div class="buttonContainer">
            <?php
            // Replace spaces with hyphens while keeping + and & symbols intact
            $slug = preg_replace('/\s+/', '-', strtolower($training['cname']));
            ?>
            <a href="<?php echo base_url(rawurlencode($slug)); ?>"><button>Explore</button></a>
          </div>

        </div>
      </div>
    <?php } ?>
  </div>
</div>


<div class=" container upcomingBatchParentContainerAndSchedule">
  <h2>Upcoming Batches and Schedule</h2>
  <div class="upcomingBatchNameAndDetail">
    <div class="upcomingBatchName">
      <?php $c = 0;
      foreach ($trainings as $training) {
        $active = ($c == 0) ? '' : ''; ?>
        <div class="batchname">

          <li class="<?php echo $active; ?>"><a data-toggle="tab"
              href="#course<?php echo $training['c_id']; ?>"><?php echo strtoupper($training['cname']); ?></a></li>
          <i class="fas fa-greater-than"></i>
        </div>

        <?php $c++;
      } ?>
    </div>
    <div class="upcomingBatchDetail">
      <div class="tab-content">
        <?php $l = 0;
        foreach ($trainings as $training2) {
          $inactive = ''; ?>
          <div id="course<?php echo $training2['c_id']; ?>" class="tab-pane fade <?php echo $inactive; ?>">
            <h3><?php echo strtoupper(($training2['cname'])); ?></h3>
            <table class="table table-hover">
              <thead>
                <th>Course</th>
                <th>Start Date</th>
                <th>Days</th>
                <th>Timing</th>
                <!-- <th>Batch Type</th> -->
              </thead>
              <tbody>
                <?php $upcoming1 = $this->home->view_syllabus($training2['c_id']);
                foreach ($upcoming1 as $value) { ?>
                  <tr>
                    <td><?php echo $value['sname']; ?></td>
                    <td><?php echo $value['sname']; ?></td>
                    <td><?php echo date('d M Y', strtotime($value['b_date'])); ?></td>
                    <td><?php echo $this->home->getWeekendName($value['b_from'], $value['b_to']) ?>
                    </td>
                    <td>
                      <?php echo date("g:i a", strtotime($value['batch_time_from'])) . ' to ' . date("g:i a", strtotime($value['batch_time_to'])) ?>
                    </td>
                    <!-- <td>
                      <?php echo ($value['batch_type'] == 1) ? 'Training / <a href="javascript:void(0)" class="traningsachview" data-toggle="tooltip" title="View Venue Detail" onclick="openAddress(' . $value['b_id'] . ')">View Details</a>' : 'Workshop <a href="javascript:void(0)" class="traningsachview" data-toggle="tooltip" title="View Venue Detail" onclick="openAddress(' . $value['b_id'] . ')">View Details</a>'; ?>
                    </td> -->
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <?php $l++;
        } ?>
        <div id="courseAll" class="tab-pane fade in active">
          <!-- <h3>ALL COURSES</h3> -->
          <table class="table table-hover">
            <thead>
              <th>Course</th>
              <th>Start Date</th>
              <th>Days</th>
              <th>Timing</th>
              <!-- <th>Batch Type</th> -->
            </thead>
            <tbody>
              <?php $upcoming1 = $this->home->view_syllabus(null);
              foreach ($upcoming1 as $value) { ?>
                <tr>
                  <td><?php echo $value['sname']; ?></td>
                  <td><?php echo date('d M Y', strtotime($value['b_date'])); ?></td>
                  <td><?php echo $this->home->getWeekendName($value['b_from'], $value['b_to']) ?>
                  </td>
                  <td>
                    <?php echo date("g:i a", strtotime($value['batch_time_from'])) . ' to ' . date("g:i a", strtotime($value['batch_time_to'])) ?>
                  </td>
                  <!-- <td>
                    <?php echo ($value['batch_type'] == 1) ? 'Training /<a href="javascript:void(0)" class="traningsachview" data-toggle="tooltip" title="View Venue Detail" onclick="openAddress(' . $value['b_id'] . ')">View Details</a>' : 'Workshop<a href="javascript:void(0)" class="traningsachview" data-toggle="tooltip" title="View Venue Detail" onclick="openAddress(' . $value['b_id'] . ')">View Details</a>'; ?>
                  </td> -->
                  <td></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>






<script>

  document.addEventListener("DOMContentLoaded", function () {
    // Event listener for tab shown event
    $(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
      // Remove active class from all <li> elements
      $('.batchname li').removeClass('active');

      // Add active class to the parent <li> of the clicked <a>
      $(e.target).parent().addClass('active');

      // AJAX call to fetch data
      var target = $(e.target).attr("href");
      var courseId = target.replace('#course', '');

      if (courseId) {
        // Make an AJAX call to fetch data for the selected course
        $.ajax({
          type: 'GET',
          url: '<?php echo base_url('Home/getVenue/') ?>' + courseId,
          dataType: 'json',
          success: function (data) {
            console.log(data);
            if (data['b_venue'] != '') {
              $('.addres').text(data['b_venue']);
            } else {
              $('.addres').text('Venue not given, will update soon');
            }
          },
          error: function (data) {
            console.error('Error fetching venue data', data);
          }
        });
      }
    });
  });




</script>



<script type="text/javascript">



  function openAddress(b_id) {

    $('#myModal').modal('show');


  }

</script>

<!-- why choose it courses code start here -->
<div class="container">
  <h2 class="text-center">Why Choose Us to Learn IT Courses?</h2>
  <div class="slider-wrapper">
    <div class="slider-track" id="slider">

      <!-- Slide 1 -->
      <div class="slider-item">
        <div class="slider-item-inner">
          <img data-src="assets/new_img/learning.png" alt="Industry-Aligned Practical Knowledge" class="lazyload img-responsive">
          <h3>Industry-Aligned Practical Knowledge</h3>
          <p>80% practical & 20% theory to get you job-ready fast.</p>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="slider-item">
        <div class="slider-item-inner">
          <img data-src="assets/new_img/network.png" alt="Real-World Applications" class="lazyload img-responsive">
          <h3>Real-World Applications</h3>
          <p>Skills aligned with real industry problems and roles.</p>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="slider-item">
        <div class="slider-item-inner">
          <img data-src="assets/new_img/soft-skills.png" alt="Placement Assistance" class="lazyload img-responsive">
          <h3>Placement Assistance</h3>
          <p>Ongoing support from our committed placement cell.</p>
        </div>
      </div>

      <!-- Slide 4 -->
      <div class="slider-item">
        <div class="slider-item-inner">
          <img data-src="assets/new_img/career-development.png" alt="Tailored Guidance" class="lazyload img-responsive">
          <h3>Tailored Guidance</h3>
          <p>Dedicated career coach throughout your learning journey.</p>
        </div>
      </div>

      <!-- Slide 5 -->
      <div class="slider-item">
        <div class="slider-item-inner">
          <img data-src="assets/new_img/route.png" alt="Career Roadmap" class="lazyload img-responsive">
          <h3>Career Roadmap</h3>
          <p>Guided path to upskilling and achieving career goals.</p>
        </div>
      </div>

      <!-- Slide 6 -->
      <div class="slider-item">
        <div class="slider-item-inner">
          <img data-src="assets/new_img/flexible.png" alt="Flexible Learning" class="lazyload img-responsive">
          <h3>Flexible Learning</h3>
          <p>Access course materials anytime, from any device.</p>
        </div>
      </div>

    </div>
  </div>
</div>


<!-- why choose it courses code end here -->


<!-- JavaScript -->
<script>
  const slider = document.getElementById('slider');
  let isPaused = false;
  let slideIndex = 0;
  const speed = 3000;

  function cloneSlides() {
    const items = [...slider.children];
    items.forEach(item => {
      const clone = item.cloneNode(true);
      slider.appendChild(clone);
    });
  }

  function moveSlider() {
    if (!isPaused) {
      slideIndex++;
      const itemWidth = slider.children[0].offsetWidth;
      slider.style.transform = `translateX(-${slideIndex * itemWidth}px)`;

      if (slideIndex >= slider.children.length / 2) {
        setTimeout(() => {
          slider.style.transition = 'none';
          slideIndex = 0;
          slider.style.transform = 'translateX(0)';
          setTimeout(() => {
            slider.style.transition = 'transform 0.6s ease';
          }, 50);
        }, 600);
      }
    }
  }

  cloneSlides();
  setInterval(moveSlider, speed);

  slider.addEventListener('mouseenter', () => isPaused = true);
  slider.addEventListener('mouseleave', () => isPaused = false);
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript">
  $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 20,
    nav: true,
    dots: false,
    autoplay: true,
    autoWidth: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    stagePadding: 50,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 3
      },
      1000: {
        items: 5
      }
    }
  })
</script>

<script>
  particlesJS("trainingPageParticlejs", {
    particles: {
      number: {
        value: 80,
        density: {
          enable: true,
          value_area: 800,
        },
      },
      color: {
        value: "#ff5733",
      },
      shape: {
        type: "circle",
        stroke: {
          width: 0,
          color: "#000000",
        },
        polygon: {
          nb_sides: 5,
        },
      },
      opacity: {
        value: 0.5,
        random: false,
      },
      size: {
        value: 3,
        random: true,
      },
      line_linked: {
        enable: true,
        distance: 150,
        color: "#33c3ff",
        opacity: 0.4,
        width: 1,
      },
      move: {
        enable: true,
        speed: 6,
        direction: "none",
      },
    },
    interactivity: {
      detect_on: "canvas",
      events: {
        onhover: {
          enable: true,
          mode: "grab",
        },
        onclick: {
          enable: true,
          mode: "push",
        },
      },
    },
    retina_detect: true,
  });

</script>