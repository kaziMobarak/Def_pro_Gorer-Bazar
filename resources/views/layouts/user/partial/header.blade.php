<section class="bg-color">
    <div class="container">
        <!--first navbar start here-->
        <section>
            <nav class="first-navbar navbar navbar-expand-lg text-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="text-color collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto mt-2">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('user/pre-order/index') }}"> <span><i class="fas fa-shopping-cart"></i> </span>Pre-order</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span><i class="fas fa-user-circle"></i></span> My Account
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if (Auth::check())
                                <a class="dropdown-item text-dark" href="{{ url('user/cart/all') }}">Cart</a>
                                <a class="dropdown-item text-dark" href="{{ url('user/checkout/list') }}">Checkout</a>
                                <a class="dropdown-item text-dark" href="{{ url('logout') }}">Logout</a>
                                @else
                                <a class="dropdown-item text-dark" href="{{ route('login')}}">Login</a>
                                <a class="dropdown-item text-dark" href="{{ route('register')}}">Register</a>
                                @endif

                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('user/cart/all') }}"> <span><i class="fas fa-shopping-cart"></i></span> My Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('user/checkout/list') }}"> <span><i class="fas fa-credit-card"></i></span> Chcekout</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </section>
        <!--first navbar end here-->
        <!--2nd navbar start here-->
        <nav class="secound-navbar navbar navbar-expand-lg mt-2">
            <a class="h4" style="color: rgb(233, 200, 16);" href="{{url('/')}}">Ghorer Bazar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="form-size form-inline my-2 my-lg-0" method="POST" action="{{ url('search') }}">
                  @csrf
                    <input class=" mr-sm-2" type="search" placeholder="Search" name="search_key" aria-label="Search">
                </form>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="btn-color nav-link btn btn-sm" href="{{ url('user/cart/all') }}"> <span><i class="fas fa-shopping-cart"></i></span> Cart-{{ App\Models\Cart::total_item_cart() }}</a>
                    </li>


                </ul>
            </div>
        </nav>
        <!--2nd navbar start here-->
        <!--3rd navbar start here-->
        <section class="third-navbar">
            <nav class=" navbar navbar-expand-lg">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ">


                        @foreach ($categories as $item)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('category/product/'.$item->id) }}">{{$item->name}}</a>
                        </li>
                        @endforeach
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('contact') }}">Contact-Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('about-us') }}">About-Us</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </section>
        <!--3rd navbar start here-->

    </div>

</section>
