<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="h4 font-weight-bold">
            Profile
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="row">
        <div class="col-3">
            <div class="card my-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <img src="<?php echo e($user->profile_image ? '/' . $user->profile_image : 'https://via.placeholder.com/150'); ?>" class="img-fluid rounded" alt="pic"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form action="<?php echo e(route('profile.update')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('put'); ?>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="<?php echo e($user->name); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="profile_image">Profile image</label>
                                    <input type="file" class="form-control" id="profile_image" name="profile_image">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary text-white">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="card my-4">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="tasks-tab" data-bs-toggle="tab" data-bs-target="#tasks-tab-pane" type="button" role="tab" aria-controls="tasks-tab-pane" aria-selected="true">Tasks</button>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tasks-tab-pane" role="tabpanel" aria-labelledby="tasks-tab" tabindex="0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $user->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($task->name); ?></td>
                                            <td><?php echo e($task->description); ?></td>
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
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\todo2\resources\views/pages/profile/index.blade.php ENDPATH**/ ?>