<script>

    jQuery(function () {

                // Init page helpers (BS Datepicker + BS Datetimepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs plugins)

                App.initHelpers(['datepicker']);

            });

    

    setTimeout(function() {

    $('.alert').fadeOut('fast');

}, 2000);

function add()
{
    $('#modal-top').modal('show');
}



</script>



    



  <main id="main-container">



    <!-- Page Header -->



    <div class="content bg-gray-lighter">



        <div class="row items-push">



            <div class="col-sm-7">



                <h1 class="page-heading">



                    User Details

                </h1>



            </div>



            <div class="col-sm-5 text-right hidden-xs">



                <ol class="breadcrumb push-10-t">



                    <li>Home</li>



                    <li><a class="link-effect" href="<?= base_url().'User' ?>">User Details</a></li>



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



               <h3>Users </h3>

               

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





     

                    

                </div><BR>



<!-- filter data -->



                <div class="row">  

                                 <form action="<?= base_url().'User/filterdata'?>" 

                                method="get" enctype="multipart/form-data">

                                    

                                     <div class="col-md-3 col-lg-2">

                                         <input type="text" name="from_date" class="js-datepicker form-control"  value="<?= (@$_GET['from_date'])?>" placeholder="Enter From Date">

                        

                                    </div>

                                    <div class="col-md-3 col-lg-2">

                                       <input type="text" name="to_date" class="js-datepicker form-control"  value="<?= (@$_GET['to_date'])?>" placeholder="Enter To Date">

                             

                                    </div>

                                     <!-- <div class="col-md-3 col-lg-2">

                                        <select class="form-control" id="device_os"  name="device_os">

                                            <OPTION value="">Device Type</OPTION>

                                           

                                             <option value="1" <?=(@$_GET['device_os'] == 1) ? 'selected' : " ";?>>iOS</option>

                                             <option value="2" <?=(@$_GET['device_os'] == 2) ? 'selected' : " ";?>>Android</option>

                                            

                                        </select>    

                                    </div> -->

                                    <div class="col-md-3 col-lg-2">

                                        <select class="form-control" id="status" name="status">

                                            <option value="" >Status</option>

                                            <option value="1" <?=(@$_GET['status'] == 1) ? 'selected' : " ";?>>Active</option>                                          

                                            <option value="2" <?=(@$_GET['status'] == 2) ? 'selected' : " ";?>>In Active</option>                                          

                                        </select>    

                                    </div>

                                                                        

                                     <div class="col-md-3 col-lg-2">

                                    <button type="submit">Submit</button>   

                                   </div>

                                </form> 

                                   
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

                                            <th>NAME</th>

                                            <th>EMAIL ID</th>

                                            <th>USER TYPE</th>

                                            <th>STATUS</th>

                                            <!-- <th>Action</th> -->

                                        </thead>

                                        <tbody>

                                                <?php  $count = 1; foreach ($user_list as $value) { ?>

                                            <tr>

                                                <!-- <td><input type="checkbox" name="check" id="checkall"></td> -->

                                                <td><?= $count;?></td>

                                                <td><?= $value->user_name?></td>

                                                <td><?= $value->email?></td>

                                                <td><?= $value->type?></td>

                                                <td>

                                                    <?php 

                                                        if($value->status ==1 )

                                                        { ?>

                                                            <a href="<?= base_url() ?>User/user_status/2/<?=$value->user_id?>" class="btn btn-xs btn-success">Activate</a>

                                                       <?php }else

                                                        { ?>

                                                            <a href="<?= base_url() ?>User/user_status/1/<?=$value->user_id?>" class="btn btn-xs btn-danger">DeActivate</a>

                                                       <?php } ?>

                                                    

                                                </td>

                                                

                                            </tr>        

                                               <?php $count++; } ?>

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
        <div class="modal fade" id="modal-top" tabindex="-1" role="dialog" aria-hidden="true">
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
                              <form class="form-horizontal push-5-t" id="prod_add" action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="p_name">Name</label>
                                                <input class="form-control" type="text" id="u_name" name="u_name" placeholder="Enter user name..">
                                            </div>
                                      
                                    
                                            <div class="col-xs-6">
                                                <label for="email">Email</label>
                                                 <input class="form-control" type="email" id="u_email" name="u_email" placeholder="Enter Email.">
                                            </div>
                                        </div>

                                         <div class="form-group">
                                        
                                            <div class="col-xs-6">
                                                <label>Password</label>
                                                <input class="form-control" type="password" id="pwd" name="u_password" >
                                                <span class="help-block"></span>
                                            </div>
                                            <div class="col-xs-6">
                                                <label>User Type</label> 

                                                 <select class="form-control"   id="user_type" name="user_type" >
                                                   
                                                    
                                                </select>
                                            </div>
                                        </div>


                                           
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <button class="btn btn-sm btn-success" type="submit" onclick="add_form()">Save</button>
                                            </div>
                                        </div>
                                    </form>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- END Top Modal -->





