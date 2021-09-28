@include('layouts.header')

@include('layouts.navbar')

<div class="container mt-4" style="width:40%">

    <ul class="list-group">
        @foreach ($carts as $cart)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $cart->name }} - {{ $cart->price }} KM
                <span class="badge bg-primary rounded-pill">{{ $cart->qty }}</span>
            </li>
        @endforeach
    </ul>
    <hr>
    Total: {{ Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}

    <hr>
    @auth
    <a href="{{ route('checkout') }}" class="btn btn-primary">Checkout</a>
    @endauth
    @guest
    <a href="{{ route('login') }}" class="btn btn-primary">Sign in</a>
    @endguest

</div>


