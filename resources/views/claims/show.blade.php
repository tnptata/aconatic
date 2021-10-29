@extends('layouts.main')


    
@section('content')

<div class="min-h-screen flex items-center justify-center px-4">
    
    <div class="max-w-4xl  bg-white w-full rounded-lg shadow-xl">
        <div class="p-4 border-b">
            <h2 class="text-2xl ">
            {{ $claimlist->warranty->product->name }}
            </h2>
        </div>
    <div>
        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
            <p class="text-gray-600">
                Full name
            </p>
            <p>
            {{ $claimlist->warranty->customer->name }}
            </p>
        </div>
        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
            <p class="text-gray-600">
                DATE
            </p>
            <p>
                {{ $claimlist->date }}
            </p>
        </div>
        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
            <p class="text-gray-600">
                STATUS
            </p>
            <p>
                {{ $claimlist->status }}
            </p>
        </div>
        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
            <p class="text-gray-600">
                สภาพสินค้า
            </p>
            <p>
            {{ $claimlist->damage }}
            </p>
        </div>
        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
            <p class="text-gray-600">
                เงื่อนไข
            </p>
            <p>
            {{ $claimlist->repair_condition }}
            </p>
        </div>
    </div>
    <button class="bg-indigo-500 text-white text-base rounded-lg px-4 py-2 font-thin ">
        <a href="{{ route('claims.edit', ['claim'=> $claimlist->id]) }}" >
            EDIT
        </a>
    </button>
    @if($status == "charge" && $claimlist->status == 'รอส่งซ่อม')
        <button class="bg-indigo-500 text-white text-base rounded-lg px-4 py-2 font-thin ">
            <a href="{{ route('receipts.show', ['receipt'=> $receipt->id]) }}" >
                Issue a receipt
            </a>
        </button>
    @endif
</div>



@endsection