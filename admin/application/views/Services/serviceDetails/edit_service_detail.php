  <main id="main-container">

    <!-- Page Header -->

    <div class="content bg-gray-lighter">

        <div class="row items-push">

            <div class="col-sm-7">

                <h1 class="page-heading">

                    Edit Service Details <small> into the table.</small>

                </h1>

            </div>

            <div class="col-sm-5 text-right hidden-xs">

                <ol class="breadcrumb push-10-t">

                    <li>Home</li>

                    <li><a class="link-effect" href="<?= base_url().'Services' ?>">View Service </a></li>

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

                <ul class="block-options">

                    <li>



                    </li>                                

                </ul>

              


            </div>

            <div class="block-content">

               
                <?php if(count($services_data) > 0) {?>
            
                <form class="form-horizontal push-10-t push-10" action="" method="post" id="editform" enctype="multipart/form-data">
                            
              
                   <?php  foreach($services_data as $value) { ?>
                              <input type="hidden" class="form-control" name="serv_id" id="serv_id" value="<?= $value['ser_pg_id']?>" />
                            <input type="hidden" name="serv_type" value="<?= $value['s_id']?>">
                          
                            

                         
                        
                  <input type="hidden" class="form-control" name="old_img"  value="<?= $value['serv_image']?>" />
                  <div class="row">
                    <div class="form-group">
                      <div class="col-xs-6">
                        <label>Service</label>
                        <input type="text" name="ser_name" value="<?=  $value['serv_name']?>" readonly>
                      </div>

                    <div class="col-xs-6">
                        <label>Service Heading </label>
                        <input type="text" name="ser_heading" value="<?= $value['serv_heading']?>">
                      </div>

                    </div>
                  </div> 
                          
            
            <div class="row">
              <div class="form-group">
                <div class="col-xs-6">
                        <label for="prod_thumb_image"> Image</label>
                        <input class="form-control" type="file" id="image" name="image">
                        <span class="help-block"></span>
                        <?php if(!empty($value['serv_image'])) {?>
                        <img src="<?= base_url()?>/uploads/services/<?= $value['serv_image']?>" width="100px" 
                        height="150px"></img>
                        <?php } ?>
                </div>
                    <div class="col-xs-12">
                        <textarea class="form-control ckeditor" id="serv_description" name="serv_description" rows="7" placeholder="Enter Description.."><?= $value['serv_description']?></textarea>
                        <div class="help-block">Feel free to use common tags: &lt;blockquote&gt;, &lt;strong&gt;, &lt;em&gt;</div>
                    </div>
                </div>
            </div>
        <div class="row">
          <div class="form-group">
         
            <div class="col-xs-6">
               <label for="status">Status</label>
               <select class="form-control" id="status" name="status" class="form-control" >
                <option value="1" <?= ($value['status'] == 1) ? 'selected' : ''; ?>>Active</option>
                <option value="0" <?= ($value['status'] == 0) ? 'selected' : ''; ?>>In Active</option>
            </select>
        </div>
             
    </div>
</div>

<div class="row">
  <div class="form-group">
    <div class="col-xs-12">
        <button class="btn btn-warning" type="submit" onclick="edit_form()">Update</button>
    </div>
</div>
</div>
    <?php  } ?>
</form>

<?} else {?>
  <h2>No Data Found.</h2>
<?php } ?>





</div>

</div>

<!-- END Mega Form -->

</div>

<!-- END Page Content -->

</main>


<script type="text/javascript">
    $("#serv_description").ckeditor();


 function edit_form()
 {
    // alert('djdmjd');

  $('#editform').validate({
     rules: {
                  ser_heading:{
                    required:true,
                },
                serv_desc: {
                    required: true,
                    
                }
               
            },

    messages: {   
              

                ser_heading : "Please enter Service Heading",

                serv_desc: "Please Enter Description"                    
                   
           
           },success:"valid",

            submitHandler:function(form)
            { 


            var id = $('#serv_id').val();

            var frm = $('#editform')[0];

        // var  data = $('edit_slug').val();

        // alert(id);


       $.ajax({
                 url: "<?php echo base_url('services/update_service_detail/'); ?>"+id,
                 type: "POST",
                 data:new FormData(frm),
                 async :false,
                 processData: false,
                 contentType: false,
                 success:function(data){
                       alert('Data Updated Successfully');
                       window.location.href= "<?= base_url().'Services'?>";
              }

       });

     }

});

}
</script>