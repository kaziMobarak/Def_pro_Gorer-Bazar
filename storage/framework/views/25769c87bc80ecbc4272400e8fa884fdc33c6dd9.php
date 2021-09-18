<?php $__env->startSection('user_content'); ?>


<div class="text-center mt-2">
    <h4>All Cart Item</h4>
</div>
<div class="scrapcar-main-section">
    <div class="container">
<table class="table container" >
<thead>
  <tr>
    <th scope="col">#Sl</th>
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
    <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"><?php echo e($loop->index +1); ?></th>
            <td><?php echo e($cart->product->name); ?></td>
            <td><?php echo e($cart->product->unit_price); ?> Tk</td>
            <?php
            $total_amount +=$cart->product->unit_price*$cart->quantity;
            ?>
            <td>

                <img height="80px" width="80px" src="/product/thumbnail_img/images/<?php echo e($cart->product->thumbnail_img); ?>" alt="">
            </td>
            <td>
                <form action="<?php echo e(url('user/porduct-quantiy/'.$cart->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="text" name="quantity" id="" value="<?php echo e($cart->quantity); ?>">
                <input style="" type="submit" name="btn" value="Update" id="">
                </form>
            </td>
            <td><a class="btn btn-danger" style="" href="<?php echo e(url('user/cart/delete/'.$cart->id)); ?>">Delete</a> </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</tbody>
</table>
<div class="float-right">
    <p style="color:white;" class="btn btn-success text-light"><strong>Total Amount</strong>: <?php echo e($total_amount); ?>Tk</p>
    <p class="btn btn-info "><strong><a class="text-light" href="<?php echo e(url('user/checkout/create')); ?>">Checkout</a> </strong></p>
</div><br>
<br><br><br>
</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce\ecommerce\resources\views/user/cart/item.blade.php ENDPATH**/ ?>