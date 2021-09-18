@extends('layouts.admin.app')
@section('admin_content')
<section class="container">
    <div class="">
        <h3> Pre-Order List</h3>

    </div>

    <div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Index</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Note</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($preOrders as $item)
                <tr>
                    <th scope="row">{{ $loop->index +1 }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->email}}</td>
                    <td>{{ $item->note }}</td>
                  </tr>
                @endforeach


            </tbody>
          </table>
    </div>
</section>
@endsection
