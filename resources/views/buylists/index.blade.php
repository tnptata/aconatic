@extends('layouts.main')


    
@section('content')
@if (!Auth::user()->isCustomer())
<div class="mt-5">
    <a href="{{ route('buylists.history') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">deliver history</a>
</div>
@endif
<table class="min-w-full">
    <thead>
        <tr>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">BUY ID</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">DATE</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">PRODUCT</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">NAME</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">AMOUNT</th>
            @if (Auth::user()->isCustomer())
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">STATUS</th>
            @endif
            <th class="px-6 py-3 border-b-2 border-gray-300"></th>
        </tr>
    </thead>
    <tbody class="bg-white">
@foreach($buylists as $buylist)
        <tr>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                <div class="flex items-center">
                    <div>
                        <div class="text-sm leading-5 text-gray-800">{{ $buylist->id }}</div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                <div class="text-sm leading-5 text-blue-900">{{ $buylist->buy_date}}</div>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $buylist->product->name }}</td>
            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $buylist->user->name }}</td>
            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $buylist->amount }}</td>

            
            
            @if (!Auth::user()->isCustomer())
            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">
                <button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">
                    <a href="{{ route('buylists.deliver', ['buylist'=> $buylist->id]) }}" >
                        deliver
                    </a>
                </button>
                </td>
            @else
                @if($buylist->delivered)
                    <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">delivered</td>
                @else
                    <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">prepare to deliver</td>
                @endif
            @endif
            
            
        </tr>
@endforeach
                        </tbody>
                    </table>
@endsection