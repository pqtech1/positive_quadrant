  <main id="main-container">

    <!-- Page Header -->

    <div class="content bg-gray-lighter">

        <div class="row items-push">

            <div class="col-sm-7">

                <h1 class="page-heading">

                    ADD Project Details <small> into the table.</small>

                </h1>

            </div>

            <div class="col-sm-5 text-right hidden-xs">

                <ol class="breadcrumb push-10-t">

                    <li>Project</li>

                    <li><a class="link-effect" href="<?= base_url().'project' ?>">ADD PROJECT</a></li>

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
                        <label for="prod_thumb_image">Project Name</label>
                        <input class="form-control" type="text" id="projectname" name="projectname">
                        <span class="help-block"></span>
                       
                    </div>
                    <div class="col-xs-6">
                        <label for="prod_thumb_image">Project Image</label>
                        <input class="form-control" type="file" id="image" name="image">
                        <span class="help-block"></span>
                       
                    </div>

                </div>           
            </div>                
                    
                
            <div class="row">
              <div class="form-group">
                    <div class="col-xs-12">
                        <label>Project Description</label>
                        <textarea class="form-control ckeditor" id="project_desc" name="project_desc" placeholder="Enter Description.."></textarea>
                       
                    </div>
                    
                </div>
            </div>


        <div class="row">
          <div class="form-group">
            <div class="col-xs-6">
                        <label>Project URL</label>
                        <input type="url" name="project_link" id="project_link" class="form-control">
            </div>
            <div class="col-xs-6">
               <label for="status">Status</label>
               <select class="form-control" id="project_status" name="status" class="form-control" >
                <option value="1" >Active</option>
                <option value="0" >In Active</option>
            </select>
        </div>
             
    </div>
</div>

<div class="row">
  <div class="form-group">
    <div class="col-xs-12">
        <button class="btn btn-warning" type="submit"  onclick="return add_form()">ADD</button>
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
    
function add_form()
{

 
    $("#addform").validate({
        rules: {
                projectname:{
                    required:true,
                },
                image: {
                    required: true,
                    
                },
                projectdesc: {
                    required: true,
                    
                },
                project_link:{
                    required:true,
                    url:true
                },
                status:{

                    required:true,
                }
               
            },

        messages: {
                projectname: "Please Enter Project Name",
                image : "Please insert image",
                projectdesc: "Please Enter Description" ,                   
                project_link:{
                    "required":"Please Enter Project Link",
                    "url": "Please Enter Valid Url"
                }
                
            },success:"valid",

            submitHandler:function(form)
            {
                frm = $('#addform')[0];

                   // alert(dataString);

                 $.ajax({

                    url:"<?php echo base_url('Project/add_home'); ?>",
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
                         window.location.href= "<?= base_url().'project'?>";
                       
                        }

                        
                      
                    }

                });



        
            }


    });


 }

</script>