<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

        <!-- Scripts -->
        <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    </head>
    <body class="font-sans antialiased bg-light">
        <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Page Heading -->
        <header class="d-flex py-3 bg-white shadow-sm border-bottom">
            <div class="container">
                <?php echo e($header); ?>

            </div>
        </header>

        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger alert-dismissible fade show">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if(session('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo e(session('success')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <main class="container my-5">
            <?php echo e($slot); ?>

        </main>
    </body>
</html>
<?php /**PATH C:\laragon\www\todo2\resources\views/layouts/app.blade.php ENDPATH**/ ?>