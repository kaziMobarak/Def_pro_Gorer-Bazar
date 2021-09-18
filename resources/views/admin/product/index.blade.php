@extends('layouts.admin.app')
@section('admin_content')

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
            <h2 class="mb-0">ALL PRODUCT LIST</h2>
            <a class="text-light btn btn-icon btn-primary" href="{{route('admin.product.create')}}">
                <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                <span class="btn-inner--text">CREATE NEW PRODUCT</span>
              </a>
        </div>
      <!-- Card header -->
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped text-center">
        <thead>
        <tr>
          <th>index</th>
          <th>Name</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $item)
        <tr>
          <td>{{$loop->index + 1}}</td>
          <td>{{$item->name}}</td>
          <td>
              
              <a class="btn btn-sm btn-rounded btn-primary" href="{{ url('admin/product/view/'.$item->id) }}"><i class="fas fa-eye"></i></a>
              <a class="btn btn-sm btn-rounded btn-success" href="{{url('admin/product/edit/'.$item->id)}}"> <i class="fas fa-user-edit"></i></a>
              <a class="btn btn-sm btn-rounded btn-danger" href="{{ url('admin/product/destroy/'.$item->id) }}"> <i class="fas fa-trash"></i></a>
          </td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
          <th>index</th>
          <th>Name</th>
          <th>Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
</div>

@section('js')
<!-- DataTables -->
<script src="{{ asset('admin') }}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables/dataTables.bootstrap4.js"></script>


<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>
@endsection

         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
            <script>
                $('#close').click(function() {
                    $('.alert').hide(2000);
                })
            </script>

@endsection
