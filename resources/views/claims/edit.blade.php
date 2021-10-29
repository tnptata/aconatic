@extends('layouts.main')


    
@section('content')


<form action="{{ route('claims.update', ['claim' => $claimlist->id]) }}" method="POST">
     @csrf
    @method('PUT')
<div class="min-h-screen flex items-center justify-center px-4">
    
    <div class="max-w-4xl  bg-white w-full rounded-lg shadow-xl">
        <div class="p-4 border-b">
            <h2 class="text-2xl ">
                Television 4k
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
            <div class="col-span-6 sm:col-span-3">
                <label for="status" class="block text-sm font-medium text-gray-700">
                    STATUS</label>
                <select id="status" name="status" autocomplete="status"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach($statuses as $status)
                    <option @if($status === old('status', $claimlist->status)) selected @endif 
                        value="{{ $status }}">
                        {{ $status }}
                    </option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
            <p class="text-gray-600">
                สภาพสินค้า
            </p>
                <input type="text" name="damage"
                class="border-2 p-2 @error('damage') border-red-400 @enderror" 
                value="{{ old('damage', $claimlist->damage) }}"
                autocomplete="off">
                @error('damage')
                <div class="text-red-600">
                {{$message}}
                </div>
            @enderror

        </div>
        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
            <p class="text-gray-600">
                เงื่อนไข  
            </p>
              <input type="text" name="repair_condition" 
              class="border-2 p-2 @error('repair_condition') border-red-400 @enderror" 
              value="{{ old('repair_condition', $claimlist->repair_condition) }}"
              autocomplete="off">
              @error('repair_condition')
                <div class="text-red-600">
                {{$message}}
                </div>
            @enderror
        </div>
    </div>
    <button class="bg-red-500 text-white text-base rounded-lg px-4 py-2 font-thin ">
        <a href="{{ route('claims.show', ['claim'=> $claimlist->id]) }}" >
            CANCEL
        </a>
    </button>
    <button class="bg-indigo-500 text-white text-base rounded-lg px-4 py-2 font-thin ">
            UPDATE
    </button>
</div>
</form>

@endsection