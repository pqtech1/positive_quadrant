<main id="main-container">
   <!-- Page Header -->
   <div class="content bg-gray-lighter">
      <div class="row items-push">
         <div class="col-sm-7">
            <h1 class="page-heading">
             <?php echo $title; ?>
            </h1>
         </div>
         <div class="col-sm-5 text-right hidden-xs">
            <ol class="breadcrumb push-10-t">
               <li>Home</li>
               <li><a class="link-effect" href="<?= base_url().'Invoice' ?>">Manage Invoice</a></li>
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
            <h3>ABOUT US <button type="button" class="btn btn-success btn-sm pull-right" onclick="show_data()"> <i class="fa fa-plus fa-1x"></i> Add Invoice</button></h3>
         </div>
         <div class="block-content">
            <div class="row">
               <div class="col-md-10 col-lg-10" >
                  <?php if($this->session->flashdata('message')){?>
                  <div style="margin: 7px 7px; font-size:19px;text-align:center" class="alert alert-success">      
                     <?php echo $this->session->flashdata('message')?>
                  </div>
                  <?php } ?>
               </div>
            </div>
            <div class="row">
            </div>
            <BR>
            <!-- filter data -->
            <div class="row">  
            </div>
            <?php if(@$message != ''){ ?>
            <a href="<?= base_url().'User'?>"><?= @$message;?></a>
            <?php } ?>
            <br>
            <div class="row">
            </div>
            <BR>
            <!-- user view table -->
            <div class="row" >
               <div class="responsive">
                  <table class="table table-bordered table-striped js-dataTable-full">
                     <thead>
                        <th>#</th>
                        <th>Invoice id</th>
                        <th>Name</th>
                        <th>Pan </th>
                        <th>Decription</th>
                        <th>Action</th>
                     </thead>
                     <tbody>
                       
                        <tr>
                           <td>1</td>
                           <td>PQTLLP0001</td>
                           <td>Uttam Vishwakarma</td>
                           <td>BKQVUP878JN</td>
                           <td>web designing</td>
                           <td><a href="<?php echo base_url(); ?>Invoice/genr_pdf" ><i class="fa fa-eye" style="font-size: 24px; color: #000;"></i></a></td>
                        </tr>
                       
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
               <h3 class="block-title">ADD USER</h3>
            </div>
            <div class="block-content">
               <form class="form-horizontal push-5-t" id="loginform" action="" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                     <label class="control-label col-md-2"  for="p_name">Name</label>
                     <div class="col-xs-8">
                        <input class="form-control" type="text" id="u_name" name="u_name" placeholder="Enter user name.." autofocus>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-md-2">Password</label>
                     <div class="col-xs-8">
                        <input class="form-control" type="password" id="pwd" name="u_password" placeholder="Enter Password" >
                        <span class="help-block"></span>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-md-2"> Confirm Password</label>
                     <div class="col-xs-8">
                        <input class="form-control" type="password" id="conf-pwd" name="c_password" placeholder="Enter Confirm Password" >
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
               <h3 class="block-title">EDIT USER</h3>
            </div>
            <div class="block-content">
               <form class="form-horizontal push-5-t" id="editform"  method="post" enctype="multipart/form-data">
               <div class="form-group">
                  <label class="control-label col-md-2" for="p_name">Name</label>
                  <div class="col-lg-6">
                     <input class="form-control" type="text" id="user_name" name="e_name" placeholder="Enter user name..">
                     <input class="form-control" type="hidden" id="user_id" name="e_id">
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-2">Password</label>
                  <div class="col-xs-6">
                     <input class="form-control" type="password" id="update-pwd" name="e_password" placeholder="Enter Password" >
                     <span class="help-block"></span>
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label col-md-2"> Confirm Password</label>
                  <div class="col-xs-6">
                     <input class="form-control" type="password" id="edit-pwd" name="ec_password" placeholder="Enter Confirm Password" >
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
       
   
         $.ajax({
           
            url: "<?php echo base_url('user/edit_user/'); ?>"+id,
            type:"POST",
            dataType:"json",
            success:function(data)
            {
               $('#user_name').val(data[0].username);
   
               $('#update-pwd').val(data[0].password);
   
               $('#edit-pwd').val(data[0].password);
   
               $('#user_id').val(data[0].user_id);
   
               $('#euser_status').val(data[0].status);
   
               $('#modal-update').modal('show');
   
               console.log(data[0].username);
   
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
                 e_name : {
                      required: true,
                      lettersonly: true
                  },
   
                  e_password : {
                      required: true,
                      minlength: 5
                  },
   
                 ec_password : {
                      required : true,
                      minlength: 5,
                      equalTo: "#update-pwd"
                  }
              },
   
      messages: { 
   
                 e_name :  "Specify Username",
                  
                  e_password : {
                        minlength:"Your Password must be at least 5 characters long"
                  },
   
                 ec_password : {
   
                  minlength:"Your Password must be at least 5 characters long",
                  equalTo: "Your Passwords don't match"
                 }
   
             },success:"valid",
   
              submitHandler:function(form)
              { 
   
   
                  dataString = $('#editform').serialize();
   
                   // alert(dataString);
   
                    var id = $('#user_id').val();
   
   
                  $.ajax({
   
                      url: "<?php echo base_url('user/update_data/'); ?>"+id,
                      data: dataString,
                      type: "POST",
                      dataType: "json",
                      success:function(data){
   
                          if(data.status == 'false')
                          {
                              alert('Username Already Exists. Please Enter Another Username');
                              // window.location.reload();
                          }
   
                          if(data.status == 'true')
                          {
                              alert('Data Updated Successfully');
                              window.location.reload(true);
                          }
   
                          console.log(data);
                      }
   
                  });
   
               }
   
    });
   
   }
    function show_data()
     {
        window.location.href="http://positivequadrant.in/adminpositivequadrant/Invoice/add_invoice";
     }

   function delete_user(id){

     var r = confirm("Want to delete?");
  if (r == true) {
   $.ajax({
            type:'POST',
            url:'<?= base_url()?>User/delete_user',
           data: {id: id},
            success:function(resp)
            {  
                if ( resp == "success"){
                    location.reload()
                }
                else {
                    alert("Something went worng")
                }

            },
           
        })
  } 


      
   }
   
</script>