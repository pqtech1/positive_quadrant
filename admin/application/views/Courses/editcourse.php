  <main id="main-container">

    <!-- Page Header -->

    <div class="content bg-gray-lighter">

        <div class="row items-push">

            <div class="col-sm-7">

                <h1 class="page-heading">

                    Edit Course Details <small> into the table.</small>

                </h1>

            </div>

            <div class="col-sm-5 text-right hidden-xs">

                <ol class="breadcrumb push-10-t">

                    <li>Home</li>

                    <li><a class="link-effect" href="<?= base_url().'courses' ?>">View Course </a></li>

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
                        <label for="prod_thumb_image">Course Name</label>
                        <input class="form-control" type="text" id="course_name" name="course_name" value="<?php echo $course['cname']?>">
                         <input type="hidden" name="c_id" value="<?php echo $course['c_id']; ?>">
                       
                    </div>
                    <div class="col-xs-6">
                        <label for="course_image">Course Image</label>
                        <img src="<?php echo base_url( 'uploads/courses/'.$course['cimage']);?>" height="50" width="50">
                        <input class="form-control" type="file" id="image" name="image" >
                        <input type="hidden" name="old_img" value="<?php echo $course['cimage']; ?>">
                        <span class="err" style="color:red"></span>
                       
                    </div>
                </div>           
            </div>
            <div class="row">
              <div class="form-group">
                    <div class="col-xs-12">
                        <label for="course_desc">Course Description</label>
                        <textarea class="form-control ckeditor" id="course_desc" name="course_desc" rows="7"><?php echo $course['cdesc']?></textarea>
                        <div class="help-block">Feel free to use common tags: &lt;blockquote&gt;, &lt;strong&gt;, &lt;em&gt;</div>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="form-group">
                    <div class="col-xs-6">
                        <label for="course_desc">Course Highlight</label>
                        <div  id="my_highlight_div">
                            <?php $highlight = explode(',',$course['chighlight']);
                           

                               $cnt  = count($highlight); 
                               $i=1; 
                            foreach ($highlight as $value) {   ?>
                             <input type="text" name="course_highlight[]" id="course_highlight<?php echo $i?>" class="form-control" value="<?php echo $value; ?>">
                              <?php
                              if($i > 1)
                              { ?>
                                <a href="javascript:void(0)" id="remove_btn2<?php echo $i ?>" onclick="remove(<?php echo $i ?>,1)"><i class="fa fa-minus"></i></a>
                              <?php }

                               $i++; } ?>  
                            
                           
                           
                        </div>
                         <a href="javascript:void(0)" onclick="addbox()" style="float:right"><i class="fa fa-plus"></i></a>
                    </div>
                    <div class="col-xs-6"><label>Course Type</label>
                        <select name="course_type" class="form-control">
                            <option value="">Select Course Type</option>
                            <option value="1" <?php echo ($course['ctype'] == 1) ? 'selected': '';?>>Normal Training</option>
                            <option value="2" <?php echo ($course['ctype'] == 2) ? 'selected' : '';?>>Corporate Training</option>
                        </select>
                    </div>
                </div>
            </div>
        <div class="row">
          <div class="form-group">
         
            <div class="col-xs-3">
               <label for="status">Course Fees</label>
               <input type="number" class="form-control" id="cfees" name="cfees" class="form-control" value="<?php echo $course['cfees']; ?>">
                          
            </div>
            
         
            <div class="col-xs-3 disc" style="display: none;">
               <label for="status">Course Fees</label><input type="number" class="form-control" id="dfees" name="dfees" class="form-control" value="<?php echo $course['cdiscfees']; ?>">
                          
            </div>

            <div class="col-xs-6">
               <label for="status">In Offer</label>
               <select class="form-control" name="in_offer" id="in_offer" onchange="show_textOffer(this.value)">
                    <option value="0" <?php echo ($course['chighlight'] == 0) ? 'selected'  :''; ?>>NO</option>
                    <option value="1" <?php echo ($course['chighlight'] == 1) ? 'selected'  :'';?>>YES</option>
                </select>
            </div>
             
        </div>
</div>

<div class="row">
  <div class="form-group">
    <div class="col-xs-12">
        <button class="btn btn-warning" type="submit" onclick="add_form()">Update</button>
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
$(document).ready(function() {

    <?php if($course['cdiscount'] == 1){ ?>
        $('#in_offer').val(1).trigger('change');
    <?php }?>
              
              $.ajax({

                    url:"<?php echo base_url('courses/get_count'); ?>",
                    type: "POST",
                    async :false,
                    dataType:'json',

                    success:function(data)
                    {
                        console.log(data);
                        alert(data.count);
                    },
                })

    })
    
 
</script>
<script type="text/javascript">

function show_textOffer(value)
{
    if(value == 1)
    {
        $('.disc').css({'display':'block'});
    }else
    {
        $('.disc').css({'display':'none'});
    }
}
var i = '<?php echo $this->session->userdata('total_highlight'); ?>';

function addbox()
{
   
        $(my_highlight_div).append("<input type='text' name='course_highlight[]' id='course_highlight"+i+"' class='form-control' value=''>"+"<a href='javascript:void(0)' id='remove_btn2"+i+"' onclick='remove("+i+",0)'><i class='fa fa-minus'></i></a>");    
    i++;
    

}

function remove(val,flag)
{ 
    
//    my_div.innerHTML = my_div.remove();
        $('#course_highlight'+val).remove();
        $('#remove_btn2'+val).remove();
       
     

}

 function add_form()
 {
    // alert('djdmjd');

  
    $("#addform").validate({
        rules: {
                course_name: {
                    required: true,
                    
                },
                course_desc: {
                    required: true,
                    
                },
                course_hightlight:{
                    required:true,
                },
                cfees:{
                    required:true
                }
                       
            },

        messages: {
                 course_name : "Please Enter Course Name",

            
                course_desc: "Please Enter Description",                    
                   
                course_hightlight:"Please Enter Course Highlight",

                cfees:"Please Enter Course Fees"
                
            },success:"valid",

            submitHandler:function(form)
            {
                frm = $('#addform')[0];

                   // alert(dataString);

                 $.ajax({

                    url:"<?php echo base_url('courses/update_course'); ?>",
                    type: "POST",
                    data:new FormData(frm),
                    async :false,
                    processData: false,
                    contentType: false,
                    dataType:'json',
                    success:function(data){

                        // console.log(data.status);

                        console.log(data); 

                        if(data.status)
                        { 

                         alert('Data Updated Successfully');
                         window.location.href= "<?= base_url().'courses'?>";
                       
                        }else{
                            if(data.status == 0)
                            {
                                if(data.inputerror.length != undefined)
                                {
                                for (var i = 0; i < data.inputerror.length; i++) 
                                {
                                  $('[name="'+data.inputerror[i]+'"]').parent().addClass('has-error'); //select parent twice to select div form-g roup class and add has-error class
                                  $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                                }
                                }else
                                {
                                alert('Course Name Already Exist');
                                $('#course_name').focus();
                            
                                }
                             
                            }

                        }
                         
                        
                      
                    }
                        

                });



        
            }


    });



}
</script>