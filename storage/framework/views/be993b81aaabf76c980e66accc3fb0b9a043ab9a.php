<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="h4 font-weight-bold">
            Task: <?php echo e($task->name); ?>   
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="row">
        <div class="col-4">
            <div class="card my-4">
                <div class="card-body">
                    <h3><?php echo e($task->name); ?></h3>
                    <p>Created at: <?php echo e($task->created_at); ?></p>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card my-4">
                <div class="card-body">
                    <p><?php echo e($task->description); ?></p>
                    <p>Status: <?php echo e($taskStatus); ?></p>
                    <p>Assigned user: <?php echo e($task->assignedUser ? $task->assignedUser->name : 'unsigned'); ?></p>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\todo2\resources\views/pages/tasks/show.blade.php ENDPATH**/ ?>