<div class="inner_main_header" id="inner_main_header">
   <div class="container">
      <h3>Book Free Trial</h3>
   </div>
</div>

<style>
.pq_h2{
    text-align:left;
}


.banner-container {
        display: flex;
        width: 100vw;
        position: relative;
        /*padding: 5rem;*/

        overflow: hidden;
      }

      .image-section {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        position: relative;
        z-index: 2;
        width: 50%;
        /* background: green;  */
      }

      .content-section {
        width: 60%;
        /* background: blue; */
      }

      .notched-container {
        position: relative;
        width: 500px;
        height: 600px;
        /* background: yellow; */
      }

      .notched {
        width: 100%;
        height: 100%;
        position: relative;
        overflow: hidden;
      }

      .notched img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        clip-path: path(
          "M 0 20 C 0 8.954 8.954 0 20 0 L 460 0 C 471.046 0 480 8.954 480 20 L 480 460 C 480 471.046 471.046 480 460 480 L 320 480 C 308.954 480 300 488.954 300 500 L 300 560 C 300 571.046 291.046 580 280 580 L 20 580 C 8.954 580 0 571.046 0 560 L 0 20 Z"
        );
        filter: brightness(1.1) contrast(1.1);
        transition: transform 0.3s ease;
      }

      .notched img:hover {
        transform: scale(1.05);
      }

      .stats-overlay {
        position: absolute;
        top: 10px;
        left: 10px;
        padding: 1rem;
        border-top-left-radius: 20px;
        background-color: white;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        /* border: 1px solid rgba(255, 255, 255, 0.3); */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      }
      .stats-overlay2 {
        position: absolute;
        bottom: 20px;
        right: 20px;
        background: rgb(245, 94, 39);
        padding: 2rem 3rem;
        border-top-left-radius: 20px;
        border-bottom-right-radius: 20px;
      }
      .stats-overlay h3 {
        color: #2bb0ae;
        font-weight: 800;
        font-size: 3rem;
      }
      .stats-overlay2 span {
        font-weight: 800;
        font-size: 3rem;
        color: white;
      }
      .stats-overlay p {
        color: white;
        font-weight: 500;
        font-size: 2rem;
      }
      .stats-overlay2 p {
        color: white;
        font-weight: 500;
        font-size: 2rem;
      }

      .buttons-container {
        display: flex;
        gap: 20px;
      }

      .btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: -0.2rem 0rem 0.8rem 0;
        padding-right: 1.5rem;
        border: none;
        color: white;
        text-decoration: none;
        border-radius: 43px;
        font-weight: 600;
        font-size: 1.3rem;
        transition: transform 0.3s ease;
        position: relative;
        text-transform: uppercase;
      }

      /* First button dark red */
      .btn-primary {
        border-color: #2bb0ae;
        background-color: #2bb0ae; /* Dark red */
      }

      /* Second button dark blue */
      .btn-secondary {
        border-color: rgb(245, 94, 39);
        background-color: rgb(245, 94, 39); /* Dark blue */
      }

      /* Arrow circle */
      .btn::before {
        content: "➔";
        display: flex;
        justify-content: center;
        align-items: center;
        background: black;
        color: white;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        transform: rotate(-20deg);
        transition: transform 0.3s ease;
        font-size: 2rem;
      }

      .btn:hover::before {
        transform: rotate(0deg);
      }

      .btn:hover {
        transform: translateY(-2px);
      }

      .content-section h1 {
        color: #2bb0ae;
        font-size: 4rem;
        font-weight: 700;
      }

      .content-section-div {
        height: 5px;
        background-color: #2bb0ae;
        width: 45%;
        margin-bottom: 1rem;
      }
      .list-container {
        /* max-width: 800px; */
        margin: 0 auto;
      }

      .list-item {
        display: flex;
        align-items: center;
        background: #fff;
        margin-bottom: 5px;
        border-radius: 6px;
        /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05); */
        overflow: hidden;
      }

      .list-icon {
        width: 80px;
        background: #209f9e;
        color: white;
        text-align: center;
        padding: 20px 10px;
        display: flex;
        flex-direction: column;
        justify-content: center;
      }

      .list-icon .number {
        font-size: 18px;
        font-weight: bold;
        border-left:none;
      }

      .list-content {
        flex: 1;
        padding: 8px 15px;
      }

      .list-content p {
        margin: 0;
        font-size: 1.8rem;
        color: black;
        font-weight: 500;
      }

      /* Different color shades for variation */
      .list-item:nth-child(1) .list-icon {
        background: #f57c00;
      }
      .list-item:nth-child(2) .list-icon {
        background: #d32f2f;
      }
      .list-item:nth-child(3) .list-icon {
        background: #512da8;
      }
      .list-item:nth-child(4) .list-icon {
        background: #1976d2;
      }
      .list-item:nth-child(5) .list-icon {
        background: #388e3c;
      }
      .list-item:nth-child(6) .list-icon {
        background: #c2185b;
      }
      .list-item:nth-child(7) .list-icon {
        background: #00796b;
      }
      .list-item:nth-child(8) .list-icon {
        background: #455a64;
      }

      .content-section img {
        position: absolute;
        right: 5%;
        bottom: 10%;
        object-fit: cover;
        opacity: 0.2;
      }

      /* Mobile-first adjustments */
      @media (max-width: 992px) {
        .banner-container {
          flex-direction: column;
          padding: 3rem 1.5rem;
        }

        .image-section,
        .content-section {
          width: 100%;
        }

        .notched-container {
          width: 100%;
          height: auto;
        }

        .notched img {
          clip-path: none; /* Optional fallback for unsupported browsers */
          border-radius: 10px;
          height: auto;
        }

        .stats-overlay,
        .stats-overlay2 {
          font-size: 1rem;
          padding: 0.5rem 1rem;
        }

        .stats-overlay h3 {
          font-size: 3rem;
        }

        .stats-overlay2 span {
          font-size: 3rem;
        }

        .buttons-container {
          flex-direction: column;
          align-items: center;
          margin-top: 20px;
        }

        .btn {
          font-size: 1rem;
          padding: 0.5rem 1rem;
          /* width: 100%; */
          justify-content: center;
        }

        .btn::before {
          width: 50px;
          height: 50px;
          font-size: 1.2rem;
          margin-right: 10px;
        }

        .content-section h1 {
          font-size: 2.5rem;
          text-align: center;
        }

        .content-section-div {
          width: 80%;
          margin: 0 auto 1rem;
        }

        .list-container {
          margin-top: 20px;
        }

        .list-item {
          flex-direction: column;
        }

        .list-icon {
          width: 100%;
          padding: 10px;
        }

        .list-content {
          padding: 10px 15px;
        }

        .list-content p {
          font-size: 1rem;
          text-align: center;
        }

        .content-section img {
          position: static;
          display: block;
          margin: 30px auto 0;
          opacity: 0.2;
          max-width: 100%;
        }
      }

     .impact-section {
      background: linear-gradient(to right, #f8f9fa, #e9f0f7);
      padding: 40px 20px;
      border-radius: 8px;
      overflow: hidden;
    }

    .impact-images {
      position: relative;
      width: 100%;
      margin: auto;
    }

    .impact-images img:first-child {
      width: auto;
      aspect-ratio:3/2;
      border-radius: 8px;
      border-left:solid 6px #1c9d9c;
      border-bottom:solid 6px #1c9d9c;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }

    .impact-images img:last-child {
      position: absolute;
      bottom: -25%;
      right: -10%;
      width: 70%;
     aspect-ratio:auto;
      border: 4px solid white;
      box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    }

    .impact-content h3 {
      font-weight: bold;
      margin-bottom: 20px;
      color: #1e2a38;
    }

    .impact-content ul {
      list-style: none;
      padding-left: 0;
    }

    .impact-content ul li {
      padding-left: 25px;
      position: relative;
      margin-bottom: 10px;
      color: #333;
      font-size: 15px;
    }

    .impact-content ul li:before {
      content: "➡️";
      position: absolute;
      left: 0;
      color: #4CAF50;
      font-weight: bold;
    }

    @media (max-width: 767px) {
      .impact-images {
        margin-bottom: 30px;
      }
    }
    .section-box {
      background: #fff;
      padding: 40px 30px;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.08);
      margin-top: 40px;
    }

  

    .section-content {
      font-size: 16px;
      line-height: 1.8;
      color: #333;
    }

    .section-content .emoji {
      font-size: 18px;
      margin-right: 8px;
    }

    .tech-stack span {
      display: inline-block;
      background: #f1f3f5;
      padding: 8px 12px;
      border-radius: 20px;
      margin: 4px;
      font-size: 14px;
      color: #212529;
      box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }

   .kiara-section {
      background: linear-gradient(to right, #1b1b1b, #2c2c2c);
      color: #f8f8f8;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 25px rgba(0,0,0,0.5);
      margin: 10px 0;
      background:#9d1c1d;
    }

    .kiara-section h3 {
      font-weight: 800;
      font-size: 35px;
    
      color: #ffd700; /* gold */
      text-align:center;
    }

    .kiara-section p.lead {
      font-size: 16px;
      margin-bottom: 20px;
      color: #ddd;
    }

    .kiara-list {
      list-style: none;
      padding: 0;
    }

    .kiara-list li {
      font-size: 15px;
      margin-bottom: 12px;
      padding-left: 30px;
      position: relative;
    }

    .kiara-list li i {
      position: absolute;
      left: 0;
      top: 2px;
      color: #ffd700;
      font-size: 18px;
    }

    .highlight-box {
      background: rgba(255, 215, 0, 0.1);
      border-left: 4px solid #ffd700;
      padding: 20px;
      border-radius: 6px;
    }

    @media(max-width: 767px) {
      .kiara-section {
        text-align: center;
      }

      .kiara-list li {
        padding-left: 0;
      }

      .kiara-list li i {
        position: static;
        margin-right: 10px;
      }
    }

    .form-section {
      background: #f8f9fa;
      padding: 50px 20px;
      margin-top: 50px;
      border-radius: 8px;
    }

    .form-section h4 {
      text-align: center;
      font-size: 22px;
      font-weight: bold;
      margin-bottom: 30px;
      color: #007bff;
    }

    .btn-info {
      font-weight: bold;
      font-size: 16px;
      transition: background 0.3s;
    }

    .btn-info:hover {
      background: #0056b3;
    }

    .trial-section {
    background:black; 
    color: #fff;
    padding: 60px 0;
  }

  .trial-form-container {
    background: #333;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
  }

  .trial-form-container h3 {
    font-weight: bold;
    margin-bottom: 20px;
    color: #f8f9fa;
  }

  .trial-form-container .form-control {
    background: #444;
    border: none;
    color: #fff;
  }

  .trial-form-container .form-control:focus {
    border: none;
    box-shadow: 0 0 5px rgba(0,123,255,0.5);
  }

  .submit-btn {
    background: #007bff;
    border: none;
    color: #fff;
    font-weight: bold;
    padding: 10px 25px;
    border-radius: 4px;
    transition: background 0.3s;
  }

  .submit-btn:hover {
    background: #0056b3;
  }

  .trial-image img {
    width: 100%;
    height:auto;
   
  }

  @media (max-width: 768px) {
    .trial-image {
      margin-top: 30px;
    }
  }
  
  .success-points {
  margin-top: 20px;
  padding-left: 0;
}

.impact-item {
  background-color: #343a40;
  color: #fff;
  padding: 12px 18px;
  margin-bottom: 10px;
  border-radius: 6px;
  font-size: 15px;
  font-weight: 500;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

.kiara-visual {
  width: 100%;
 
}

body{
    overflow-x:hidden;
}

  </style>

<div>

 <!-- Portfolio Highlights -->
<div class="banner-container container">
      <div class="image-section">
        <div class="notched-container">
          <div class="notched">
            <img src="<?php echo base_url(); ?>assets/img/sample3.jpg" alt="Digital Innovation" />
            <div class="stats-overlay">
              <h3>70%</h3>
              <p>Efficiency Boost</p>
            </div>
            <div class="stats-overlay2">
              <p><span>2X</span> Faster</p>
            </div>
          </div>
        </div>

        <div class="buttons-container">
          <a href="#trial-section" class="btn btn-primary">Book Free Trial</a>
          <!-- <a href="#about" class="btn btn-secondary">Our Portfolio</a> -->
        </div>
      </div>

      <div class="content-section">
        <h1>
          <span>Digital</span>
          Excellence
        </h1>
        <div class="content-section-div"></div>
        <div class="list-container">
          <div class="list-item">
            <div class="list-icon">
              <div class="number">01</div>
            </div>
            <div class="list-content">
              <p>Solving industry challenges with digitization & automation.</p>
            </div>
          </div>

          <div class="list-item">
            <div class="list-icon">
              <div class="number">02</div>
            </div>
            <div class="list-content">
              <p>Streamlined workflows & centralized KPI dashboards.</p>
            </div>
          </div>

          <div class="list-item">
            <div class="list-icon">
              <div class="number">03</div>
            </div>
            <div class="list-content">
              <p>ERP, IoT, AI dashboards for intelligent process control.</p>
            </div>
          </div>

          <div class="list-item">
            <div class="list-icon">
              <div class="number">04</div>
            </div>
            <div class="list-content">
              <p>Seamless Azure, OneDrive, SharePoint cloud integration.</p>
            </div>
          </div>

          <div class="list-item">
            <div class="list-icon">
              <div class="number">05</div>
            </div>
            <div class="list-content">
              <p>Barcode-based inventory mapping & precision tracking.</p>
            </div>
          </div>

          <div class="list-item">
            <div class="list-icon">
              <div class="number">06</div>
            </div>
            <div class="list-content">
              <p>EMPEROR compliance with ICEGATE + NSDL protocols.</p>
            </div>
          </div>

          <div class="list-item">
            <div class="list-icon">
              <div class="number">07</div>
            </div>
            <div class="list-content">
              <p>Real-time gold/job tracking with embedded analytics.</p>
            </div>
          </div>

          <div class="list-item">
            <div class="list-icon">
              <div class="number">08</div>
            </div>
            <div class="list-content">
              <p>3D printing & 70% boost in operational efficiency.</p>
            </div>
          </div>
        </div>

        <img src="<?php echo base_url(); ?>assets/img/growth-removebg-preview.png" alt="" />
      </div>
    </div>
<!-- Integrations & Technologies -->
<section style="background:#eef2f5; padding:50px 0;" data-aos="fade-up">
  <div class="container">
    <div class="row section-box">
      <div class="col-sm-8" data-aos="fade-right">
        <div class="pq_h2">🧠 Integrations & Technologies</div>
        <div class="section-content">
          <p><span class="emoji">🔧</span> Autohotkey automation</p>
          <p><span class="emoji">☁️</span> Azure Cloud centralized ops</p>
          <p><span class="emoji">📊</span> Live KPI dashboards</p>
          <p><span class="emoji">🔗</span> EMPEROR + ICEGATE NSDL for compliance</p>
        </div>
      </div>
      <div class="col-sm-4" data-aos="fade-left">
        <div class="pq_h2">💻 Stack</div>
        <div class="tech-stack">
          <span>Python</span>
          <span>Java</span>
          <span>.NET</span>
          <span>VB.NET</span>
          <span>PHP</span>
          <span>Laravel</span>
          <span>CodeIgniter</span>
          <span>Azure</span>
          <span>SQL Server</span>
          <span>PostgreSQL</span>
          <span>MongoDB</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Success Story -->
<div class="container">
  <div class="kiara-section">
    <h3>💎 Kiara Jewelry Pvt. Ltd. — Success Story</h3>
    <p class="lead">
      Empowering craftsmanship with intelligent tech solutions — our client Kiara Jewelry Pvt. Ltd. embraced automation and precision, leading to transformative operational gains:
   
      From legacy manual processes to streamlined automated workflows, Kiara unlocked new levels of efficiency and operational excellence.
   
      Today, their teams operate with confidence, accuracy, and real-time insights driving smarter business decisions every day.
    </p>

    <div class="highlight-box">
      <div class="row">
        <div class="col-sm-6">
          <ul class="kiara-list">
            <li><i class="fa fa-line-chart"></i> 55% fewer production delays</li>
            <li><i class="fa fa-cubes"></i> 70% boost in inventory accuracy</li>
            <li><i class="fa fa-clock-o"></i> Real-time gold/job tracking</li>
            <li><i class="fa fa-barcode"></i> Barcode-based inventory mapping</li>
            <li><i class="fa fa-print"></i> 3D printing and automation for prototyping excellence</li>
          </ul>
        </div>
        <div class="col-sm-6">
          <ul class="kiara-list">
            <li><i class="fa fa-shield"></i> Enhanced data security and compliance standards</li>
            <li><i class="fa fa-cloud"></i> Seamless cloud integration with Azure and SharePoint</li>
            <li><i class="fa fa-tachometer"></i> Faster production cycles with intelligent scheduling</li>
            <li><i class="fa fa-users"></i> Empowered workforce with intuitive digital tools</li>
            <li><i class="fa fa-lightbulb-o"></i> Innovation-driven culture fostering rapid prototyping</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Trial Section -->
<section class="trial-section" id="trial-section" data-aos="fade-up">
  <div class="container">
    <div class="row">
      <!-- Left Side: Image -->
      <div class="col-sm-6 trial-image text-center" data-aos="fade-right">
        <img src="<?php echo base_url(); ?>assets/img/fill-now-min.png" alt="Trial Image">
      </div>
      <!-- Right Side: Form -->
      <div class="col-sm-6" data-aos="fade-left">
        <div class="trial-form-container">
          <h3>Book Your Free Trial</h3>
          <form id="trialForm">
            <input type="text" name="website" style="display: none" />
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">

            <div class="form-group">
              <input type="text" name="name" placeholder="Your Name" required class="form-control" />
            </div>
            <div class="form-group">
              <input type="email" name="email" placeholder="Your Email" required class="form-control" />
            </div>
            <div class="form-group">
              <input type="tel" name="phone" placeholder="Phone Number" required class="form-control" />
            </div>
            <div class="form-group">
              <select name="services" required class="form-control">
                <option value="">Select Services</option>
                <option value="Development">Development</option>
                <option value="Consultancy">Consultancy</option>
                <option value="Training">Training</option>
                <option value="Manufacturing">Manufacturing</option>
                <option value="Technology">Technology</option>
                <option value="Software_Products">Software Products</option>
                <option value="Other">Other</option>
              </select>
            </div>
            <div class="form-group">
              <textarea name="message" placeholder="Tell us about your requirements" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" id="submitTrialBtn" class="submit-btn btn-block">Book Trial</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>



 <script>
  $("#trialForm").submit(function(event){
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // Append CSRF token if using CodeIgniter
    formData.append('<?= $this->security->get_csrf_token_name(); ?>', '<?= $this->security->get_csrf_hash(); ?>');

    var $submitBtn = $("#submitTrialBtn");
    var originalText = $submitBtn.html(); // Store original button text

    // Change button text to "Sending..." and disable it
    $submitBtn.prop("disabled", true).html("Sending...");

    // Create and show loader
    var loader = $('<div>', {
      id: 'ajax-loader',
      text: 'Processing...',
      css: {
        position: 'fixed',
        top: '50%',
        left: '50%',
        transform: 'translate(-50%, -50%)',
        background: 'rgba(0,0,0,0.7)',
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
      url: "https://positivequadrant.in/Home/saveData",
      data: formData,
      type: "POST",
      processData: false,
      contentType: false,
      dataType: 'json',
      success: function(response){
        $('#ajax-loader').remove();
        $submitBtn.prop("disabled", false).html(originalText); // Re-enable button

        if(response.status === 'success'){
          $('#trialForm')[0].reset();
          toastr.success(response.message);
        } else if(response.status === 'error'){
          toastr.error(response.message);
        }

        // Update CSRF token if returned
        if(response.csrf_token){
          $('input[name="<?= $this->security->get_csrf_token_name(); ?>"]').val(response.csrf_token);
        }
      },
      error: function(xhr, status, error){
        $('#ajax-loader').remove();
        $submitBtn.prop("disabled", false).html(originalText); // Re-enable button

        toastr.error("Unexpected error: " + xhr.responseText);
      }
    });
  });
</script>


</div>
