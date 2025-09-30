<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css"> 
 <main id="main-container">







                <!-- Page Header -->







                <div class="content bg-gray-lighter">







                    <div class="row items-push">







                        <div class="col-sm-7">







                            <h1 class="page-heading">





Batches Details<small> into the table.</small>







                            </h1>







                        </div>







                        <div class="col-sm-5 text-right hidden-xs">







                            <ol class="breadcrumb push-10-t">






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
<h3>UPCOMING BATCHES <a type="button" class="btn btn-success btn-sm pull-right"  data-toggle="tooltip" data-original-title="ADD UPCOMING BATCHES





  " href="<?php echo base_url().'UpcomingBatches/add_batches'?>"> <i class="fa fa-plus fa-1x"></i> Add </a></h3>


                             



                             



                    </div>



                    <div class="block-content">


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

                         



                         <div class="row">


                         </div>    <br>



                         <div class="row">
                         <?php  $count = 1; ?>
                            <div class="responsive" style="overflow:scroll;">
                                    <table class="table table-bordered table-striped js-dataTable-full">
                                        <thead>
                                            <th># </th>
                                            <th> COURSE   </th>
                                            <th>START DATE</th>
                                            <th> SYLLABUS</th>
                                            <th> DAYS </th>
                                            <th>BATCH TYPE</th>
                                            <th>TIMINGS </th>
                                            
                                           <th>Action</th>
                                        </thead>
                                        <tbody>
                                       <?php 
                              foreach ($batches as  $value) {
 
                                             ?> 
                                        <tr>
                                          <td><?php echo  $count++ ;?></td>
                                          
                                          <td><?php echo $value['cname']; ?></td>
                                          
                                          <td><?php echo date('d M Y',strtotime($value['b_date']));?></td>
                                          <td><?php echo $value['sname']; ?>
                                          </td>

                                          <td><?php echo $this->upcoming->getWeekendName($value['b_from'],$value['b_to'])?>
                                          </td>
                                          <td><?php echo ($value['batch_type'] == 1 ) ? 'Training' : 'Workshop'; ?></td>
                                          <td><?php echo  date("g:i a", strtotime($value['batch_time_from'])) .' to '.date("g:i a", strtotime($value['batch_time_to'])) ?></td>
                                          <td>
                                            <div class="btn-group">
                                                    <a   href="<?= base_url().'UpcomingBatches/edit_batches/'.$value['b_id'].''?>" class="btn btn-xs btn-default update-modal" id ="" type=" button" data-toggle="tooltip" title="" data-original-title="Edit Upcoming Batches"><i class="fa fa-pencil"></i></a>
                                                    <a href="javascript:void(0)" onclick="delete_data('<?= $value["b_id"] ?>' )" class="btn btn-xs btn-default" type="button" data-toggle="tooltip"  data-original-title="Remove Upcoming Batches"><i class="fa fa-times"></i></a>
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
                            <h3 class="block-title">ADD COURSES</h3>
                        </div>
                        <div class="block-content">
                           <form  id ="add_director" class="form-horizontal" method="post" enctype="multipart/form-data">
                                 <div class="form-group">
                                     <label class="control-label col-md-2">Image </label>
                                         <div class="col-md-8">
                                            <input type="file" class="form-control" name="image"  id="add_image" accept="image/*" />
                                            <span class="err"></span>
                                         </div>
                                 </div>
                                 <div class="form-group">
                                   <label class="control-label col-md-2">Status</label>
                                   <div class="col-xs-8">
                                      <select class="form-control" name="dr_status" id="dr_status">
                                          <option value="1">Active</option>
                                          <option value="0">In Active</option>
                                      </select>
                                   </div>
                                 </div>
                           </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <input type="button" id="save" class="btn btn-success pull-left" value="Submit" name="submit">
                    </div>   
               </div>
          </div>
    </div>

   <!-- edit films using modal begins-->

<div class="modal fade" id="edit_direct" role="dialog">
            <div class="modal-dialog modal-dialog-top">
                <div class="modal-content">
                    <div class="block block-themed block-transparent remove-margin-b">
                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">EDIT CLIENT</h3>
                        </div>
                    <div class="block-content">
                      <form  id ="edit_director" class="form-horizontal" method="post" enctype="multipart/form-data">
                         <div class="form-group">
                             <label class="control-label col-md-2">Image </label>
                                 <div  id ="kiran" class="col-md-8">
                                    <input type="file" class="form-control" name="image" id="edit_image" accept="image/*"/>  
                                    <span class="err"></span>       
                                    <input type="hidden" class="form-control" name="old_img" id="data_image" />
                                    <input type="hidden" class="form-control" name="direct_id" id="direct_id" />
                                 </div>
                         </div>
                         <div class="form-group">
                            <label class="control-label col-md-2">Status</label>
                              <div class="col-md-8">
                                  <select class="form-control" name="edr_status" id="edr_status">
                                      <option value="1">Active</option>
                                      <option value="0">In Active</option>
                                  </select>
                              </div>
                         </div>
                      </form>
                    </div>
                  </div>
                <div class="modal-footer">
                  <input type="button" id="edit" class="btn btn-success pull-left" value="Submit" name="submit">
             </div>
         </div>
     </div>
  </div>





 

<script type="text/javascript">
  





function delete_data(id)
    {

      if(confirm('Are you sure you want to delete this item?'))
      {
          $.ajax({

            type:'POST',

            url:'<?= base_url() ?>UpcomingBatches/delete_batches/'+id,

            dataType:'json',

            success:function(data)
            {
                alert('Data Deleted Successfully');
                window.location.reload(true);
            }
            
        });
      }
}


</script>
