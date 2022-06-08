<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>PSM Management System</title>

    <!-- vendor css -->
    <link href="<?php echo e(asset('dashboard/lib/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dashboard/lib/Ionicons/css/ionicons.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dashboard/lib/perfect-scrollbar/css/perfect-scrollbar.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dashboard/lib/rickshaw/rickshaw.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dashboard/lib/datatables/jquery.dataTables.css')); ?>" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/css/starlight.css')); ?>">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <?php echo $__env->make('lecturer.body.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <?php echo $__env->make('lecturer.body.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->


    <!-- ########## START: MAIN PANEL ########## -->
    
<?php echo $__env->yieldContent('lecturer'); ?>
    <!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="<?php echo e(asset('dashboard/lib/jquery/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/lib/popper.js/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/lib/bootstrap/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/lib/jquery-ui/jquery-ui.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/lib/jquery.sparkline.bower/jquery.sparkline.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/lib/d3/d3.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/lib/rickshaw/rickshaw.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/lib/chart.js/Chart.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/lib/Flot/jquery.flot.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/lib/Flot/jquery.flot.pie.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/lib/Flot/jquery.flot.resize.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/lib/flot-spline/jquery.flot.spline.js')); ?>"></script>

    <script src="<?php echo e(asset('dashboard/lib/datatables/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/lib/datatables-responsive/dataTables.responsive.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/lib/select2/js/select2.min.js')); ?>"></script>

    <script src="<?php echo e(asset('dashboard/js/starlight.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/js/ResizeSensor.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/js/dashboard.js')); ?>"></script>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
 <?php if(Session::has('message')): ?>
 var type = "<?php echo e(Session::get('alert-type','info')); ?>"
 switch(type){
    case 'info':
    toastr.info(" <?php echo e(Session::get('message')); ?> ");
    break;

    case 'success':
    toastr.success(" <?php echo e(Session::get('message')); ?> ");
    break;

    case 'warning':
    toastr.warning(" <?php echo e(Session::get('message')); ?> ");
    break;

    case 'error':
    toastr.error(" <?php echo e(Session::get('message')); ?> ");
    break; 
 }
 <?php endif; ?> 


 $('#datatable2').DataTable({
  bLengthChange: false,
  searching: false,
  responsive: true
});
</script>
  </body>
</html>
<?php /**PATH C:\Users\HP\Documents\GitHub\Laravel_PSM\resources\views/lecturer/lect_master.blade.php ENDPATH**/ ?>