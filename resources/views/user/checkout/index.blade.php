@extends('layouts.user.app')
@section('user_content')


<div class="text-center mt-2">
    <h4>All Cart Item</h4>
</div>
<div class="scrapcar-main-section">
    <div class="container">
<table class="table container" >
<thead>
  <tr>
    <th scope="col">#Sl</th>
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
    @foreach ($carts as $cart)
        <tr>
            <th scope="row">{{$loop->index +1}}</th>
            <td>{{$cart->product->name}}</td>
            <td>{{$cart->product->unit_price}} Tk</td>
            <?php
            $total_amount +=$cart->product->unit_price*$cart->quantity;
            ?>
            <td>
                <img height="80px" width="80px" src="/product/thumbnail_img/images/{{$cart->product->thumbnail_img}}" alt="">
            </td>
            <td>
                <form action="{{url('user/porduct-quantiy/'.$cart->id)}}" method="POST">
                @csrf
                <input type="text" name="quantity" id="" value="{{$cart->quantity}}">
                <input style="" type="submit" name="btn" value="Update" id="">
                </form>
            </td>
            <td><a class="btn btn-danger" style="" href="{{url('user/cart/delete/'.$cart->id)}}">Delete</a> </td>
        </tr>
    @endforeach

</tbody>
</table>
<div class="float-right">
    <p style="color:white;" class="btn btn-success text-light"><strong>Total Amount</strong>: {{$total_amount}}Tk</p>
    <p class="btn btn-info "><strong><a class="text-light" href="{{url('user/checkout/create')}}">Checkout</a> </strong></p>
</div><br>
<br><br><br>
</div>
</div>


@endsection
