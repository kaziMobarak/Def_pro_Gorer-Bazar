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
            <h2 class="mb-0">ALL PRODUCT LIST</h2>
            <a class="text-light btn btn-icon btn-primary" href="<?php echo e(route('admin.product.create')); ?>">
                <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                <span class="btn-inner--text">CREATE NEW PRODUCT</span>
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
          <th>Name</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($loop->index + 1); ?></td>
          <td><?php echo e($item->name); ?></td>
          <td>
              <a class="btn btn-sm btn-rounded btn-primary" href="<?php echo e(url('admin/product/variant/'.$item->id)); ?>">Variant Price</a>
              <a class="btn btn-sm btn-rounded btn-primary" href="<?php echo e(url('admin/product/view/'.$item->id)); ?>"><i class="fas fa-eye"></i></a>
              <a class="btn btn-sm btn-rounded btn-success" href="<?php echo e(url('admin/product/edit/'.$item->id)); ?>"> <i class="fas fa-user-edit"></i></a>
              <a class="btn btn-sm btn-rounded btn-danger" href="<?php echo e(url('admin/product/destroy/'.$item->id)); ?>"> <i class="fas fa-trash"></i></a>
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
        <tr>
          <th>index</th>
          <th>Name</th>
          <th>Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
</div>

<?php $__env->startSection('js'); ?>
<!-- DataTables -->
<script src="<?php echo e(asset('admin')); ?>/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo e(asset('admin')); ?>/plugins/datatables/dataTables.bootstrap4.js"></script>


<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>
<?php $__env->stopSection(); ?>

         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
            <script>
                $('#close').click(function() {
                    $('.alert').hide(2000);
                })
            </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kazi ecommerce\ecommerce\resources\views/admin/product/index.blade.php ENDPATH**/ ?>