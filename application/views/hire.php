<style>
    button[type="submit"] {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 120px;
        /* Fixed width to prevent shifting */
        height: 40px;
        /* Fixed height */
        font-size: 16px;
    }

    .loader {
        width: 16px;
        height: 16px;
        border: 2px solid white;
        border-radius: 50%;
        border-top-color: transparent;
        animation: spin 0.6s linear infinite;
        display: inline-block;
    }

    .hidden {
        visibility: hidden;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<br/>
<?php if (!empty($hire_details)): ?>

    <div class="hireParentContainer"
        style="background-image: url('<?php echo base_url('admin/uploads/tech_banner_img/' . $hire_details['banner_img']); ?>');">
        <h3>HIRE A DEVELOPER</h3>
        <h1>Hire
            <?php echo $hire_details['tech_name']; ?>
        </h1>
        <p><?php echo $hire_details['tech_main_desc']; ?></p>
        <div class="detailsContainer">
            <div class="left">
                <h2>
                    <span>
                        <i class="ri-time-line"></i>
                    </span>1 HOUR ON-DEMAND SOFTWARE EXPERT
                </h2>
                <h2>
                    <span>
                        <i class="ri-calendar-line"></i>
                    </span>FAST ONBOARD, ONLY IF SATISFIED
                </h2>

            </div>

            <div class="right">
                <h2>
                    <span>
                        <i class="ri-timer-flash-fill"></i>
                    </span>1 WEEK RISK-FREE TRIALS
                </h2>
                <h2>
                    <span>
                        <i class="ri-time-line"></i>
                    </span>SAVE 40% ON DEVELOPMENT COST & TIME
                </h2>

            </div>


        </div>
        <button>Hire
            <?php echo $hire_details['tech_name']; ?>
            Now</button>
    </div>

    <div class="clientReview">

        <div class="rating">
            <img src="<?= base_url() ?>/assets/img/review.gif" alt="Clutch Logo">
            <!-- <span class="stars">★★★★★</span>
                <span class="reviews">31 Reviews</span> -->
        </div>
        <div class="statData">
            <div class="statDataLeft">
                <div class="stat">
                    <span class="number">8+</span>
                    <span class="label">Years</span>
                </div>
                <div class="stat">
                    <span class="number">60+</span>
                    <span class="label">Global Clients</span>
                </div>
            </div>
            <div class="statDataRight">
                <div class="stat">
                    <span class="number">1000+</span>
                    <span class="label">Projects</span>
                </div>
                <div class="stat">
                    <span class="number">200+</span>
                    <span class="label">Strong Developers</span>
                </div>
            </div>
        </div>

    </div>

    <div class="clientsSection">
        <h3>Trusted By</h3>
        <h1>Our Clients</h1>
        <div class="clientsImages">
            <div class="image-container">
                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/new_img/alcon.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/new_img/alcon.png') ?>" alt="Alcon" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/new_img/bank_logo.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/new_img/bank_logo.png') ?>" alt="Bank Logo" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/new_img/canara_logo.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/new_img/canara_logo.jpg') ?>" alt="Canara Logo" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/abbott.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/abbott.png') ?>" alt="Abbott" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/client.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/client.jpeg') ?>" alt="Client" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/client2.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/client2.jpeg') ?>" alt="Client 2" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/crezvatic.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/crezvatic.png') ?>" alt="Crezvatic" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/ebrandz.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/ebrandz.png') ?>" alt="Ebrandz" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/toggle.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/toggle.png') ?>" alt="Toggle" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/sun_pharma.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/sun_pharma.png') ?>" alt="Sun Pharma" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/abbott.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/abbott.png') ?>" alt="Abbott Duplicate" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/flexi-logo.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/flexi-logo.png') ?>" alt="Flexi" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/idolize.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/idolize.jpeg') ?>" alt="Idolize" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/jklogo.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/jklogo.jpg') ?>" alt="JK Logo" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/logo-sbfc.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/logo-sbfc.png') ?>" alt="SBFC Logo" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/ourpartner1.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/ourpartner1.png') ?>" alt="Our Partner" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/pharmasquire_logo.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/pharmasquire_logo.png') ?>" alt="Pharma Squire" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/promethes_logo.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/promethes_logo.png') ?>" alt="Promethes" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/public.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/public.png') ?>" alt="Public" class="lazyload img-responsive">
                </picture>
            </div>


        </div>
    </div>
    <div class="main-section">
        <div class="text-section">
            <h2 class="pq_h2 section-heading pq_left">Hire Dedicated
                <?php echo $hire_details['tech_name']; ?>
            </h2>
            <p class="pq_p section-paragraph"><?php echo $hire_details['tech_sub_desc']; ?></p>
        </div>
        <div class="image-section">

            <img 
  data-src="<?php echo base_url('admin/uploads/tech_main_img/' . $hire_details['tech_main_img']); ?>" 
  alt="<?= htmlspecialchars($hire_details['tech_name'], ENT_QUOTES, 'UTF-8'); ?>" 
  class="section-image lazyload" 
  src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==" 
/>

        </div>
    </div>

    <div class="call_banner">
        <div class="banner-content">
            <h1 class="pq_h1" style="color: white;">Arrange a Call Now & Benefit From a 40-hour Risk-free Trial, With Zero Commitment.</h1>
            <p class="pq_p " style="text-align: center;color:white;">Fast onboarding, guaranteed satisfaction. Explore multiple industry expertise. NDA protected.</p>
            <button class="hire-button">Hire Your
                <?php echo $hire_details['tech_name']; ?>
                Confidently</button>
        </div>
    </div>

    <div class="whyChooseus">
        <h1>Why Every Company Chooses Our Solutions</h1>
        <div class="benefits-container">
            <div class="benefit-section">
                <ul>
                    <li>
                        <span class="checkmark"></span>
                        1 Hour Hiring Developer Policy
                    </li>
                    <li>
                        <span class="checkmark"></span>
                        Zero Developer Backout
                    </li>
                    <li>
                        <span class="checkmark"></span>
                        30+ Technology Expertise
                    </li>
                </ul>
            </div>

            <div class="benefit-section">
                <ul>
                    <li>
                        <span class="checkmark"></span>
                        40 Hours Risk-Free Trial
                    </li>
                    <li>
                        <span class="checkmark"></span>
                        Regular Client Updates
                    </li>
                    <li>
                        <span class="checkmark"></span>
                        Dedicated Project Manager
                    </li>
                </ul>
            </div>

            <div class="benefit-section">
                <ul>
                    <li>
                        <span class="checkmark"></span>
                        Extremely Competitive Costs
                    </li>
                    <li>
                        <span class="checkmark"></span>
                        Flexible Contracts
                    </li>
                    <li>
                        <span class="checkmark"></span>
                        Hassle-Free Design & Development
                    </li>
                </ul>
            </div>
        </div>

    </div>

    <div class="hero">
        <h1 class="pq_h1" style="color: white;">Need Bug-free Software Development? Hire Our Expert
            <?php echo $hire_details['tech_name']; ?>
            and Save 40%
            on Costs.
        </h1>
        <p class="pq_p " style="text-align: center;color:white;">Confidentiality assured through legal agreements. Round-the-clock assistance spanning various time zones.</p>
        <button>Now Let's Talk About Your Project</button>
    </div>


    <div class="features">
        <h1>Technical Expertise of Our
            <?php echo $hire_details['tech_name']; ?>
        </h1>

        <?php if (!empty($tech_details)): ?>
            <?php foreach ($tech_details as $tech): ?>
                <div class="section">
                    <div class="section-header">
                        <!-- <span class="icon">🌟</span> -->
                        <h2><?php echo htmlspecialchars($tech['tech_name']); ?></h2>
                    </div>
                    <ul>
                        <?php foreach ($tech['tech_values'] as $value): ?>
                            <?php if (!empty(trim($value))): // Only display if value is non-empty after trimming ?>
                                <li>
                                    <?php echo htmlspecialchars($value); ?>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- <p>No tech expertise data found for this hire ID.</p> -->
        <?php endif; ?>
    </div>


    <div class="ringPart">
        <h1>Hire a Top
            <?php echo $hire_details['tech_name']; ?>
            in 1 Hour
        </h1>

        <!-- Desktop Image -->
        <picture class="lazyload">
            <!-- WebP version -->
            <source data-srcset="<?= base_url('assets/img/onboarding-infographic-updated-new.webp') ?>" type="image/webp">
            
            <!-- SVG fallback -->
            <img 
                id="desktop-ring-img"
                data-src="<?= base_url('noWebpAssets/assets/img/onboarding-infographic-updated-new.svg') ?>" 
                alt="" 
                class="lazyload" 
                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=="
            />
        </picture>

        <!-- Mobile Image -->
        <picture class="lazyload">
            <source data-srcset="<?= base_url('assets/img/onboardin1hrmobile.webp') ?>" type="image/webp">
            
            <img 
                id="mobile-ring-img"
                data-src="<?= base_url('noWebpAssets/assets/img/onboardin1hrmobile.jpg') ?>" 
                alt="" 
                class="lazyload" 
                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=="
            />
        </picture>


    </div>

   <div class="faq-section">
        <h3>FAQ's</h3>
        <h1>Frequently Asked Questions</h1>
        <div class="faq-item">
            <h3 class="faq-question">
                40 Hours risk-free trials completely free?
                <span class="icon">+</span>
            </h3>
            <p class="faq-answer">
                Our 40-hour risk-free trial period is absolutely free. You can assess the necessary developer throughout
                these 40 hours to determine whether he fits your project requirements well.
            </p>
        </div>
        <div class="faq-item">
            <h3 class="faq-question">
                What is your payment method after Hiring?
                <span class="icon">+</span>
            </h3>
            <p class="faq-answer">
                Once you have hired a developer of your choice you can pay the cost via wire transfer debit or credit
                card.
            </p>
        </div>
        <!-- Add more faq-item sections as needed -->
    </div>


    <div id="contactUs" class="contactUs">
        <div class="left-section">
            <h2>Step Into the Future of Innovative</h2>
            <h1>Software Development &
                <br>
                IT Outsourcing
            </h1>
            <p>Utilize the advanced expertise of Positive Quadrant to confidently develop, implement, test, and maintain
                future-ready software, web, and mobile applications.</p>
            <h3>Join The Elite Force</h3>
            <div class="client-logos">

            <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/new_img/alcon.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/new_img/alcon.png') ?>" alt="Alcon" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/new_img/bank_logo.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/new_img/bank_logo.png') ?>" alt="Bank Logo" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/new_img/canara_logo.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/new_img/canara_logo.jpg') ?>" alt="Canara Logo" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/abbott.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/abbott.png') ?>" alt="Abbott" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/client.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/client.jpeg') ?>" alt="Client" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/client2.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/client2.jpeg') ?>" alt="Client 2" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/crezvatic.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/crezvatic.png') ?>" alt="Crezvatic" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/ebrandz.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/ebrandz.png') ?>" alt="Ebrandz" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/toggle.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/toggle.png') ?>" alt="Toggle" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/sun_pharma.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/sun_pharma.png') ?>" alt="Sun Pharma" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/abbott.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/abbott.png') ?>" alt="Abbott Duplicate" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/flexi-logo.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/flexi-logo.png') ?>" alt="Flexi" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/idolize.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/idolize.jpeg') ?>" alt="Idolize" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/jklogo.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/jklogo.jpg') ?>" alt="JK Logo" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/logo-sbfc.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/logo-sbfc.png') ?>" alt="SBFC Logo" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/ourpartner1.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/ourpartner1.png') ?>" alt="Our Partner" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/pharmasquire_logo.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/pharmasquire_logo.png') ?>" alt="Pharma Squire" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/promethes_logo.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/promethes_logo.png') ?>" alt="Promethes" class="lazyload img-responsive">
                </picture>

                <picture class="lazyload">
                    <source data-srcset="<?= base_url('assets/placement_partner/public.webp') ?>" type="image/webp">
                    <img data-src="<?= base_url('noWebpAssets/assets/placement_partner/public.png') ?>" alt="Public" class="lazyload img-responsive">
                </picture>

            </div>



        </div>

        <!-- Right Section - Consultation Form -->
        <div class="right-section">
            <h3>Schedule a Free Consultation</h3>
            <form action="<?= base_url('Home/saveData') ?>" method="post" class="contact_frm" id="createHireForm">
                <input type="hidden" name="submitted_from" value="<?= current_url() ?>">

                <input type="text" name="website" style="display:none">

                <label for="name">Name *</label>
                <input type="text" name="name" id="name" placeholder="Name" required>


                <label for="email">Company Email *</label>
                <input type="email" name="email" id="email" placeholder="Email" required>


               

            <label for="phone">Phone *</label>
            <input type="number" name="phone" id="phone" placeholder="Phone" required>


            <select name="services" id="services" onchange="change_myselect(this.value)" required>
                <option value="">
                    Select Services
                </option>
                <option value="Development"> Development </option>
                <option value="Consultancy"> Consultancy </option>
                <option value="Training"> Training </option>
                <option value="Manufacturing"> Manufacturing </option>
                <option value="Technology"> Technology </option>
                <option value="Software_Products"> Software Products </option>

                <option value="Other"> Other </option>
            </select>


            <label for="message">Message </label>
            <textarea type="text" placeholder="Message" name="message"></textarea>
            <input type="hidden" name="services2" id="services2" value="">
            <div class="g-recaptcha" data-sitekey="<?= RECAPTCHA_SITE_KEY ?>"></div>           
            <button type="submit">Submit</button>
        </form>
    </div>
</div>


<?php endif; ?>


<script>
    $("#createHireForm").submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        var formData = new FormData(this);
        formData.append('g-recaptcha-response', recaptchaResponse); // ✅ add recaptcha token
        formData.append('<?= $this->security->get_csrf_token_name(); ?>', '<?= $this->security->get_csrf_hash(); ?>');
        var $submitBtn = $("button[type='submit']"); // Select the submit button

        // Store original button text and replace it with a loader
        var originalText = $submitBtn.html();
        $submitBtn.prop("disabled", true).html('<span class="loader"></span><span class="hidden">' + originalText + '</span>');

        $.ajax({
            url: "<?php echo base_url('Home/saveData'); ?>",
            data: formData,
            type: "post",
            processData: false,
            contentType: false,
            dataType: 'json', // Expect JSON response
            success: function (response) {
                // Restore original button text and enable button
                $submitBtn.prop("disabled", false).html(originalText);

                if (response.status === 'success') {
                    $('#createHireForm')[0].reset();
                    toastr.success(response.message); // Show success message
                } else if (response.status === 'error') {
                    toastr.error(response.message); // Show error message
                }
                if (response.csrf_token) {
                    $('input[name="<?= $this->security->get_csrf_token_name(); ?>"]').val(response.csrf_token);
                }
            },
            error: function (xhr, status, error) {
                // Restore original button text and enable button
                $submitBtn.prop("disabled", false).html(originalText);

                // Display error details for debugging
                toastr.error("Unexpected error: " + xhr.responseText);
            }
        });
    });

</script>




<script>
    function redirectToContactUs() { // Scroll to the contactUs section smoothly
        document.getElementById('contactUs').scrollIntoView({ behavior: 'smooth' });
    }

    // Attach click event listeners to all buttons on the page
    document.querySelector('.hireParentContainer button').addEventListener('click', function () {
        redirectToContactUs()
    })

    document.querySelector('.hire-button').addEventListener('click', function () {
        redirectToContactUs()
    })

    document.querySelector('.hero button').addEventListener('click', function () {
        redirectToContactUs()
    })


    document.querySelectorAll(".faq-question").forEach((question) => {
        question.addEventListener("click", () => {
            const faqItem = question.parentElement;
            faqItem.classList.toggle("active");

            // Close other open items (optional)
            document.querySelectorAll(".faq-item").forEach((item) => {
                if (item !== faqItem) {
                    item.classList.remove("active");
                }
            });
        });
    });
</script>