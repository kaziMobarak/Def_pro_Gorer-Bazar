<?php $__env->startSection('admin_content'); ?>

 <?php if(Session::has('danger')): ?>
        <div class="alert alert-danger">
            <?php echo e(Session::get('danger')); ?>

            <?php
                Session::forget('danger');
            ?>
            <p id="close" class=" float-right btn btn-sm btn-danger">X</p>
        </div>

    <?php elseif(Session::has('success')): ?>
    <div class="alert alert-success">
        <?php echo e(Session::get('success')); ?>

        <?php
            Session::forget('success');
        ?>
        <p id="close" class=" float-right btn btn-sm btn-success">X</p>
    </div>

    <?php endif; ?>



        <div class=" d-flex justify-content-between align-item-center">
            <h2 class="mb-0">ALL CATEGORY LIST</h2>
            <a class="text-light btn btn-icon btn-primary" href="<?php echo e(route('admin.category.create')); ?>">
                <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                <span class="btn-inner--text">CREATE NEW CATEGORY</span>
              </a>
        </div>
      <!-- Card header -->
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped text-center">
        <thead>
        <tr>
          <th>index</th>
          <th>Icon Image</th>
          <th>Name</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($loop->index + 1); ?></td>
          <td> <img height="60px" width="100px" src="/images/<?php echo e($item->icon_image); ?>" alt=""></td>
          <td><?php echo e($item->name); ?></td>
          <td>
            <button type="button" class="btn btn-sm btn-rounded btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg<?php echo e($item->id); ?>"><i class="fas fa-eye"></i></button>
              <a class="btn btn-sm btn-rounded btn-success" href="<?php echo e(url('admin/category/edit/'.$item->id)); ?>"> <i class="fas fa-user-edit"></i></a>
              <a class="btn btn-sm btn-rounded btn-danger" href="<?php echo e(url('admin/category/destroy/'.$item->id)); ?>"> <i class="fas fa-trash"></i></a>
          </td>
        </tr>



        <!--category view modal start here -->
        <div class="modal fade bd-example-modal-lg<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="card">
                    <div class="card-header">
                        Category Detail
                    </div>
                    <div class="card-body">
                      <h5 class="card-title"> <?php echo e($item->name); ?></h5>
                      <p class="card-text"><?php echo e($item->description); ?></p>
                      <p class="cart-img">
                        <img width="100%" src="/images/<?php echo e($item->banner_image); ?>" alt="">
                      </p>
                    </div>
                  </div>
              </div>
            </div>
          </div>
         <!--category view modal end here -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </tbody>
        <tfoot>
        <tr>
          <th>index</th>
          <th>Icon Image</th>
          <th>Name</th>
          <th>Action</th>
        </tr>
        </tfoot>
      </table>





    </div>
</div>







         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
            <script>
                $('#close').click(function() {
                    $('.alert').hide(2000);
                })
            </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce\ecommerce\resources\views/admin/category/index.blade.php ENDPATH**/ ?>