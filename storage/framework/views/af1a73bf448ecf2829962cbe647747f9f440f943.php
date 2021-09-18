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


<section class=" container">

    <div class="row">
        <div class="col-sm-12 col-12 col-sm-4 col-lg-4">
            <div class="card container">
                <div class="cart-title">
                    <h3>Create New Attribute Value</h3>
                </div>

                <form action=" <?php echo e(isset($edit) ?  url('admin/attributeValue/update/'.$edit->id) : url('admin/attributeValue/store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="">Select Attributes</label>
                        <select name="attribute_id" class="form-control" id="">
                            <option value="">--Select Attributes--</option>
                            <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?>" <?php echo e(@$edit->attribute_id == $item->id ? 'Selected' : ''); ?>> <?php echo e($item->name); ?> </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Attribute Value Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="type here attributeValue name" name="name" value="<?php echo e(@$edit->name); ?>" id="">
                        <?php if($errors->has('name')): ?>
                        <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="text-center form-group my-3">
                        <input type="submit" class="btn btn-dark text-light" name="" value="Create New attributeValue" id="">
                    </div>
                </form>
            </div>
        </div>
        <!--attributeValue form -->

        <div class="col-sm-12 col-12 col-sm-8 col-lg-8">
            <div class="card">
                <div class="card-title">
                    <h3 class="container">List Of attribute Values</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>index</th>
                                <th>Attribute Name</th>
                                <th>Attribute Value Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $attributeValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->index + 1); ?></td>
                                <td><?php echo e($item->attribute->name); ?></td>
                                <td><?php echo e($item->name); ?></td>
                                <td>
                                    <a class="btn btn-sm btn-rounded btn-success" href="<?php echo e(url('admin/attributeValue/edit/'.$item->id)); ?>"> <i class="fas fa-user-edit"></i></a>
                                    <a class="btn btn-sm btn-rounded btn-danger" href="<?php echo e(url('admin/attributeValue/destroy/'.$item->id)); ?>"> <i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>index</th>
                                <th>Attribute Name</th>
                                <th>Attribute Value Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>





                </div>
            </div>
        </div>
        <!--attributeValue list show -->
    </div>

</section>











<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
<script>
    $('#close').click(function() {
        $('.alert').hide(2000);
    })

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kazi ecommerce\ecommerce\resources\views/admin/attributeValue/index.blade.php ENDPATH**/ ?>