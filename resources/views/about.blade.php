@extends('layouts.user.app')
@section('user_content')

<section class="whole-wrapper">
    <section class="container">
        <div class="mb-3 my-3">
            <h3>About-us</h3>
            <hr>
        </div>
        <!--product details start here-->
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <p class="lead">
                    When people are searching for a product to buy, they want to know all the details about it before making their purchase.

                    Shopping online can have it's drawbacks because one cannot physically see or touch the items they are looking at. Because of this, it's important to have professional quality images of your products and when applicable images from multiple angles, views, and even context.

                    It is also important to thoroughly describe the items in detail. Cover all aspects, including size, texture, uses, benefits, colors available, etc. You want your potential customer to feel confident that they know enough about your product to purchase it, instead of going elsewhere..
                </p>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4">
                <img height="300px" width="100%" src="{{asset('user')}}/images/logo.jpg" alt="">
            </div>
        </div>

        <!--product details end here-->





    </section>
</section>
@endsection
