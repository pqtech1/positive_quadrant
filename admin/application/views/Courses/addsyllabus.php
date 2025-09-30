  <main id="main-container">

    <!-- Page Header -->

    <div class="content bg-gray-lighter">

        <div class="row items-push">

            <div class="col-sm-7">

                <h1 class="page-heading">

                    Add <?php echo ucwords($course['cname']); ?> Syllabus 

                </h1>

            </div>

            <div class="col-sm-5 text-right hidden-xs">

                <ol class="breadcrumb push-10-t">

                    <li>Home</li>

                    <li><a class="link-effect" href="<?= base_url().'courses/view_syllabus/'.$course['c_id'] ?>">View Syllabus </a></li>

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
                     <h3><?php echo ($course['ctype']  == 1) ? 'Normal Training' : 'Corporate Training' ; ?><h3/>
                       </li>

                </ul>

              


            </div>

            <div class="block-content">

               

            
                <form class="form-horizontal push-10-t push-10" action="" method="post" id="addform" enctype="multipart/form-data" >
                  
               
                

                  
                    <div class="row">
                      <div class="form-group">

                       <div class="col-xs-6">
                        <label for="prod_thumb_image">Syllabus Name</label>
                        <input class="form-control" type="text" name="syllabus_name" id="syllabus_name" >
                        <input type="hidden" name="course_id" value="<?php echo $course['c_id']?>">
                        <input type="hidden" name="course_type" value="<?php echo $course['ctype']?>">
                    </div> 
                       <div class="col-xs-6">
                        <label for="prod_thumb_image">Upload PDF For Syllabus</label>
                        <input class="form-control" type="file" id="syllabus_pdf" name="syllabus_pdf">
                        <span class="error"></span>
                       
                    </div>
                </div>           
            </div>
            <div class="row">
              <div class="form-group">
                    <div class="col-xs-12">
                        <label>Add Syllabus Content</label>
                        <textarea class="form-control ckeditor" id="syllabus_desc" name="syllabus_desc" rows="7" placeholder="Enter Description.."></textarea>
                        <div class="help-block">Feel free to use common tags: &lt;blockquote&gt;, &lt;strong&gt;, &lt;em&gt;</div>
                    </div>
                </div>
            </div>
        <div class="row">
          <div class="form-group">
         
            <div class="col-xs-6">
               <label for="status">Status</label>
               <select class="form-control" id="status" name="status" class="form-control" >
                <option value="1">Active</option>
                <option value="0" >In Active</option>
            </select>
        </div>
             
    </div>
</div>

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
                syllabus_name: {
                    required: true,
                    
                },
                syllabus_desc: {
                    required: true,
                    
                }
                
               
            },

        messages: {
                 syllabus_name : "Please Add Syllabus Name",

            
                 syllabus_desc: "Please Enter Description"                    
                   
                
                
            },success:"valid",

            submitHandler:function(form)
            {
                frm = $('#addform')[0];

                   // alert(dataString);
                 $.ajax({
                    url:"<?php echo base_url('courses/save_syllabus'); ?>",
                    type: "POST",
                    data:new FormData(frm),
                    async :false,
                    processData: false,
                    contentType: false,
                    dataType:'json',
                    success:function(data){

                        // console.log(data.status);
                          var url = window.location.pathname;
                        var id = url.substring(url.lastIndexOf('/') + 1);
                        if(data.status)
                        { 

                         alert('Data Inserted Successfully');
                         window.location.href= "<?= base_url().'courses/view_syllabus/'?>"+id;
                       
                        }
                         else
                          {
                            if(data.status == 0)
                            {
                                if(data.inputerror.length != undefined)
                                {
                                  
                                  for (var i = 0; i < data.inputerror.length; i++) 
                                  {
                                      $('[name="'+data.inputerror[i]+'"]').parent().addClass('has-error'); //select parent twice to select div form-g roup class and add has-error class
                                      $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                                  }

                                }else{
                                  alert('Syllabus Name already Exist');
                                 $('#syllabus_name').focus();
                                }

          

                            }
                           }

                        
                      
                    }

                });



        
            }


    });
}

 /*function add_form()
 {
    // alert('djdmjd');

  
    $("#addform").validate({
        rules: {
                syllabus_name: {
                    required: true,
                    
                },
                syllabus_desc: {
                    required: true,    
                }
               
            },

        messages: {
                 syllabus_name : "Please Add Syllabus Name",
                   
                 syllabus_desc: "Please Enter Description"                    
                
            },success:"valid",

            submitHandler:function(form)
            {
                frm = $('#addform')[0];

                    alert(frm);

                 $.ajax({

                    url:"<?php echo base_url('courses/save_syllabus'); ?>",
                    type: "POST",
                    data:new FormData(frm),
                    async :false,
                    contentType: false,
                    processData:false
                    dataType:'json',
                    success:function(data){
                    
                        return true;
                        // console.log(data.status);
                        var url = window.location.pathname;
                        var id = url.substring(url.lastIndexOf('/') + 1);
                        if(data.status)
                        { 

                         alert('Data Inserted Successfully');
                         //window.location.href= "<?= base_url().'courses/view_syllabus/'?>"+id;
                       
                        }
                         else
                          {
                            if(data.status == 0)
                            {

                              alert('Syllabus Name already Exist');
                              $('#syllabus_name').focus();
                            }else{


                              for (var i = 0; i < data.inputerror.length; i++) 
                              {
                                  $('[name="'+data.inputerror[i]+'"]').parent().addClass('has-error'); //select parent twice to select div form-g roup class and add has-error class
                                  $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                              }
                            }
                           }

                        
                      
                    }

                });



        
            }


    });



}*/
</script>