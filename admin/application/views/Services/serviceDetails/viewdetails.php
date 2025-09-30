<style>
   .harsh{ margin-left: 5px;margin-right: 5px}                       
</style>
<main id="main-container">
   <!-- Page Header -->
   <div class="content bg-gray-lighter">
      <div class="row items-push">
         <div class="col-sm-7">
            <h1 class="page-heading">
               Services  Details<small> into the table.</small>
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
            <h3>Service Details Data <a type="button" class="btn btn-success btn-sm pull-right" href="<?= base_url().'services'?>" >  Go Back </a></h3>
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
                        <th> Service Heading  </th>
                        <!-- <th> Service Image </th> -->
                        <th> Service Description </th>
                        <th>Status</th>
                        <th> Action </th>
                        

                        <!-- <th>Action</th> -->
                     </thead>
                     <tbody>
                        <?php 
                           foreach($test as $value)  { ?>
                        <tr>
                           <td><?php echo  $count++ ;?></td>
                           <td> <?=  $value['serv_heading']; ?></td><!-- 
                           <td><img src=" <?php echo base_url( 'uploads/services/'.$value['serv_image']);?>" height="50" width="50"></td> -->
                           <td><?= $value['serv_description']?></td>
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
                                 <a  class="btn btn-xs btn-default edit_modal" href="<?php echo base_url().'Services/edit_serviceDetail/'.$value['ser_pg_id']; ?>" type=" button" data-toggle="tooltip" title="" data-original-title="Edit "><i class="fa fa-pencil"></i></a>
                                 <a href="javascript:void(0)" onclick="delete_data('<?= $value["ser_pg_id"]; ?>')" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></a>
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

<script src="<?php echo base_url();?>assets/js/select2.full.min.js"></script>

   
   
   
   
</script>
<script type="text/javascript">   
   
   
   
   
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
   
   
   
   
   
     
   
       function delete_data(id)
       {
   
         // alert(id);
           if(confirm('Are you sure want to delete this item?'))
           {
   
               $.ajax({
      
                 type:'POST',

                 url:'<?= base_url() ?>Services/delete_servicesData/'+id,
                 dataType:'json',
                 success:function(data)
                 {
                      
                     window.location.reload(true);
   
                 },
                 error:function(data)
                 {
                       window.location.reload(true);
   
                 }
    
               });
   
           }
   
   
   
       }
   
   
   
   
</script>

<!-- delete data using modal js function-->