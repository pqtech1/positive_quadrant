

        <!-- <link rel="stylesheet" href="<?php echo base_url() ;?>assets/js/plugins/summernote/summernote.min.css"> -->



<!-- <script type="text/javascript">

  jQuery(function () {

                // Init page helpers (BS Datepicker + BS Datetimepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs plugins)

                App.initHelpers(['ckeditor']);

            });

</script> -->

<!---fontawesome link--> <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css"> <!---fontawesome link-->

<main id="main-container">















                <!-- Page Header -->















                <div class="content bg-gray-lighter">















                    <div class="row items-push">















                        <div class="col-sm-7">















                            <h1 class="page-heading">











OurPortfolio Details<small> into the table.</small>















                            </h1>















                        </div>















                        <div class="col-sm-5 text-right hidden-xs">















                            <ol class="breadcrumb push-10-t">













<!-- 

                                <li>Home</li>















                                <li><a class="link-effect" href="<?= base_url().'Director'?>"> View Director Details</a></li> -->















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

<h3>OUR PORTFOLIO<button type="button" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#modal-top"> <i class="fa fa-plus fa-1x"></i> Add </button></h3>





                             







                             







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
                                            <th>Person Name</th>
                                            <th>Designation</th>
                                            <th> Image  </th>

                                            <th> Status</th>

                                            <th class="hidden-xs hidden-lg">  </th>

                                            <th class="hidden-xs hidden-lg"> </th>

                                            <th class="hidden-xs hidden-lg"> </th>

                                            <th> Action </th>

                                            <!-- <th>Action</th> -->

                                        </thead>

                                        <tbody>

                                       <?php 

                              foreach ($test as  $value) {

 

                                             ?> 

                                        <tr>

                                          <td><?php echo  $count++ ;?></td>
                                          <td><?php echo $value['name']?></td>
                                          <td><?php echo $value['designation']?></td>
                                          <td>
                                          <img src=" <?php echo base_url( 'uploads/portfolio/'.$value['image']);?>" height="50" width="50">&nbsp;&nbsp;&nbsp;&nbsp;
                                          </td>
                                          <td>

                                              <?php if($value['status'] == 1)

                                              {

                                                  echo '<span style=color:green>Active</span>';

                                              }else

                                              {

                                                  echo '<span style=color:red>In Active</span>';

                                              }

                                              ?>

                                          </td>



                                          <td class="hidden-xs hidden-lg"></td>

                                          <td class="hidden-xs hidden-lg"></td>

                                          <td class="hidden-xs hidden-lg"></td>



                                          <td>

                                          <div class="btn-group">

                                                    <a  class="btn btn-xs btn-default update-modal" id ="<?php echo $value['portfolio_id']; ?>" type=" button" data-toggle="tooltip" title="" data-original-title="Edit Portfolio"><i class="fa fa-pencil"></i></a>

                                                    <a href="javascript:void(0)" onclick="delete_data('<?= $value["portfolio_id"] ?>')" class="btn btn-xs btn-default" type="button" data-toggle="tooltip"  data-original-title="Remove Portfolio"><i class="fa fa-times"></i></a>

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

                            <h3 class="block-title">ADD PORTFOLIO</h3>

                        </div>

                        <div class="block-content">

                           <form  id ="add_director" class="form-horizontal" method="post" enctype="multipart/form-data">

                                 <div class="form-group">

                                     <label class="control-label col-md-4">Portfolio Image </label>

                                         <div class="col-md-8">

                                            <input type="file" class="form-control" name="image"  id="add_image" accept="image/*" />

                                            <span class="err"></span>

                                         </div>

                                 </div>

                                 <div class="form-group">

                                     <label class="control-label col-md-4">Name Of Person</label>

                                         <div class="col-md-8">

                                            <input type="text" name="person_name"  id="person_name" class="form-control"> 

                                         </div>

                                 </div>

                                 <div class="form-group">

                                   <label class="control-label col-md-2">Designation</label>
                                   <div class="col-md-4">

                                    <input type="text" name="designation" id="designation" class="form-control">

                                   </div>

                                   <label class="control-label col-md-2">Designation</label>
                                   <div class="col-md-4">

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

                            <h3 class="block-title">EDIT PORTFOLIO</h3>

                        </div>

                    <div class="block-content">

                      <form  id ="edit_director" class="form-horizontal" method="post" enctype="multipart/form-data">

                         <div class="form-group">

                             <label class="control-label col-md-2">Image </label>

                                 <div  id ="kiran" class="col-md-8">

                                    <input type="file" class="form-control" name="image" id="edit_image" accept="image/*"/>  

                                    <span class="err"></span>       

                                    <input type="hidden" class="form-control" name="old_img" id="data_image" />

                                    <input type="hidden" class="form-control" name="portfolio_id" id="portfolio_id" />

                                 </div>

                         </div>
                             <div class="form-group">

                                     <label class="control-label col-md-2">Person Name </label>

                                         <div class="col-md-10">

                                            <input type="text" name="person_name" id="edt_person_name" class="form-control">



                                         </div>

                                 </div>
                         <div class="form-group">
                            <label class="control-label col-md-2">Designation</label>
                                   <div class="col-md-4">

                                    <input type="text" name="edt_designation" id="edt_designation" class="form-control">

                                   </div>

                            <label class="control-label col-md-2">Status</label>

                              <div class="col-md-4">

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











 <!-- <script src="<?php echo base_url(); ?>assets/js/plugins/summernote/summernote.min.js"></script>



 <script>

            jQuery(function () {

                // Init page helpers (Summernote + CKEditor + SimpleMDE plugins)

                App.initHelpers(['summernote']);

            });

 </script> -->

<script type="text/javascript">

 

  $('#save').click(function()

  {

    // alert('jhsjdk');

    

    

    var fileInput = document.getElementById('add_image');



    var filePath = fileInput.value;



    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;







    if( $('#direct_image').text() == "" && !allowedExtensions.exec(filePath))

    {

        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');



        fileInput.value = '';



        return false;



    }else{



      // var data= $('#add_director').serialize();



        frm = $('#add_director')[0];



      $.ajax({



           url: "<?php echo base_url('Ourportfolio/add_home'); ?>",

           type: "POST",

           data:new FormData(frm),

           async :false,

           processData: false,

           contentType: false,

           dataType:'json',



           success:function(data){



              // window.location.reload(true);

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

    

});



  

</script>



  

 <!-- onclick edit data using below modal begins here -->





<script type="text/javascript">

  

  $('.update-modal').click( function()

  {



        $('#kiran').removeClass('has-error');

        $('.err').text('');





    var id = $(this).attr('id');

    // alert(id);



     //$('#edit_direct').modal('show');





     



    $.ajax({



       url: "<?php echo base_url('Ourportfolio/edit_home/'); ?>"+id,

       type: "POST",

       dataType:'json',

       // beforeSend(response){

       //  console.log(response);

       // }

       success:function(data){



        console.log(data);





        // $("#edit_image").html(data[0].direct_image);


        $('#portfolio_id').val(data[0].portfolio_id);
        $('#edt_designation').val(data[0].designation);
        $('#data_image').val(data[0].image);
         $('#edr_status').val(data[0].status);
          $('#edt_person_name').val(data[0].name);

        // var a = data[0].direct_image.split(',');







        $("#edit_direct").modal('show');



          }

           // error: function(error) {

           //      alert(error);

           //   }



         });



  });





$('#edit').click(function()

{





    var status = $('#edr_status').val();
    var fileInput = document.getElementById('edit_image');
    var filePath = fileInput.value;

    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

    if( $('#edit_image').val() != "" && !allowedExtensions.exec(filePath))
    {

        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');



        fileInput.value = '';



        return false;



      }

     else{

           var id = $('#portfolio_id').val();

         var frm = $('#edit_director')[0];

       $.ajax({



                 url: "<?php echo base_url('Ourportfolio/updateDirect/'); ?>"+id,

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

                 




              }



       });











        }



  });









function delete_data(id)

    {



      if(confirm('Are you sure you want to delete this item?'))

      {

          $.ajax({



            type:'POST',



            url:'<?= base_url() ?>Ourportfolio/delete_workshop/'+id,



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

