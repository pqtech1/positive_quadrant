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

        h1,i{

            font-size:70px;

        }

        h1,a{

            color:#231f20;            
        }
        .fsize{
            font-size:70px;
        }

    </style>

    <script src="<?= LOAD?>/js/core/jquery.min.js"></script>

    <script src="<?= LOAD.'js/custom/jquery.validate.min.js'?>"></script>

</head>

<body>

       <div class="container">

         <div class="content overflow-hidden">

            <div class="row">

                <h4 class="text-center"><img src="<?= IMG.'astral_logo.png'?>" class="lg"><a href="<?= base_url().'Login/logout'?>">.</a></h4><br/><br/><br/><br/>

                

                                

            </div>   

            <?php $access_list = explode(',',$this->session->userdata('access'));?>

                 <br/>     

            <div class="row">

              <?php $ar = explode(',',$this->session->userdata('access')); ?>

              

               <div class="col-sm-1 col-md-1 col-lg-1 col-xs-1"></div>

                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-center">                                   
                    <?php if(in_array(1,$ar)) {?>
                        <a href="<?= base_url().'Masters/access'?>"><i class="fa fa-book fsize" aria-hidden="true"></i><span><br/>Masters</span></a>
                    <?php } else{?>
                        <a href="#"  class="css-input-disabled"><i class="fa fa-book fsize" aria-hidden="true"></i><br/>Masters</a>
                    <?php }?>
                </div>

                

                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-center">                                       
                    <?php if(in_array(2,$ar)){?>
                        <a href="<?= base_url().'Scheduling/access'?>">
                            <i class="fa fa-calendar fsize" aria-hidden="true"></i><br/><span>Scheduling</span>
                        </a>
                    <?php }else{?>
                        <a href="<?= base_url().'Detail/access'?>"  class="css-input-disabled">
                            <i class="fa fa-calendar fsize" aria-hidden="true"></i><br/><span>Scheduling</span>
                        </a>
                    <?php }?>
                </div>

                

                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-center">                                       
                    <?php if(in_array(3,$ar)){?>
                        <a href="<?= base_url()?>Add_cnf_summary_billing/access">
                            <i class="fa fa-money fsize" aria-hidden="true"></i> <br/> Billing
                        </a>
                    <?php }else{?>
                        <a href="<?= base_url().'Detail/access'?>"  class="css-input-disabled">
                            <i class="fa fa-money fsize" aria-hidden="true"></i> <br/> Billing
                        </a>
                    <?php }?>                    
                </div>

                

                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-center">                                       
                    <?php if(in_array(4,$ar)){?>
                        <a href="#">
                            <i class="fa fa-share-square fsize" aria-hidden="true"></i><br/>Recovery
                        </a>
                    <?php }else{?>
                        <a href="<?= base_url().'Detail/#'?>" class="css-input-disabled">
                            <i class="fa fa-share-square fsize" aria-hidden="true"></i><br/>Recovery
                        </a>
                    <?php }?>                     
                </div>

                

                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-center">
                    <?php if(in_array(5,$ar)){?>
                        <a href="#">
                            <i class="fa fa-calculator fsize" aria-hidden="true"></i><br/>Accounts
                        </a>
                    <?php }else{?>
                        <a href="<?= base_url().'Detail/#'?>"  class="css-input-disabled">
                            <i class="fa fa-calculator fsize" aria-hidden="true"></i><br/>Accounts
                        </a>
                    <?php }?>                     
                </div>



                <div class="col-sm-1 col-md-1 col-lg-1 col-xs-1"></div>

             </div>

             <br/><br/><br/>

             <div class="row">

                <div class="col-sm-1 col-md-1 col-lg-1 col-xs-1"></div>

                

                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-center">                                       
                    <?php if(in_array(6,$ar)){?>
                        <a href="<?= base_url().'Human_resource'?>">
                            <i class="fa fa-user-secret fsize" aria-hidden="true"></i><br/>Human Resource
                        </a>
                    <?php }else{?>
                        <a href="<?= base_url().'Detail/#'?>"  class="css-input-disabled">
                            <i class="fa fa-user-secret fsize" aria-hidden="true"></i><br/>Human Resource
                        </a>
                    <?php }?>                     
                </div>

                

                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-center">                                   
                    <?php if(in_array(7,$ar)){?>
                        <a href="#">
                            <i class="fa fa-user-o fsize" aria-hidden="true"></i><br/>Admin
                        </a>
                    <?php }else{?>
                        <a href="<?= base_url().'Detail/#'?>"  class="css-input-disabled">
                            <i class="fa fa-user-o fsize" aria-hidden="true"></i><br/>Admin
                        </a>
                    <?php }?>                    
                </div>

                

                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-center">                                   
                    <?php if(in_array(8,$ar)){?>
                        <a href="<?= base_url().'Billing_Inword_controller/access'?>">
                            <i class="fa fa-exchange fsize" aria-hidden="true"></i> <br/>Inward Outward
                        </a>
                    <?php }else{?>
                        <a href="<?= base_url().'Detail'?>"  class="css-input-disabled">
                            <i class="fa fa-exchange fsize" aria-hidden="true"></i> <br/>Inward Outward
                        </a>
                    <?php }?>                     
                </div>

                

                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-center">                                       
                    <?php if(in_array(9,$ar)){?>
                        <a href="#">
                            <i class="fa fa-money fsize" aria-hidden="true"></i><br/>Expenses
                        </a>
                    <?php }else{?>
                        <a href="<?= base_url().'Detail/#'?>"  class="css-input-disabled">
                            <i class="fa fa-money fsize" aria-hidden="true"></i><br/>Expenses
                        </a>
                    <?php }?>                     
                </div>

                

                <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-center">                                       
                    <?php if(in_array(10,$ar)){?>
                        <a href="#">
                            <i class="fa fa-shopping-bag fsize" aria-hidden="true"></i><br/>Tender
                        </a>
                    <?php }else{?>
                        <a href="<?= base_url().'Detail/#'?>"  class="css-input-disabled">
                            <i class="fa fa-shopping-bag fsize" aria-hidden="true"></i><br/>Tender
                        </a>
                    <?php }?>                     

                </div>

                <div class="col-sm-1 col-md-1 col-lg-1 col-xs-1"></div>

               

            </div>

        </div><br/><br/><br/><br/><br/><br/>

        <!-- END Loc<br/>k Screen Content -->



        <div class="push-10-t text-center animated fadeInUp">

            <small class="text-muted font-w600"> &copy; Astral</small>

        </div>



       



        <?php $load = unserialize(constant($mast_load));?>



        <?php foreach($load['mjs'] as $data){?>

            

            <script src="<?= LOAD.$data?>" type="text/javascript"></script>    

        <?php }?>

        </div>

</body>

</html>    