<style>
   .harsh{ margin-left: 5px;margin-right: 5px}                       
</style>
<main id="main-container">
   <!-- Page Header -->
   <div class="content bg-gray-lighter">
      <div class="row items-push">
         <div class="col-sm-7">
            <h1 class="page-heading">
               About Us  Details<small> into the table.</small>
            </h1>
         </div>
         <div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
               <!-- <li>Home</li> -->
               <!-- <li><a class="link-effect" href="<?= base_url().'Film'?>"> View Films Details</a></li> -->
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
            <!--  id="btnadd" data-target="#modal-top" -->
            <h3>ABOUT US <button type="button" class="btn btn-success btn-sm pull-right" onclick="show_data()"> <i class="fa fa-plus fa-1x"></i> Add </button></h3>
         </div>
         <div class="block-content">
            <div class="row">
            </div>
            <br>
            <div class="row">
               <?php  $count = 1; ?>
               <div class="responsive" style="overflow:scroll;">
                  <table class="table table-bordered table-striped js-dataTable-full">
                     <thead>
                        <th> # </th>
                        <th> Description  </th>
                        <th> Image </th>
                        <th> Status </th>
                        <th> Action </th>
                        <!-- <th>Action</th> -->
                     </thead>
                     <tbody>
                        <?php 
                           foreach($test as $value)  { ?>
                        <tr>
                           <td><?php echo  $count++ ;?></td>
                           <td> <?=  $value['about_desc']; ?></td>
                           <td> <img src="<?php echo base_url( 'uploads/about/'.$value['about_image']);?>" height="50" width="50"></td>
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
                           <td>
                              <div class="btn-group">
                                 <a  class="btn btn-xs btn-default edit_modal" href="<?php echo base_url().'About/edit_about/'.$value['about_id']; ?>" type=" button" data-toggle="tooltip" title="" data-original-title="Edit "><i class="fa fa-pencil"></i></a>
                                 <a href="javascript:void(0)" onclick="delete_data('<?= $value["about_id"]; ?>','<?= $value
                                 ['about_image']; ?>')" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></a>
                              </div>
                           </td>
                        </tr>
                        <?php }  ?>
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
<div class="modal fade" id="modal-top" role="dialog">
   <div class="modal-dialog modal-dialog-top">
      <div class="modal-content">
         <div class="block block-themed block-transparent remove-margin-b">
            <div class="block-header bg-primary-dark">
               <ul class="block-options">
                  <li>
                     <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                  </li>
               </ul>
               <h3 class="block-title">ADD ABOUT US</h3>
            </div>
            <div class="block-content">
               <form  id ="add_target" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                     <label class="control-label col-md-2">Description</label>
                     <div class= "col-md-8">
                      <textarea class="form-control ckeditor" id="add_cap" name="desc" ></textarea>
                        
                        </textarea>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-md-2">Thumbnail</label>
                     <div class="col-md-8">
                        <input type="file" class="form-control" name="thumbnail" id="add_fileToUpload"  />
                        <span class="err"></span>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-md-2">Status</label>
                     <div class="col-xs-8">
                        <select class="form-control" id="film_status" name="film_status">
                           <option value="1">Active</option>
                           <option value="0">In Active</option>
                        </select>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <div class="modal-footer">
            <input type="button" id="register" class="btn btn-success pull-left" value="Submit" name="submit">
         </div>
      </div>
   </div>
</div>
<!-- edit films using modal begins-->
<div class="modal fade" id="edit-modal" role="dialog">
   <div class="modal-dialog modal-dialog-top">
      <div class="modal-content">
         <div class="block block-themed block-transparent remove-margin-b">
            <div class="block-header bg-primary-dark">
               <ul class="block-options">
                  <li>
                     <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                  </li>
               </ul>
               <h3 class="block-title">EDIT ABOUT</h3>
            </div>
            <div class="block-content">
               <form  id ="target" class="form-horizontal"  method="post" enctype="multipart/form-data">
                  <div class="form-group">
                     <label class="control-label col-md-2">Description</label>
                     <div class= "col-md-8">
                        <input type="hidden" name="did" id="did" class="form-control" >
                        <textarea class="form-control ckeditor" id="edit_desc" name="edit_desc" contenteditable="true"></textarea>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-md-2">Thumbnail</label>
                     <div id="kiran" class="col-md-8">
                        <input type="file" class="form-control" name="thumbnail" id="fileToUpload" /> 
                        <input type="hidden" class="form-control" name="old_img" id="fileToUpload1" />
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-md-2">Status</label>
                     <div class="col-xs-8">
                        <select class="form-control" id="efilm_status" name="efilm_status">
                           <option value="1">Active</option>
                           <option value="0">In Active</option>
                        </select>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <div class="modal-footer">
            <input type="submit" id="send" class="btn btn-success pull-left" value="Submit" name="submit">
         </div>
      </div>
   </div>
</div>
<script src="<?php echo base_url();?>assets/js/select2.full.min.js"></script>
<script type="text/javascript">
   //$("#edit_desc").ckeditor();
    
    CKEDITOR.replace( 'edit_desc' );

var textarea = document.body.appendChild( document.createElement( 'textarea' ) );
CKEDITOR.replace( textarea );
    
   $('#add_cap').ckeditor();
</script>
<script type="text/javascript">

   $('#register').click(function() 
   {
   
   
   
     var name = $('#add_cap').val();
   
    
   
     var fileInput = document.getElementById('add_fileToUpload');
   
   
   
     var filePath = fileInput.value;
   
   
   
     var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
   
   
   
    
   
     var status = $('#film_status').val();
   
   
   
   
   
     if(name.length < 1)
   
     {
   
   
   
       alert(" Caption cannot be blank ");
   
       return false;
   
   
   
     }
   
     else{
   
     if(!allowedExtensions.exec(filePath))
   
     {
   
         alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.'); 
   
   
   
         fileInput.value = '';
   
   
   
         return false;
   
   
   
     }
   
     else {
   
   
   
     
   
   
   
     frm = $('#add_target')[0];
   
   
   
       $.ajax({
   
   
   
            url: "<?php echo base_url('about/add_about'); ?>",
   
            type: "POST",
   
            data:new FormData(frm),
   
            async :false,
   
            processData: false,
   
            contentType: false,
   
            dataType:'json',
   
   
   
            success:function(data){
   
   
   
               // window.location.reload(true);
   
   
   
             console.log(data);
   
   
   
             if(data.status == 'true')
   
             {
   
   
   
               alert('Data Inserted Successfully.');
   
   
   
               window.location.reload(true);
   
   
   
             }else
   
             {
   
               for (var i = 0; i < data.inputerror.length; i++) 
   
               {
   
                   $('[name="'+data.inputerror[i]+'"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
   
                   $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
   
               }
   
             }
   
   
   
            }
   
   
   
       });
   
     
   
     }
   
   
   
   }
   
   
   
     
   
   });
   
   
   
   
   
</script>
<!-- onclick edit data using below modal begins here -->
<script type="text/javascript">
   $('.edit_modal').click( function()
   
   {
   
   
   
     var id = $(this).attr('id');
   
   
   
       $('#kiran').removeClass('has-error');
   
       $('.err').text('');
   
   
   
   
   
      // alert(id);  
   
   
   
     $.ajax({
   
   
   
        url: "<?php echo base_url('about/edit_about'); ?>",
   
        type: "POST",
   
        data: {id : id},
   
        dataType:'json',
   
        success:function(data){
   
   
   
         // $('#edit_desc').val(data[0].about_desc);
   
        CKEDITOR.instances['edit_desc'].setData(data[0].about_desc);
   
         // console.log(data[0].about_desc);
   
         
   
         
   
          $('#efilm_status').val(data[0].status);
   
   
   
          
   
       $('#did').val(data[0].about_id);
   
   
   
   
   
       
   
   
   
          $("#fileToUpload").html(data[0].thumbnail);
   
          //$("#tag").val(data[0].tags);
   
   
   
    
   
          $("#fileToUpload1").val(data[0].thumbnail);
   
   
   
   
   
   
   
   
   
          //$("#category").val(data[0].category);
   
   
   
   
   
   
   
          $("#edit-modal").modal('show');
   
   
   
        }
   
   
   
     });
   
   
   
   
   
   
   
   
   
   });
   
   
   
</script>
<script type="text/javascript">
   $('#send').click(function()
   
     {
       
   
      var name= $('textarea#edit_desc').val();
       
       
   

       // id = $(this).attr('id').replace('save','');

            
        var fileInput = document.getElementById('fileToUpload');
   
   
        var filePath = fileInput.value;
   
   
   
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
   
   
   
   
   
       if(name == null || name == "")
       {
   
         alert(" Description cannot be blank ");
         $('#edit_desc').focus();
         return false;
   
   
   
       }
   
        else   
   
         if($('#fileToUpload1').text() != '' &&  !allowedExtensions.exec(filePath) )  
   
         {  
   
             alert("Please upload file having extensions .jpeg/.jpg/.png/.gif only.");  
   
   
   
              fileInput.value = '';
   
   
   
              return false;
   
          } 
   
       else{
   
   
   
       var id = $('#did').val();
   
   
   
       // alert(id);
   
   
   
   
   
         frm = $('#target')[0];
   
   
   
         $.ajax({
   
   
   
              url: "<?php echo base_url('about/updateDirect/'); ?>"+id,
   
              type: "POST",
   
              data:new FormData(frm),
   
              async :false,
   
              processData: false,
   
              contentType: false,
   
              dataType:'json',
   
   
   
              success:function(data){
   
   
   
                 // window.location.reload(true);
   
   
   
               console.log(data);
   
   
   
               if(data.status == 'true')
   
               {
   
   
   
                 alert('Data updated Successfully.');
   
   
   
                 window.location.reload(true);
   
   
   
               }else
   
               {
   
                 for (var i = 0; i < data.inputerror.length; i++) 
   
                 {
   
                     $('[name="'+data.inputerror[i]+'"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
   
                     $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
   
                 }
   
               }
   
   
   
              }
   
   
   
         });
   
      
   
   
   
   
   
       }
   
       
   
   });
   
   
   
   
   
   // function isconfirm(url_val){
   
   //     // alert(url_val);
   
   //     if(confirm('Are you sure you wanna delete this ?') == false)
   
   //     {
   
   //         return false;
   
   //     }
   
   //     else
   
   //     {
   
   //         location.href=url_val;
   
   //     }
   
   // }
   
   
   
   
   
     function show_data()
     {
        window.location.href="<?= base_url()?>about/show_add";
     }
   
       function delete_data(id,image_name)
       {
   
         // alert(id)
   
           if(confirm('Are you sure want to delete this item?'))
           {
   
               $.ajax({
   
                type:'POST',
   
                data:{'image_name':image_name},
   
                 url:'<?= base_url() ?>about/delete_about/'+id,
   
   
   
                 dataType:'json',
   
   
   
                 success:function(data)
   
                 {
   
                   window.location.reload(true);
   
                 }
   
   
   
               });
   
           }
   
   
   
       }
   
   
   
   
</script>

<!-- delete data using modal js function-->