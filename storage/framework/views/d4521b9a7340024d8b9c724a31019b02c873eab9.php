<?php $__env->startSection('admin_content'); ?>
<section class="container">
    <div class="">
        <h3> Pre-Order List</h3>

    </div>

    <div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Index</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Note</th>
              </tr>
            </thead>
            <tbody>

                <?php $__currentLoopData = $preOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($loop->index +1); ?></th>
                    <td><?php echo e($item->name); ?></td>
                    <td><?php echo e($item->phone); ?></td>
                    <td><?php echo e($item->email); ?></td>
                    <td><?php echo e($item->note); ?></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </tbody>
          </table>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce\ecommerce\resources\views/admin/preOrder/index.blade.php ENDPATH**/ ?>