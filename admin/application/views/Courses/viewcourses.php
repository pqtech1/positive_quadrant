<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
  type="text/css">
<main id="main-container">







  <!-- Page Header -->







  <div class="content bg-gray-lighter">







    <div class="row items-push">







      <div class="col-sm-7">







        <h1 class="page-heading">





          Course Details<small> into the table.</small>







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
        <h3>COURSE <a type="button" class="btn btn-success btn-sm pull-right" data-toggle="tooltip"
            data-original-title="ADD COURSE" href="<?php echo base_url() . 'Courses/add_courses' ?>"> <i
              class="fa fa-plus fa-1x"></i> Add </a></h3>










      </div>



      <div class="block-content">


        <?php
        $success_msg = $this->session->flashdata('success_msg');
        $error_msg = $this->session->flashdata('error_msg');

        if ($success_msg) {
          ?>
          <div class="alert alert-success">
            <?php echo $success_msg; ?>
          </div>
          <?php
        }
        if ($error_msg) {
          ?>
          <div class="alert alert-danger">
            <?php echo $error_msg; ?>
          </div>
          <?php
        }
        ?>





        <div class="row">


        </div> <br>



        <div class="row">
          <?php $count = 1; ?>
          <div class="responsive" style="overflow:scroll;">
            <table class="table table-bordered table-striped js-dataTable-full">
              <thead>
                <th># </th>
                <th> COURSE NAME </th>
                <th>IMAGE</th>
                <th> COURSE FEES </th>
                <th> IN OFFER </th>
                <th>COURSE TYPE</th>
                <th> ACTION </th>
                <th> SYLLABUS</th>

                <!-- <th>Action</th> -->
              </thead>
              <tbody>
                <?php
                foreach ($courses as $value) {

                  ?>
                  <tr>
                    <td><?php echo $count++; ?></td>

                    <td><?php echo $value['cname']; ?></td>

                    <td><img src="<?php echo base_url('uploads/courses/' . $value['cimage']); ?>" height="50" width="50">
                    </td>
                    <td><?php echo $value['cfees']; ?>
                    </td>

                    <td><?php echo ($value['cdiscount'] == 1) ? 'YES' : 'NO'; ?>
                    </td>
                    <td><?php echo ($value['ctype'] == 1) ? 'Normal Training' : 'Corporate Training'; ?></td>
                    <td>
                      <div class="btn-group">
                        <a href="<?php echo base_url() . 'courses/edit_courses/' . $value['c_id'] . '' ?>"
                          class="btn btn-xs btn-default update-modal" id="" type=" button" data-toggle="tooltip" title=""
                          data-original-title="Edit Course"><i class="fa fa-pencil"></i></a>
                        <a href="javascript:void(0)" onclick="delete_data('<?= $value["c_id"] ?>' )"
                          class="btn btn-xs btn-default" type="button" data-toggle="tooltip"
                          data-original-title="Remove Course"><i class="fa fa-times"></i></a>
                      </div>
                    </td>

                    <td>
                      <div class="btn-group">
                        <a class="btn btn-xs btn-default"
                          href="<?php echo base_url() . 'Courses/addsyllabus/' . $value['c_id']; ?>" type="button"
                          data-toggle="tooltip" data-original-title="ADD SYLLABUS"><i class="fa fa-plus fa-1x"></i>
                        </a>
                        <a class="btn btn-xs btn-default"
                          href="<?php echo base_url() . 'courses/view_syllabus/' . $value['c_id']; ?>" title=""
                          data-toggle="tooltip" data-original-title="VIEW SYLLABUS"><i class="fa fa-eye"></i></a>
                      </div>
                    </td>
                  </tr>
                <?php } ?>
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
          <form id="add_director" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label class="control-label col-md-2">Image </label>
              <div class="col-md-8">
                <input type="file" class="form-control" name="image" id="add_image" accept="image/*" />
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
          <form id="edit_director" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label class="control-label col-md-2">Image </label>
              <div id="kiran" class="col-md-8">
                <input type="file" class="form-control" name="image" id="edit_image" accept="image/*" />
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





<!-- <script src="<?php echo base_url(); ?>assets/js/plugins/summernote/summernote.min.js"></script>

 <script>
            jQuery(function () {
                // Init page helpers (Summernote + CKEditor + SimpleMDE plugins)
                App.initHelpers(['summernote']);
            });
 </script> -->
<script type="text/javascript">

  $('#save').click(function () {
    // alert('jhsjdk');


    var fileInput = document.getElementById('add_image');

    var filePath = fileInput.value;

    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;



    if ($('#direct_image').text() == "" && !allowedExtensions.exec(filePath)) {
      alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');

      fileInput.value = '';

      return false;

    } else {

      // var data= $('#add_director').serialize();

      frm = $('#add_director')[0];

      // alert(frm); 


      // var file= $('')

      // alert(data);

      $.ajax({

        url: "<?php echo base_url('client/add_home'); ?>",
        type: "POST",
        data: new FormData(frm),
        async: false,
        processData: false,
        contentType: false,
        dataType: 'json',

        success: function (data) {

          // window.location.reload(true);

          console.log(data);

          if (data.status == 'true') {

            alert('Data Inserted Successfully.');

            window.location.reload(true);

          } else {
            for (var i = 0; i < data.inputerror.length; i++) {
              $('[name="' + data.inputerror[i] + '"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
              $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
            }
          }

        }

      });



    }

  });


</script>


<!-- onclick edit data using below modal begins here -->


<script type="text/javascript">

  $('.update-modal').click(function () {

    $('#kiran').removeClass('has-error');
    $('.err').text('');


    var id = $(this).attr('id');
    // alert(id);

    //$('#edit_direct').modal('show');




    $.ajax({

      url: "<?php echo base_url('client/edit_home/'); ?>" + id,
      type: "POST",
      dataType: 'json',
      // beforeSend(response){
      //  console.log(response);
      // }
      success: function (data) {

        console.log(data);


        // $("#edit_image").html(data[0].direct_image);

        $('#direct_id').val(data[0].client_id);

        $('#data_image').val(data[0].client_image);

        $('#edr_status').val(data[0].status);

        // var a = data[0].direct_image.split(',');


        // var hello1 = "<img src='<?= base_url() ?>uploads/files/"+a[0]+"' height='50%' width='50%'>";

        // var hello2 = "<img src='<?= base_url() ?>uploads/files/"+a[1]+"' height='50%' width='50%'>";


        // $('#showimage1').html(hello1);

        // $('#showimage2').html(hello2);

        $("#edit_direct").modal('show');

      }
      // error: function(error) {
      //      alert(error);
      //   }

    });

  });


  $('#edit').click(function () {


    var status = $('#edr_status').val();

    var fileInput = document.getElementById('edit_image');

    var filePath = fileInput.value;

    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

    if ($('#edit_image').val() != "" && !allowedExtensions.exec(filePath)) {
      alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');

      fileInput.value = '';

      return false;

    }
    else {

      var id = $('#direct_id').val();

      var frm = $('#edit_director')[0];

      // var  data = $('edit_slug').val();

      // alert(id);


      $.ajax({

        url: "<?php echo base_url('client/updateDirect/'); ?>" + id,
        type: "POST",
        data: new FormData(frm),
        async: false,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function (data) {


          if (data.status == 'true') {

            alert('Data Updated Successfully');
            window.location.reload();

          }
          else {
            for (var i = 0; i < data.inputerror.length; i++) {
              $('[name="' + data.inputerror[i] + '"]').parent().addClass('has-error'); //select parent twice to select div form-g roup class and add has-error class
              $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
            }
          }


          console.log(data);


        }

      });





      // $.ajax({

      //           url: "<?php echo base_url('director/updateDirect/'); ?>"+id,
      //           type: "POST",
      //           data:new FormData(frm),
      //           async :false,
      //           processData: false,
      //           contentType: false,
      //           dataType:'json',
      //           success:function(data){

      //              // window.location.reload(true);

      //            if(data == true)
      //            {

      //               alert('slug exists, Please enter new slug');

      //            }
      //            else
      //            {

      //              alert('slug  not exists');

      //            }

      //            // if(data.status == true)
      //            // {

      //            //   alert('Data updated Successfully.');

      //            //   window.location.reload(true);

      //            // }
      //            // else
      //            // {

      //            //    alert('Error occured,Try again.');

      //            // }

      //            console.log(data);

      //           }

      //      });

      // alert(id);

      // $("#edit_director").attr('action',"<?php echo base_url('director/updateDirect/'); ?>"+id);

      // $("#edit_director").submit();

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


  function delete_data(id) {

    if (confirm('Are you sure you want to delete this item?')) {
      $.ajax({

        type: 'POST',

        url: '<?= base_url() ?>courses/delete_course/' + id,

        dataType: 'json',

        success: function (data) {
          alert('Data Deleted Successfully');
          window.location.reload(true);
        }

      });
    }
  }


</script>