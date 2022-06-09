<?php $__env->startSection('content'); ?>


<div class="row p-3">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
              <h4 class="mb-0">Admin List</h4>
              <form action="<?php echo e(route('admin#searchAccount')); ?>" class="d-flex" method="POST">
                    <?php echo csrf_field(); ?>
                  <input type="text" name="search" class="form-control mr-2" placeholder="Search">
                  <button class="btn btn-primary"><i class="fas fa-search"></i></button>
              </form>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?php if(Session::has('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?php echo e(Session::get('success')); ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
          <div class="table-responsive">
            <table class="table table-hover text-nowrap table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Gender</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->id); ?></td>
                        <td><?php echo e($item->name); ?></td>
                        <td><?php echo e($item->email); ?></td>
                        <td><?php echo e($item->phone); ?></td>
                        <td><?php echo e($item->address); ?></td>
                        <td><?php echo e($item->gender); ?></td>
                        <td>
                            <a
                            <?php if(auth()->user()->id == $item->id || $data->count() == 1): ?>
                                href="#" class="d-none"
                            <?php else: ?>
                                href="<?php echo e(route('admin#deleteAccount',$item->id)); ?>" class="btn btn-danger btn-sm"
                            <?php endif; ?>
                             onclick="return confirm('Are You sure you want to delete!')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/triplekay/Desktop/My_Workspace/My_Media_Project/My_Media_Admin/resources/views/admin/list/index.blade.php ENDPATH**/ ?>