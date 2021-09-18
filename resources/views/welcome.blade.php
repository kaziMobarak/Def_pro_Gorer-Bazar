@extends('layouts.user.app')
@section('user_content')
<section class="container">
    <!--slider and category show start-->
    <div class="row">
        <!--show category list start-->
        <div class="col-sm-12 col-md-3 col-lg-3 mt-3">
            <h3 class="cat">Categorie's</h3>
            <div class="bg-cat">
                @foreach ($categories as $item)
                <a href="{{ url('category/product/'.$item->id) }}">
                    <span> <img height="20px" width="20px" src="/images/{{$item->icon_image}}" alt="">{{$item->name}}</span>
                    <hr>
                </a>
                @endforeach
            </div>
        </div>
        <!--show category list end-->
        <!--start here slider-->
        <div class="col-sm-12 col-md-9 col-lg-9 mt-3">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block  w-100" src="{{asset('user/images/s1.jpg')}}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{asset('user/images/s2.jpg')}}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{asset('user/images/s3.jpg')}}" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!--end here slider-->
    </div>
    <!--slider and category show start-->
    <!--hot Deals and Offer product start-->
    <section class="my-4">


                <div class=" bg-light d-flex justify-content-between align-item-center">
                    <h4 class="mb-0 mt-2">OFFER PRODUCTS</h4>

                </div>
                <div class="row">
                    @foreach ($products as $item)
                    @if ($item->date_range_start)
                    <div class="col-sm-12 col-md-3 col-lg-3 my-2">
                        <div class=" hot-deals">
                            <div class="container">
                                <a href="{{url('/product/view/'.$item->id)}}">
                                    <img class="my-3" src="/product/thumbnail_img/images/{{$item->thumbnail_img}}" height="150px" width="100%" alt="">
                                    <p class="hot-deals">
                                        <strong style="color: #A9A9A9;">{{$item->name}}</strong> <br>
                                        <strong style="color: #A9A9A9;">
                                         <span style="color: #A9A9A9;">{{ $item->unit_price }}Tk</span>
                                        </strong>
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>


        <!--offer product end-->
        </div>
    </section>
    <!--hot Deals and Offer product End-->

    <!--banner start here-->
    <section class="my-3">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6">
                <img width="100%" height="200px" src="{{asset('user')}}/images/s1.jpg" alt="">
            </div>

            <div class="col-md-6 col-sm-6 col-lg-6">
                <img width="100%" height="200px" src="{{asset('user')}}/images/s2.jpg" alt="">
            </div>
        </div>
    </section>
    <!--bannaer end here-->

    <!--shop by brand start-->
    <section>
        <div class="hot-deals">
            <h4 class="">Shop By Brand</h4>
            <hr>
        </div>
        <div class="row">
            @foreach ($brands as $item)
            <div class="col-sm-12 col-md-2 col-lg-2 mb-2">
                <div class=" hot-deals">
                    <div class="">
                        <a href="{{url('brand/product/'.$item->id)}}">
                            <img class="" src="/images/brands/{{$item->logo}}" height="150px" width="100%" alt="">
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!--shop by brand end-->
    <!--product list start-->
    <section class="my-3">
        <div class="">
            <h4 class="hot-deals">Product List</h4>
        </div>
        <div class="row">
            @foreach ($products as $item)
            <div class=" col-sm-12 col-md-3 col-lg-3 my-2">
                <div class=" hot-deals">
                    <div class="container ">
                        <a href="{{url('/product/view/'.$item->id)}}">
                            <img class="my-3" src="/product/thumbnail_img/images/{{$item->thumbnail_img}}" height="150px" width="100%" alt="">
                            <p class="hot-deals">
                                <strong style="color: #A9A9A9;">{{$item->name}}</strong> <br>
                                <strong style="color: #A9A9A9;">
                                     <span style="color: #A9A9A9;">{{ $item->unit_price }}Tk</span>
                                </strong>
                            </p>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!--end of product list-->
</section>


@endsection
