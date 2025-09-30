  <main id="main-container">

    <!-- Page Header -->

    <div class="content bg-gray-lighter">

        <div class="row items-push">

            <div class="col-sm-7">

                <h1 class="page-heading">

                    Edit Services Details <small> into the table.</small>

                </h1>

            </div>

            <div class="col-sm-5 text-right hidden-xs">

                <ol class="breadcrumb push-10-t">

                    <li>Home</li>

                    <li><a class="link-effect" href="<?= base_url().'Services' ?>">View Services </a></li>

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

               

            
                <form class="form-horizontal push-10-t push-10" action="" method="post" id="editform" enctype="multipart/form-data">
                  
                   <?php foreach($services_data as $value) {?>
                        <input type="hidden" name="services_id" id="services_id" value="<?= $value['s_id']?>">
                
                  
                    <div class="row">
                      <div class="form-group">
                       <div class="col-xs-6">
                        <label for="service_name">Service Name</label>
                        <input class="form-control" type="text" id="service_name" name="service_name" value="<?= $value['serv_name']; ?>">
                       
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





</div>

</div>

<!-- END Mega Form -->

</div>

<!-- END Page Content -->

</main>


<script type="text/javascript">



 function edit_form()
 {
    // alert('djdmjd');

  $('#editform').validate({
     rules: {
               
                service_name: {
                    required: true
                    
                }
               
            },

    messages: {   
               service_name: "Please Enter Service Name"
           
           },success:"valid",

            submitHandler:function(form)
            { 


            var id = $('#services_id').val();

            var frm = $('#editform')[0];

        // var  data = $('edit_slug').val();

        // alert(id);


       $.ajax({

                 url: "<?php echo base_url('Services/updateDirect/'); ?>"+id,
                 type: "POST",
                 data:new FormData(frm),
                 async :false,
                 processData: false,
                 contentType: false,
                 dataType:'json',
                 success:function(data){


                  if(data.status == 'true')
                  {

                    alert('Data Updated Successfully');
                    window.location.href= '<?php echo base_url()?>/Services';

                  }
                  
                 

                


              }

       });

     }

});

}
</script>