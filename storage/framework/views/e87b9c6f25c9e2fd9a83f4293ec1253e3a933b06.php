<div class="card shadow">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
          <h4 class="mb-0">Post List</h4>
          <form action="<?php echo e(route('admin#searchPost')); ?>" class="d-flex" method="POST">
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
              <th>Title</th>
              <th>Category</th>
              <th>Description</th>
              <th>Photo</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->post_id); ?></td>
                        <td><?php echo e($item->title); ?></td>
                        <td><?php echo e($item->category_id); ?></td>
                        <td class="text-wrap"><?php echo e(Str::substr($item->description, 0, 100)); ?>.....</td>
                        <td>
                            <?php if($item->image == Null): ?>
                                <img src="<?php echo e(asset('defaultImage/default_post.png')); ?>" class="rounded"  alt="" srcset="" style="width: 100px">
                            <?php else: ?>
                                <img src="<?php echo e(asset('postImage/'.$item->image)); ?>"  class="rounded" alt="" srcset="" style="width: 100px">
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo e(route('admin#editPost',$item->post_id)); ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="<?php echo e(route('admin#deletePost',$item->post_id)); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete...')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
<?php /**PATH /home/triplekay/Desktop/My_Workspace/My_Media_Project/My_Media_Admin/resources/views/admin/post/list.blade.php ENDPATH**/ ?>