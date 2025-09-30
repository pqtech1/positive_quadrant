<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container">
  <h2 class="text-center" style="margin-bottom:20px;">freshmartwale password update</h2>
  <div class="row" style="border: solid 1px lightgrey;border-radius: 5px;padding: 51px 1px;margin-top: 101px;">
    <div class="col-md-3 "></div>
    <div class="col-md-6 col-xs-12 col-12">
        <div>
    <div class="form-group">
      <label for="uname">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
      <div class="invalid-feedback" id="pwd_error" >(password length between 6 to 12 characters)</div>
    </div>
    <div class="form-group">
      <label for="pwd">Confirm password:</label>
      <input type="password" class="form-control" id="cpwd" placeholder="Enter confirm password" name="cpwd">
      <div class="invalid-feedback" id="cpwd_error">(password and confirm password must be same)</div>
    </div>
    <button type="submit" onclick=changepassword() class="btn btn-primary">Change password</button>
    </div>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>

 <!-- The Modal -->
  <div class="modal fade" id="loader" style="margin-top: 206px;">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <!-- Modal body -->
        <div class="modal-body text-center">
          <i class="fa fa-spinner fa-spin" style="font-size:50px"></i>
        </div>
      </div>
    </div>
  </div>
<script>

function changepassword(){
    var url_string = window.location.href;
    var url = new URL(url_string);
    var emailcode = url.searchParams.get("emailcode");
    var token = url.searchParams.get("token");
    
    var pwd =  $("#pwd").val();
    var cpwd =  $("#cpwd").val();
    if(pwd == "" || cpwd == ""){
        alert("Enter both fields")
    } else if( pwd.length < 6 || pwd.length > 12 ){
        $("#pwd_error").show();
    } else if( pwd != cpwd) {
         $("#pwd_error").hide();
         $("#cpwd_error").show();
    } else {
        
       $.ajax({
        url: '<?php echo base_url(); ?>password/updatepassword',
        type: 'POST',
        data: {pwd: pwd,cpwd:cpwd,emailcode:emailcode,token:token},
        dataType: 'json',
        beforeSend: function() {    
           $('#loader').modal({backdrop: 'static', keyboard: false});
        },
        success: function(data) {
             $('#loader').modal('hide');
                if(data == "success"){
                    alert("Password successfully updated!");
                    location.reload();
                } else {
                     alert("Something went wrong please try again later!");
                }
            },
            error: function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
            }
        });
    
    }
}
</script>

</body>
</html>
