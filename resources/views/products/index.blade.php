@extends('layouts.main')


    
@section('content')

<div class="mt-5">
    <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">New Product</a>
</div>


<div x-data="{ cartOpen: false , isOpen: false }" class="bg-white">
    
    <!-----------------------------------------television----------------------------------------------------->
        <div class="mt-16">
        <a href="{{ route('grouptelevision') }}" class="text-gray-600 text-2xl font-medium">
            TELEVISION
        </a>
        <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
            @foreach ($products as $indexKey => $product)
            @if($product->type === "Television")
            <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                <div class="flex items-end justify-end h-64 w-full bg-cover" style="background-image: url(<?php echo asset("uploads/products/{$product->product_image}")?>)"></div>
                <div class="px-5 py-3">
                <a href="{{ route('products.show' , ['product'=> $product->id]) }}">
                    <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                </a>
                    <span class="font-bold text-1xl text-indigo-500 leading-none align-baseline">{{ $product->cost }} Baht</span>
                </div>
            </div>
            @if($indexKey === 4)
                @break
            @endif

            @endif

            @endforeach
        </div>
    </div>
    <!----------------------------------------------------------------------------------------------------->

    <!-----------------------------------------speaker----------------------------------------------------->
    <div class="mt-16">
        <a href="{{ route('groupspeaker') }}" class="text-gray-600 text-2xl font-medium">
            SPEAKER
        </a>
        <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
            @foreach ($products as $indexKey => $product)
            @if($product->type === "Speaker")
            <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url(<?php echo asset("uploads/products/{$product->product_image}")?>)"></div>
                <div class="px-5 py-3">
                <a href="{{ route('products.show' , ['product'=> $product->id]) }}">
                    <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                </a>
                    <span class="font-bold text-1xl text-indigo-500 leading-none align-baseline">{{ $product->cost }} Baht</span>
                </div>
            </div>

            @if($indexKey === 4)
                @break
            @endif

            @endif

            @endforeach
        </div>
    </div>
    <!---------------------------------------------------------------------------------------------------------->

    <!-----------------------------------------portable air----------------------------------------------------->
    <div class="mt-16">
        <a href="{{ route('groupportair') }}" class="text-gray-600 text-2xl font-medium">
            PORTABLE AIR
        </a>
        <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
            @foreach ($products as $indexKey => $product)
            @if($product->type === "Portable_air")
            <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url(<?php echo asset("uploads/products/{$product->product_image}")?>)"></div>
                <div class="px-5 py-3">
                <a href="{{ route('products.show' , ['product'=> $product->id]) }}">
                    <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                </a>
                    <span class="font-bold text-1xl text-indigo-500 leading-none align-baseline">{{ $product->cost }} Baht</span>
                </div>
            </div>

            @if($indexKey === 4)
                @break
            @endif

            @endif

            @endforeach
        </div>
    </div>
    
    <!---------------------------------------------------------------------------------------------------->

    <!-----------------------------------------camera----------------------------------------------------->
    <div class="mt-16">
        <a href="{{ route('groupcamera') }}" class="text-gray-600 text-2xl font-medium">
            CAMERA
        </a>
        <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
            @foreach ($products as $indexKey => $product)
            @if($product->type === "Camera")
            <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url(<?php echo asset("uploads/products/{$product->product_image}")?>)"></div>
                <div class="px-5 py-3">
                <a href="{{ route('products.show' , ['product'=> $product->id]) }}">
                    <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                </a>
                    <span class="font-bold text-1xl text-indigo-500 leading-none align-baseline">{{ $product->cost }} Baht</span>
                </div>
            </div>
           
            @if($indexKey === 4)
                @break
            @endif

            @endif

            @endforeach
        </div>
    </div>
    <!---------------------------------------------------------------------------------------------------->

</div>

<footer class="bg-gray-200">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="#" class="text-xl font-bold text-gray-500 hover:text-gray-400">Contact us @ Aconasonic</a>
            <p class="py-2 text-gray-500 sm:py-0">All rights reserved</p>
        </div>
    </footer>
    

	
@endsection