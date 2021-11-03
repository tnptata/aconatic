@extends('layouts.main')


    
@section('content')

<div class="min-h-screen flex items-center justify-center px-4">
    
    <div class="max-w-4xl  bg-white w-full rounded-lg shadow-xl">
        <div class="p-4 border-b">
            <h2 class="text-2xl ">
            {{ $warranty->product->name}}
            </h2>
        </div>
    <div>
    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
        <p class="text-gray-600">
            Serial ID
        </p>
        <p>
            {{ $warranty->serial_number }}
        </p>
    </div>
    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
        <p class="text-gray-600">
            Full name
        </p>
        <p>
            {{ $warranty->customer->name}}
        </p>
    </div>
    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
        <p class="text-gray-600">
            BUY DATE
        </p>
        <p>
            {{ $warranty->start_date }}
        </p>
    </div>
    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
        <p class="text-gray-600">
            EXPIRES
        </p>
        <p>
            {{ $warranty->expire_date }}
        </p>
    </div>
    
    <button class="bg-red-500 text-white text-base rounded-lg px-4 py-2 font-thin ">
        <a href="{{ route('claims.index') }}" >
            Cancel
        </a>
    </button>
    <button class="bg-indigo-500 text-white text-base rounded-lg px-4 py-2 font-thin ">
        <a href="{{ route('warranties.claim.create', ['warranty' => $warranty->serial_number]) }}" >
            CLAIM
        </a>
    </button>
</div>



@endsection