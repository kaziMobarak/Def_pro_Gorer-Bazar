@extends('layouts.admin.app')
@section('admin_content')

<div class="card container">
    <div class="card-header">
        <h5 class="mb-0 h2">Product Variation</h5>
    </div>
        <div class="form-group ">
            <form action="{{ @$edit ? url('admin/variant/update/'.$edit->id) :  url('admin/variant/store') }}" method="POST">
                @csrf
            <div class="">
                <div class="">
                    <label for="">Select Product</label>
                    <select class="form-control" name="product_id" id="">
                        <option value="">--select product--</option>
                        @foreach ($products as $item)
                        <option value="{{ $item->id }}" {{ @$edit->product_id==$item->id ? 'Selected' :''}} >{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="">
                <div class="" id="wrapper_form">
                        <label for="">Product Variant add</label>
                            <div class="input-group mb-3" id="inputFormRow">
                                <select class="form-control" name="color_id" id="">
                                    <option value="">--Select Color--</option>
                                    @foreach ($colors as $item)
                                    <option value="{{ $item->id }}" {{@$edit->color_id == $item->id ? 'Selected' : ''}}>{{ $item->name }}</option>
                                    @endforeach
                                </select>

                                <select class="form-control" name="attribute_id" id="">
                                    <option value="">--Select Attributes--</option>
                                    @foreach ($attributes as $item)
                                    <option value="{{ $item->id }}" {{@$edit->attribute_id == $item->id ? 'Selected' : ''}}>{{ $item->name }}</option>
                                    @endforeach
                                </select>

                                <select class="form-control" name="attributevalue_id" id="attributevalue_id">
                                    <option value="">--Select Attributes Values--</option>
                                </select>



                                <input type="text" value="{{@$edit->price}}" name="price" class="form-control m-input" placeholder="Enter Price" autocomplete="off">

                            </div>


                        </div>
                </div><!--end add/remove-->

        <div>
            <p>Choose the attributes of this product and then input values of each attribute</p>
            <br>
        </div>

            <div class="text-center">
                <input class="btn btn-success" type="submit" name="btn" value="Create Product Variant Price" id="">
            </div>
            </form>
    </div>
</div>




@if (Session::has('danger'))
<div class="alert alert-danger">
    {{ Session::get('danger') }}
    @php
    Session::forget('danger');
    @endphp
    <p id="close" class=" float-right btn btn-sm btn-danger">X</p>
</div>

@elseif (Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
    @php
    Session::forget('success');
    @endphp
    <p id="close" class=" float-right btn btn-sm btn-success">X</p>
</div>

@endif




@if (Session::has('danger'))
<div class="alert alert-danger">
    {{ Session::get('danger') }}
    @php
        Session::forget('danger');
    @endphp
    <p id="close" class=" float-right btn btn-sm btn-danger">X</p>
</div>

@elseif (Session::has('success'))
<div class="alert alert-success">
{{ Session::get('success') }}
@php
    Session::forget('success');
@endphp
<p id="close" class=" float-right btn btn-sm btn-success">X</p>
</div>

@endif



<div class=" d-flex justify-content-between align-item-center">
    <h2 class="mb-0">ALL PRODUCT VARIANT LIST</h2>
</div>
<!-- Card header -->
<div class="card">
<!-- /.card-header -->
<div class="card-body">
<table id="example1" class="table table-bordered table-striped text-center">
<thead>
<tr>
  <th>index</th>
  <th>Product</th>
  <th>Color</th>
  <th>Attribute Values</th>
  <th>Price</th>
  <th>Action</th>
</tr>
</thead>
<tbody>
@foreach ($variatns as $item)

<tr>
  <td>{{$loop->index + 1}}</td>
  <td>{{$item->product_id ? $item->product->name : ''}}</td>
  <td> <p class="btn btn-sm btn-rounded" style="background-color: {{$item->color_id ? $item->color->color_code : '' }}" >a</p></td>
  <td>{{$item->attribute_value_id ? $item->attributeValue->name : '' }}</td>
  <td>{{$item->price}}</td>
  <td>
    <button type="button" class="btn btn-sm btn-rounded btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg{{$item->id}}"><i class="fas fa-eye"></i></button>
      <a class="btn btn-sm btn-rounded btn-success" href="{{url('admin/variant/edit/'.$item->id)}}"> <i class="fas fa-user-edit"></i></a>
      <a class="btn btn-sm btn-rounded btn-danger" href="{{ url('admin/variant/destroy/'.$item->id) }}"> <i class="fas fa-trash"></i></a>
  </td>
</tr>

@endforeach


</tbody>
<tfoot>
<tr>
    <th>index</th>
    <th>Product</th>
    <th>Color</th>
    <th>Attribute Values</th>
    <th>Price</th>
    <th>Action</th>
</tr>
</tfoot>
</table>





</div>
</div>










<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


    $('select[name="attribute_id"]').on('change', function(){
        var attribute_id = $(this).val();
        if(attribute_id){
            console.log(attribute_id)
            $.ajax({
                url: 'http://localhost:8000/admin/product/attribute_value/'+attribute_id,
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
</script>

@endsection


