<?php $__env->startSection('user_content'); ?>




<section class="">
    <style>
       input{
         border: 1px solid;
         border-radius: 20px;
         box-shadow: 3px 5px 5px 5px  #e4dfdf;
       }
       select{
         border: 1px solid;
         border-radius: 20px;
         box-shadow: 3px 5px 5px 5px  #e4dfdf;
       }
       textarea{
         border: 1px solid;
         border-radius: 20px;
         box-shadow: 3px 5px 5px 5px  #e4dfdf;
       }

       .desing{
           -moz-box-shadow:    inset 0 0 5px #000000;
          -webkit-box-shadow: inset 0 0 5px #000000;
          box-shadow:         inset 0 0 5px #000000;
       }

       </style>


       <section class="container my-3">
           <div class="row justify-content-center desing">
               <div class="col-md-7 my-4">
                   <div class="lead">
                    <p>
                        all payment number is : 01982387232
                    </p>
                   </div>
                   <h2 class="text-center">Checkout Form</h2>
                   <form action="<?php echo e(url('user/checkout/store')); ?>" method="POST" enctype="multipart/form-data">
                       <?php echo csrf_field(); ?>
                           <div class="form-group">
                               <label for="">Enter Your Name *</label>
                               <input type="text" placeholder="Enter Your Name" name="name" class="form-control"  id="" required>
                           </div>
                           <div class="form-group">
                               <label for="">Enter Your Email *</label>
                               <input type="email" name="email" class="form-control" placeholder="Enter Your Email" id="" required>
                           </div>
                           <div class="form-group">
                               <label for="">Enter Your Phone *</label>
                               <input type="number" name="phone" class="form-control" placeholder="Enter Your Phone" id="" required>
                           </div>

                           <div class="form-group">
                               <label for="">Select Your Payment</label>
                               <select class="form-control" name="payment_name" id="">
                                   <option value="disable">Select Your Payment Method</option>
                                   <option value="bkash"> Bkash </option>
                                   <option value="rocket"> Rocket </option>
                                   <option value="nogod"> Nogod </option>
                               </select>
                           </div>

                           <div class="form-group">
                               <label for="">Enter Your Payment Number *</label>
                               <input type="number" placeholder="Enter Your Number" name="payment_number" class="form-control" value="" id="" required>
                           </div>

                           <div class="form-group">
                               <label for="">Enter Your Payment Secrect Key*</label>
                               <input type="number" placeholder="Enter Your Secrect key" name="payment_secret" class="form-control" value="" id="" required>
                           </div>

                           <div class="form-group">
                               <label for="">Enter Your Location *</label>
                               <input type="text" placeholder="Enter Your Location" name="location" class="form-control" value="" id="" required>
                           </div>
                           <div class="form-group">
                               <label for="">Description *</label>
                               <textarea name="description" placeholder="Enter Your Description" class="form-control" id="" cols="10" rows="5"></textarea>
                           </div>
                           <div class="text-center my-3">
                               <input type="submit" class="btn btn-info text-light" name="btn" value="Create New book" id="">
                           </div>

                   </form>
               </div>
           </div>
       </section>

   </section>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce\ecommerce\resources\views/user/checkout/create.blade.php ENDPATH**/ ?>