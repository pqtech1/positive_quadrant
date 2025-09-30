  <main id="main-container">

    <!-- Page Header -->

    <div class="content bg-gray-lighter">

        <div class="row items-push">

            <div class="col-sm-7">

                <h1 class="page-heading">

                    Edit Home Details <small> into the table.</small>

                </h1>

            </div>

            <div class="col-sm-5 text-right hidden-xs">

                <ol class="breadcrumb push-10-t">

                    <li>Home</li>

                    <li><a class="link-effect" href="<?= base_url().'home' ?>">View Home </a></li>

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
                  
                   <?php foreach($home_data as $value) {?>
                        <input type="hidden" name="home_id" id="home_id" value="<?= $value['home_id']?>">
                
                          <input type="hidden" class="form-control" name="old_img"  value="<?= $value['home_image']?>" />
                  
                    <div class="row">
                      <div class="form-group">
                       <div class="col-xs-6">
                        <label for="prod_thumb_image">Thumb Image</label>
                        <input class="form-control" type="file" id="image" name="image">
                        <span class="help-block"></span>
                        <?php if(!empty($value['home_image'])) {?>
                        <img src="<?= base_url()?>/uploads/home/<?= $value['home_image']?>" width="100px" 
                        height="150px"></img>
                        <?php } ?>
                    </div>
                </div>           
            </div>
            <div class="row">
              <div class="form-group">
                    <div class="col-xs-12">
                        <textarea class="form-control ckeditor" id="desc" name="desc" rows="7" placeholder="Enter Description.."><?= $value['home_desc']?></textarea>
                        <div class="help-block">Feel free to use common tags: &lt;blockquote&gt;, &lt;strong&gt;, &lt;em&gt;</div>
                    </div>
                </div>
            </div>
        <div class="row">
          <div class="form-group">
         
            <div class="col-xs-6">
               <label for="status">Status</label>
               <select class="form-control" id="prod_status" name="euser_status" class="form-control" >
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
    $("#image").ckeditor();


 function edit_form()
 {
    // alert('djdmjd');

  $('#editform').validate({
     rules: {
               
                desc: {
                    required: true
                    
                }
               
            },

    messages: {   
               desc: "Please Enter Description"
           
           },success:"valid",

            submitHandler:function(form)
            { 


                var id = $('#home_id').val();

         var frm = $('#editform')[0];

        // var  data = $('edit_slug').val();

        // alert(id);


       $.ajax({

                 url: "<?php echo base_url('home/updateDirect/'); ?>"+id,
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
                    window.location.href= '<?php echo base_url()?>/home';

                  }
                  else
                  {
                      for (var i = 0; i < data.inputerror.length; i++) 
                      {
                          $('[name="'+data.inputerror[i]+'"]').parent().addClass('has-error'); //select parent twice to select div form-g roup class and add has-error class
                          $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                      }
                   }
                 

                  console.log(data);


              }

       });

     }

});

}
</script>