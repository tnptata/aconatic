@extends('layouts.main')


    
@section('content')
    <style>@import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);</style>
    <div class="min-w-screen min-h-screen bg-white-300 flex items-center p-5 lg:p-10 overflow-hidden relative">
        <div class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
            <div class="md:flex items-center -mx-10">
                <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
                    <div class="flex items-end justify-end h-96 w-full bg-cover" style="background-image: url(<?php echo asset("uploads/products/{$product->product_image}")?>)">
            </div>
                
                </div>
                <div class="w-full md:w-1/2 px-10">
                    <div class="mb-10">
                        <h1 class="font-bold uppercase text-2xl mb-5">{{ $product->type }} <br>{{ $product->name }}</h1>
                        <p class="text-sm">{{ $product->detail }} <a href="#" class="opacity-50 text-gray-900 hover:opacity-100 inline-block text-xs leading-none border-b border-gray-900"></a></p>
                    </div>
                    <div>
                    <span class="text-2xl leading-none align-baseline">สินค้าจะมีประกัน 1 ปี</span>
                    <div class="inline-block align-bottom mr-5">
                            
                        
                        </div>
                        <div class="inline-block align-bottom mr-5">
                            <span class="font-bold text-5xl leading-none align-baseline">{{ $product->cost * $amount}}</span>
                            <span class="text-2xl leading-none align-baseline">Baht</span>
                        </div>
                        <div class="inline-block align-bottom mr-5">
                            @if($product -> amount < $amount)
                            <p class="text-red-600">Not enough product.</p>
                            @elseif(Auth::user()->money() >= $amount * $product->cost)
                                    <button class="bg-yellow-300 opacity-75 hover:opacity-100 text-yellow-900 hover:text-gray-900 rounded-full px-10 py-2 font-semibold"><i class="mdi mdi-cart -ml-2 mr-2"></i>>
                                        <a href="{{ route('products.confirm',['product' => $product->id, 'cost' => $product->cost * $amount]) }}">
                                            confirm
                                        </a>
                                    </button>
                            @else
                                <p class="text-red-600">Your money don't enough please deposit more money.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	
@endsection





