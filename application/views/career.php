<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- jQuery (If not already included) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<style type="text/css">
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    #career {
        color: #1a9c9b;
    }

    #career.hvr-underline-from-center:before {
        left: 0;
        right: 0;
    }

    .hidden {
        display: none;
    }

    .popupContainer {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .popupContent {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        width: max-content;
        text-align: center;
    }

    .popupContent p {
        padding: 2rem 0rem;
    }



    .popupContent button {
        padding: 10px 15px;
        background: #1a9c9b;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .popupContent button:hover {
        background: #138d85;
    }

    .popupContent {
        position: relative;
        z-index: 1000;
    }

    .popupContent a {
        color: white;
        text-transform: none;
    }

    .closePopup {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 1001;
        font-size: 3rem;


    }


    .closePopup:hover {
        color: red;
    }


    .form-group-custom {
        margin-bottom: 10px;
        /* Adjust spacing between fields */
    }
</style>

<div class="careerContainer">
    <div class="careerTopContainer">
        <div class="careerTopContainerLeft">
            <h3>We're hiring!</h3>
            <h1 class="pq_h1 pq_left">Be part of our mission </h1>
            <h2 class="pq_h2">We're looking for passionate people to join us on our mission.
                We value flat hierarchies, clear
                communication, and full ownership and responsibility.</h2>
        </div>
        <div class="careerTopContainerRight">
            <picture>
            <!-- WebP (preferred) -->
            <source srcset="<?= base_url() ?>/assets/img/wearehiring2.webp" type="image/webp">

            <!-- JPG fallback -->
            <source srcset="<?= base_url() ?>/assets/img/wearehiring2.jpg" type="image/jpg">

            </picture>

        </div>
    </div>

    <div class="careerMiddleContainer">
        <?php if (!empty($job_openings)): ?>
            <?php foreach ($job_openings as $job_opening): ?>
                <?php if ($job_opening['job_status'] == "Active"): ?> <!-- Check status here -->
                    <div class="jobOpeningCard">
                        <div class="jobOpeningCardLeft">

                            <h2><?= htmlspecialchars($job_opening['job_title']); ?></h2>
                            <p><?= htmlspecialchars($job_opening['job_description']); ?></p>
                            <div class="jobTypeLocation">
                                <h2><i class="fas fa-briefcase"></i>
                                    <?= htmlspecialchars($job_opening['job_type']); ?></h2>
                                <h2><i class="fas fa-map-pin"></i>
                                    <?= htmlspecialchars($job_opening['job_location']); ?></h2>
                                <h2><i class="fas fa-star"></i>
                                    <?= htmlspecialchars($job_opening['experience_level']); ?></h2>
                                <h2><i class="fas fa-calendar"></i>
                                    <?= htmlspecialchars($job_opening['job_date']); ?></h2>
                            </div>
                        </div>

                        <div class="jobOpeningCardRight">
                            <button class="applyButton" data-job-id="<?= htmlspecialchars($job_opening['id']); ?>"
                                data-job="<?= htmlspecialchars($job_opening['job_title']); ?>">
                                Apply &#8599;
                            </button>
                        </div>
                    </div>
                <?php endif; ?> <!-- End status check -->
            <?php endforeach; ?>
        <?php else: ?>
            <p><b>Send Your Resume at:</b> <a href="mailto:info@positivequadrant.in">info@positivequadrant.in</a></p>
        <?php endif; ?>
    </div>

</div>

<!-- Modal Structure -->
<div id="popupContainer" class="popupContainer hidden">
    <div class="popupContent container-fluid">
        <!-- Close button -->
        <span id="closePopup" class="closePopup">&times;</span>
        <h3 id="popupJobTitle"></h3>
        <div class="container mt-5">
            <div class="card">

                <div class="card-body bg-light">
                    <form id="jobApplicationForm" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="job_id" name="job_id">
                        <input type="hidden" id="job_title" name="job_title">

                        <!-- <h2><?= htmlspecialchars($job_opening['id']); ?></h2> -->
                        <!-- Name -->
                        <div class="mt-4 mb-3 row form-group-custom">
                            <label class="col-md-4 col-form-label">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mt-4 mb-3 row form-group-custom">
                            <label class="col-md-4 col-form-label">Email</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="mt-4 mb-3 row form-group-custom">
                            <label class="col-md-4 col-form-label">Phone</label>
                            <div class="col-md-6">
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="mt-4 mb-3 row form-group-custom">
                            <label class="col-md-4 col-form-label">Address</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                        </div>

                        <!-- LinkedIn URL (Optional) -->
                        <div class="mt-4 mb-3 row form-group-custom">
                            <label class="col-md-4 col-form-label">LinkedIn URL</label>
                            <div class="col-md-6">
                                <input type="url" class="form-control" id="linkedin" name="linkedin">
                            </div>
                        </div>

                        <!-- Resume -->
                        <div class="mt-4 mb-3 row form-group-custom">
                            <label class="col-md-4 col-form-label">Resume</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" id="resume" name="resume" required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary w-50">Submit</button>
                        </div>

                    </form>
                    <div id="loader" style="display:none;">
                        Sending...
                    </div>
                </div>

            </div>
        </div>

        <!-- <p>Send Your Resume along with a proper, relevant subject and details.</p>
        <button id="sendResumeButton">
            <a href="mailto:info@positivequadrant.in">Send Resume <i class="fas fa-paper-plane"></i></a>
        </button> -->
    </div>
</div>



<script>
    document.addEventListener("DOMContentLoaded", function () {
    const applyButtons = document.querySelectorAll(".applyButton");
    const popupContainer = document.getElementById("popupContainer");
    const popupJobTitle = document.getElementById("popupJobTitle");
    const closePopup = document.getElementById("closePopup");

    applyButtons.forEach(button => {
        button.addEventListener("click", function () {
            const jobId = this.getAttribute("data-job-id"); // Get job ID
            const jobTitle = this.getAttribute("data-job"); // Get job title

            // Set job title inside modal
            popupJobTitle.textContent = `Applying for: ${jobTitle}`;

            // Set job ID in the hidden input field
            document.getElementById("job_id").value = jobId;

            // Set job title in the hidden input field (Correcting the ID)
            document.getElementById("job_title").value = jobTitle;

            // Show the modal
            popupContainer.classList.remove("hidden");
        });
    });

    // Close modal when clicking the close button
    closePopup.addEventListener("click", function () {
        popupContainer.classList.add("hidden");
    });

    // Close modal when clicking outside of the popup content
    document.addEventListener("click", function (e) {
        if (e.target === popupContainer) {
            popupContainer.classList.add("hidden");
        }
    });
});



    $(document).ready(function () {
        $("#jobApplicationForm").on("submit", function (e) {
            e.preventDefault();  // Prevent default form submission

            // Show loader
            $("#loader").show();

            // Create FormData object
            var formData = new FormData(this);
            formData.append('<?= $this->security->get_csrf_token_name(); ?>', '<?= $this->security->get_csrf_hash(); ?>');
            

            // Perform AJAX request
            $.ajax({
                url: "<?php echo base_url('Home/submit_job_application'); ?>",  // Controller method
                type: "POST",
                data: formData,
                dataType: "json", // Expect JSON response
                contentType: false,
                processData: false,
                success: function (response) {
                    // Hide loader
                    $("#loader").hide();

                    if (response.status === 'success') {
                        toastr.success(response.message, "Success");

                        // Reset form after submission
                        $('#jobApplicationForm')[0].reset();

                        // Optional: Close modal if form is inside one
                        $("#popupContainer").modal("hide");
                    } else {
                        toastr.error(response.message, "Error");
                    }
                     if (response.csrf_token) {
                        $('input[name="<?= $this->security->get_csrf_token_name(); ?>"]').val(response.csrf_token);
                    }
                },
                error: function (xhr, status, error) {
                    $("#loader").hide();
                    toastr.error("There was an error processing your request. Please try again.", "Error");
                    console.error("AJAX Error:", status, error);
                }
            });
        });
    });




</script>