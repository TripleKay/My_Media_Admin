<?php $__env->startSection('content'); ?>


<div class="row p-3">
    <div class="col-12">
      <!-- /.card -->
      <div class="card shadow">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
              <h4 class="mb-0">Trend Post List</h4>
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
                  <th>Title</th>
                  <th>Photo</th>
                  <th>View Count</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->post_id); ?></td>
                            <td><?php echo e($item->title); ?></td>
                            <td>
                                <?php if($item->image == Null): ?>
                                    <img src="<?php echo e(asset('defaultImage/default_post.png')); ?>" class="rounded"  alt="" srcset="" style="width: 100px">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('postImage/'.$item->image)); ?>"  class="rounded" alt="" srcset="" style="width: 100px">
                                <?php endif; ?>
                            </td>
                            <td>
                                <i class="fas fa-eye text-success ml-2"></i>
                                <span class="ml-2"><?php echo e($item->post_count); ?></span>
                            </td>
                            <td>
                                <a href="<?php echo e(route('admin#trendDetail',$item->post_id)); ?>" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </tbody>
            </table>
            
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/triplekay/Desktop/My_Workspace/My_Media_Project/My_Media_Admin/resources/views/admin/trend_post/index.blade.php ENDPATH**/ ?>