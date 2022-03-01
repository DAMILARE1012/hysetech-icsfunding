<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ICS Funding - <?php echo e($title); ?></title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="shortcut icon" href="<?php echo e(asset('admin/dist')); ?>/img/favicon.png" type="image/x-icon">

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('admin/plugins')); ?>/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/dist')); ?>/css/adminlte.css">


    <link rel="stylesheet" href="<?php echo e(asset('admin/plugins')); ?>/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('admin/plugins')); ?>/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('admin/plugins')); ?>/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('admin/plugins')); ?>/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('admin/plugins')); ?>/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('admin/plugins')); ?>/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet"
          href="<?php echo e(asset('admin/plugins')); ?>/bootstrap-switch-3.3.4/dist/css/bootstrap3/bootstrap-switch.min.css">
    <link href="<?php echo e(asset('admin/plugins')); ?>/toastr/toastr.min.css" rel="stylesheet" type="text/css">
    <style>
        .pbt-1 {
            padding-top: .25rem;
            padding-bottom: .25rem
        }

        .pbt-2 {
            padding-top: .75rem;
            padding-bottom: .75rem
        }

        .nav-p {
            font-size: 14px;
            padding-left: 10px
        }

        .nav-sub-p {
            font-size: 14px;
            padding-left: 40px
        }

        .nav-sub-p-active {
            font-size: 14px;
            padding-left: 36px
        }

        .tabbed {
            text-align: center;
            margin: 5px;
            margin-bottom: 0px;
            padding: 10px
        }

        .tab-active {
            border-bottom: 5px solid #007bff;
        }

        .tab-title {
            color: black;
            font-size: 16px;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #001733!important;">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link pbt-2" data-widget="pushmenu" href="#" role="button"
                   style="color: white;font-size: 20px"><i class="fas fa-bars"></i></a>

            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <span style="color: white;font-size: 16px;font-weight: 300" class="nav-link pbt-2"><?php echo e($title); ?></span>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <img src="<?php echo e(asset('admin/dist/img/avatar.png')); ?>" class="img-fluid rounded-circle"
                     style="width: 2.5rem;border: 1px solid lightgrey" alt="">
                <span
                    style="color: white;font-size: 14px"><?php echo e(auth('borrower')->user()->first_name); ?> <?php echo e(auth('borrower')->user()->last_name); ?></span>
            </li>
            <li class="nav-item pl-2">
                <form action="<?php echo e(route('borrower.logout')); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-power-off"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="brand-link" align="center">
            <img src="<?php echo e(asset('admin/dist')); ?>/img/logo.png" alt="ICS Logo" class="img-fluid" style="height: 3rem">
        </a>

        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="<?php echo e(route('borrower.company')); ?>"
                           class="nav-link <?php echo e($nav_active == 'company'?'active':''); ?> pbt-2">
                            <span class="nav-icon">
                                <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M0.855473 0H6.95071V7.61905H0.855473V0ZM14.5679 0H8.47266V4.57143H14.5679V0ZM13.0476 3.04761V1.5238H10V3.04761H13.0476ZM5.42691 6.09525V1.52383H2.37929V6.09525H5.42691ZM13.0476 7.61902V12.1904H10V7.61902H13.0476ZM5.42691 12.1905V10.6667H2.37929V12.1905H5.42691ZM14.5679 6.09528H8.47266V13.7143H14.5679V6.09528ZM0.855469 9.14286H6.95071V13.7143H0.855469V9.14286Z"
                              fill="white"></path>
                    </svg>
                            </span>
                            <p class="nav-p">
                                Profile
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('borrower.applications')); ?>"
                           class="nav-link <?php echo e($nav_active == 'applications'?'active':''); ?> pbt-2">
                            <span class="nav-icon">
                                <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M0.855473 0H6.95071V7.61905H0.855473V0ZM14.5679 0H8.47266V4.57143H14.5679V0ZM13.0476 3.04761V1.5238H10V3.04761H13.0476ZM5.42691 6.09525V1.52383H2.37929V6.09525H5.42691ZM13.0476 7.61902V12.1904H10V7.61902H13.0476ZM5.42691 12.1905V10.6667H2.37929V12.1905H5.42691ZM14.5679 6.09528H8.47266V13.7143H14.5679V6.09528ZM0.855469 9.14286H6.95071V13.7143H0.855469V9.14286Z"
                              fill="white"></path>
                    </svg>
                            </span>
                            <p class="nav-p">
                                Applications
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('borrower.loans')); ?>"
                           class="nav-link pbt-2 <?php echo e($nav_active == 'loans'?'active':''); ?>">
                            <span class="nav-icon">
                                <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M0.855473 0H6.95071V7.61905H0.855473V0ZM14.5679 0H8.47266V4.57143H14.5679V0ZM13.0476 3.04761V1.5238H10V3.04761H13.0476ZM5.42691 6.09525V1.52383H2.37929V6.09525H5.42691ZM13.0476 7.61902V12.1904H10V7.61902H13.0476ZM5.42691 12.1905V10.6667H2.37929V12.1905H5.42691ZM14.5679 6.09528H8.47266V13.7143H14.5679V6.09528ZM0.855469 9.14286H6.95071V13.7143H0.855469V9.14286Z"
                              fill="white"></path>
                    </svg>
                            </span>
                            <p class="nav-p">
                                Current Loans
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('borrower.notifications')); ?>"
                           class="nav-link pbt-2 <?php echo e($nav_active == 'notifications'?'active':''); ?>">
                            <span class="nav-icon">
                                <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M0.855473 0H6.95071V7.61905H0.855473V0ZM14.5679 0H8.47266V4.57143H14.5679V0ZM13.0476 3.04761V1.5238H10V3.04761H13.0476ZM5.42691 6.09525V1.52383H2.37929V6.09525H5.42691ZM13.0476 7.61902V12.1904H10V7.61902H13.0476ZM5.42691 12.1905V10.6667H2.37929V12.1905H5.42691ZM14.5679 6.09528H8.47266V13.7143H14.5679V6.09528ZM0.855469 9.14286H6.95071V13.7143H0.855469V9.14286Z"
                              fill="white"></path>
                    </svg>
                            </span>
                            <p class="nav-p">
                                Notifications
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('borrower.administration')); ?>"
                           class="nav-link pbt-2 <?php echo e($nav_active == 'administration'?'active':''); ?>">
                            <span class="nav-icon">
                                <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M0.855473 0H6.95071V7.61905H0.855473V0ZM14.5679 0H8.47266V4.57143H14.5679V0ZM13.0476 3.04761V1.5238H10V3.04761H13.0476ZM5.42691 6.09525V1.52383H2.37929V6.09525H5.42691ZM13.0476 7.61902V12.1904H10V7.61902H13.0476ZM5.42691 12.1905V10.6667H2.37929V12.1905H5.42691ZM14.5679 6.09528H8.47266V13.7143H14.5679V6.09528ZM0.855469 9.14286H6.95071V13.7143H0.855469V9.14286Z"
                              fill="white"></path>
                    </svg>
                            </span>
                            <p class="nav-p">
                                Administration
                            </p>
                        </a>
                    </li>


                </ul>
            </nav>

        </div>
    </aside>

    <div class="content-wrapper p-4">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

</div>
<script src="<?php echo e(asset('admin/plugins')); ?>/jquery/jquery.min.js"></script>
<script src="<?php echo e(asset('admin/plugins')); ?>/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?php echo e(asset('admin/plugins')); ?>/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo e(asset('admin/plugins')); ?>/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo e(asset('admin/plugins')); ?>/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo e(asset('admin/plugins')); ?>/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo e(asset('admin/dist')); ?>/js/adminlte.min.js"></script>
<script src="<?php echo e(asset('admin/dist')); ?>/js/demo.js"></script>
<script src="<?php echo e(asset('admin/plugins')); ?>/select2/js/select2.js"></script>
<script src="<?php echo e(asset('admin/plugins')); ?>/toastr/toastr.min.js"></script>
<script src="<?php echo e(asset('admin/plugins')); ?>/summernote/summernote-bs4.min.js"></script>
<?php echo $__env->yieldContent('scripts'); ?>
<script>
    $(function () {
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        <?php if(session()->has('success')): ?>
        toastr.success('<?php echo e(session()->get('success')); ?>')
        <?php endif; ?>
        <?php if(session()->has('error')): ?>
        toastr.error('<?php echo e(session()->get('error')); ?>')
        <?php endif; ?>
        $('.select2').select2({
            theme: 'bootstrap4'
        });
        $("#data-table").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": true,
        });
        $('.summernote').summernote({
            height: 500
        });
        $('#image_input_field').change(function () {
            preview_img(this, $('#image_preview'));
        });
        $('#image_input_field_2').change(function () {
            preview_img(this, $('#image_preview_2'));
        });

    })

    function preview_img(input, img) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                img.attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\hysetech-icsfunding\resources\views/borrower/layout/app.blade.php ENDPATH**/ ?>