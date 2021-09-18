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


<section class=" container">

    <div class="row">
        <div class="col-sm-12 col-12 col-sm-4 col-lg-4">
            <div class="card container">
                <div class="cart-title">
                    <h3>Create New Attribute Value</h3>
                </div>

                <form action=" {{ isset($edit) ?  url('admin/attributeValue/update/'.$edit->id) : url('admin/attributeValue/store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Select Attributes</label>
                        <select name="attribute_id" class="form-control" id="">
                            <option value="">--Select Attributes--</option>
                            @foreach ($attributes as $item)
                            <option value="{{ $item->id }}" {{ @$edit->attribute_id == $item->id ? 'Selected' : ''}}> {{ $item->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Attribute Value Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="type here attributeValue name" name="name" value="{{@$edit->name}}" id="">
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="text-center form-group my-3">
                        <input type="submit" class="btn btn-dark text-light" name="" value="Create New attributeValue" id="">
                    </div>
                </form>
            </div>
        </div>
        <!--attributeValue form -->

        <div class="col-sm-12 col-12 col-sm-8 col-lg-8">
            <div class="card">
                <div class="card-title">
                    <h3 class="container">List Of attribute Values</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>index</th>
                                <th>Attribute Name</th>
                                <th>Attribute Value Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attributeValues as $item)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$item->attribute->name}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    <a class="btn btn-sm btn-rounded btn-success" href="{{url('admin/attributeValue/edit/'.$item->id)}}"> <i class="fas fa-user-edit"></i></a>
                                    <a class="btn btn-sm btn-rounded btn-danger" href="{{ url('admin/attributeValue/destroy/'.$item->id) }}"> <i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>index</th>
                                <th>Attribute Name</th>
                                <th>Attribute Value Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>





                </div>
            </div>
        </div>
        <!--attributeValue list show -->
    </div>

</section>





{{-- @section('js')
<!-- DataTables -->
<script src="{{ asset('admin') }}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables/dataTables.bootstrap4.js"></script> --}}


{{-- <script>
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
</script> --}}
{{-- @endsection --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
<script>
    $('#close').click(function() {
        $('.alert').hide(2000);
    })

</script>

@endsection
