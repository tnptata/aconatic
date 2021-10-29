@extends('layouts.main')


    
@section('content')

<div class="min-h-screen flex items-center justify-center px-4">
    
    <div class="max-w-4xl  bg-white w-full rounded-lg shadow-xl">
    <div class="w-full text-gray-700 md:text-center text-2xl font-semibold">
                        Receipt
    </div> 

    <div>
    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
        <p class="text-gray-600">
            Name
        </p>
        <p>
        {{ $claim->warranty->customer->name }}
        </p>
    </div>
    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
        <p class="text-gray-600">
            Product
        </p>
        <p>
        {{ $claim->warranty->product->name }}
        </p>
    </div>
    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
        <p class="text-gray-600">
            Expense
        </p>
        <p>
            {{ $receipt->expense }} Baht
        </p>
    </div>
    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
        <p class="text-gray-600">
            Date
        </p>
        <p>
            {{ $receipt->date }}
        </p>
    </div>
    <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">
                                    
        <button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">
            <a href="{{ route('claims.show', ['claim'=> $claim->id]) }}" >
                OK
             </a>
        </button>
                                
    </td>
</div>



@endsection