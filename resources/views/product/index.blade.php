@extends('layouts.app')

@section('content')
    @if ($products->isNotEmpty())
        <div class="row">
            @foreach($products as $product)
            <div class="col-4">
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
                        <div>
                            <a href="{{ route('product.buy', $product) }}" class="btn btn-primary">
                                Buy
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
@endsection