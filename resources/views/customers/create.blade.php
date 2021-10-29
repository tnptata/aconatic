@extends('layouts.main')

@section('content')

<form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
    <div class="container max-w-screen-lg mx-auto">
        <div>
        <h2 class="font-semibold text-xl text-gray-600">Add new customers</h2>

        <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
            <div class="max-w-2xl rounded-lg  bg-gray-50">
  

            <div class="lg:col-span-2">
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                <div class="md:col-span-5">
                    <label for="name">Customer Name</label>
                    <input type="text" name="name" id="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50
                    @error('name') border-red-400 @enderror"
                    value="{{ old('name') }}" />
                    @error('name')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="md:col-span-5">
                    <label for="name">Phone number</label>
                    <input type="text" name="tel" id="tel" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 @error('tel') border-red-400 @enderror" 
                    value="{{ old('tel') }}" />
                    @error('tel')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="md:col-span-5">
                    <label for="name">Email</label>
                    <input type="text" name="email" id="email" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 @error('email') border-red-400 @enderror" 
                    value="{{ old('email') }}" />
                    @error('email')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="md:col-span-5">
                    <label for="name">Address</label>
                    <input type="text" name="address" id="address" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 @error('address') border-red-400 @enderror" 
                    value="{{ old('address') }}" />
                    @error('address')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>




                <div class="md:col-span-5 text-right">
                    <div class="inline-flex items-end">
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        <a href="{{ route('customers.index') }}">
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