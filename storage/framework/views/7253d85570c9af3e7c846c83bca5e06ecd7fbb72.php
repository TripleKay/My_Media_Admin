<?php $__env->startSection('content'); ?>


<div class="row p-3">
    <div class="col-4">
        <div class="card shadow card-primary card-outline" style="border-radius: 10px">
            <div class="card-header">
                <h4 class="mb-0">Create Category</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin#createCategory')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" name="categoryName" class="form-control" value="<?php echo e(old('categoryName')); ?>" placeholder="enter category name....">
                        <?php $__errorArgs = ['categoryName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="text-danger"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="enter category description...."><?php echo e(old('description')); ?></textarea>
                        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="text-danger"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <button class="btn btn-primary mt-3">Add Category</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-8">
        <?php echo $__env->make('admin.category.list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- /.card -->
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/triplekay/Desktop/My_Workspace/My_Media_Project/My_Media_Admin/resources/views/admin/category/index.blade.php ENDPATH**/ ?>