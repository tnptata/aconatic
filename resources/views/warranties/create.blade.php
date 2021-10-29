@extends('layouts.main')

@section('content')

<form action="{{ route('warranties.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
    <div class="container max-w-screen-lg mx-auto">
        <div>
        <h2 class="font-semibold text-xl text-gray-600">Add new warranty</h2>

        <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
            <div class="max-w-2xl rounded-lg  bg-gray-50">
  

            <div class="lg:col-span-2">
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                <div class="md:col-span-5">
                    <label for="name">Customer Name</label>
                    <input type="text" name="name" id="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('name') }}" />
                    @if(session()->has('customerError'))
                    <div class="text-red-600">
                            {{ session()->get('customerError') }}
                        </div>
                    @enderror
                </div>
                <div class="md:col-span-5">
                    <label for="product">Product</label>
                    <input type="text" name="product" id="product" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('product') }}" />
                    @if(session()->has('productError'))
                        <div class="text-red-600">
                            {{ session()->get('productError') }}
                        </div>
                    @endif
                </div>
                <div class="md:col-span-5">
                    <label for="product">Start Date</label>
                    <input type="date" name="start_date" id="start_date" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 @error('start_date') border-red-400 @enderror" 
                    value="{{ old('start_date') }}" />
                    @error('start_date')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="md:col-span-5">
                    <label for="product">Expire Date</label>
                    <input type="date" name="expire_date" id="expire_date" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50  @error('expire_date') border-red-400 @enderror" 
                    value="{{ old('expire_date') }}" />
                    @error('expire_date')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>



                <div class="md:col-span-5 text-right">
                    <div class="inline-flex items-end">
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        <a href="{{ route('warranties.index') }}">
                            Cancel
                        </a>
                    </button>
                    </div>

                    <div class="inline-flex items-end">
                        <button type="submit"  class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                    </div>

                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</form>


  
@endsection