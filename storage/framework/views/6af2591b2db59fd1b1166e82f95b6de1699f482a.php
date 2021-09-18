<?php $__env->startSection('admin_content'); ?>

<div class="card container">
    <div class="card-header">
        <h5 class="mb-0 h2">Product Variation</h5>
    </div>
        <div class="form-group ">
            <form action="<?php echo e(@$edit ? url('admin/variant/update/'.$edit->id) :  url('admin/variant/store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
            <div class="">
                <div class="">
                    <label for="">Select Product</label>
                    <select class="form-control" name="product_id" id="">
                        <option value="">--select product--</option>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($item->id); ?>" <?php echo e(@$edit->product_id==$item->id ? 'Selected' :''); ?> ><?php echo e($item->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <br>
            <div class="">
                <div class="" id="wrapper_form">
                        <label for="">Product Variant add</label>
                            <div class="input-group mb-3" id="inputFormRow">
                                <select class="form-control" name="color_id" id="">
                                    <option value="">--Select Color--</option>
                                    <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>" <?php echo e(@$edit->color_id == $item->id ? 'Selected' : ''); ?>><?php echo e($item->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <select class="form-control" name="attribute_id" id="">
                                    <option value="">--Select Attributes--</option>
                                    <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>" <?php echo e(@$edit->attribute_id == $item->id ? 'Selected' : ''); ?>><?php echo e($item->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <select class="form-control" name="attributevalue_id" id="attributevalue_id">
                                    <option value="">--Select Attributes Values--</option>
                                </select>



                                <input type="text" value="<?php echo e(@$edit->price); ?>" name="price" class="form-control m-input" placeholder="Enter Price" autocomplete="off">

                            </div>


                        </div>
                </div><!--end add/remove-->

        <div>
            <p>Choose the attributes of this product and then input values of each attribute</p>
            <br>
        </div>

            <div class="text-center">
                <input class="btn btn-success" type="submit" name="btn" value="Create Product Variant Price" id="">
            </div>
            </form>
    </div>
</div>




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
    <h2 class="mb-0">ALL PRODUCT VARIANT LIST</h2>
</div>
<!-- Card header -->
<div class="card">
<!-- /.card-header -->
<div class="card-body">
<table id="example1" class="table table-bordered table-striped text-center">
<thead>
<tr>
  <th>index</th>
  <th>Product</th>
  <th>Color</th>
  <th>Attribute Values</th>
  <th>Price</th>
  <th>Action</th>
</tr>
</thead>
<tbody>
<?php $__currentLoopData = $variatns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tr>
  <td><?php echo e($loop->index + 1); ?></td>
  <td><?php echo e($item->product_id ? $item->product->name : ''); ?></td>
  <td> <p class="btn btn-sm btn-rounded" style="background-color: <?php echo e($item->color_id ? $item->color->color_code : ''); ?>" >a</p></td>
  <td><?php echo e($item->attribute_value_id ? $item->attributeValue->name : ''); ?></td>
  <td><?php echo e($item->price); ?></td>
  <td>
    <button type="button" class="btn btn-sm btn-rounded btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg<?php echo e($item->id); ?>"><i class="fas fa-eye"></i></button>
      <a class="btn btn-sm btn-rounded btn-success" href="<?php echo e(url('admin/variant/edit/'.$item->id)); ?>"> <i class="fas fa-user-edit"></i></a>
      <a class="btn btn-sm btn-rounded btn-danger" href="<?php echo e(url('admin/variant/destroy/'.$item->id)); ?>"> <i class="fas fa-trash"></i></a>
  </td>
</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


</tbody>
<tfoot>
<tr>
    <th>index</th>
    <th>Product</th>
    <th>Color</th>
    <th>Attribute Values</th>
    <th>Price</th>
    <th>Action</th>
</tr>
</tfoot>
</table>





</div>
</div>










<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


    $('select[name="attribute_id"]').on('change', function(){
        var attribute_id = $(this).val();
        if(attribute_id){
            console.log(attribute_id)
            $.ajax({
                url: 'http://localhost:8000/admin/product/attribute_value/'+attribute_id,
                type: 'GET',
                dataType: "json",
                success:function(data){
                    data.forEach(item => {
                        $("#attributevalue_id").append('<option value='+ item.id +'>'+ item.name +'</option>')
                    });
                }
            })
        }
    });
</script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kazi ecommerce\ecommerce\resources\views/admin/product/variant_create.blade.php ENDPATH**/ ?>