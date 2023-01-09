<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="h4 font-weight-bold">
            Edit task: <?php echo e($task->name); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="card my-4">
        <div class="card-body">

            <div class="row">
                <div class="col-6 m-auto">
                    <form action="<?php echo e(route('tasks.update',['task' => $task->id])); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('put'); ?>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" value="<?php echo e($task->name); ?>">
                            <div id="nameHelp" class="form-text">Name of the task</div>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status_id" id="status" class="form-select">
                                <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value); ?>" <?php echo e($task->status_id === $value ? 'selected' : ''); ?>><?php echo e(strtoupper($key)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5"><?php echo e($task->description); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary text-white">Edit task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\todo2\resources\views/pages/tasks/edit.blade.php ENDPATH**/ ?>