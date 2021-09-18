<?php $__env->startSection('admin_content'); ?>

<section class="container">
    <div class="row">
        <div class="col-md-4">
            <h4>User Info</h4>
            <hr>
            <p>
                <strong>Name:</strong><?php echo e($checkout->name); ?> <br>
                <strong>Phone:</strong><?php echo e($checkout->phone); ?> <br>
                <strong>Email:</strong><?php echo e($checkout->email); ?> <br>
                <strong>Location:</strong><?php echo e($checkout->location); ?> <br>
            </p>
        </div>
        <div class="col-md-4">
            <h4>Payment History</h4>
        <hr>
                <strong>Payment Type:</strong><?php echo e($checkout->payment_name); ?> <br>
                <strong>Payment Number:</strong><?php echo e($checkout->payment_number); ?> <br>
                <strong>Payment Secrect</strong><?php echo e($checkout->payment_secret); ?> <br>
        </div>
        <div class="col-md-4">

            <h4>Details</h4>
            <hr>
            <strong>Comment:</strong><?php echo e($checkout->description); ?> <br>
        </div>
    </div>
</section>



<section class="my-5">
    <h3 class="text-center">Product Details</h3>
<hr>
<div class="scrapcar-main-section">
    <div class="container">
<table class="table container" >
<thead>
  <tr>
    <th scope="col">Sl</th>
    <th scope="col">Product Name</th>
    <th scope="col">Product Price</th>
    <th scope="col">Product Image</th>
    <th scope="col">Quantity</th>
    <th scope="col">Action</th>
  </tr>
</thead>
<tbody>
    <?php
        $total_amount = 0;
    ?>
    <?php $__currentLoopData = App\Models\Cart::where('order_id',$checkout->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"><?php echo e($loop->index + 1); ?></th>
            <td><?php echo e($cart->product->name); ?></td>
            <td><?php echo e($cart->product->unit_price*$cart->quantity); ?></td>
            <?php
            $total_amount +=$cart->product->unit_price*$cart->quantity;
            ?>
            <td>
                <img height="80px" width="80px" src="<?php echo e(asset($cart->product->image)); ?>" alt="">
            </td>
            <td>
                <form action="<?php echo e(url('admin/order/porduct-quantiy',$cart->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="text" class="form-control" name="quantity" id="" value="<?php echo e($cart->quantity); ?>">
                <input style="" class="btn btn-sm btn-success" type="submit" name="btn" value="Update" id="">
                </form>
            </td>
            <td>
                <a class="btn btn-sm btn-info" style="" href="<?php echo e(url('admin/product/view',$cart->product->id)); ?>">View</a>
                <a class="btn btn-sm btn-danger" style="" href="<?php echo e(url('admin/order/cart-delete',$cart->id)); ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</tbody>
</table>
<div class="float-right form-inline">
    <p class="btn btn-success"><strong>Total Amount</strong>: <?php echo e($total_amount); ?></p>
    <p >
        <strong>
            <?php if($checkout->status==0): ?>
            <a class="btn btn-danger text-light"  href="<?php echo e(url('admin/order/status',$checkout->id)); ?>">UnSuccess</a>
            <?php else: ?>
            <a class="btn btn-info text-light"  href="<?php echo e(url('admin/order/orders')); ?>">Back</a>
            <?php endif; ?>
        </strong>
    </p>
</div><br>

</div>
</div>

</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kazi ecommerce\ecommerce\resources\views/admin/checkout/detail.blade.php ENDPATH**/ ?>