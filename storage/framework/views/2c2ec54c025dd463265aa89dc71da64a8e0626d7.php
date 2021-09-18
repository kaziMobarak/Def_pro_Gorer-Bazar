<?php $__env->startSection('user_content'); ?>


<section class="my-3 container">
    <div class="">
        <h4 class="hot-deals">Brand Ways Product</h4>
    </div>
    <div class="row">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class=" col-sm-12 col-md-3 col-lg-3 my-2">
            <div class=" hot-deals">
                <div class="container ">
                    <a href="<?php echo e(url('product/view/'.$item->id)); ?>">
                        <img class="my-3" src="/product/thumbnail_img/images/<?php echo e($item->thumbnail_img); ?>" height="150px" width="100%" alt="">
                        <p class="hot-deals">
                            <strong style="color: #A9A9A9;"><?php echo e($item->name); ?></strong> <br>
                            <strong style="color: #A9A9A9;">
                                 <span style="color: #A9A9A9;">TK <?php echo e($item->unit_price); ?></span>
                            </strong>
                        </p>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kazi ecommerce\ecommerce\resources\views/user/brand/all_product.blade.php ENDPATH**/ ?>