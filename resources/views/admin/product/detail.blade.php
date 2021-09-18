@extends('layouts.admin.app')
@section('admin_content')


<section class="card">
    <div class="row">
        <div class="col-md-5">
        <img class="my-3" src="/product/thumbnail_img/images/{{$item->thumbnail_img}}" height="150px" width="100%" alt="">
        </div>

        <div class="col-md-7">
            <div class="">
                <div class="">
             
                    <h3>{{$item->name}} </h3>
                </div>
                {{-- name --}}
                <div>
                    <h4>Price : {{ $item->unit_price }}$</h4>
                </div>
                <div class="price my-3" id="price">

                </div>
                {{-- priice --}}

                <div class="">
                    <span class="h5">Category:</span> {{ $item->category_id ? $item->category->name : '' }}
                </div>
                {{-- category valus --}}
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
                    .container input {
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
                    .container:hover input~.checkmark {
                        background-color: #ccc;
                    }

                    /* When the checkbox is checked, add a blue background */
                    /* .container input:checked ~ .checkmark {
                      background-color: #2196F3;
                    } */

                    /* Create the checkmark/indicator (hidden when not checked) */
                    .checkmark:after {
                        content: "";
                        position: absolute;
                        display: none;
                    }

                    /* Show the checkmark when checked */
                    .container input:checked~.checkmark:after {
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
                {{-- css using checkbox desing --}}

                <div id="color_section ">
                    @foreach ($attribute as $attr)
                    @if($attr->color_id)
                    <ul class="ul-wrapper">
                        <li class="li-wrapper">
                            <label class="container">
                                <input class="select_value" id="color" type="checkbox" name="color"  value="{{$attr->id}}">
                                <span style="background-color:{{$attr->color_id ? $attr->color->color_code : '' }}"
                                    class="checkmark"></span>
                            </label>
                        </li>
                    </ul>
                    @endif
                    @endforeach
                </div>


                {{-- color --}}
                <br>
                <div class="attr_section ">
                    @foreach ($attribute as $attr)
                    @if($attr->attribute_value_id)
                    <ul class="ul-wrapper">
                        <li class="li-wrapper">
                            <label class="container">
                                <input  id="select_value_attr" type="checkbox" name="attr" value="{{$attr->id}}">
                                <span class="checkmark text-center">{{$attr->attribute_value_id ? $attr->attributeValue->name : '' }}</span>

                            </label>
                        </li>
                    </ul>
                    @endif
                    @endforeach
                </div>
                {{-- attribute --}}
                <br>
                <div class="my-3">
                    <p class="form-inline">
                    <span>Quantity : &nbsp;</span><input type="number" minlength="1" value="{{$item->min_qty}}" placeholder="qty" style="width: 80px" class="form-control">
                    </p>
                </div>
                {{-- quantity --}}

                <div class="my-3">
                    <p class="form-inline">
                    <input type="submt" placeholder="qty" value="ADD TO CARD" class="btn btn-info btn-outline-primary">
                    </p>
                </div>
                {{--add to card--}}


            </div>
        </div>
    </div>


    {{-- description page --}}
    <section class="my-3 m-3">

            <h3>Product Description</h3>

        <p>
            {!!$item->description!!}
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


        $("#color_section").html('hi')


        // ("input[type='checkbox']").click( function() {
        //     console.log('hi')
        //     var id = $(this).val();
        //     console.log(id)
        //     if(id){
        //     $.ajax({
        //         url: 'http://localhost:8000/admin/price-variant/' + id,
        //         dataType: "Json",
        //         type: 'GET',
        //         success:function(data){
        //             $("#price").empty();
        //             $("#price").append('<h4> '+ data +' </h4>');

        //         }

        //     })
        // }
        // });
        $(document).ready(function(){
        $("input[type='checkbox']").on('change', function(){
            var id = $(this).val();
            console.log(id)
            if(id){
            $.ajax({
                url: 'http://localhost:8000/admin/price-variant/' + id,
                dataType: "Json",
                type: 'GET',
                success:function(data){
                    $("#price").empty();
                    $("#price").append('<h4>Variant Price: '+ data +'$</h4>');

                }

            })
        }
        });
    });



        $("#attr").click(function(){
            var id = $(this).val();
            console.log(id)
            if(id){
            $.ajax({
                url: 'http://localhost:8000/admin/price-variant/' + id,
                dataType: "Json",
                type: 'GET',
                success:function(data){
                    $("#price").empty();
                    $("#price").append('<h4> '+ data +' </h4>');

                }

            })
        }
        })

        $('.select_value').on('change', function() {
        $('.select_value').not(this).prop('checked', false);





    });

</script>
@endsection
