  <?php 

function encrypt_decrypt($action, $string) {

    // print_r($action);  print_r($string);

    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'This is my secret key';
    $secret_iv = 'This is my secret iv';

    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

     if( $action == 'decrypt' ){
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}


?>




<script>

//     jQuery(function () {

//                 // Init page helpers (BS Datepicker + BS Datetimepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs plugins)

//                 App.initHelpers(['datepicker']);

//             });

    

//     setTimeout(function() {

//     $('.alert').fadeOut('fast');

// }, 2000);

function open1()
{
    // alert('nje');
   
    
   // $('#loginform')[0].reset();

  window.location.href='<?= base_url().'home/show_add'?>'


}


function add_form()
{

    $("#addform").validate({
        rules: {
                image: {
                    required: true,
                    
                },
                desc: {
                    required: true,
                    
                },

                user_status:{

                    required:true
                },
               
            },

        messages: {
                 image : "Please insert image",

            
                desc: "Please Enter Description"                    
                   
                
                
            },success:"valid",

            submitHandler:function(form)
            {
                frm = $('#addform')[0];

                   // alert(dataString);

                 $.ajax({

                    url:"<?php echo base_url('home/add_home'); ?>",
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
                         window.location.reload();
                       
                        }

                        
                        console.log();
                    }

                });



        
            }


    });


 }
</script>


    



  <main id="main-container">



    <!-- Page Header -->



    <div class="content bg-gray-lighter">



        <div class="row items-push">



            <div class="col-sm-7">



                <h1 class="page-heading">



                    Home Details

                </h1>



            </div>



            <div class="col-sm-5 text-right hidden-xs">



                <ol class="breadcrumb push-10-t">


<!-- 
                    <li>Home</li>



                    <li><a class="link-effect" href="<?= base_url().'User' ?>">Home Details</a></li> -->



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



 <h3><button type="button" class="btn btn-success btn-sm pull-right"  onclick="open1()"> <i class="fa fa-plus fa-1x"></i> Add </button> </h3> 



                    </li>                                



                </ul>



               <h3>Home </h3>

               

            </div>



            <div class="block-content">

                 

                 <div class="row">

                                     <div class="col-md-10 col-lg-10" > 

                                  <?php
              $success_msg= $this->session->flashdata('success_msg');
              $error_msg= $this->session->flashdata('error_msg');
 
                  if($success_msg){
                    ?>
                    <div class="alert alert-success">
                      <?php echo $success_msg; ?>
                    </div>
                  <?php
                  }
                  if($error_msg){
                    ?>
                    <div class="alert alert-danger">
                      <?php echo $error_msg; ?>
                    </div>
                    <?php
                  }
                  ?>


                               </div>



                                </div>

                <div class="row">





     

                    

                </div><BR>



<!-- filter data -->



                <div class="row">  
                                  
                  </div>

                               <?php if(@$message != ''){ ?>

                            <a href="<?= base_url().'User'?>"><?= @$message;?></a>

                            <?php } ?>

                              <br>



                               <div class="row">

                                </div><BR>



<!-- user view table -->



                <div class="row" >



                  <div class="responsive">

                       <table class="table table-bordered table-striped js-dataTable-full">

                                        <thead>

                                            <!-- <th><input type="checkbox" name="check" id="checkall"></th> -->

                                            <th>#</th>

                                            <th>Image</th>

                                            <th>Description</th>
                                             
                                            <th>Status</th>

                                            <th>Action</th>

                                        </thead>

                                        <tbody>

                                           <?php $count = 1; 



                                          foreach ($test as  $value) {
                                              # code...

                                           ?>

                                            <tr>

                                                <!-- <td><input type="checkbox" name="check" id="checkall"></td> -->

                                                <td><?php echo $count++ ;?></td>

                                                <td> 
                                                <img src=" <?php echo base_url( 'uploads/home/'.$value['home_image']);?>" height="50" width="50"></td>
                                                    

                                                <td><?= $value['home_desc'] ?></td>

                                               
                                                <td>
                                                    <?php if($value['status'] == 1)
                                                    {
                                                        echo '<span style="color:green">Active</span>';
                                                    }else
                                                    {
                                                        echo '<span style="color:red">In Active</span>';
                                                    }
                                                    ?>
                                                </td>

                                                <td> <div class="btn-group">
                                                    <a href="<?php echo base_url().'/home/edit_home/'.$value['home_id'] ?>" class="btn btn-xs btn-default" type="button" onClick="editform1(<?= $value['home_id']; ?>)" data-toggle="tooltip" data-original-title="Edit Home"><i class="fa fa-pencil"></i></a>   

                                                    <a href="javascript:void(0)" onclick="return isconfirm('<?php echo base_url('home/delete_home/'.$value['home_id']); ?>')" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Remove Home"><i class="fa fa-times"></i></a>

                                                     </div>  
                                                </td>

                                            

                                            </tr>        

                                     <?php  } ?>
                                        </tbody>

                                    </table>

                </div>





            </div>









        </div>



    </div>



    <!-- END Mega Form -->



</div>



<!-- END Page Content -->



</main>




        <!-- Top Modal -->
        <div class="modal fade" id="modal-top" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-top">
                <div class="modal-content">
                    <div class="block block-themed block-transparent remove-margin-b">
                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">ADD HOME</h3>
                        </div>
                        <div class="block-content">
                              <form class="form-horizontal push-5-t" id="addform" action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                                <label class="control-label col-md-2"  for="p_name">Image</label>
                                            <div class="col-xs-8">
                                                <input class="form-control" type="file" id="image" name="image" >
                                            </div>
                                        </div>

                                         <div class="form-group">         
                                                <label class="control-label col-md-2">Descrption</label>
                                            <div class="col-xs-8">
                                                <input class="form-control" type="text" id="desc" name="desc" >
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                       
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Status</label>
                                            <div class="col-xs-8">
                                                <select class="form-control" name="user_status" id="user_status">
                                                    <option value="1">Active</option>
                                                    <option value="0">In Active</option>
                                                </select>
                                            </div>
                                        </div>
                                    
                                         <div class="form-group">
                                            <div class="col-md-12 col-lg-12 col-xs-12">
                                                <div class="col-md-8 col-lg-8 col-xs-12">
                                                    <button class="btn btn-sm btn-success" type="submit" onclick="add_form()">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- END Top Modal -->



 <div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-top">
                <div class="modal-content">
                    <div class="block block-themed block-transparent remove-margin-b">
                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">EDIT HOME</h3>
                        </div>
                        <div class="block-content">
                              <form class="form-horizontal push-5-t" id="editform"  method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                                <label class="control-label col-md-2" for="p_name">Image</label>
                                            <div class="col-lg-6">
                                                <input class="form-control" type="file" id="image" name="image">
                                                <input class="form-control" type="hidden" id="home_id" name="e_id">
                                                <input class="form-control" type="hidden" id="old_image" >

                                            </div>
                                        </div>

                                         <div class="form-group">         
                                                <label class="control-label col-md-2">Desc</label>
                                            <div class="col-xs-6">
                                                <input class="form-control" type="text" id="edit_desc" name="desc" >
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                       

                                        <div class="form-group">
                                            <label class="control-label col-md-2">Status</label>
                                            <div class="col-xs-6">
                                                <select class="form-control" name="euser_status" id="euser_status">
                                                    <option value="1">Active</option>
                                                    <option value="0">In Active</option>
                                                </select>
                                            </div>
                                        </div>
                                    
                                         <div class="form-group">
                                            <div class="col-md-12 col-lg-12 col-xs-12">
                                                <div class="col-md-6 col-lg-6 col-xs-12">
                                                    <button class="btn btn-sm btn-success" type="submit" onclick="edit_form()">Save</button>
                                                </div>
                                            </div>
                                        </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>

<script>

function editform1(id)
{
    // alert('jdejf');

    $('#modal-update').modal('show');
    // alert(id);

      $.ajax({
        
         url: "<?php echo base_url('home/edit_home/'); ?>"+id,
         type:"POST",
         dataType:"json",
         success:function(data)
         {
            $('#edit_image').val(data[0].home_image);

            $('#edit_desc').val(data[0].home_desc);

          
            $('#home_id').val(data[0].home_id);

            $('#euser_status').val(data[0].status);

            

            console.log(data[0].home_desc);

            console.log(data[0].home_image);

            console.log(data);
         }

      });
    
 }

</script>

<script type="text/javascript">
    
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
                    window.location.reload();

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

function isconfirm(url_val){
    // alert(url_val);
    if(confirm('Are you sure you wanna delete this ?') == false)
    {
        return false;
    }
    else
    {
        location.href=url_val;
    }
}


setTimeout(function() {
    $('.alert').fadeOut('fast');
}, 2000);


</script>

