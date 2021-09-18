<?php $__env->startSection('user_content'); ?>

<section class="container">
    <div class="my-3">
        <h4>Pre-order Create Form</h4>
    </div>
    <form action="<?php echo e(url('user/preOrder/store')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="">Enter Name</label>
                    <input type="text" class="form-control" placeholder="Enter Name" name="name" id="">
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="">Enter Phone</label>
                    <input type="number" class="form-control" placeholder="Enter number" name="phone" id="">
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="form-group">
                    <label for="">Enter E-mail</label>
                    <input type="email" class="form-control" placeholder="Enter email" name="email" id="">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="">Note</label>
            <textarea name="note" id="" placeholder="Note" class="form-control" cols="10" rows="4"></textarea>
        </div>

        <div class="float-right form-group">
            <input type="submit" class="btn btn-primary" name="" id="">
        </div>
    </form>
</section>
<br><br><br><br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce\ecommerce\resources\views/user/preOrder/create.blade.php ENDPATH**/ ?>