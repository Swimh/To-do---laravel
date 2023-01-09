<div>
    <h3>Hello <?php echo e($user->name); ?></h3>

    <p>This task has been edited: <a href="<?php echo e(route('tasks.show',['task' =>$task->id])); ?>"><?php echo e($task->name); ?></a></p>
</div><?php /**PATH C:\laragon\www\todo2\resources\views/mails/taskEdited.blade.php ENDPATH**/ ?>