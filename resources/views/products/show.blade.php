@extends('layouts.main')


    
@section('content')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    
    
    <div class="mt-5">
    <a href="{{ route('products.edit' , ['product' => $product->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit Product</a>
    </div>
    

    <div x-data="{ cartOpen: false , isOpen: false }" class="bg-white">
        <header>
            <div class="container mx-auto px-6 py-3">
                <div class="flex items-center justify-between">
                    <div class="hidden w-full text-gray-600 md:flex md:items-center">
                        
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

                        <!----------------------------------------------------------------------------------------------------------->
                    </div>
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