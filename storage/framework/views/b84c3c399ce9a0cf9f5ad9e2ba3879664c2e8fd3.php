<?php $__env->startSection('admin_content'); ?>

<?php $__env->startSection('frontend'); ?>
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="<?php echo e(asset('admin')); ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<?php $__env->stopSection(); ?>

<div class="container">
    <div class="px-15px px-lg-25px">
        <div class="aiz-titlebar text-left mt-2 mb-3">
            <h5 class="mb-0 h6">Add New product</h5>
        </div>
        <div class="">
            <form class="form form-horizontal mar-top" action="<?php echo e(url('admin/product/store')); ?>" method="POST"
                enctype="multipart/form-data" id="choice_form">
                <?php echo csrf_field(); ?>
                <div class="row gutters-5">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6">Product Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">Product Name <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name" placeholder="Product Name"
                                            required>
                                        <?php if($errors->has('name')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row" id="category">
                                    <label class="col-md-3 col-from-label">Category <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <select class="form-control aiz-selectpicker" name="category_id"
                                            id="category_id" data-live-search="true" required>
                                            <option value="">--Select Category--</option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('category_id')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('category_id')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row" id="brand">
                                    <label class="col-md-3 col-from-label">Brand</label>
                                    <div class="col-md-8">
                                        <select class="form-control aiz-selectpicker" name="brand_id" id="brand_id"
                                            data-live-search="true">
                                            <option value="">--Select Brand--</option>
                                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                        <?php if($errors->has('brand_id')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('brand_id')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">Unit</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="unit"
                                            placeholder="Unit (e.g. KG, Pc etc)" required>
                                        <?php if($errors->has('unit')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('unit')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">Minimum Purchase Qty <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="number" lang="en" class="form-control" name="min_qty" value="1"
                                            min="1" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">Refundable</label>
                                    <div class="col-md-8">
                                        <label class="aiz-switch aiz-switch-success mb-0">
                                            YES<input type="checkbox" value="Refundable" name="refundable" checked>
                                            NO<input type="checkbox" value="No-Refundable" name="refundable" id="">
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6">Product Images</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="signinSrEmail">Gallery Images
                                        <small>(600x600)</small></label>
                                    <div class="col-md-8">
                                        <div class="input-group" data-toggle="aizuploader" data-type="image"
                                            data-multiple="true">
                                            <div class="input-group-prepend">
                                                <input type="file" name="photes[]" multiple class="selected-files">
                                            </div>
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                        <small class="text-muted">These images are visible in product details page
                                            gallery. Use 600x600 sizes images.</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="signinSrEmail">Thumbnail Image
                                        <small>(300x300)</small></label>
                                    <div class="col-md-8">
                                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                                            <div class="input-group-prepend">
                                            </div>
                                            <input type="file" name="thumbnail_img" class="selected-files">
                                        </div>
                                        <div class="file-preview box sm">
                                        </div>
                                        <small class="text-muted">This image is visible in all product box. Use 300x300
                                            sizes image. Keep some blank space around main object of your image as we
                                            had to crop some edge in different devices to make it responsive.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6">Product Videos</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">Video Provider</label>
                                    <div class="col-md-8">
                                        <select class="form-control aiz-selectpicker" name="video_provider"
                                            id="video_provider">
                                            <option value="">--Select Video Provider--</option>
                                            <option value="youtube">Youtube</option>
                                            <option value="dailymotion">Dailymotion</option>
                                            <option value="vimeo">Vimeo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">Video Link</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="video_link"
                                            placeholder="Video Link">
                                        <small class="text-muted">Use proper link without extra parameter. Don&#039;t
                                            use short share link/embeded iframe code.</small>
                                    </div>
                                </div>
                            </div>
                        </div>


                        
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6">Product price + stock</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">Unit price <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="number" lang="en" min="0" value="0" step="0.01"
                                            placeholder="Unit price" name="unit_price" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 control-label" for="start_date_start">Discount Date Range
                                        Start</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="date_range_start"
                                            placeholder="Select Date" data-time-picker="true"
                                            data-format="DD-MM-Y HH:mm:ss" data-separator=" to " autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 control-label" for="start_date_end">Discount Date Range
                                        End</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="date_range_end"
                                            placeholder="Select Date" data-time-picker="true"
                                            data-format="DD-MM-Y HH:mm:ss" data-separator=" to " autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-from-label">Discount <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="number" lang="en" min="0" value="0" step="0.01"
                                            placeholder="Discount" name="discount" class="form-control" required>
                                    </div>
                                    <div class="col-md-3">
                                        <p>Product Discount % Type</p>
                                    </div>
                                </div>
                                <div id="show-hide-div">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">Quantity <span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="number" lang="en" min="0" value="0" step="1"
                                                placeholder="Quantity" name="quantity" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">
                                            SKU
                                        </label>
                                        <div class="col-md-6">
                                            <input type="text" placeholder="SKU" name="sku" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="sku_combination" id="sku_combination">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">

                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6">
                                    Shipping Configuration
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-6 col-from-label">Free Shipping</label>
                                    <div class="col-md-6">
                                        <label class="aiz-switch aiz-switch-success mb-0">
                                            YES: <input type="checkbox" name="shipping_type" value="Free" checked>
                                            NO: <input type="checkbox" name="shipping_type" value="No Free" id="no">
                                            <span></span>
                                        </label>

                                        <br>
                                        <div id="shipping_charge" style="display: none">
                                            <label for="name">
                                                Shipping Charges
                                            </label>
                                            <div class="">
                                                <input type="number" class="form-control" name="shipping_charge" min="1"
                                                    step="1" placeholder="Shipping Charges">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6">Low Stock Quantity Warning</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="name">
                                        Quantity
                                    </label>
                                    <input type="number" name="low_stock_quantity" value="1" min="0" step="1"
                                        class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6">
                                    Stock Visibility State
                                </h5>
                            </div>

                            <div class="card-body">

                                <div class="form-group row">
                                    <label class="col-md-6 col-from-label">Show Stock Quantity</label>
                                    <div class="col-md-6">
                                        <label class="aiz-switch aiz-switch-success mb-0">
                                            <input type="radio" name="stock_visibility_state" value="show" checked>
                                            <span></span>
                                        </label>
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label class="col-md-6 col-from-label">Hide Stock</label>
                                    <div class="col-md-6">
                                        <label class="aiz-switch aiz-switch-success mb-0">
                                            <input type="radio" name="stock_visibility_state" value="hide">
                                            <span></span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6">Cash on Delivery</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-6 col-from-label">Status</label>
                                    <div class="col-md-6">
                                        <label class="aiz-switch aiz-switch-success mb-0">
                                            YES:<input type="checkbox" name="cash_on_delivery" value="1" checked>
                                            NO:<input type="checkbox" name="cash_on_delivery" value="0">
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6">Product Publist</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-6 col-from-label">Status</label>
                                    <div class="col-md-6">
                                        <label class="aiz-switch aiz-switch-success mb-0">
                                            YES: <input type="checkbox" name="status" value="1" checked>
                                            NO: <input type="checkbox" name="status" value="0" id="">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6">Estimate Shipping Time</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="name">
                                        Shipping Days
                                    </label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="est_shipping_days" min="1"
                                            step="1" placeholder="Shipping Days">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend">days</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 h6">Vat &amp; TAX</h5>
                            </div>
                            <div class="card-body">


                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="number" lang="en" min="0" value="0" step="0.01" placeholder="Tax"
                                            name="tex" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <p>Vat % Type</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>





                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Product Description</h5>
                    </div>
                    <div class="card-body">

                        <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                Bootstrap WYSIHTML5
                                <small>Simple and fast</small>
                            </h3>
                            <!-- tools box -->
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm" data-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-tool btn-sm" data-widget="remove"
                                    data-toggle="tooltip" title="Remove">
                                    <i class="fa fa-times"></i></button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pad">
                            <div class="mb-3">
                                <textarea class="textarea" name="description" placeholder="Place some text here"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                            <p class="text-sm mb-0">
                                Editor <a href="https://github.com/bootstrap-wysiwyg/bootstrap3-wysiwyg">Documentation
                                    and license
                                    information.</a>
                            </p>
                        </div>
                    </div>
                </div>
        </div>





        <div class="col-12">
            <div class="btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group" role="group" aria-label="Second group">
                    <button type="submit" name="button" value="publish" class="btn btn-success">Save &amp;
                        Publish</button>
                </div>
            </div>
        </div><br><br>
        </form>
    </div>

</div>

</div><!-- .aiz-main-content -->
<?php $__env->startSection('js'); ?>
<!-- CK Editor -->
<script src="<?php echo e(asset('admin')); ?>/plugins/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo e(asset('admin')); ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<?php $__env->stopSection(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


    $('select[name="attribute_id[]"]').on('change', function(){
        var attribute_id = $(this).val();
        if(attribute_id){
            $.ajax({
                url: 'attribute_value/'+attribute_id,
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






   $(document).ready(function(){
    $("#no").click(function(){
        $("#shipping_charge").toggle();
    });
    });




        var i = 0;

        $("#add").click(function(){
            ++i;

            $("#wrapper_form").append('<div class="input-group mb-3" id="inputFormRow"> <select name="addmore['+i+'] [color_id]" class="form-control "><option value="">Select Color</option>  <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </select> <select name="addmore['+i+'] [attribute_id]" class="form-control "><option value="">Select Attributes</option>  <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   </select> <select class="form-control" name="addmore['+i+'] [attributevalue_id]" id="attributevalue_id"> <option value="">--Select Attributes Values--</option></select> <input type="text" name="addmore['+i+'] [price]" class="form-control m-input" placeholder="Enter Price" autocomplete="off">   <div class="input-group-append"><button id="removeRow" type="button" class="btn btn-danger">Remove</button></div> </div>');
                 $('select[name="addmore['+i+'] [attribute_id]"]').on('change', function(){
                    var attribute_id = $(this).val();
                    if(attribute_id){

                        $.ajax({

                            url: 'attribute_value/'+attribute_id,
                            type: 'GET',
                            dataType: "json",
                            success:function(data){

                                data.forEach(item => {
                                    console.log(item)
                                    $('select[name="addmore['+i+'] [attributevalue_id]"]').append('<option value='+ item.id +'>'+ item.name +'</option>')
                                });
                            }
                        })
                    }
                });




                $(document).on('click', '#removeRow', function () {
                $(this).closest('#inputFormRow').remove();
    });
        });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });


    $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    ClassicEditor
      .create(document.querySelector('#editor1'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error)
      })

    // bootstrap WYSIHTML5 - text editor

    $('.textarea').wysihtml5({
      toolbar: { fa: true }
    })
  })

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kazi ecommerce\ecommerce\resources\views/admin/product/createOrUpdate.blade.php ENDPATH**/ ?>