<main id="main-container">
   <!-- Page Header -->
   <div class="content bg-gray-lighter">
      <div class="row items-push">
         <div class="col-sm-7">
            <h1 class="page-heading">
               Add New Invoices 
            </h1>
         </div>
         <div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
               <li>Home</li>
               <li><a class="link-effect" href="<?= base_url().'about' ?>">View About </a></li>
            </ol>
         </div>
      </div>
   </div>
   <!-- END Page Header -->
   <!-- Page Content -->
   <div class="content content-narrow">
      <h2 class="content-heading"></h2>
      <div class="block block-bordered">
         <div class="block-header bg-gray-lighter">
              <p style="text-align: center;font-size: 26px;font-weight: 500;margin-bottom: -10px;">Generate Invoice</p>
         </div>
         <div class="block-content">
            <form class="form-horizontal push-10-t push-10" action="" method="post" id="addform" enctype="multipart/form-data">
               <div class="row">
                  <div class="form-group">
                     <div class="col-xs-6">
                        <label for="prod_thumb_image">Name</label>
                        <input class="form-control" type="text" id="name" name="name">
                        <span></span>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="form-group">
                     <div class="col-xs-6">
                       <label for="prod_thumb_image">Pan Number</label>
                        <input class="form-control" type="text" id="pan" name="pan">
                        <span></span>
                     </div>
                  </div>
               </div> 
               <!--<h4 style=" text-decoration: underline;">Bank Details :</h4>-->
               <div class="row">
                  <div class="form-group">
                     <div class="col-xs-6">
                       <label for="prod_thumb_image">Bank Name</label>
                        <input class="form-control" type="text" id="bank_name" name="bank_name">
                        <span></span>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="form-group">
                     <div class="col-xs-6">
                       <label for="prod_thumb_image">Bank Branch Name</label>
                        <input class="form-control" type="text" id="br_name" name="br_name">
                        <span></span>
                     </div>
                  </div>
               </div>
                <div class="row">
                  <div class="form-group">
                     <div class="col-xs-6">
                       <label for="prod_thumb_image">Account Holder Name</label>
                        <input class="form-control" type="text" id="ac_name" name="ac_name">
                        <span></span>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="form-group">
                     <div class="col-xs-6">
                       <label for="prod_thumb_image">IFSC Code</label>
                        <input class="form-control" type="text" id="ifsc" name="ifsc">
                        <span></span>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="form-group">
                     <div class="col-xs-6">
                       <label for="prod_thumb_image">A/C Number</label>
                        <input class="form-control" type="text" id="ac_no" name="ac_no">
                        <span></span>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="form-group">
                     <div class="col-xs-6">
                       <label for="prod_thumb_image">Paid Amount</label>
                        <input class="form-control" type="number" id="pd_amt" name="pd_amt">
                        <span></span>
                     </div>
                  </div>
               </div>
                <div class="row">
                  <div class="form-group">
                     <div class="col-xs-6">
                       <label for="prod_thumb_image">Remaining Amount</label>
                        <input class="form-control" type="text" id="rem_amt" name="rem_amt">
                        <span></span>
                     </div>
                  </div>
               </div>
                <div class="row">
               <div class="form-group">
                    <div class="col-xs-6">
                      <label for="comment">Invoice Description</label>
                      <textarea class="form-control" rows="5" id="comment"></textarea>
                      </div>
                    </div>
                    </div>
               <!--<div class="row">-->
               <!--   <div class="form-group">-->
               <!--      <div class="col-xs-12">-->
               <!--         <textarea class="form-control ckeditor" id="about_desc" name="about_desc" rows="7" placeholder="Enter Description.."></textarea>-->
               <!--         <div class="help-block">Feel free to use common tags: &lt;blockquote&gt;, &lt;strong&gt;, &lt;em&gt;</div>-->
               <!--      </div>-->
               <!--   </div>-->
               <!--</div>-->
               <div class="row">
                  <div class="form-group">
                     <div class="col-xs-12">
                        <button class="btn btn-warning" type="submit" onclick="add_form()">Add</button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <!-- END Mega Form -->
   </div>
   <!-- END Page Content -->
</main>
<script type="text/javascript">
   $("#about_desc").ckeditor();
   
   
   function add_form()
   {
   // alert('djdmjd');
   
   
   $("#addform").validate({
       rules: {
               about_image: {
                   required: true,
                   
               },
               about_desc: {
                   required: true,
                   
               },
   
               status:{
   
                   required:true
               },
              
           },
   
       messages: {
                about_image : "Please insert image",
   
           
               about_desc: "Please Enter Description"                    
                  
               
               
           },success:"valid",
   
           submitHandler:function(form)
           {
               frm = $('#addform')[0];
   
                  // alert(dataString);
   
                $.ajax({
   
                   url:"<?php echo base_url('about/add_about'); ?>",
                   type: "POST",
                   data:new FormData(frm),
                   async :false,
                   processData: false,
                   contentType: false,
                   dataType:'json',
                   success:function(data){
   
                       // console.log(data.status);
   
                      
   
                       if(data.status == "true")
                       { 
   
                        alert('Data Inserted Successfully');
                        window.location.href= "<?= base_url().'about'?>";
                      
                       }
                        else
                         {
                             for (var i = 0; i < data.inputerror.length; i++) 
                             {
                                 $('[name="'+data.inputerror[i]+'"]').parent().addClass('has-error'); //select parent twice to select div form-g roup class and add has-error class
                                 $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                             }
                          }
   
                       
                     
                   }
   
               });
   
   
   
       
           }
   
   
   });
   
   
   
   }
</script>