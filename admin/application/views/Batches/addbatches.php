  <main id="main-container">

    <!-- Page Header -->

    <div class="content bg-gray-lighter">

        <div class="row items-push">

            <div class="col-sm-7">

                <h1 class="page-heading">

                    Add Batches Details <small> into the table.</small>

                </h1>

            </div>

            <div class="col-sm-5 text-right hidden-xs">

                <ol class="breadcrumb push-10-t">

                    <li>Home</li>

                    <li><a class="link-effect" href="<?= base_url().'UpcomingBatch' ?>">View Batches </a></li>

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

                    <li>
                        

                    </li>                                

                </ul>

              


            </div>

            <div class="block-content">

               

            
                <form class="form-horizontal push-10-t push-10" action="" method="post" id="addform" enctype="multipart/form-data">
                  
               
                

                  
                    <div class="row">
                      <div class="form-group">
                      
                    <div class="col-xs-3"><label>Course Type</label>
                        <select name="course_type" class="form-control" onchange="load_course(this.value);">
                            <option value=""> Select Course Type</option>
                            <option value="1">Normal Training</option>
                            <option value="2">Corporate Training</option>
                        </select>
                    </div>
                       
                    <div class="col-xs-3"><label>Main Course </label>
                        <select name="course_name" class="form-control"  id="course_name" onchange="load_subcourse(this.value)">
                            
                        </select>
                    </div>

                    <div class="col-xs-3">
                        <label> Syllabus</label>
                        <select name="syllabus_name" class="form-control"  id="syllabus_name">
                            
                        </select>
                    </div>

                     <div class="col-xs-3">
                        <label> Batch Start Date</label>
                        <input type="date" class="form-control"  name="batch_start_date" id="batch_start_date" date-format="yyyy-mm-dd">
                            
                        </select>
                    </div>
                </div> 



            </div>
            <div class="row">
              <div class="form-group">
                <div class="col-xs-3">
                        <label for="course_desc">Batch Week From</label>
                        <select name="batch_from" class="form-control">
                            <option value="">-select Week-</option>
                            <option value="1">Monday</option>
                            <option value="2">Tuesday</option>
                            <option value="3">Wednesday</option>
                            <option value="4">Thursday</option>
                            <option value="5">Friday</option>
                            <option value="6">Saturday</option>
                            <option value="7">Sunday</option>
                        </select>
                    </div>
                    <div class="col-xs-3">
                        <label for="course_desc">Batch Week To</label>
                        <select name="batch_to" class="form-control">
                            <option value="">-select Week-</option>
                          
                            <option value="1">Monday</option>
                            <option value="2">Tuesday</option>
                            <option value="3">Wednesday</option>
                            <option value="4">Thursday</option>
                            <option value="5">Friday</option>
                            <option value="6">Saturday</option>
                            <option value="7">Sunday</option>
                        </select>
                    </div>

                    <div class="col-xs-3">
                        <label for="course_desc">Batch Timing From</label>
                        <input type="time"  class="form-control" name="hrsfrm" placeholder="hrs:mins" value="" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" class="inputs duration t1 time hrs" required>
                    </div>

                    <div class="col-xs-3">
                        <label for="course_desc">Batch Timing To</label>
                        <input type="time"  class="form-control" name="hrsto" placeholder="hrs:mins" value="" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" class="inputs duration t1 time hrs" required>
                    </div>
                </div>
            </div>
         
        <div class="row">
          <div class="form-group">
         
            <div class="col-xs-3">
               <label for="status">Batch Type</label>
                 <select class="form-control" name="batch_type" id="batch_type">
                    <option value="1">Training</option>
                    <option value="2">Workshop</option>
                </select>        
            </div>
            <div class="col-xs-6 venue" >
                <label>Venue Details </label>
                <textarea class="form-control" id="venue_detail" name="venue_detail" rows="7" placeholder="Enter Venue Details" ></textarea>

            </div>
            <div class="col-xs-3">
               <label for="status">Status</label>
               <select class="form-control" name="status" id="status">
                    <option value="1" >Active</option>
                    <option value="0">InActive</option>
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

    function load_course(ctype)
    {
        if(ctype!='')
        {


        $.ajax({
            type:'post',
            url:'<?= base_url()?>UpcomingBatches/view_courses/'+ctype,
            dataType:'json',
            success:function(data)
            {
                var opt = '<option value="">-Select Main Course-</option>';
               for(var i=0; i<data['data'].length; i++)
               {
                opt +='<option value='+data['data'][i].c_id+'>'+data['data'][i].cname+'</option>';
               }

               $('#course_name').html(opt);
            },  
            error:function(data)
            {

            }
        })
    }
}


function load_subcourse(cid)
{

    if(cid!='')
    {
        $.ajax({
            type:'post',
            url:'<?= base_url()?>UpcomingBatches/view_syllabus/'+cid,
            dataType:'json',
            success:function(data)
            {
                var opt = '<option value="">-Select Syllabus - </option>';
                for(var j=0; j<data['data'].length; j++)
                {
                    opt+='<option value='+data['data'][j].s_id+'>'+data['data'][j].sname+'</option>';
                }

                $('#syllabus_name').html(opt);
            },
            error:function(data)
            {

            }
        })
    }
}

/*
$('#batch_type').change(function(e,v){

        if($(this).val() == 2)
        {
            $('.venue').css({'display':'block'});
        }else
        {
            $('.venue').css({'display':'none'});
        }
});*/

    $("#about_desc").ckeditor();
var i =1;
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
                course_type: {
                    required: true,
                    
                },
                course_name: {
                    required: true,
                    
                },
                syllabus_name:{
                    required:true,
                },
                batch_start_date:{
                    required:true,
                },
                batch_from:{
                    required:true,
                },
                hrsfrm:{
                    required:true,
                }
                 ,
                 hrsto:{
                    required:true,
                }      
            },

        messages: {
                 course_type : "Please Select course type",
            
                course_name: "Please Select Course type",                    
                   
                syllabus_name:"Please Select syllabus",

                batch_start_date:"Please enter batch start date",

                batch_from:"Please Select Batch Week",

                hrsfrm:"Please enter Batch Time From ",

                
                hrsto:"Please enter Batch Time To",
                
            },success:"valid",

            submitHandler:function(form)
            {
                frm = $('#addform')[0];

                   // alert(dataString);

                 $.ajax({

                    url:"<?php echo base_url('UpcomingBatches/save_batches'); ?>",
                    type: "POST",
                    data:new FormData(frm),
                    async :false,
                    processData: false,
                    contentType: false,
                    dataType:'json',
                    success:function(data){

                        // console.log(data.status);

                       

                        if(data.status)
                        { 

                         alert('Data Inserted Successfully');
                         window.location.href= "<?= base_url().'UpcomingBatches'?>";
                       
                        }else
                        {
                            if(data.status == 0)
                            {
                                alert('Batch Already  Added');
                                $('#course_name').focus();
                            }else
                            {
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



}
</script>