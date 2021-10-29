@extends('layouts.main')


    
@section('content')
<div class="mt-5">
    <a href="{{ route('customers.edit' , ['customer' => $customer->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit Customer</a>
</div>
<div class="min-h-screen flex items-center justify-center px-4">
    
    <div class="max-w-4xl  bg-white w-full rounded-lg shadow-xl">
        Customer ID
        <div class="p-4 border-b">
            <h2 class="text-2xl ">
            {{ $customer->id}}
            </h2>
        </div>
    <div>
    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
        <p class="text-gray-600">
            Name
        </p>
        <p>
            {{ $customer->name }}
        </p>
    </div>
    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
        <p class="text-gray-600">
            Phone number
        </p>
        <p>
            {{ $customer->tel}}
        </p>
    </div>
    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
        <p class="text-gray-600">
            Email
        </p>
        <p>
            {{ $customer->email }}
        </p>
    </div>
    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
        <p class="text-gray-600">
            Address
        </p>
        <p>
            {{ $customer->address }}
        </p>
    </div>
    
</div>



@endsection