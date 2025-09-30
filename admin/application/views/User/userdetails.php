<main id="main-container">

    <!-- Page Header -->

    <div class="content bg-gray-lighter">

        <div class="row items-push">

            <div class="col-sm-7">

                <h1 class="page-heading">

                    User Information
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


    <div class="content">
        <!-- Dynamic Table Full -->
        <div class="block">

                        <!-- <div class="block-header">
                            <h3 class="block-title"><a href="<?= base_url() ?>category/cat_page"></a></h3>
                        </div> -->
                        <div class="block-content">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                            <!-- Addresses -->
                            <div class="block">
                                <?php foreach($user_list as $value): ?>
                                    <div class="row">

                                        <div class="col-sm-2">

                                        </div>

                                        <div class="col-sm-4">
                                            <strong>Company Name</strong><br>
                                            <?= $value['company_name']; ?><br>
                                        </div>

                                        <div class="col-sm-4">
                                            <strong>Mobile Number</strong><br>
                                            <?= $value['mobile_number']; ?><br>
                                        </div>

                                        <div class="col-sm-2">

                                        </div>

                                    </div>

                                    <br>

                                    <div class="row">

                                        <div class="col-sm-2">

                                        </div>

                                        <div class="col-sm-4">
                                            <strong>Email Id</strong><br>
                                            <?php
                                                if(!empty($value['email_id']))
                                                {
                                                    echo $value['email_id'];
                                                }else
                                                {
                                                    echo "null";
                                                }
                                            ?><br>
                                        </div>

                                        <div class="col-sm-4">
                                            <strong>GSTIN</strong><br>
                                            <?= $value['gst_in']; ?><br>
                                        </div>

                                        <div class="col-sm-2">

                                        </div>

                                    </div>

                                    <br>

                                    <div class="row">

                                        <div class="col-sm-2">

                                        </div>

                                        <div class="col-sm-4">
                                            <strong>Verification Status</strong><br>
                                            <?php 
                                            if($value['is_verified'] == 1)
                                            {
                                                echo "Verified";
                                            }else
                                            {
                                                echo "Not Verified";
                                            }
                                            ?><br>
                                        </div>

                                        <div class="col-sm-4">
                                            <strong>User Status</strong><br>
                                            <?php
                                            if($value['status'] == 1)
                                            {
                                                echo "Active";
                                            }else
                                            {
                                                echo "In Active";
                                            }
                                            ?><br>
                                        </div>

                                        <div class="col-sm-2">

                                        </div>
                                        
                                    </div>
                                    
                                    <br>

                                        <div class="row">

                                            <div class="col-sm-2">

                                            </div>

                                            <div class="col-sm-4">
                                                <strong>Device Id</strong><br>
                                                <?= $value['device_id']; ?><br>
                                            </div>

                                            <div class="col-sm-4">
                                                <strong>Device Type</strong><br>
                                                <?php 
                                                    if($value['device_os'] == 1)
                                                    {
                                                        echo "iOS";
                                                    }else
                                                    {
                                                        echo "Android";
                                                    }
                                                ?><br>
                                            </div>

                                            <div class="col-sm-2">

                                            </div>

                                        </div>

                                        <br>

                                         <div class="row">

                                            <div class="col-sm-2">

                                            </div>

                                            <div class="col-sm-4">
                                                <strong>Wallet Credit</strong><br>
                                                <?= "₹ " .$value['wallet_credit'] ?><br>
                                            </div>

                                            <div class="col-sm-4">
                                                <strong>Registered Date</strong><br>
                                                <?= $value['date']; ?><br>
                                            </div>

                                            <div class="col-sm-2">

                                            </div>

                                        </div>


                                    </div>

                                <?php endforeach; ?>
                            </div>
                            <!-- END Addresses -->
                        </div>
                    </div>
                    <!-- END Dynamic Table Full -->
                    

                </div>


                <!-- END Page Content -->

            </main>





