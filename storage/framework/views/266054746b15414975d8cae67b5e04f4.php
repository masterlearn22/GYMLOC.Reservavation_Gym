<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('partials.styleGlobal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('style'); ?>
    <style>
        body {
            background-color: #121212 !important;
            color: #F3F4F6;
        }
        .navbar-light .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.8) !important;
        }
        .navbar-light .navbar-nav .nav-link:hover {
            color: #39FF14 !important;
        }
        .navbar-brand {
            color: #39FF14 !important;
            font-weight: 700;
        }
        /* Override default footer styles for dark mode */
        footer.footer {
            background-color: #1a1a1a !important;
            color: #a0aec0 !important;
            border-top: 1px solid #2d3748;
        }
        footer.footer a {
            color: #cbd5e1 !important;
        }
        footer.footer h6 {
            color: #fff !important;
        }
    </style>
</head>

<body class="index-page bg-dark-gym">
    <?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <!-- Main Content Area -->
    <div class="main-content">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('partials.jspage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('partials.jsglobal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
</body>
</html>
<?php /**PATH C:\laragon\www\GYMLOC.Reservavation_Gym-master\resources\views/partials/app-dark.blade.php ENDPATH**/ ?>