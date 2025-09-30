<main id="main-container">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <style type="text/css">
        #example1_wrapper {
            padding-right: 10vw;
        }

        #example1_wrapper img {
            width: auto;
            height: 8vh;
        }


        .inputBtnContainer {
            width: 100%;
        }

        #tech-values-container input {
            margin-bottom: 1%;
            width: 70%;
        }

        #tech-values-container .remove-tech-value i {
            font-size: 1rem;
            /* Adjust icon size if needed */
        }
    </style>

    <div class="container">
        <!-- tech_expertise_edit.php -->
        <form id="tech-expertise-form">
            <input type="hidden" name="exp_id" value="<?php echo $tech->exp_id; ?>" />

            <div class="form-group">
                <label for="tech_name">Select Tech Name</label>
                <select name="tech_id" id="tech_name" class="form-control">
                    <?php foreach ($tech_names as $name): ?>
                        <option value="<?php echo $name->tech_id; ?>" <?php echo ($name->tech_id == $tech->tech_id) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($name->tech_name); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- <div class="form-group">
                <label for="tech_values">Tech Expertise Values</label>
                <textarea name="tech_values" id="tech_values" class="form-control"
                    rows="4"><?php echo implode(", ", $tech->tech_values); ?></textarea>
                <small class="form-text text-muted">Enter values separated by commas.</small>
            </div> -->

            <div class="form-group">
                <label for="tech_values">Tech Expertise Values</label>
                <div id="tech-values-container">
                    <?php
                    $tech_values = is_array($tech->tech_values) ? $tech->tech_values : json_decode($tech->tech_values, true);
                    foreach ($tech_values as $key => $value): ?>
                        <div class="d-flex input-group mb-2 inputBtnContainer">
                            <input type="text" name="tech_values[]" class="form-control"
                                value="<?php echo htmlspecialchars($value); ?>" />
                            <div class="input-group-append">
                                <button class="btn btn-danger remove-tech-value" type="button" title="Remove">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <small class="form-text text-muted">Modify the tech expertise values as needed.</small>
            </div>



            <button type="button" class="mr-3 btn btn-dark" onclick="window.history.back();">Back</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>


        $(document).ready(function () {
            // Handle remove icon click event
            $('#tech-values-container').on('click', '.remove-tech-value', function () {
                // Remove the parent container of the clicked remove icon
                $(this).closest('.input-group').remove(); // Use .input-group to find the correct parent
            });

            // Form submission with AJAX
            $('#tech-expertise-form').on('submit', function (e) {
                e.preventDefault(); // Prevent the default form submission

                // Disable the submit button to prevent multiple clicks
                $(this).find('button[type="submit"]').prop('disabled', true);

                $.ajax({
                    url: '<?php echo base_url('Tech_Expertise/updateTechExpertise'); ?>',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        const data = JSON.parse(response);
                        if (data.success) {
                            toastr.success(data.message);
                        } else {
                            toastr.error(data.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        toastr.error('An error occurred while processing your request.');
                    },
                    complete: function () {
                        $('#tech-expertise-form').find('button[type="submit"]').prop('disabled', false);
                    }
                });
            });
        });


        $(document).ready(function () {
            $('#tech-expertise-form').on('submit', function (e) {
                e.preventDefault(); // Prevent the default form submission

                // Disable the submit button to prevent multiple clicks
                $(this).find('button[type="submit"]').prop('disabled', true);

                $.ajax({
                    url: '<?php echo base_url('Tech_Expertise/updateTechExpertise'); ?>',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        // Assuming response is a JSON object with success and message
                        const data = JSON.parse(response);
                        if (data.success) {
                            toastr.success(data.message);
                            // Optionally redirect or update UI here
                        } else {
                            toastr.error(data.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        toastr.error('An error occurred while processing your request.');
                    },
                    complete: function () {
                        // Re-enable the submit button after the request completes
                        $('#tech-expertise-form').find('button[type="submit"]').prop('disabled', false);
                    }
                });
            });
        });





    </script>
</main>