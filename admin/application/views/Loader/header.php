<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>

    <meta name="description" content="">
    <meta name="author" content="Positive Quadrant">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicons/favicon.png">

    <!-- Bootstrap 3.4.1 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery and Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <?php $load = unserialize(constant($mast_load)); ?>

    <?php foreach ($load['mcss'] as $data) { ?>
        <link rel="stylesheet" href="<?= base_url() . 'assets/' . $data; ?>">
    <?php } ?>

    <!-- External CDN CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css">

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- jQuery Validation Plugin JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>

    <style type="text/css">
        /* Custom Scrollbar */
        .side-scroll #sidebar,
        .side-scroll #side-overlay {
            overflow-y: auto;
            /* Enables scrolling when content exceeds the container's height */
            scrollbar-width: thin;
            /* Firefox */
            scrollbar-color: #888 #e0e0e0;
            /* Firefox: thumb and track color */
        }

        .side-scroll #sidebar::-webkit-scrollbar,
        .side-scroll #side-overlay::-webkit-scrollbar {
            width: 8px;
            /* Width of the scrollbar */
        }

        .side-scroll #sidebar::-webkit-scrollbar-thumb,
        .side-scroll #side-overlay::-webkit-scrollbar-thumb {
            background-color: #888;
            /* Scrollbar thumb color */
            border-radius: 4px;
            /* Rounded corners for the scrollbar */
        }

        .side-scroll #sidebar::-webkit-scrollbar-track,
        .side-scroll #side-overlay::-webkit-scrollbar-track {
            background-color: #e0e0e0;
            /* Scrollbar track color */
        }

        /* Validation error and success styles */
        .error {
            color: red;
        }

        .success {
            color: green;
        }

        /* Select2 customization */
        span.select2.select2-container.select2-container--default {
            width: 100% !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            color: #000;
        }

        .select2-container .select2-search--inline .select2-search__field {
            box-sizing: border-box;
            border: none;
            font-size: 96%;
            margin-top: 5px;
        }
    </style>

    <script>
        $(document).ready(function () {
            $('.nav-main').find('[data-toggle="nav-submenu"]').on('click', function (e) {
                $(this).parent().toggleClass('open');
                e.preventDefault();
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('[data-toggle="layout"]').on('click', function () {
                var action = $(this).data('action');

                if (action === 'sidebar_close') {
                    $('#page-container').removeClass('sidebar-o'); // closes sidebar
                }
                else if (action === 'sidebar_open') {
                    $('#page-container').addClass('sidebar-o'); // opens sidebar
                }
                else if (action === 'sidebar_toggle') {
                    $('#page-container').toggleClass('sidebar-o'); // toggles sidebar
                }
            });
        });
    </script>


</head>



<body>

    <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
        <!-- Side Overlay-->

        <!-- END Side Overlay -->

        <!-- Sidebar -->
        <nav id="sidebar">
            <!-- Sidebar Scroll Container -->
            <div id="sidebar-scroll">
                <!-- Sidebar Content -->
                <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
                <div class="sidebar-content">
                    <!-- Side Header -->
                    <div class="side-header side-content bg-white-op">
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button"
                            data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-times"></i>
                        </button>

                        <a class="h5 text-white" href="<?= base_url() . 'Dashboard' ?>">
                            <img src="<?= base_url() ?>Images/Logos/logo.jpg" style="width:200px;object-fit:contain">
                            <span class="h4 font-w600 sidebar-mini-hide"></span>
                        </a>
                    </div>
                    <!-- END Side Header -->

                    <!-- Side Content -->
                    <div class="side-content">

                        <?php
                        // $access_rights = explode(',',$this->session->userdata('access'));   
                        ?>

                        <ul class="nav-main">
                            <li>
                                <a href="<?= base_url() . 'Dashboard' ?>"><i class="si si-speedometer"></i>
                                    <span class="sidebar-mini-hide">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-main-heading"><span class="sidebar-mini-hide"><br /></span></li>

                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="">
                                    <i class="fa fa-leanpub"></i><span class="sidebar-mini-hide">Contact us User</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= base_url() ?>user">View Contact us Users</a>
                                    </li>

                                </ul>
                            </li>


                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="">
                                    <i class="fa fa-leanpub"></i><span class="sidebar-mini-hide">Enquiry Details</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= base_url() ?>EnquiryDetails">View Enquiry Details</a>
                                    </li>

                                </ul>
                            </li>


                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="">
                                    <i class="fa fa-leanpub"></i><span class="sidebar-mini-hide">Internship
                                        Enquiry</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= base_url() ?>InternshipEnquiry">View Internship Details</a>
                                    </li>

                                </ul>
                            </li>

                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="">
                                    <i class="fa fa-leanpub"></i><span class="sidebar-mini-hide">Manage Invoice</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= base_url() ?>Invoice">Invoices</a>
                                    </li>

                                </ul>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="">
                                    <i class="fa fa-leanpub"></i><span class="sidebar-mini-hide">Career User</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= base_url() ?>career">View Career Users</a>
                                    </li>

                                </ul>
                            </li>

                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="">
                                    <i class="fa fa-leanpub"></i><span class="sidebar-mini-hide">Home</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= base_url() ?>Home">View Home</a>
                                    </li>

                                </ul>
                            </li>

                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="">
                                    <i class="fa fa-leanpub"></i><span class="sidebar-mini-hide">About Us</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= base_url() ?>about">View About</a>
                                    </li>

                                </ul>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="">
                                    <i class="fa fa-leanpub"></i><span class="sidebar-mini-hide">Our Partner</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= base_url() ?>Ourpartner">View Our Partner</a>
                                    </li>

                                </ul>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="">
                                    <i class="fa fa-leanpub"></i><span class="sidebar-mini-hide">Our Portfolio</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= base_url() ?>Ourportfolio">View Portfolio</a>
                                    </li>

                                </ul>
                            </li>

                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="">
                                    <i class="fa fa-leanpub"></i><span class="sidebar-mini-hide">Project </span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= base_url() ?>Project">View Projects</a>
                                    </li>

                                </ul>
                            </li>

                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="">
                                    <i class="fa fa-leanpub"></i><span class="sidebar-mini-hide">Team </span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= base_url() ?>Team">View Team</a>
                                    </li>

                                </ul>
                            </li>

                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="">
                                    <i class="fa fa-leanpub"></i><span class="sidebar-mini-hide">Our Workshops</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= base_url() ?>workshop">View Workshops</a>
                                    </li>

                                </ul>
                            </li>



                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="">
                                    <i class="fa fa-leanpub"></i><span class="sidebar-mini-hide"> Our Client</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= base_url() ?>Client">View Client</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="">
                                    <i class="fa fa-leanpub"></i><span class="sidebar-mini-hide"> Services </span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= base_url() ?>Services">View Services</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="">
                                    <i class="fa fa-leanpub"></i><span class="sidebar-mini-hide"> Technology </span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= base_url() ?>Technology">View Technology</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="">
                                    <i class="fa fa-leanpub"></i><span class="sidebar-mini-hide"> Software Products
                                    </span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= base_url() ?>SoftwareProduct">View Software Products</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="">
                                    <i class="fa fa-leanpub"></i><span class="sidebar-mini-hide"> Industries </span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= base_url() ?>Industries">View Industries</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="">
                                    <i class="fa fa-leanpub"></i><span class="sidebar-mini-hide"> Industries Serve </span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= base_url() ?>IndustriesServe">View Industries Serve</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="">
                                    <i class="fa fa-leanpub"></i><span class="sidebar-mini-hide"> Hire </span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= base_url() ?>Hire">View Hire</a>
                                    </li>
                                </ul>
                            </li>



                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="">
                                    <i class="fa fa-leanpub"></i><span class="sidebar-mini-hide"> Recently Placed
                                    </span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= base_url() ?>RecentlyPlaced">View Recently Placed</a>
                                    </li>
                                </ul>
                            </li>


                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="">
                                    <i class="fa fa-leanpub"></i><span class="sidebar-mini-hide"> Testimonials </span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= base_url() ?>Testimonial">View Testimonials</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="">
                                    <i class="fa fa-leanpub"></i><span class="sidebar-mini-hide"> Job Openings </span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= base_url() ?>JobOpenings">View Job Openings</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="">
                                    <i class="fa fa-leanpub"></i><span class="sidebar-mini-hide">Courses</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="<?= base_url() ?>Courses">Training</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>UpcomingBatches">Upcoming Batches</a>
                                    </li>

                                </ul>
                            </li>
                            <!-- <li>
<a class="nav-submenu" data-toggle="nav-submenu" href="">
    <i class="fa fa-leanpub"></i><span class="sidebar-mini-hide">FILM</span>
</a>
<ul>
    <li>
        <a href="<?= base_url() ?>film">View Film</a>
    </li>
   
    
</ul>
</li> -->









                            <?php
                            // if(in_array(1,$access_rights)){ ?>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i
                                        class="si si-badge"></i><span class="sidebar-mini-hide">Masters</span></a>
                                <ul>
                                    <?php
                                    // if(in_array(1.1,$access_rights)){ ?>
                                    <li>
                                        <a href="<?= base_url() ?>Masters/">Payment Master</a>
                                    </li>
                                    <?php
                                    //  }
                                    ?>
                                    <?php
                                    // if(in_array(1.2,$access_rights)){ ?>
                                    <li>
                                        <a href="<?= base_url() . 'Client_controller' ?>">Client</a>
                                    </li>
                                    <?php
                                    // } ?>
                                    <?php
                                    // if(in_array(1.3,$access_rights)){ ?>
                                    <li>
                                        <a href="<?= base_url() . 'Masters/client_publication' ?>">Client
                                            Publication</a>
                                    </li>
                                    <?php
                                    // } ?>
                                    <?php
                                    // if(in_array(1.4,$access_rights)){ ?>
                                    <li>
                                        <a href="<?= base_url() . 'Masters/employee' ?>">Employee </a>
                                    </li>
                                    <?php
                                    // } ?>
                                    <?php
                                    // if(in_array(1.5,$access_rights)){ ?>
                                    <li>
                                        <a href="#">Data Import/Export </a>
                                    </li>
                                    <?php
                                    // } ?>

                                </ul>
                            </li>
                            <?php
                            // } ?>







                        </ul>
                    </div>
                    <!-- END Side Content -->
                </div>
                <!-- Sidebar Content -->
            </div>
            <!-- END Sidebar Scroll Container -->
        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="header-navbar" class="content-mini content-mini-full">
            <!-- Header Navigation Right -->
            <ul class="nav-header pull-right">
                <li>
                    <div class="btn-group">
                        <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                            <img src="<?php echo base_url(); ?>assets/img/avatars/avatar10.jpg" alt="Avatar">
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <!-- <li class="dropdown-header">Profile</li>

<li>
<a tabindex="-1" href="base_pages_profile.html">
<i class="si si-user pull-right"></i>
<span class="badge badge-success pull-right">1</span>Profile
</a>
</li>
<li>
<a tabindex="-1" href="<?= base_url() . 'Notification_controller' ?>">
    <i class="si si-envelope-open pull-right"></i>
 

    <span class="badge badge-primary pull-right"><?= @$count; ?></span>Inbox
</a>
</li>
<li class="divider"></li> -->
                            <li class="dropdown-header">Actions</li>
                            <!-- <li>
<a tabindex="-1" href="base_pages_lock.html">
<i class="si si-lock pull-right"></i>Lock Account
</a>
</li> -->
                            <li>
                                <a tabindex="-1" href="<?= base_url() . 'Login/logout' ?>">
                                    <i class="si si-logout pull-right"></i>Log out
                                </a>
                            </li>
                            <li>
                                <a tabindex="-1" href="<?= base_url() . 'Login/change_password' ?>">
                                    <i class="si si-key pull-right"></i>Change Password
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>


            <ul class="nav-header pull-left">
                <li class="hidden-md hidden-lg">
                    <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                    <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
                        <i class="fa fa-navicon"></i>
                    </button>
                </li>
                <li class="hidden-xs hidden-sm">
                    <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                    <button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle"
                        type="button">
                        <i class="fa fa-ellipsis-v"></i>
                    </button>
                </li>



            </ul>
            <!-- END Header Navigation Left -->
        </header>