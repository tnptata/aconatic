@extends('layouts.main')


    
@section('content')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    
    @can('update', $product)
    <div class="mt-5">
    <a href="{{ route('products.edit' , ['product' => $product->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit Product</a>
    </div>
    @endcan

    <div x-data="{ cartOpen: false , isOpen: false }" class="bg-white">
        <header>
            <div class="container mx-auto px-6 py-3">
                <div class="flex items-center justify-between">
                    <div class="hidden w-full text-gray-600 md:flex md:items-center">
                        
                    </div>
                    <div class="w-full text-gray-700 md:text-center text-2xl font-semibold">
                        Aconasonic SHOP
                    </div>
                    
                    </div>
                </div>
                
    
            </div>

        <!------------------------------------------- เลือกสินค้า ---------------------------------------------------->
        <main class="my-8">
            <h3 class="text-gray-600 text-2xl font-medium">{{ $product->type }}</h3>
            <div class="container mx-auto px-6">
                <div class="md:flex md:items-center">
                
                    <div class="w-full h-64 md:w-1/2 lg:h-96">
                        <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto" src="<?php echo asset("uploads/products/{$product->product_image}")?>" alt="tv4k">
                    </div>
                    <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                        <h3 class="text-gray-700 uppercase text-lg">{{ $product->name }}</h3>
                        <h5 class="text-gray-500 uppercase mt-3">{{ $product->detail }}</h5>
                        <span class="font-bold text-1xl text-indigo-500 leading-none align-baseline">{{ $product->cost }} Baht</span>
                        <hr class="my-3">
                        <form action="{{ route('products.buy',['product' => $product->id]) }}">
                            <div class="mt-2">
                            @can('buy', \App\Models\Product::class)
                                <label class="text-gray-700 text-sm" for="count">Count:</label>
                                <input type="number" name="amount" placeholder="Amount" autocomplete="off" 
                                class="border-2 p-2 @error('amount') border-red-400 @enderror" 
                                value="{{ old('amount') }}">
                                @error('amount')
                                    <div class="text-red-600">
                                    {{$message}}
                                    </div>
                                @enderror
                            @endcan
                            @can('create', \App\Models\Product::class)
                                <div>
                                Amount: {{$product -> amount}}
                                </div>
                            @endcan
                            </div>
                            <!--------------------------------------------------------------------------------------------------------->


                            <!--------------------------------------- ซื้อของเลย --------------------------------------------------------->
                            @if(!Auth::check())
                            <div class="flex items-center mt-6">
                            <button class="bg-red-500 text-white text-base rounded-lg px-4 py-2 font-thin ">
                                <a href="{{ route('login') }}" >
                                LOGIN
                                </a>
                            </button>
                           @endif
                            </div>
                            @can('buy', \App\Models\Product::class)
                            <div class="flex items-center mt-6">
                                <button type="submit" class="px-8 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">
                                    Order Now
                                </button>
                            </div>
                            @endcan
                        </form>
                        <!----------------------------------------------------------------------------------------------------------->
                    </div>
                </div>

                <!--------------------------------------------------------- เพิ่มเติมของชนิดอื่น ------------------------------------------->
                <div class="mt-16">
                    <h3 class="text-gray-600 text-2xl font-medium">More Products</h3>
                    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                    @foreach ($products as $indexKey => $product)
                        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                            <div class="flex items-end justify-end h-64 w-full bg-cover" style="background-image: url(<?php echo asset("uploads/products/{$product->product_image}")?>)">
                                <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </button>
                            </div>
                            <div class="px-5 py-3">
                                <a href="{{ route('products.show' , ['product'=> $product->id]) }}">
                                    <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                                </a>
                                <span class="font-bold text-1xl text-indigo-500 leading-none align-baseline">{{ $product->cost }} Baht</span>
                            </div>
                        </div>
                        @if($indexKey === 3)
                            @break
                        @endif
                    @endforeach
                </div>
        </main>

        <footer class="bg-gray-200">
            <div class="container mx-auto px-6 py-3 flex justify-between items-center">
                <a href="#" class="text-xl font-bold text-gray-500 hover:text-gray-400">Contact us @ Aconasonic</a>
                <p class="py-2 text-gray-500 sm:py-0">All rights reserved</p>
            </div>
        </footer>
    </div>
    

	
@endsection