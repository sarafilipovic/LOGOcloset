@include('layouts.header')
<body>
    @include('layouts.navbar')

    <div id="app" style="background-color:#DCD5D3; min-height:100vh">
        <div class="content">
            <div class="row">
                <div class="col-md-3">
                    @foreach ($categories as $category)
                        <ol class="list-group mx-2 my-2">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">{{ $category->name}}</div>
                                </div>
                                <span>
                                    <a href="{{ route('products.category.id', $category->id) }}" class="btn btn-primary">Show</a>
                                </span>
                            </li>
                        </ol>
                    @endforeach
                </div>
            <div class="col-md-9">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col">
                        <div class="card ml-4 mt-2" style="width: 18rem;">
                            <img src="{{ asset('storage/'.$product->img) }}" width="300" height="250" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <h4>{{ $product->price }} KM</h4>
                                @if ($cart->where('id', $product->id)->count())
                                    <strong>In cart</strong>
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            {{ method_field('DELETE') }}
                                            @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id}}">
                                        <button type="submit" class="btn btn-danger">Remove item</button>
                                    </form>
                                @else
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id}}">
                                    <input type="number" class="form-control" value="1" name="quantity">
                                    <button type="submit" class="btn btn-primary mt-2">Add to cart</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
    
            <!--<div class="col-md-9">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col">
                        <div class="card ml-4" style="width: 18rem;">
                            <img src="https://assets.ajio.com/medias/sys_master/root/20210403/4Zeb/606863a67cdb8c1f1474dd0b/-1117Wx1400H-461085141-blue-MODEL.jpg" width="300" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <h4>{{ $product->price }} KM</h4>
                                @if ($cart->where('id', $product->id)->count())
                                    <strong>In cart</strong>
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            {{ method_field('DELETE') }}
                                            @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id}}">
                                        <button type="submit" class="btn btn-danger">Remove item</button>
                                    </form>
                                @else
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id}}">
                                    <input type="number" value="1" name="quantity">
                                    <button type="submit" class="btn btn-primary">Add to cart</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>-->
       <!-- </div>
    </div>-->
    

        <!--<div class="row mt-4">
            @foreach ($products as $product)
            <div class="col">
                <div class="card ml-4" style="width: 18rem;">
                    <img src="https://assets.ajio.com/medias/sys_master/root/20210403/4Zeb/606863a67cdb8c1f1474dd0b/-1117Wx1400H-461085141-blue-MODEL.jpg" width="300" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <h4>{{ $product->price }} KM</h4>
                        @if ($cart->where('id', $product->id)->count())
                            <strong>In cart</strong>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    {{ method_field('DELETE') }}
                                    @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id}}">
                                <button type="submit" class="btn btn-danger">Remove item</button>
                            </form>
                        @else
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id}}">
                            <input type="number" value="1" name="quantity">
                            <button type="submit" class="btn btn-primary">Add to cart</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>-->
        <!--<div id="app">
        <example-component></example-component>
        </div>-->
  
        <!--<script src="{{ mix('js/app.js') }}"></script>-->
    </body>
    <!--<script src="{{ mix('js/app.js') }}"></script>-->
</html>
