@extends('layouts.admin.app')
@section('admin_content')

<table class="table text-center">
    <thead>
      <tr>
        <th scope="col">Indexing</th>
        <th scope="col">User Name</th>
        <th scope="col">User Phone</th>
        <th scope="col">User Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($checkouts as $checkout)
        <tr>
            <th scope="row">{{ $loop->index +1 }}</th>
            <td>{{ $checkout->name }}</td>
            <td>{{ $checkout->phone }}</td>
            <td>{{ $checkout->email }}</td>
            <td>
                @if ($checkout->status == 1)
                <a class="btn btn-info btn-sm" href="{{ url('admin/order/status',$checkout->id) }}">Successfully</a>
                @else
                <a class="btn btn-danger btn-sm" href="{{ url('admin/order/status',$checkout->id) }}">UnSuccessfully</a>
                @endif
                <a class="btn btn-success btn-sm" href="{{ url('admin/order/detail',$checkout->id) }}">View</a>
                <a class="btn btn-danger btn-sm" href="{{ url('admin/order/delete',$checkout->id) }}">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>

  @endsection
