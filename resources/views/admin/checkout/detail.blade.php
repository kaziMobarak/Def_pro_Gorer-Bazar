@extends('layouts.admin.app')
@section('admin_content')

<section class="container">
    <div class="row">
        <div class="col-md-4">
            <h4>User Info</h4>
            <hr>
            <p>
                <strong>Name:</strong>{{$checkout->name}} <br>
                <strong>Phone:</strong>{{$checkout->phone}} <br>
                <strong>Email:</strong>{{$checkout->email}} <br>
                <strong>Location:</strong>{{$checkout->location}} <br>
            </p>
        </div>
        <div class="col-md-4">
            <h4>Payment History</h4>
        <hr>
                <strong>Payment Type:</strong>{{$checkout->payment_name}} <br>
                <strong>Payment Number:</strong>{{$checkout->payment_number}} <br>
                <strong>Payment Secrect</strong>{{$checkout->payment_secret}} <br>
        </div>
        <div class="col-md-4">

            <h4>Details</h4>
            <hr>
            <strong>Comment:</strong>{{$checkout->description}} <br>
        </div>
    </div>
</section>



<section class="my-5">
    <h3 class="text-center">Product Details</h3>
<hr>
<div class="scrapcar-main-section">
    <div class="container">
<table class="table container" >
<thead>
  <tr>
    <th scope="col">Sl</th>
    <th scope="col">Product Name</th>
    <th scope="col">Product Price</th>
    <th scope="col">Product Image</th>
    <th scope="col">Quantity</th>
    <th scope="col">Action</th>
  </tr>
</thead>
<tbody>
    @php
        $total_amount = 0;
    @endphp
    @foreach (App\Models\Cart::where('order_id',$checkout->id)->get() as $cart)
        <tr>
            <th scope="row">{{$loop->index + 1}}</th>
            <td>{{$cart->product->name}}</td>
            <td>{{$cart->product->unit_price*$cart->quantity}}</td>
            <?php
            $total_amount +=$cart->product->unit_price*$cart->quantity;
            ?>
            <td>
                <img height="80px" width="80px" src="{{asset($cart->product->image)}}" alt="">
            </td>
            <td>
                <form action="{{url('admin/order/porduct-quantiy',$cart->id)}}" method="POST">
                @csrf
                <input type="text" class="form-control" name="quantity" id="" value="{{$cart->quantity}}">
                <input style="" class="btn btn-sm btn-success" type="submit" name="btn" value="Update" id="">
                </form>
            </td>
            <td>
                <a class="btn btn-sm btn-info" style="" href="{{ url('admin/product/view',$cart->product->id) }}">View</a>
                <a class="btn btn-sm btn-danger" style="" href="{{url('admin/order/cart-delete',$cart->id)}}">Delete</a>
            </td>
        </tr>
    @endforeach

</tbody>
</table>
<div class="float-right form-inline">
    <p class="btn btn-success"><strong>Total Amount</strong>: {{$total_amount}}</p>
    <p >
        <strong>
            @if ($checkout->status==0)
            <a class="btn btn-danger text-light"  href="{{url('admin/order/status',$checkout->id)}}">UnSuccess</a>
            @else
            <a class="btn btn-info text-light"  href="{{url('admin/order/orders')}}">Back</a>
            @endif
        </strong>
    </p>
</div><br>

</div>
</div>

</section>

@endsection
