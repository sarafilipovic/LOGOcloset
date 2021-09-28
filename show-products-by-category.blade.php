@include('layouts.header')
@include('layouts.navbar')


<div class="content mt-4">
    <div class="row">
        <div class="col-md-3">
            {{-- @include('layouts.sidebar') --}}
            @foreach ($categories as $category)
                <ol class="list-group ml-2">
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
                    <div class="card ml-4" style="width: 18rem;">
                        <img src="{{ asset('storage/'.$product->img) }}" width="300" class="card-img-top" alt="...">
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
        </div>
</div>

