<?php $__env->startSection('admin_content'); ?>



    <div class=" d-flex justify-content-between align-item-center">
        <h2 class="mb-0"><?php if(isset($edit)): ?> CATEGORY UPDATE FORM  <?php else: ?> CREATE NEW CATEGORY <?php endif; ?></h2>
        <a class="text-light btn btn-icon btn-primary" href="<?php echo e(route('admin.category.index')); ?>">
            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
            <span class="btn-inner--text">ALL CATEGORY LIST</span>
        </a>
    </div>
    <!-- Card header -->
    <div class="card">
    <section class="container my-2 card-body">
        <form action="<?php echo e(isset($edit) ? url('admin/category/update/'.$edit->id) : url('admin/category/store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-4 col-sm-12 col-lg-4 col-12">
                    <div class="form-gorup">
                        <label for="">Category Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" value="<?php echo e(@$edit->name); ?>" placeholder="Type Here Category Name" id="">
                        <?php if($errors->has('name')): ?>
                        <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 col-lg-4 col-12">
                    <div class="form-gorup">
                        <?php if(@$edit): ?>
                        <label for="">Already have Image (30 x 30)<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="icon_image" id="">
                        <?php if($errors->has('icon_image')): ?>
                        <span class="text-danger"><?php echo e($errors->first('icon_image')); ?></span>
                        <?php endif; ?>
                        <p>
                            <img src="/images/<?php echo e($edit->icon_image); ?>" alt="">
                        </p>
                        <?php else: ?>
                        <label for="">Category Icon Image (30 x 30)<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="icon_image" id="">
                        <?php if($errors->has('icon_image')): ?>
                        <span class="text-danger"><?php echo e($errors->first('icon_image')); ?></span>
                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 col-lg-4 col-12">
                    <div class="form-gorup">
                        <?php if(@$edit): ?>
                        <label for="">Already have Image (832 x 300)<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="banner_image" id="">
                        <?php if($errors->has('banner_image')): ?>
                        <span class="text-danger"><?php echo e($errors->first('banner_image')); ?></span>
                        <?php endif; ?>
                        <p>
                            <img src="/images/<?php echo e($edit->banner_image); ?>" alt="">
                        </p>
                        <?php else: ?>
                        <label for="">Category Baner Image (832 x 300)<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="banner_image" id="">
                        <?php if($errors->has('banner_image')): ?>
                        <span class="text-danger"><?php echo e($errors->first('banner_image')); ?></span>
                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div><!-- name icon & banner image -->
            <div class="form-gorup">
                <label for="">Select Parent Category</label>
                <select name="parent_category" class="form-control" id="">
                    <option value="">--Select Parent Category --</option>
                    <option value="Dress">Dress</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Category Description</label>
                <textarea placeholder="Description" class="form-control" name="description" id="" cols="15" rows="5" ><?php echo e(@$edit->description); ?></textarea>
            </div>
            <div class="float-right">
                <input type="submit" class="btn btn-dark text-light" name="" value="Create New Category" id="">
            </div>

        </form>
    </section>
</div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kazi ecommerce\ecommerce\resources\views/admin/category/createOrUpdate.blade.php ENDPATH**/ ?>