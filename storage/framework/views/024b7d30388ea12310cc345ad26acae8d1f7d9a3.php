<?php $__env->startSection('admin_content'); ?>

<table class="table text-center">
    <thead>
      <tr>
        <th scope="col">Indexing</th>
        <th scope="col">User Name</th>
        <th scope="col">User Phone</th>
        <th scope="col">User Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

        <?php $__currentLoopData = $checkouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $checkout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"><?php echo e($loop->index +1); ?></th>
            <td><?php echo e($checkout->name); ?></td>
            <td><?php echo e($checkout->phone); ?></td>
            <td><?php echo e($checkout->email); ?></td>
            <td>
                <?php if($checkout->status == 1): ?>
                <a class="btn btn-info btn-sm" href="<?php echo e(url('admin/order/status',$checkout->id)); ?>">Successfully</a>
                <?php else: ?>
                <a class="btn btn-danger btn-sm" href="<?php echo e(url('admin/order/status',$checkout->id)); ?>">UnSuccessfully</a>
                <?php endif; ?>
                <a class="btn btn-success btn-sm" href="<?php echo e(url('admin/order/detail',$checkout->id)); ?>">View</a>
                <a class="btn btn-danger btn-sm" href="<?php echo e(url('admin/order/delete',$checkout->id)); ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>

  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce\ecommerce\resources\views/admin/checkout/index.blade.php ENDPATH**/ ?>