  <main id="main-container">

    <!-- Page Header -->

    <div class="content bg-gray-lighter">

        <div class="row items-push">

            <div class="col-sm-7">

                <h1 class="page-heading">

                    ADD Service Details <small> into the table.</small>

                </h1>

            </div>

            <div class="col-sm-5 text-right hidden-xs">

                <ol class="breadcrumb push-10-t">

                    <li>Home</li>

                    <li><a class="link-effect" href="<?= base_url().'Services' ?>">View  Service </a></li>

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

               

            
                <form class="form-horizontal push-10-t push-10" action="" method="post" id="addform" enctype="multipart/form-data">
                  
                
                    
                

                  
                    <div class="row">
                      <div class="form-group">
                        <div class="col-xs-6">
                            <label for="prod_thumb_image"> Service </label>
                            <?php foreach($services_name as $value) {?>
                                <input type="hidden" name="serv_type" value="<?= $value['s_id']?>">
                            <input type="text" name="ser_name" value="<?php echo $value['serv_name']?>" readonly>
                            <?php } ?>
                        </div>
                      <div class="col-xs-6">
                            <label for="prod_thumb_image"> Service Heading </label>
                           
                            <input type="text" name="ser_heading" >
                      </div>


                </div>           
            </div>
            <div class="row">
              <div class="form-group">
                 <div class="col-xs-6">
                        <label for="prod_thumb_image"> Image</label>
                        <input class="form-control" type="file" id="image" name="image">
                        <span class="help-block"></span>
                       
                </div>

                    <div class="col-xs-6">
                        <textarea class="form-control ckeditor" id="serv_desc" name="serv_desc" rows="7" placeholder="Enter Description.."></textarea>
                        <div class="help-block">Feel free to use common tags: &lt;blockquote&gt;, &lt;strong&gt;, &lt;em&gt;</div>
                    </div>
                </div>
            </div>
        <div class="row">
          <div class="form-group">
         
            <div class="col-xs-6">
               <label for="status">Status</label>
               <select class="form-control" id="status" name="status" class="form-control" >
                <option value="1" >Active</option>
                <option value="0" >In Active</option>
            </select>
        </div>
             
    </div>
</div>

<div class="row">
  <div class="form-group">
    <div class="col-xs-12">
        <button class="btn btn-warning" type="submit"  onclick="add_form()">ADD</button>
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
     $("#serv_desc").ckeditor();
function add_form()
{
   var d = $(location).attr("href").split('/').pop();
   

    $("#addform").validate({
        rules: {
                image: {
                    required: true,
                    
                },
                ser_heading:{
                    required:true,
                },
                serv_desc: {
                    required: true,
                    
                }
               
            },

        messages: {
                 image : "Please insert image",

                ser_heading : "Please enter Service Heading",

                serv_desc: "Please Enter Description"                    
                   
                
                
            },success:"valid",

            submitHandler:function(form)
            {
                frm = $('#addform')[0];

                
                 $.ajax({

                    url:"<?php echo base_url('services/add_services_details'); ?>",
                    type: "POST",
                    data:new FormData(frm),
                    async :false,
                    processData: false,
                    contentType: false,
                    dataType:'json',
                    success:function(data){

                         
                         window.location.href= "<?= base_url().'Services'?>";
                         /* for (var i = 0; i < data.inputerror.length; i++) 
                          {
                              $('[name="'+data.inputerror[i]+'"]').parent().addClass('has-error'); //select parent twice to select div form-g roup class and add has-error class
                              $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                          }*/
                       }

                        
                      
                    });

                



        
            }


    });


 }

</script>