<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<style>
    #toast-container {
        position: fixed;
        top: 12px;
        /* Adjust to make it visible below your navbar */
        right: 12px;
        z-index: 9999999999999999;
        /* Highest z-index to prevent hiding */
    }


    #internship-subject {
        background-color: #f0f0f0;

        color: #333;

        font-size: 16px;

        padding: 10px;

        border-radius: 5px;

    }


    #internship-subject option {
        background-color: #ffffff;

        color: #333;

    }


    #internship-subject option:checked {
        background-color: #007bff;

        color: white;

    }

    button[name="submit_btn"] {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100px; /* Set a fixed width to prevent shifting */
    height: 40px; /* Set a fixed height */
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
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

</style>
<section class="shape-bg">
    <div class="container internshipParentContainer">
        <div class="internshipParentContainerLeft">
            <h2 >GET ONLINE INTERNSHIP & PERSONAL TRAINING </h2>
            <p >Our Internship & Training programs aim at sharpening your technical and non-technical concepts with a
                tint of theoretical understanding,
                draped with practical expertise to solve complex problems.</p>
            <ul>
                <div class="internshipDetailsContainer">
                    <li>🏆</li>
                    <li> Build Strong Foundation.</li>
                </div>
                <div class="internshipDetailsContainer">
                    <li>🏆</li>
                    <li> Gain experience with latest technology.</li>

                </div>
                <div class="internshipDetailsContainer">
                    <li>🏆</li>
                    <li> Receive live technical support for online internships.</li>

                </div>
                <div class="internshipDetailsContainer">
                    <li>🏆</li>
                    <li> Receive live technical support for online internships.</li>

                </div>
                <div class="internshipDetailsContainer">
                    <li>🏆</li>
                    <li> Get personalized mentorship throughout your journey.</li>

                </div>
                <div class="internshipDetailsContainer">
                    <li>🏆</li>
                    <li> Collaborate with us on real-world projects.</li>

                </div>
                <div class="internshipDetailsContainer">
                    <li>🏆</li>
                    <li> Access placement support and guidance.</li>

                </div>
                <div class="internshipDetailsContainer">
                    <li>🏆</li>
                    <li> Learn from industry experts and enhance your skills.</li>

                </div>
                <div class="internshipDetailsContainer">
                    <li>🏆</li>
                    <li> Complete a dedicated 3-month internship and training program.</li>

                </div>
                <div class="internshipDetailsContainer">
                    <li>🏆</li>
                    <li> Enjoy the flexibility of both online and offline internship options.</li>

                </div>
                <div class="internshipDetailsContainer">
                    <li>🏆</li>
                    <li> Obtain a certificate and experience letter upon completion.</li>

                </div>

                <!-- <li> Secure a paid internship opportunity.</li> -->

            </ul>
        </div>
        <div class="internshipParentContainerRight">
            <div class="message-box">
                <h6 class="text-white text-capitalize text-center"> <br>Apply for the Program</h6>
                <form id="internship-enquiry-form">
                    <input type="text" name="website" style="display:none">

                    <div class="form-message"></div>
                    <input name="name" placeholder="Enter Name" type="text" required="">
                    <input name="email" placeholder="Enter Email" type="email" required="">
                    <input name="mobile" placeholder="Enter 10 Digit Mobile Number" type="text" required="">
                    <input name="whatsapp" placeholder="Enter 10 Digit Whatsapp Number" type="text" required="">
                    <input name="location" placeholder="Enter City/Location" type="text" required="">
                    <label for="internship-subject">Select Internship Field</label>
                    <select name="Subject" id="internship-subject" required>
                        <option value="" disabled selected>Select an Internship</option>

                        <!-- Tech and Development -->
                        <option value="Full Stack Web Development">Full Stack Web Development</option>
                        <option value="Front-End Web Development">Front-End Web Development</option>
                        <option value="Back-End Web Development">Back-End Web Development</option>
                        <option value="Mobile App Development (Flutter)">Mobile App Development (Flutter)</option>
                        <option value="Android Development">Android Development</option>
                        <option value="iOS Development">iOS Development</option>
                        <option value="Game Development (Unity)">Game Development (Unity)</option>
                        <option value="Game Development (Unreal Engine)">Game Development (Unreal Engine)</option>
                        <option value="Software Engineering">Software Engineering</option>
                        <option value="Artificial Intelligence">Artificial Intelligence</option>
                        <option value="Machine Learning">Machine Learning</option>
                        <option value="Data Science">Data Science</option>
                        <option value="Deep Learning">Deep Learning</option>
                        <option value="Natural Language Processing (NLP)">Natural Language Processing (NLP)</option>
                        <option value="Robotics Engineering">Robotics Engineering</option>
                        <option value="Embedded Systems Development">Embedded Systems Development</option>
                        <option value="Cybersecurity">Cybersecurity</option>
                        <option value="Blockchain Development">Blockchain Development</option>
                        <option value="DevOps Engineering">DevOps Engineering</option>
                        <option value="Cloud Computing (AWS/Azure/GCP)">Cloud Computing (AWS/Azure/GCP)</option>
                        <option value="Virtualization and Containerization">Virtualization and Containerization</option>
                        <option value="IoT (Internet of Things)">IoT (Internet of Things)</option>
                        <option value="Database Administration">Database Administration</option>
                        <option value="Big Data Engineering">Big Data Engineering</option>
                        <option value="AI Chatbot Development">AI Chatbot Development</option>

                        <!-- Design -->
                        <option value="UI/UX Design">UI/UX Design</option>
                        <option value="Graphic Design">Graphic Design</option>
                        <option value="Web Design">Web Design</option>
                        <option value="Product Design">Product Design</option>
                        <option value="Interaction Design">Interaction Design</option>
                        <option value="Motion Graphics Design">Motion Graphics Design</option>

                        <!-- Marketing -->
                        <option value="Digital Marketing">Digital Marketing</option>
                        <option value="Social Media Marketing">Social Media Marketing</option>
                        <option value="Content Marketing">Content Marketing</option>
                        <option value="Search Engine Optimization (SEO)">Search Engine Optimization (SEO)</option>
                        <option value="Pay-Per-Click (PPC) Advertising">Pay-Per-Click (PPC) Advertising</option>
                        <option value="Affiliate Marketing">Affiliate Marketing</option>
                        <option value="Email Marketing">Email Marketing</option>

                        <!-- Business & Operations -->
                        <option value="Business Analysis">Business Analysis</option>
                        <option value="Project Management">Project Management</option>
                        <option value="Product Management">Product Management</option>

                    </select>
                    <input name="date" placeholder="Today's Date" type="date" required="">


                    <input type="hidden" id="g-recaptcha-response1" name="g-recaptcha-response">
                    <input type="hidden" name="action" value="validate_captcha1">
                    <button class="rounded text-capitalize" name="submit_btn" type="submit"
                        value="submit">Apply</button>
                </form>
            </div>
        </div>


    </div>


    <!-- <svg preserveaspectratio="none" viewBox="0 0 5417 646">
        <path class="cls-1"
            d="M0,108L2,645H5415l1-177L5177,335,4719,630,3923,214l-164,64-231-60L2538,634,1905,266,1277,623Z" />
        <path class="cls-2"
            d="M0,0L2,645H5415l1-212.6L5177,272.654,4719,626.983,3923,127.318,3759,204.19l-231-72.067L2538,631.788,1905,189.777l-628,428.8Z" />
    </svg> -->
</section>



<section class="section" style="background:white;">
    <div class="container internshipWhyChooseUs">
        <div class="row">
            <div class="col-sm-12">
                <div class="mb-5">
                    <h2 class="font-weight-bold">Reasons to Choose Us</h2>
                    <hr class="short">
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-6 mb-5">
                <div class="services">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <div class="services-item">
                        <h5 class="services-heading">Comprehensive 3-Month Training</h5>
                        <p class="pq_p">Experience three months of intensive training to understand industry workflows and gain
                            hands-on exposure. This internship will lay a strong foundation for your future career
                            development.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-5">
                <div class="services">
                    <i class="fas fa-user-friends"></i>
                    <div class="services-item">
                        <h5 class="services-heading">Personalized Mentorship</h5>
                        <p class="pq_p">Upon enrollment, you will work on assignments and live projects. Our experts are always
                            available to assist you with challenges, and you'll have the opportunity to learn
                            cutting-edge technologies.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-5">
                <div class="services">
                    <i class="fas fa-clipboard-check"></i>
                    <div class="services-item">
                        <h5 class="services-heading">High-Quality Training</h5>
                        <p class="pq_p">We provide high-quality skills training that is essential for your career growth, ensuring
                            our interns gain the knowledge needed for future success.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-5">
                <div class="services">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <div class="services-item">
                        <h5 class="services-heading">Engaging Technical Sessions</h5>
                        <p class="pq_p">Participate in enriching technical sessions led by experienced software developers and
                            mentors to enhance your skills.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-5">
                <div class="services">
                    <i class="fas fa-award"></i>
                    <div class="services-item">
                        <h5 class="services-heading">Certificate and Experience Letter</h5>
                        <p class="pq_p">Receive a certificate and experience letter from Web Work, giving you a competitive edge in
                            the job market and accelerating your career.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-5">
                <div class="services">
                    <i class="fas fa-eye"></i>
                    <div class="services-item">
                        <h5 class="services-heading">Feature Your Profile on PQ Website</h5>
                        <p class="pq_p">Once you complete the program, your profile will be showcased on the Positive Quadrant
                            official website, boosting your chances of landing a job.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!--<div class="custom-showcase">-->
<!--    <h2>What our intern say about us</h2>-->
<!--    <div class="custom-slider">-->
<!--        <div class="custom-slider-track">-->
<!-- Each 'item' now contains a div with h2, p, and Font Awesome icons for testimonials -->
<!--            <div class="custom-item">-->
<!--                <div class="custom-content">-->
<!--                    <h2><i class="fas fa-user"></i> Arjun Sharma</h2>-->
<!--                    <p><strong><i class="fas fa-laptop-code"></i> Course:</strong> Full Stack Web Development</p>-->
<!--                    <p><strong><i class="fas fa-quote-left"></i> Description:</strong> I had the opportunity to intern-->
<!--                        as a Full Stack Developer with a focus on MERN stack. This hands-on experience enhanced my-->
<!--                        skills in MongoDB, Express, React, and Node.js, making me confident in developing end-to-end-->
<!--                        applications.</p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="custom-item">-->
<!--                <div class="custom-content">-->
<!--                    <h2><i class="fas fa-user"></i> Priya Verma</h2>-->
<!--                    <p><strong><i class="fas fa-cloud"></i> Course:</strong> Cloud Computing & DevOps</p>-->
<!--                    <p><strong><i class="fas fa-quote-left"></i> Description:</strong> During my internship, I worked-->
<!--                        with AWS and Azure cloud platforms, gaining expertise in cloud infrastructure management,-->
<!--                        automation, and CI/CD pipeline implementation. This experience gave me a strong foundation in-->
<!--                        cloud services and DevOps practices.</p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="custom-item">-->
<!--                <div class="custom-content">-->
<!--                    <h2><i class="fas fa-user"></i> Rohit Kumar</h2>-->
<!--                    <p><strong><i class="fas fa-chart-line"></i> Course:</strong> Data Science and Machine Learning</p>-->
<!--                    <p><strong><i class="fas fa-quote-left"></i> Description:</strong> As an intern in Data Science, I-->
<!--                        worked on several machine learning projects involving Python, pandas, and scikit-learn. The-->
<!--                        internship provided exposure to real-world data problems, allowing me to develop predictive-->
<!--                        models and improve my statistical analysis skills.</p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="custom-item">-->
<!--                <div class="custom-content">-->
<!--                    <h2><i class="fas fa-user"></i> Ananya Singh</h2>-->
<!--                    <p><strong><i class="fas fa-mobile-alt"></i> Course:</strong> Mobile App Development (Flutter)</p>-->
<!--                    <p><strong><i class="fas fa-quote-left"></i> Description:</strong> I worked as a Flutter development-->
<!--                        intern where I built cross-platform mobile apps. This internship sharpened my skills in mobile-->
<!--                        UI/UX design, integrating third-party APIs, and enhancing app performance, preparing me for-->
<!--                        real-world mobile development projects.</p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="custom-item">-->
<!--                <div class="custom-content">-->
<!--                    <h2><i class="fas fa-user"></i> Manoj Reddy</h2>-->
<!--                    <p><strong><i class="fas fa-paint-brush"></i> Course:</strong> UI/UX Design</p>-->
<!--                    <p><strong><i class="fas fa-quote-left"></i> Description:</strong> As a UI/UX Design intern, I-->
<!--                        gained hands-on experience in designing user interfaces with tools like Figma and Adobe XD. The-->
<!--                        internship helped me understand the importance of user-centric design and research, and I-->
<!--                        contributed to designing seamless digital experiences for clients.</p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="custom-item">-->
<!--                <div class="custom-content">-->
<!--                    <h2><i class="fas fa-user"></i> Neha Gupta</h2>-->
<!--                    <p><strong><i class="fas fa-shield-alt"></i> Course:</strong> Cybersecurity</p>-->
<!--                    <p><strong><i class="fas fa-quote-left"></i> Description:</strong> During my cybersecurity-->
<!--                        internship, I learned about network security, ethical hacking, and vulnerability assessments.-->
<!--                        The internship helped me develop a deeper understanding of how to protect systems from cyber-->
<!--                        threats, and I actively participated in security audits and penetration testing.</p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="custom-item">-->
<!--                <div class="custom-content">-->
<!--                    <h2><i class="fas fa-user"></i> Vikram Patel</h2>-->
<!--                    <p><strong><i class="fas fa-cogs"></i> Course:</strong> IoT (Internet of Things)</p>-->
<!--                    <p><strong><i class="fas fa-quote-left"></i> Description:</strong> I had the chance to work on IoT-->
<!--                        solutions where I developed smart home applications using Raspberry Pi and Arduino. This-->
<!--                        internship exposed me to embedded systems programming, and I created several prototypes to-->
<!--                        automate everyday tasks, combining hardware and software efficiently.</p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="custom-item">-->
<!--                <div class="custom-content">-->
<!--                    <h2><i class="fas fa-user"></i> Simran Kaur</h2>-->
<!--                    <p><strong><i class="fas fa-bullhorn"></i> Course:</strong> Digital Marketing</p>-->
<!--                    <p><strong><i class="fas fa-quote-left"></i> Description:</strong> During my internship, I assisted-->
<!--                        in strategizing and executing digital marketing campaigns, utilizing tools like Google-->
<!--                        Analytics, SEO, and social media platforms. This experience sharpened my skills in content-->
<!--                        creation, audience targeting, and performance analysis.</p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="custom-item">-->
<!--                <div class="custom-content">-->
<!--                    <h2><i class="fas fa-user"></i> Sandeep Bansal</h2>-->
<!--                    <p><strong><i class="fas fa-robot"></i> Course:</strong> Artificial Intelligence</p>-->
<!--                    <p><strong><i class="fas fa-quote-left"></i> Description:</strong> I worked on implementing AI-->
<!--                        models during my internship, which included tasks such as image recognition and natural language-->
<!--                        processing. Using TensorFlow and Keras, I was able to enhance my skills in machine learning-->
<!--                        algorithms and AI-based solutions for real-world applications.</p>-->
<!--                </div>-->
<!--            </div>-->

<!-- Marathi Users with English content -->
<!--            <div class="custom-item">-->
<!--                <div class="custom-content">-->
<!--                    <h2><i class="fas fa-user"></i> Rahul Patil</h2>-->
<!--                    <p><strong><i class="fas fa-laptop-code"></i> Course:</strong> Full Stack Web Development</p>-->
<!--                    <p><strong><i class="fas fa-quote-left"></i> Description:</strong> I interned as a Full Stack-->
<!--                        Developer, focusing on the MERN stack. This internship helped me gain hands-on experience with-->
<!--                        MongoDB, Express, React, and Node.js, and it greatly enhanced my ability to develop full-stack-->
<!--                        applications.</p>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="custom-item">-->
<!--                <div class="custom-content">-->
<!--                    <h2><i class="fas fa-user"></i> Swati Deshmukh</h2>-->
<!--                    <p><strong><i class="fas fa-cloud"></i> Course:</strong> Cloud Computing & DevOps</p>-->
<!--                    <p><strong><i class="fas fa-quote-left"></i> Description:</strong> During my internship, I worked-->
<!--                        with AWS and Azure platforms, developing skills in cloud management, automation, and CI/CD-->
<!--                        pipeline setups. This experience gave me the foundation in cloud services and DevOps practices.-->
<!--                    </p>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="custom-item">-->
<!--                <div class="custom-content">-->
<!--                    <h2><i class="fas fa-user"></i> Suraj Rathod</h2>-->
<!--                    <p><strong><i class="fas fa-robot"></i> Course:</strong> Artificial Intelligence</p>-->
<!--                    <p><strong><i class="fas fa-quote-left"></i> Description:</strong> I had the chance to implement AI-->
<!--                        models using TensorFlow and Keras. I worked on real-world projects involving image recognition-->
<!--                        and natural language processing (NLP), which enhanced my machine learning and AI skills.</p>-->
<!--                </div>-->
<!--            </div>-->

<!--        </div>-->
<!--    </div>-->
<!--</div>-->




<script>
    document.addEventListener('DOMContentLoaded', () => {
        const sliderTrack = document.querySelector('.custom-slider-track');
        const items = document.querySelectorAll('.custom-item');

        // Clone the items to create an infinite loop effect
        items.forEach(item => {
            const clone = item.cloneNode(true);
            sliderTrack.appendChild(clone);
        });
    });

</script>

<script>
    $("#internship-enquiry-form").submit(function (event) {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);
    formData.append('<?= $this->security->get_csrf_token_name(); ?>', '<?= $this->security->get_csrf_hash(); ?>');

    var $submitBtn = $("button[name='submit_btn']"); // Select the Apply button

    // Store original text but keep button size same
    var originalText = $submitBtn.html();
    $submitBtn.prop("disabled", true).html('<span class="loader"></span><span class="hidden">' + originalText + '</span>');

    $.ajax({
        url: "<?php echo base_url('Home/internshipEnquiryForm'); ?>",
        data: formData,
        type: "post",
        processData: false,
        contentType: false,
        dataType: 'json', // Expect JSON response
        success: function (response) {
            // Restore original button text and enable button
            $submitBtn.prop("disabled", false).html(originalText);

            if (response.status === 'success') {
                $('#internship-enquiry-form')[0].reset();
                toastr.success(response.message);
            } else {
                toastr.error(response.message);
            }
             if (response.csrf_token) {
                $('input[name="<?= $this->security->get_csrf_token_name(); ?>"]').val(response.csrf_token);
            }
        },
        error: function (xhr, status, error) {
            // Restore original button text and enable button
            $submitBtn.prop("disabled", false).html(originalText);
            toastr.error("Unexpected error: " + xhr.responseText);
        }
    });
});



</script>