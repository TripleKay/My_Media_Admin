<?php $__env->startSection('content'); ?>


<div class="row p-3">
    <div class="col-6 offset-3">
        <div class="card card-primary shadow card-outline" style="border-radius: 15px">
            <div class="card-header">
                <h4>Post Detail</h4>
            </div>
            <div class="card-body">
                <?php if($data->image == Null): ?>
                    <img src="<?php echo e(asset('defaultImage/default_post.png')); ?>" class="rounded img-fluid"  alt="" srcset="">
                <?php else: ?>
                    <img src="<?php echo e(asset('postImage/'.$data->image)); ?>"  class="rounded img-fluid" alt="" srcset="">
                <?php endif; ?>
                <div class="mt-3">
                    <h4 class=""><?php echo e($data->title); ?></h4>
                </div>
                <p class="text-secondary"><?php echo e($data->description); ?></p>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/triplekay/Desktop/My_Workspace/My_Media_Project/My_Media_Admin/resources/views/admin/trend_post/detail.blade.php ENDPATH**/ ?>