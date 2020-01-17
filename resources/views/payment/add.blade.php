@extends('layouts.app')

@section('content')
    <div class="col-4 mx-auto">
        <div class="card mb-2" style="height: 300px;">
            <div class="card-title">
                {{ $product->title }}
            </div>
            <div class="card-body text-center">
                <div>
                    <img src="{{$product->image_url}}" alt="">
                </div>
                {{ $product->description }}
                <div>
                    {{ $product->price }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 mx-auto">
            <form id="checkout" method="post" action="/checkout/{{$product->id}}">
                @csrf
                <div id="payment-form"></div>
                <input type="submit" value="Pay $10">
            </form>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://js.braintreegateway.com/js/braintree-2.32.1.min.js"></script>
    <script>
        var clientToken = "{{$token}}";
        braintree.setup(clientToken, "dropin", {
            container: "payment-form"
        });
    </script>
@endsection