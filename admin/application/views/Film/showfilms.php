    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/select2.min.css">


<style>

    .harsh{ margin-left: 5px;margin-right: 5px}                       

</style>

<main id="main-container">







                <!-- Page Header -->







                <div class="content bg-gray-lighter">







                    <div class="row items-push">







                        <div class="col-sm-7">







                            <h1 class="page-heading">





Films
                                View  Details<small> into the table.</small>







                            </h1>







                        </div>







                        <div class="col-sm-5 text-right hidden-xs">







                            <ol class="breadcrumb push-10-t">







                                <li>Home</li>







                                <li><a class="link-effect" href="<?= base_url().'Film'?>"> View Films Details</a></li>







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
<h3>FILMS <button type="button" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#modal-top"> <i class="fa fa-plus fa-1x"></i> Add </button></h3>


                             



                             



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
                                            <th> </th>
                                            <th> caption  </th>
                                            <th> Video URL</th>
                                            <th> Thumbnail </th>
                                            <th> tags </th>
                                            <th> Category </th>
                                            <th> Director [ Slug ]</th>
                                            <th> Status </th>
                                            <th> Action </th>
                                            <!-- <th>Action</th> -->
                                        </thead>
                                        <tbody>
                                        <?php 

                                        foreach($film as $value)  { $new = array();  $cat = array(); $dir = array(); $slug =array();?>

                                        <tr>
                                          <td><?php echo  $count++ ;?></td>
                                          <td> <?=  $value['caption']; ?></td>
                                          <td> <?=  $value['video_url']; ?></td>
                                          <td> <img src=" <?php echo base_url( 'uploads/films/'.$value['thumbnail']);?>" height="50" width="50"></td>
                                           <?php $data = $this->films->getTag($value['tags']);
                                           		foreach ($data as $values) {
                                           			# code...
                                           			$new[] = $values['tag_name'];
                                           		}

                                            $b =  substr(implode(',', $new), 0) ;
                                            
                                            ?>
                                           
                                         	<td>
                                           	<?php echo $b; ?>
                                           	
                                           </td>

                                           <?php  
                                              $data = $this->films->getCat($value['category']); 
                                              // print_r($data);

                                              foreach ($data as  $val) {
                                              	# code...
                                              	$cat[] = $val['cat_name'];
                                              }

                                              $c = substr(implode(',', $cat), 0);

                                              ?>

                                          <td><?php echo $c; ?></td>
                                          <?php 
                                            $demo = $this->films->getDirect($value['director']);

                                            foreach ($demo  as  $va) {  
                                               
                                               $dir[] = $va['direct_title']; 
                                               $slug[] = $va['direct_slug'];

                                             }

                                              $x = substr(implode(',', $dir), 0);

                                              $y = substr(implode(',', $slug), 0);

                                             ?>

                                             <td><?php echo $x; ?>&nbsp;&nbsp;&nbsp;[<?php echo $y; ?>]</td>
                                            

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
                                                    <a  class="btn btn-xs btn-default edit_modal" id ="<?php echo $value['add_id']; ?>" type=" button" data-toggle="tooltip" title="" data-original-title="Edit "><i class="fa fa-pencil"></i></a>
                                                    <a href="javascript:void(0)" onclick="delete_data('<?= $value["add_id"]; ?>')" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></a>
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
                            <h3 class="block-title">ADD VIDEO</h3>
                        </div>
                        <div class="block-content">
                   <form  id ="add_target" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                 <label class="control-label col-md-2">Caption</label>
                                    <div class= "col-md-8">
                                         <input type="text"  class="form-control" name="caption" id="add_cap" autofocus />
                                    </div>
                              </div>
                              <div class="form-group">
                                   <label class="control-label col-md-2">Video URL</label>
                                       <div class="col-md-8">
                                         <input type="text"  class="form-control" name="videourl" id="add_url" />
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
                                   <label class="control-label col-md-2"> Tags </label>
                                      <div class="col-md-8">
                                          <select  name= "tag[]" id ="add_tag"  multiple="multiple" class="select2">
                                          <?php 
                                          // print_r($data1); exit;
                                      foreach($data1 as $d)
                                       { ?>
                                            <option value ="<?php echo $d['tag_id'];?>"><?php echo $d['tag_name'];?></option>
                                            <?php }  ?>
                                          </select>       
                                      </div>
                              </div>
                              <div class="form-group">
                                   <label class="control-label col-md-2"> Category </label>
                                      <div class="col-md-8">
                                          <select  name ="cat[]" id ="add_category" multiple="multiple" class="select2">
                                            <?php 
                                      foreach($sha as $dat)  { ?>
                                            <option value ="<?php echo $dat['cat_id'];?>"><?php echo $dat['cat_name'];?></option>
                                            <?php } ?>
                                          </select>
                                      </div>
                              </div>
                              <div class= "form-group">
                                 <label class="control-label col-md-2" > Director  </label>
                                     <div class="col-md-8">
                                          <select name="direct[]" id="add_direct" multiple="multiple" class="select2">
                                            <?php 
                                       foreach($direct as $d)  { ?>
                                           <option value="<?php echo $d['direct_id']; ?>"><?php echo $d['direct_title'];?>&nbsp;&nbsp;&nbsp;[<?php echo $d['direct_slug'];?>]</option>
                                            <?php }  ?> 
                                          </select>
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
                            <h3 class="block-title">EDIT VIDEO</h3>
                        </div>
                    <div class="block-content">
                      <form  id ="target" class="form-horizontal"  method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label class="control-label col-md-2">Caption</label>
                              <div class= "col-md-8">
                                    <input type="hidden" name="did" id="did" class="form-control" >
                                   <input type="text" class="form-control" name="caption" id="cap"/>
                              </div>
                        </div>
                        <div class="form-group">
                             <label class="control-label col-md-2">Video URL</label>
                                 <div class="col-md-8">
                                   <input type="text" id="videourl" class="form-control" name="videourl" />
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
                             <label class="control-label col-md-2"> Tags </label>
                                <div class="col-md-8">
                                    <select  name= "tag[]" id ="tag"  multiple="multiple" class="select2">
                                    <?php 
                               		 foreach($data1 as $d)  { ?>
                                      <option value ="<?php echo $d['tag_id'];?>" ><?php echo $d['tag_name'];?></option>
                                      <?php }  ?>
                                    </select>         
                                </div>
                        </div>
                        <div class="form-group">
                             <label class="control-label col-md-2"> Category </label>
                                <div class="col-md-8">
                                    <select  name ="cat[]" id ="category" multiple="multiple" class="select2">
                                      <?php 
                                foreach($sha as $dat)  { ?>
                                      <option value ="<?php echo $dat['cat_id'];?>"><?php echo $dat['cat_name'];?></option>
                                      <?php } ?>
                                    </select>
                                </div>
                             </div>
                         <div class="form-group">
                             <label class="control-label col-md-2"> Director </label>
                                <div class="col-md-8">
                                    <select  name ="direct[]" id ="director" multiple="multiple" class="select2">
                                      <?php 

                                foreach($direct as $da)  { ?>
                                      <option value ="<?php echo $da['direct_id'];?>"><?php echo $da['direct_title'];?>&nbsp;&nbsp;&nbsp;[<?php echo $da['direct_slug'];?>]</option>
                                      <?php } ?>
                                    </select>
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
                    <input type="button" id="send" class="btn btn-success pull-left" value="Submit" name="submit">
                </div>   
             </div>
         </div>
   </div>




<script src="<?php echo base_url();?>assets/js/select2.full.min.js"></script>


<script type="text/javascript">
 
  $('#register').click(function()
  {
    var name= $('#add_cap').val();

    var url = $('#add_url').val();

    var re = /^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i;

    var fileInput = document.getElementById('add_fileToUpload');

    var filePath = fileInput.value;

    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

    var tag = $('#add_tag').val();

    var cat = $('#add_category').val();

    var direct = $('#add_direct').val();

    var status = $('#film_status').val();

    
    if(name == null || name == "")
    {

      alert(" Caption cannot be blank ");
      return false;

    }
    else if(url == "" || url == null)
    {
      alert(" URL cannot be blank ");
      return false;
    }
    else if (!re.test(url)) 
    {   
        // alert(url);
         alert(" Please Enter valid URL ");
         return false;
     }else
    if(!allowedExtensions.exec(filePath))
    {
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.'); 

        fileInput.value = '';

        return false;

    }else
    if ( tag == "" ||tag == null) 
    {
        alert('Tags cannot be Blank');
        return false;

    }
    else if( cat == "" || cat == null)
    {
         alert('Category cannot be Blank');
         return false;

    }else if( direct == "" || direct == null)
    {
       alert('Director cannot be Blank');
       return false; 

    }else {

    

    frm = $('#add_target')[0];

      $.ajax({

           url: "<?php echo base_url('film/add_video'); ?>",
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



    
});

$("#add_tag").select2();
$('#add_category').select2();
$('#add_direct').select2();

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

       url: "<?php echo base_url('film/edit_data'); ?>",
       type: "POST",
       data: {id : id},
       dataType:'json',
       success:function(data){
        //console.log(data[0].add_id);
        // var s= JSON.parse(data);
        // console.log(s);
        // console.log(data[0].tags);

      // console.log(data[0].category);

        //console.log(data[0].category);
        //console.log(data[0].thumbnail);
         $("#cap").val(data[0].caption);
         $("#videourl").val(data[0].video_url);
         $('#efilm_status').val(data[0].status);

         $('#tag option').prop("selected", false).trigger('change');
			$("#tag li.select2-selection__choice").remove();

			$('#category option').prop('selected', false).trigger('change');
			  $('#category li.select2-selection__choice').remove();


        $('#director option').prop('selected', false).trigger('change');
          $('#director li.select2-selection__choice').remove();


       var a = data[0].tags.split(',');
       // console.log(a);
       // console.log(a);

        if(a.length != 0)
        {
             for(var i=0;i<a.length;i++)
             {
         	       $('#tag option[value='+a[i]+']').prop('selected','True').trigger('change');
               }

        }

         var b = data[0].category.split(',');

         // console.log(b);

         if(b.length != 0)
         {

             for(var i=0; i<b.length; i++)
             {
               	$('#category option[value='+b[i]+']').prop('selected', 'True').trigger('change');
             }
          }

         var am = data[0].director.split(',');

         // console.log(am);

         if(am.length != 0)
         {
             for( var i=0; i<am.length; i++)
             {
                $('#director option[value='+am[i]+']').prop('selected', 'True').trigger('change');

             }
         }




        // console.log(abc)

       // $('#tag').append('<option value=a[0]>a[0]</option>');

       // var tag = $("#tag").select2(a);

       // $(a).each(function(k, o)
       //  {
       //       console.log(tag);
       //      tag.append($("<option></option>").attr("value", o.tag).html(o.tag));

       //   });


        // $.each($("#tag"), function(value){
        //     console.log(value);
        //     return false;
        //    });

      $('#did').val(data[0].add_id);


      

         $("#fileToUpload").html(data[0].thumbnail);
         //$("#tag").val(data[0].tags);

   
         $("#fileToUpload1").val(data[0].thumbnail);




         //$("#category").val(data[0].category);



         $("#edit-modal").modal('show');

       }

    });

$("#tag").select2();
$('#category').select2();
$('#director').select2();



  });

  </script>


<script type="text/javascript">
    
$('#send').click(function()
  {

    var name= $('#cap').val();

    var url = $('#videourl').val();

    // var status = $('#efilm_status').val();

    var re = /^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i;

     var fileInput = document.getElementById('fileToUpload');

     var filePath = fileInput.value;

     var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

    var tag = $('#tag').val();

    var cat = $('#category').val();

    var dir = $('#director').val();

  


    if(name == null || name == "")
    {

      alert(" Caption cannot be blank ");
      return false;

    }
    else if(url == "" || url == null)
    {
      alert(" URL cannot be blank ");
      return false;
    }
    else if (!re.test(url)) 
    { 
         alert(" Please enter valid URL ");
         return false;
     }else   
      if($('#fileToUpload').text() == '' &&  !allowedExtensions.exec(filePath) )  
      {  
          alert("Please upload file having extensions .jpeg/.jpg/.png/.gif only.");  

           fileInput.value = '';

           return false;
       }  
    // if( $_FILES()== "")
    // {
    //     alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');

    //     fileInput.value = '';

    //     return false;

    // }
    else
    if ( tag == "" ||tag == null) 
    {

        alert('Tags cannot be Blank');

    }
    else if( cat == "" || cat == null)
    {

         alert('Category cannot be Blank');

    }else if( dir == "" || dir == null)
    {

      alert("Director cannot be blank");

    }
    else{

    var id = $('#did').val();

      $("#target").attr('action',"<?php echo base_url('/film/update_data/'); ?>"+id);

      $("#target").submit();  



     // var fileInput = document.getElementById('fileToUpload');

     // var filePath = fileInput.value;

     // alert(filePath);



      // alert(str);

      frm = $('#target')[0];

      $.ajax({

           url: "<?php echo base_url('film/update_data/'); ?>"+id,
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


  
    function delete_data(id)
    {

        if(confirm('Are you sure want to delete this item?'))
        {
            $.ajax({

              type:'POST',

              url:'<?= base_url() ?>Film/delete_data/'+id,

              dataType:'json',

              success:function(data)
              {
                  window.location.reload(true);
              }

            });
        }

    }


  setTimeout(function() {
      $('.alert').fadeOut('fast');
  }, 2000);


</script>


  <!-- delete data using modal js function-->
