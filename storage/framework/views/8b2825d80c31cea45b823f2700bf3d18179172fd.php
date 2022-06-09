<?php $__env->startSection('content'); ?>
    <div class="row p-5">
        <div class="col-4">
            <div class="card card-primary card-outline" style="border-radius: 15px">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="<?php echo e(asset('dist/img/avator.jpg')); ?>" alt="User profile picture">
                  </div>

                  <h3 class="profile-username my-3 text-center"><?php echo e($user->name); ?></h3>


                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b><i class="fas fa-user mr-3 text-secondary"></i>Name</b> <a class="float-right"><?php echo e($user->name); ?></a>
                    </li>
                    <li class="list-group-item">
                      <b><i class="fas fa-envelope mr-3 text-secondary"></i>Email</b> <a class="float-right"><?php echo e($user->email); ?></a>
                    </li>
                    <li class="list-group-item">
                      <b><i class="fas fa-tools mr-3 text-secondary"></i>Role</b> <a class="float-right">Admin</a>
                    </li>
                  </ul>
                  <a href="<?php echo e(route('admin#editPassword')); ?>" class="btn btn-danger w-100"><i class="fas fa-key text-white mr-3"></i>Change Password</a>
                </div>

              </div>
        </div>
        <div class="col-8">
            <div class="card card-primary card-outline" style="border-radius: 15px; max-width: 600px">
                <div class="card-header">
                    <h4 class="mb-0">Edit User Profile</h4>
                </div>
                <div class="card-body">
                    <?php if(Session::has('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?php echo e(Session::get('success')); ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <?php endif; ?>
                    <form action="<?php echo e(route('admin#update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="adminName" class="form-control" placeholder="enter your name....." value="<?php echo e(old('adminName',$user->name)); ?>">
                            <?php $__errorArgs = ['adminName'];
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
                            <label for="">Email</label>
                            <input type="text" name="adminEmail" class="form-control" placeholder="enter your email....." value="<?php echo e(old('adminEmail',$user->email)); ?>">
                            <?php $__errorArgs = ['adminEmail'];
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
                            <label for="">Phone</label>
                            <input type="text" name="adminPhone" class="form-control" placeholder="enter your phone....." value="<?php echo e(old('adminPhone',$user->phone)); ?>">
                            <?php $__errorArgs = ['adminPhone'];
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
                            <label for="">Address</label>
                            <textarea name="adminAddress" id="" rows="3" class="form-control" placeholder="enter your address...."><?php echo e(old('adminAddress',$user->address)); ?></textarea>
                            <?php $__errorArgs = ['adminAddress'];
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
                            <label for="">Gender</label>
                            <select name="adminGender" class="form-control" id="">
                                <option value="" <?php echo e($user->gender == '' ? 'selected' : ''); ?>>Select Gender</option>
                                <option value="male" <?php echo e($user->gender == 'male' ? 'selected' : ''); ?>>Male</option>
                                <option value="female" <?php echo e($user->gender == 'female' ? 'selected' : ''); ?>>Female</option>
                            </select>
                            <?php $__errorArgs = ['adminGender'];
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
                        <button type="submit" class="mt-3 btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/triplekay/Desktop/My_Workspace/My_Media_Project/My_Media_Admin/resources/views/admin/profile/index.blade.php ENDPATH**/ ?>