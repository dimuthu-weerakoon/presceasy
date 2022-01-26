@extends('layouts.customer')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">{{ __('Orders') }}</h1>


@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger border-left-danger" role="alert">
    <ul class="pl-4 my-2">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<div class="row">
    <!-- Add items Card Example -->
    <div class="col-sm-6 mb-3 md-4" style="min-width: 25rem">
        <div class="card border-left-primary shadow py-2 col-sm">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Add items</div>
                        <small>Add new items to your cart</small>
                    </div>
                    <div class="col-auto">
                        <h1 class="display-4"><i class="bi bi-cart-plus-fill"></i></h1>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <i class="bi bi-bag-plus-fill"></i>
                        <div class="text-xs font-weight-bold text-white text-uppercase">Shop now</div>
                    </button>
                </div>
            </div>
            <div class="collapse" id="collapseExample">
                <div class="card-body">

                    <form class="" action="/store" method="post">

                        @csrf

                        <div class="input-group">
                            <label style="padding-right: 10px" class="input-group-text bg-dark text-white"
                                for="inputGroupSelect01">
                                <h6> </h6> <span><i style="margin-right: 5px"
                                        class="bi bi-ui-checks-grid"></i></span>Category
                            </label>
                            <select class="form-select" name="category" id="inputGroupSelect01" required>
                                <option disabled selected>Choose Category</option>
                                <option>Card</option>
                                <option>tablet</option>
                                <option>tube</option>
                            </select>


                
                        </div>

                        <br>

                        <div class="input-group">
                            <label style="padding-right: 19px" class="input-group-text bg-dark text-white"
                                for="inputGroupText01"><span><i style="margin-right: 5px"
                                        class="bi bi-bag"></i></span>Product</label>
                            <input type="text" class="form-control" name="product" id="inputGroupText01"
                                aria-describedby="inputGroupText01" required>

                            <div class="invalid-feedback">
                                Please provide a valid product.
                            </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <br>

                        <div class="input-group">
                            <label style="padding-right: 14px" class="input-group-text bg-dark text-white"
                                for="inputGroupNumber01"><span><i style="margin-right: 5px"
                                        class="bi bi-plus-square"></i></span>Quantity</label>
                            <input type="number" class="form-control" name="quantity" id="inputGroupNumber01" required
                                min="1" max="1000">

                            <div class="invalid-feedback">
                                Please enter a valid quantity (must be between 1-1000).
                            </div>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <br>

                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-success">
                                <i class="bi bi-cart-check"></i> ADD
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <br>

        <!-- Cart Card Example -->

        <div class="card border-left-info shadow col-sm">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Cart</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50 Items</div>
                            </div>

                        </div>
                    </div>
                    <div class="col-auto">
                        <h1 class="display-4"> <i class="bi bi-cart-check-fill"></i></h1>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseExample01" aria-expanded="false" aria-controls="collapseExample01">
                        <i class="bi bi-cart4"></i>
                        <div class="text-xs font-weight-bold text-white text-uppercase">View Cart</div>
                    </button>
                </div>
            </div>

            <div class="collapse" id="collapseExample01">
                <div class="card-body">

                    <div>
                        @if(count($user->products)>0)
                        <table class="table table-dark table-hover table-borderless text-center">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->category}}</td>
                                    <td>{{$product->product}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td><a href="/remove/{{$product->id}}" class="btn btn-outline-danger"><i
                                                class="bi bi-x-lg"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><button type="submit" class="btn btn-success">Order now</button></td>
                            </tr>
                        </table>
                        @else
                            <h1 class="display-3 text-center"><i class="bi bi-cart-x opacity-50"></i></h1>
                            <h4 class="text-center">Cart empty</h4>
                        @endif

                        </table>
                    </div>
                </div>
            </div>
        </div>



        <br>
        <!-- Pending orders Card Example -->

        <div class="card border-left-success shadow col-sm">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pending</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                    </div>
                    <div class="col-auto">
                        <h1 class="display-4"> <i class="bi bi-hourglass-split"></i></h1>
                    </div>
                </div>
            </div>

        </div>



    </div>


    <!-- Illustrations -->

    <div class="card shadow md-3" style="min-width: 25rem">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
        </div>
        <div class="card-body">
            <div class="text-center">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 20rem;"
                    src="{{ asset('img/svg/undraw_editable_dywm.svg') }}" alt="">
            </div>
            <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow"
                    href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images
                that
                you can use completely free and without attribution!</p>
            <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw →</a>
        </div>
    </div>



</div>




@endsection