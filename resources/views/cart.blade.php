@extends('layouts.master')
@section('content')
    <table class="table table table-striped">
        <thead>
            <tr>
                <th>Product</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($cartItems as $cartItem)
                <tr>
                    <td>{{ $cartItem->product->name }}</td>
                    <td><img src="{{ $cartItem->product->image }}" class="img-thumbnail" style="height:50px;"></td>
                    <td>{{ number_format($cartItem->price, 2) }}</td>
                    <td>{{ $cartItem->quantity }}</td>
                    <td>{{ number_format($cartItem->total, 2) }}</td>
                    <td><a href="{{ route('cart.removeProduct', $cartItem->product_id) }}" class="text-danger">X</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" align="center">No products found.</td>
                </tr>
            @endforelse

        </tbody>
        @if ($cartItems->count() > 0)
            <tfoot>
                <tr>
                    <th colspan="3"></th>
                    <th>Grand Total</th>
                    <th>{{ number_format($cartItems->sum('total'), 2) }}</th>
                    <th></th>
                </tr>
            </tfoot>
        @endif
    </table>

    @if ($cartItems->count() > 0)
        <button class="btn btn-primary btn-block" id="checkout-button"><i class="fa fa-cc-stripe"></i> Pay
            {{ number_format($cartItems->sum('total'), 2) }}</button>
    @endif
@endsection

@push('header')
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
@endpush

@push('footer')
    <script type="text/javascript">
        var stripe = Stripe("{{ env('STRIPE_PUBLISHED_KEY') }}");
        var checkoutButton = document.getElementById("checkout-button");
        checkoutButton.addEventListener("click", function() {
            fetch("{{ route('checkout') }}", {
                    method: "POST",
                })
                .then(function(response) {
                    return response.json();
                })
                .then(function(session) {
                    return stripe.redirectToCheckout({
                        sessionId: session.id
                    });
                })
                .then(function(result) {
                    if (result.error) {
                        alert(result.error.message);
                    }
                })
                .catch(function(error) {
                    console.error("Error:", error);
                });
        });
    </script>
@endpush
