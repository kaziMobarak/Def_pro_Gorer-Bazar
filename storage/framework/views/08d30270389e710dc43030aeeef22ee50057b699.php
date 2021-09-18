<?php $__env->startSection('user_content'); ?>


<section class="card">
    <div class="row">
        <div class="col-md-5">

        </div>

        <div class="col-md-7">
            <div class="">
                <div class="">

                    <h3><?php echo e($item->name); ?> </h3>
                </div>
                
                <div>
                    <h4>Price : <?php echo e($item->unit_price); ?>$</h4>
                </div>
                <div class="price my-3" id="price">

                </div>
                

                <div class="">
                    <span class="h5">Category:</span> <?php echo e($item->category_id ? $item->category->name : ''); ?>

                </div>
                
                <style>
                    /* The container */
                    .container {
                        display: block;
                        position: relative;
                        padding-left: 35px;
                        margin-bottom: 12px;
                        cursor: pointer;
                        font-size: 22px;
                        -webkit-user-select: none;
                        -moz-user-select: none;
                        -ms-user-select: none;
                        user-select: none;
                    }

                    /* Hide the browser's default checkbox */
                    .container .color {
                        position: absolute;
                        opacity: 0;
                        cursor: pointer;
                        height: 0;
                        width: 0;
                    }

                    /* Create a custom checkbox */
                    .checkmark {
                        position: absolute;
                        top: 0;
                        left: 0;
                        height: 25px;
                        width: 25px;
                        background-color: #eee;
                    }

                    /* On mouse-over, add a grey background color */
                    .container:hover .color~.checkmark {
                        background-color: #ccc;
                    }

                    /* When the checkbox is checked, add a blue background */
                    /* .container .color:checked ~ .checkmark {
                      background-color: #2196F3;
                    } */

                    /* Create the checkmark/indicator (hidden when not checked) */
                    .checkmark:after {
                        content: "";
                        position: absolute;
                        display: none;
                    }

                    /* Show the checkmark when checked */
                    .container .color:checked~.checkmark:after {
                        display: block;
                    }

                    /* Style the checkmark/indicator */
                    .container .checkmark:after {
                        left: 9px;
                        top: 5px;
                        width: 5px;
                        height: 10px;
                        border: solid rgb(255, 25, 25);
                        border-width: 0 3px 3px 0;
                        -webkit-transform: rotate(45deg);
                        -ms-transform: rotate(45deg);
                        transform: rotate(45deg);
                    }



                    .li-wrapper {
                        float: left;
                        display: inline;
                    }

                </style>
                

                <div id="color_section ">
                    <?php $__currentLoopData = $attribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($attr->color_id): ?>
                    <ul class="ul-wrapper">
                        <li class="li-wrapper">
                            <label class="container">
                                <input class="select_value color" id="color" type="checkbox" name="color" value="<?php echo e($attr->id); ?>">
                                <span style="background-color:<?php echo e($attr->color_id ? $attr->color->color_code : ''); ?>" class="checkmark"></span>
                            </label>
                        </li>
                    </ul>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>


                
                <br>
                <div class="attr_section ">
                    <?php $__currentLoopData = $attribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($attr->attribute_value_id): ?>
                    <ul class="ul-wrapper">
                        <li class="li-wrapper">
                            <label class="container">
                                <input class="color" id="attr" type="checkbox" name="attr" value="<?php echo e($attr->id); ?>">
                                <span class="checkmark text-center"><?php echo e($attr->attribute_value_id ? $attr->attributeValue->name : ''); ?></span>

                            </label>
                        </li>
                    </ul>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                
                <br>
                <div class="my-3">
                    <p class="form-inline">
                        <span>Quantity : &nbsp;</span><input type="number" minlength="1" value="<?php echo e($item->min_qty); ?>" placeholder="qty" style="width: 80px" class="form-control">
                    </p>
                </div>
                

                <div class="my-3">
                    <p class="form-inline">

                        <a href="<?php echo e(url('user/add-to-cart/'.$item->id)); ?>" class="btn btn-info btn-outline-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>


                    </p>
                </div>
                


            </div>
        </div>
    </div>


    
    <section class="my-3 m-3">

        <h3>Product Description</h3>

        <p>
            <?php echo $item->description; ?>

        </p>

    </section>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });




    $(document).ready(function() {
        $("input[type='checkbox']").on('change', function() {
            var id = $(this).val();
            console.log(id)
            if (id) {
                $.ajax({
                    url: 'http://localhost:8000/admin/price-variant/' + id
                    , dataType: "Json"
                    , type: 'GET'
                    , success: function(data) {
                        $("#price").empty();
                        $("#price").append('<h4>Variant Price: ' + data + '$</h4>');

                    }

                })
            }
        });
    });



    $("#attr").click(function() {
        var id = $(this).val();
        console.log(id)
        if (id) {
            $.ajax({
                url: 'http://localhost:8000/admin/price-variant/' + id
                , type: 'GET'
                , dataType: 'Json'
                , success: function(data) {
                    $("#price").empty();
                    $("#price").append('<h4> ' + data + ' </h4>');

                }

            })
        }
    })

    $('.select_value').on('change', function() {
        $('.select_value').not(this).prop('checked', false);





    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kazi ecommerce\ecommerce\resources\views/user/product/detail.blade.php ENDPATH**/ ?>