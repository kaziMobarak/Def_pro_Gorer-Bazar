@extends('layouts.user.app')
@section('user_content')


<section class="my-3 container">
    <div class="">
        <h4 class="hot-deals">Brand Ways Product</h4>
    </div>
    <div class="row">
        @foreach ($products as $item)
        <div class=" col-sm-12 col-md-3 col-lg-3 my-2">
            <div class=" hot-deals">
                <div class="container ">
                    <a href="{{url('product/view/'.$item->id)}}">
                        <img class="my-3" src="/product/thumbnail_img/images/{{$item->thumbnail_img}}" height="150px" width="100%" alt="">
                        <p class="hot-deals">
                            <strong style="color: #A9A9A9;">{{$item->name}}</strong> <br>
                            <strong style="color: #A9A9A9;">
                                 <span style="color: #A9A9A9;">TK {{$item->unit_price}}</span>
                            </strong>
                        </p>
                    </a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</section>

@endsection
