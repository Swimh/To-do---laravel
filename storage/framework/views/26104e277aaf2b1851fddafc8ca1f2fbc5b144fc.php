<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="h4 font-weight-bold">
            Tasks
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="card my-4">
        <div class="card-body">

            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    <a href="<?php echo e(route('tasks.add')); ?>" class="btn btn-primary text-white">Add task</a>
                </div>
            </div>

            <div class="row">
                <div class="col-1">
                    <form action="#" method="GET">
                        <div class="mb-3">
                            <label for="items">Nr of items</label>
                            <select name="items" class="form-select" id="items">
                                <option value="5" <?php echo e(isset($_GET['items']) && $_GET['items'] == 5 ? 'selected' : ''); ?>>5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-3">
                <form action="<?php echo e(route('tasks.search')); ?>" method="GET">
                    <label for="search">Search:</label>
                    <input type="text" class="form-control" name="search" id="search">
                    <button type="submit" class="btn btn-sm btn-primary text-white">Search</button>
                </form>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($task->name); ?></td>
                                    <td><?php echo e($task->taskCategory ? $task->taskCategory->name : 'uncategorized'); ?></td>
                                    <td><?php echo e($task->description); ?></td>
                                    <td><?php echo e($task->user->name); ?></td>
                                    <td><?php echo e(strtoupper(App\General\Concretes\Enums\TaskStatus::getValueById($task->status_id))); ?></td>
                                    <td><?php echo e($task->created_at); ?></td>
                                    <td><?php echo e($task->updated_at); ?></td>
                                    <td class="d-flex">
                                        <a href="<?php echo e(route('tasks.show',['task' => $task->id])); ?>" class="btn btn-sm btn-primary text-white">V</a>
                                        <a href="<?php echo e(route('tasks.edit',[ 'task'=> $task->id ])); ?>" class="btn btn-sm btn-success text-white mx-2">E</a>
                                        <form action="<?php echo e(route('tasks.delete',[ 'task' => $task->id ])); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('delete'); ?>
                                            <button class="btn btn-sm btn-danger text-white">D</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($tasks->links()); ?>

                </div>
            </div>

            
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\todo2\resources\views/pages/tasks/index.blade.php ENDPATH**/ ?>