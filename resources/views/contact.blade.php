@extends('layouts.user.app')
@section('user_content')

<div class=" container my-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="bg-light">
                <h3>Contact Us</h3>
            </div>
            <div class="card">
                <div class="card-header"><img src="{{asset('user/images/logo.jpg')}}" height="200px" width="100%" alt=""></div>

                <div class="card-body">
                    <form action="{{ url('contact/store') }}" method="POST" class="form-group my-5">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="">Enter Your Name</label>
                                    <input type="text" placeholder="enter your name" class="form-control" name="name" id="">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="">Enter Your Email</label>
                                    <input type="email" placeholder="enter your email" class="form-control" name="email" id="">
                                </div>

                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="">Enter Your Phone </label>
                                    <input type="number" class="form-control" placeholder="enter your phone" name="phone" id="">
                                </div>
                            </div>
                        </div>



                        <div class="my-2">
                            <div class="form-group">
                                <label for="">Product Descriptions </label>
                                <textarea class="form-control" placeholder="enter your description" name="note" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="text-center">
                            <input type="submit" name="" class="btn btn-info" value="Send Message" id="">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
