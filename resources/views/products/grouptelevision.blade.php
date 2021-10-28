@extends('layouts.main')



@section('content')
<div class="mt-16">

    <h3 class="text-gray-600 text-2xl font-medium">TELEVISION</h3>
    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
        @foreach ($products as $product)
        @if($product->type === "Television")
        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
            <div class="flex items-end justify-end h-64 w-full bg-cover" style="background-image: url(<?php echo asset("uploads/products/{$product->product_image}")?>)">
            <a href="{{ route('products.show' , ['product'=> $product->id]) }}">
            <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </button>
            </a>
            </div>
            <div class="px-5 py-3">
                <h3 class="text-gray-700 uppercase">
                    <a href="{{ route('products.show' , ['product'=> $product->id]) }}">
                        {{ $product->name }}
                    </a>
                </h3>
                <span class="font-bold text-1xl text-indigo-500 leading-none align-baseline">{{ $product->cost }} Baht</span>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>


</div>



@endsection