<div class="inner_main_header" id="inner_main_header">
   <div class="container">
      <h3>Contact us</h3>
   </div>
</div>
<style type="text/css">
   input[type=number]::-webkit-inner-spin-button,
   input[type=number]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
   }

   #contact {
      color: #1a9c9b;
   }

   #contact.hvr-underline-from-center:before {
      left: 0;
      right: 0;
   }

   .social_links_a {
      font-size: 20px;
      margin: 5px;
   }
</style>
<div class="contact_page">
</div>

<!-- contact form code start here  -->
<div class="contact_two" style="background:#fff">
   <div class="container">
      <div id="contact_us_loader" class="text-center" style="margin-bottom: 22px;display:none;">
         <img src="<?php echo base_url() . '/assets/img/loader.gif' ?>">
      </div>

      <div class="alert alert-success alert-dismissible" style="text-align: center;display: none;">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         <p>Thank you for contacting us. We will be in touch with you very soon.</p>
      </div>

      <div class="row contact_form_one">
         <div class="col-md-6 contact_img">
            <picture class="lazyload">
               <!-- WebP version -->
               <source data-srcset="assets/new_img/contact_one.webp" type="image/webp">
               
               <!-- JPG fallback -->
               <img 
                  data-src="noWebpAssets/assets/new_img/contact_one.jpg" 
                  alt="image" 
                  class="lazyload" 
                  src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=="
               />
            </picture>
         </div>
         <div class="col-md-6 contact_form_two">
            <h4>Bringing Your Vision To Life</h4>
            <form action="<?= base_url('Home/saveData') ?>" method="post" class="contact_frm" id="createContactForm">
               <input type="text" name="website" style="display:none">

               <div class="row">
                  <div class="col-md-6">
                     <input type="text" name="name" id="name" placeholder="Name" required>
                  </div>
                  <div class="col-md-6">
                     <input type="email" name="email" id="email" placeholder="Email" required>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <input type="number" name="phone" id="phone" placeholder="Phone" required>
                  </div>
                  <div class="col-md-6">
                     <select name="services" id="services" required onchange="change_myselect(this.value)">
                        <option value=""> Select Services </option>
                        <option value="Development"> Development </option>
                        <option value="Consultancy"> Consultancy </option>
                        <option value="Training"> Training </option>
                        <option value="Manufacturing"> Manufacturing </option>
                        <option value="Technology"> Technology </option>
                        <option value="Software_Products"> Software Products </option>

                        <option value="Other"> Other </option>
                     </select>
                  </div>
               </div>
               <div classs="row">
                  <textarea type="text" placeholder="Message" name="message"></textarea>
               </div>
               <!-- <input type="hidden" name="services2" id="services2" value=""> -->
              <div class="g-recaptcha" data-sitekey="<?= RECAPTCHA_SITE_KEY ?>"></div>
               <div class="col-md-12 text-center">
                  <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-info"
                     style="padding: 7px 44px;margin-top:10px;">SUBMIT</button>
               </div>
            </form>
         </div>

      </div>

   </div>
</div>
<!-- contact form code end here  -->

<!-- contact block code start here  -->
<div class="contact_three">


   <div class="container">
      <div class="row" id="contactuscontainer">
         <div class="col-sm-4">
            <div class="card">
               <div class="card-body contact_card">
                  <picture class="lazyload">
                     <!-- WebP version -->
                     <source data-srcset="<?= base_url('assets/img/homeadress.webp') ?>" type="image/webp">
                     
                     <!-- PNG fallback -->
                     <img 
                        data-src="<?= base_url('noWebpAssets/assets/img/homeadress.png') ?>" 
                        alt="Address Icon" 
                        class="lazyload img-responsive"
                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=="
                     />
                  </picture>
                  <h3>HEAD OFFICE ADDRESS</h3>
                  <p>
                     Patel’s Prayosha Yogi Niwas Co-Op. Housing Society Limited, Building Number 4, Flat 202, Behind
                     Indian Ordnance Factory, Ambernath West, Thane – 421502.
                  </p>
               </div>
            </div>
         </div>

         <div class="col-sm-4">
            <div class="card">
               <div class="card-body contact_card">
                  <picture class="lazyload">
                     <!-- WebP version -->
                     <source data-srcset="<?= base_url('assets/img/emailimage.webp') ?>" type="image/webp">
                     
                     <!-- PNG fallback -->
                     <img 
                        data-src="<?= base_url('noWebpAssets/assets/img/emailimage.png') ?>" 
                        alt="Email Icon" 
                        class="lazyload img-responsive"
                        src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=="
                     />
                  </picture>
                  <h3>HEAD OFFICE ADDRESS</h3>
                  <h2>EMAIL</h2>
                  <p><a href="mailto:info@positivequadrant.in">info@positivequadrant.in</a></p>
               </div>
            </div>
         </div>

         <div class="col-sm-4">
            <div class="card">
               <div class="card-body contact_card">
               <picture class="lazyload">
                  <!-- WebP version -->
                  <source data-srcset="<?= base_url('assets/img/phonecallimage.webp') ?>" type="image/webp">
                  
                  <!-- PNG fallback -->
                  <img 
                     data-src="<?= base_url('noWebpAssets/assets/img/phonecallimage.png') ?>" 
                     alt="Phone Icon" 
                     class="lazyload img-responsive"
                     src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=="
                  />
               </picture>
                  <h3>HEAD OFFICE ADDRESS</h3>
                  <h2>CONTACT US</h2>
                  <p><a href="tel:7219623991">7219623991</a></p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container-fluid">
      <div class="row" style="margin-top: 81px;">
         <div class="col-md-12" style="padding:0px;margin:0px;">
            <iframe
               src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3767.3482639236645!2d73.19269112451973!3d19.223648032011603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be79391ed79b82b%3A0xaaabb94fa9440243!2sPatel%20Prayosha%20Yogi%20Niwas%2C%20Mahatma%20Jyotiba%20Phulenagar%2C%20Ambernath%2C%20Maharashtra%20421505!5e0!3m2!1sen!2sin!4v1696438995075!5m2!1sen!2sin"
               width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
         </div>

      </div>
   </div>
</div>
<!-- contact block code end here  -->

<!-- <div class="container">
   <div class="contact-main">
      <div class="row">
         <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="contact-text">
               <h4>Positive Quadrant Technologies LLP.</h4>
               <p><b>ADDRESS</b>
               <p>Patel’s Prayosha Yogi Niwas Co-Op. Housing Society Limited, Building Number 4, Flat 202, Behind Indian Ordnance Factory ,Ambernath West, Thane – 421502.</p>
               <p>Operating in Online/ Remote/ Virual mode.</p>
               <p>For any assistance please connect on our official email id: info@positivequadrant.in</p>
               </p>
               <p>
                  <b>REACH US</b>
                  <br>
                  <a href="mailto:info@positivequadrant.in" >info@positivequadrant.in</a>
               </p>
               <p> <a href="tel:7219623991"><i class="fa fa-phone" aria-hidden="true"></i> 7219623991 </a></p>
               <p>
                  <a  target="_blank" href="https://www.facebook.com/positivequadrants/" class="social_links_a"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  <a target="_blank" href="https://www.linkedin.com/company/positive-quadrant-technologies/" class="social_links_a"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                  <a target="_blank" href="https://twitter.com/positiveITech " class="social_links_a"><i class="fa fa-twitter" aria-hidden="true"></i></a>
               </p>
            </div>
         </div>
         <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="map-container">
               <div class="map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3767.3482639236645!2d73.19269112451973!3d19.223648032011603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be79391ed79b82b%3A0xaaabb94fa9440243!2sPatel%20Prayosha%20Yogi%20Niwas%2C%20Mahatma%20Jyotiba%20Phulenagar%2C%20Ambernath%2C%20Maharashtra%20421505!5e0!3m2!1sen!2sin!4v1696438995075!5m2!1sen!2sin" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
               </div>
            </div>
         </div>
      </div>
   </div>
</div> -->



</div>
</div>

<script>
   $("#createContactForm").submit(function (event) {
      event.preventDefault(); // Prevent default form submission


      var formData = new FormData(this);
      formData.append('g-recaptcha-response', recaptchaResponse); // ✅ add recaptcha token
      formData.append('<?= $this->security->get_csrf_token_name(); ?>', '<?= $this->security->get_csrf_hash(); ?>');
      var $submitBtn = $("#singlebutton");
      var originalText = $submitBtn.html(); // Store the original button text

      // Change button text to "Sending..." and disable it
      $submitBtn.prop("disabled", true).html("Sending...");

      // Create and show the loader
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
         url: "<?php echo base_url('Home/saveData'); ?>",
         data: formData,
         type: "post",
         processData: false,
         contentType: false,
         dataType: 'json',
         success: function (response) {
            $('#ajax-loader').remove();
            $submitBtn.prop("disabled", false).html(originalText); // Re-enable and restore button text

            if (response.status === 'success') {
               $('#createContactForm')[0].reset();
               toastr.success(response.message);
            } else if (response.status === 'error') {
               toastr.error(response.message);
            }
            if (response.csrf_token) {
               $('input[name="<?= $this->security->get_csrf_token_name(); ?>"]').val(response.csrf_token);
            }
         },
         error: function (xhr, status, error) {
            $('#ajax-loader').remove();
            $submitBtn.prop("disabled", false).html(originalText); // Re-enable and restore button text

            toastr.error("Unexpected error: " + xhr.responseText);
         }
      });
   });

</script>