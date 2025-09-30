<!DOCTYPE html>

<head>
    <meta charset="utf-8">

    <title><?= $title?></title>

    <meta name="description" content="OneUI - Admin Dashboard Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">        
    <link rel="shortcut icon" href="assets/img/favicons/favicon.png">

    <?php $load = unserialize(constant($mast_load));?>

    <?php foreach($load['mcss'] as $data){?>        
        <link rel="stylesheet" href="<?= LOAD.$data;?> ">   
    <?php }?>
    <style>
        .lg{
            width:200px;
            height:90px;
            object-fit:contain;
        }
    </style>
    <script src="<?= LOAD?>/js/core/jquery.min.js"></script>
    <script src="<?= LOAD.'js/custom/jquery.validate.min.js'?>"></script>
</head>
<body>
            
        
        <div class="bg-white pulldown">
            <div class="content content-boxed overflow-hidden">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                        <div class="push-30-t push-50 animated fadeIn">
                            <!-- Login Title -->
                            <div class="text-center">
                                <img src="<?= IMG.'Logos/logo.jpg'?>" class="lg">
                                <p style="color:red"><?= $message;?><p>
                            </div>
                            <!-- END Login Title -->

                           
                            <form class="js-validation-login form-horizontal push-30-t" action="<?= base_url().'Login/submit'?>" 
                               method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material form-material-primary floating">
                                            <input class="form-control" type="text" id="login-username" name="empl_email" 
                                            value="<?= set_value('empl_email');?>">
                                            <label for="login-username">Username</label>
                                            <?= form_error('empl_email');?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material form-material-primary floating">
                                            <input class="form-control" type="password" id="login-password" name="empl_password" 
                                            value="<?= set_value('empl_password');?>">
                                            <label for="login-password">Password</label>
                                            <?= form_error('empl_password');?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                   
                                    <div class="col-xs-6">
                                        <div class="font-s13 text-right push-5-t">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group push-30-t">
                                    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                                        <button class="btn btn-lg btn-block" style="background-color:#c82026;color:white" type="submit">Log in</button>
                                    </div>
                                </div>
                            </form>
                            <!-- END Login Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <!-- Login Footer -->
       

       

        <?php $load = unserialize(constant($mast_load));?>

        <?php foreach($load['mjs'] as $data){?>
            
            <script src="<?= LOAD.$data?>" type="text/javascript"></script>    
        <?php }?>
    </body>
</html>