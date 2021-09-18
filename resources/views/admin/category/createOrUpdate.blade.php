@extends('layouts.admin.app')
@section('admin_content')



    <div class=" d-flex justify-content-between align-item-center">
        <h2 class="mb-0">@if(isset($edit)) CATEGORY UPDATE FORM  @else CREATE NEW CATEGORY @endif</h2>
        <a class="text-light btn btn-icon btn-primary" href="{{ route('admin.category.index') }}">
            <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
            <span class="btn-inner--text">ALL CATEGORY LIST</span>
        </a>
    </div>
    <!-- Card header -->
    <div class="card">
    <section class="container my-2 card-body">
        <form action="{{ isset($edit) ? url('admin/category/update/'.$edit->id) : url('admin/category/store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4 col-sm-12 col-lg-4 col-12">
                    <div class="form-gorup">
                        <label for="">Category Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" value="{{ @$edit->name }}" placeholder="Type Here Category Name" id="">
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 col-lg-4 col-12">
                    <div class="form-gorup">
                        @if (@$edit)
                        <label for="">Already have Image (30 x 30)<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="icon_image" id="">
                        @if ($errors->has('icon_image'))
                        <span class="text-danger">{{ $errors->first('icon_image') }}</span>
                        @endif
                        <p>
                            <img src="/images/{{$edit->icon_image}}" alt="">
                        </p>
                        @else
                        <label for="">Category Icon Image (30 x 30)<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="icon_image" id="">
                        @if ($errors->has('icon_image'))
                        <span class="text-danger">{{ $errors->first('icon_image') }}</span>
                        @endif
                        @endif
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 col-lg-4 col-12">
                    <div class="form-gorup">
                        @if (@$edit)
                        <label for="">Already have Image (832 x 300)<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="banner_image" id="">
                        @if ($errors->has('banner_image'))
                        <span class="text-danger">{{ $errors->first('banner_image') }}</span>
                        @endif
                        <p>
                            <img src="/images/{{$edit->banner_image}}" alt="">
                        </p>
                        @else
                        <label for="">Category Baner Image (832 x 300)<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="banner_image" id="">
                        @if ($errors->has('banner_image'))
                        <span class="text-danger">{{ $errors->first('banner_image') }}</span>
                        @endif
                        @endif
                    </div>
                </div>
            </div><!-- name icon & banner image -->
            <div class="form-gorup">
                <label for="">Select Parent Category</label>
                <select name="parent_category" class="form-control" id="">
                    <option value="">--Select Parent Category --</option>
                    <option value="Dress">Dress</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Category Description</label>
                <textarea placeholder="Description" class="form-control" name="description" id="" cols="15" rows="5" >{{@$edit->description}}</textarea>
            </div>
            <div class="float-right">
                <input type="submit" class="btn btn-dark text-light" name="" value="Create New Category" id="">
            </div>

        </form>
    </section>
</div>
    @endsection
