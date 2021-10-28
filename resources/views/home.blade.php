@extends('layouts.main')

@section('content')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
        <style>
            .carousel-open:checked+.carousel-item {
            position: static;
            opacity: 100;
            }
        
            .carousel-item {
            -webkit-transition: opacity 0.6s ease-out;
            transition: opacity 0.6s ease-out;
            }
        
            #carousel-1:checked~.control-1,
            #carousel-2:checked~.control-2,
            #carousel-3:checked~.control-3 {
            display: block;
            }
        
            .carousel-indicators {
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            top: 90%;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 10;
            }
            .picture1{
                background-image: url("{{ asset('assets/img/hero1.jpeg') }}");
                height:500px;
            }
            .picture2{
                background-image: url("{{ asset('assets/img/hero2.jpeg') }}");
                height:500px;
            }
            .picture3{
                background-image: url("{{ asset('assets/img/hero3.jpeg') }}");
                height:500px;
            }
            .picture4{
                background-image: url("{{ asset('assets/img/hero4.jpeg') }}");
            }
            .picture5{
                background-image: url("{{ asset('assets/img/hero5.jpeg') }}");
            }
            .picture6{
                background-image: url("{{ asset('assets/img/hero6.jpeg') }}");
            }
            .picture7{
                background-image: url("{{ asset('assets/img/hero7.jpeg') }}");
            }
            .picture8{
                background-image: url("{{ asset('assets/img/hero8.jpeg') }}");
            }
            .picture9{
                background-image: url("{{ asset('assets/img/hero9.jpeg') }}");
            }
            .picture10{
                background-image: url("{{ asset('assets/img/hero10.png') }}");
            }
            .picture11{
                background-image: url("{{ asset('assets/img/hero11.png') }}");
            }

            
        
            #carousel-1:checked~.control-1~.carousel-indicators li:nth-child(1) .carousel-bullet,
            #carousel-2:checked~.control-2~.carousel-indicators li:nth-child(2) .carousel-bullet,
            #carousel-3:checked~.control-3~.carousel-indicators li:nth-child(3) .carousel-bullet {
            color: #2b6cb0;
            /*Set to match the Tailwind colour you want the active one to be */
            }
        </style>
        
        <div class="carousel relative rounded relative overflow-hidden shadow-xl">
            <div class="carousel-inner relative overflow-hidden w-full">
            <!--Slide 1-->
            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden=""
                checked="checked">
            <div class="carousel-item absolute opacity-0 bg-center bg-cover picture1">
            
            </div>
            <label for="carousel-3"
                class="control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto flex justify-center content-center"><i
                class="fas fa-angle-left mt-3"></i></label>
            <label for="carousel-2"
                class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto"><i
                class="fas fa-angle-right mt-3"></i></label>
        
            <!--Slide 2-->
            <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0 bg-center bg-cover picture2">
            </div>
            <label for="carousel-1"
                class=" control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto"><i
                class="fas fa-angle-left mt-3"></i></label>
            <label for="carousel-3"
                class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto"><i
                class="fas fa-angle-right mt-3"></i></label>
        
            <!--Slide 3-->
            <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0 bg-cover bg-center picture3">
            </div>
            <label for="carousel-2"
                class="control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto"><i
                class="fas fa-angle-left mt-3"></i></label>
            <label for="carousel-1"
                class="next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto"><i
                class="fas fa-angle-right mt-3"></i></label>
        
            <!-- Add additional indicators for each slide-->
            <ol class="carousel-indicators">
                <li class="inline-block mr-3">
                <label for="carousel-1"
                    class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                </li>
                <li class="inline-block mr-3">
                <label for="carousel-2"
                    class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                </li>
                <li class="inline-block mr-3">
                <label for="carousel-3"
                    class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                </li>
            </ol>
        
            </div>
        </div>

        <!----------------------------------------------------------- end slide show ------------------------------------------------------------->


        <div class="mt-16">
                <h3 class="text-gray-600 text-2xl font-medium">สินค้าเเนะนำ</h3>
                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                    @foreach ($products as $indexKey => $product)
                    @if($product->status === "Recommend")
                        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                            <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url(<?php echo asset("uploads/products/{$product->product_image}")?>)">
                            <a href="{{ route('products.show' , ['product'=> $product->id]) }}">
                            <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </button>
                            </a>
                            </div>
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

            <div class="mt-16">
            <h3 class="text-gray-600 text-2xl font-medium">สินค้าใหม่</h3>
                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                @foreach ($products as $indexKey => $product)
                    <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                    <div class="flex items-end justify-end h-56 w-full bg-cover bg-center" style="background-image: url(<?php echo asset("uploads/products/{$product->product_image}")?>)">
                    <a href="{{ route('products.show' , ['product'=> $product->id]) }}">
                    <button class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </button>
                    </a>
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
        
    
        <footer class="bg-gray-200">
            <div class="container mx-auto px-6 py-3 flex justify-between items-center">
                <a href="#" class="text-xl font-bold text-gray-500 hover:text-gray-400">Contact us @ Aconasonic</a>
                <p class="py-2 text-gray-500 sm:py-0">All rights reserved</p>
            </div>
        </footer>

        
                
    

	
@endsection