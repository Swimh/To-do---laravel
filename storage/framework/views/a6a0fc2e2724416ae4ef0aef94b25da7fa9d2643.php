<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="h4 font-weight-bold">
            Task Categories
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <a href="<?php echo e(route ('task-categories.add')); ?>" class="btn btn-primary text-white"> Add category</a>
        </div>
    </div>

    <?php if(count($categories) > 0): ?>
    <div class="row">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-3">
            <div class="card my-4 shadow">
                <div class="card-body">
                    <div class="text-center">
                        <h3><?php echo e($category->name); ?></h3>
                        <p>tasks: <?php echo e($category->tasks->count()); ?></p>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-around">
                    <a href="#" class="btn btn-sm btn-success">Edit</a>
                    <form action="<?php echo e(route('task-categories.delete', [ 'taskCategory' => $category->id ])); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <button class="btn btn-sm btn-danger text-white">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    
    <?php else: ?> 
        <div class="row">
            <div class="col-12 text-center">
                <h2>no categories found</h2>
            </div>
        </div>
    <?php endif; ?>

    <div class="card my-4">
        <div class="card-body">
            You're logged in!
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\todo2\resources\views/pages/taskCategories/index.blade.php ENDPATH**/ ?>