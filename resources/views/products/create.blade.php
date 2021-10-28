@extends('layouts.main')

@section('content')

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
    <div class="container max-w-screen-lg mx-auto">
        <div>
        <h2 class="font-semibold text-xl text-gray-600">Add new products</h2>

        <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
            <div class="max-w-2xl rounded-lg  bg-gray-50">
            <div class="m-4">
                <div class="flex items-center justify-center w-full">
                    <label
                        class="flex flex-col w-full h-full border-4 border-blue-200 border-dashed hover:bg-gray-100 hover:border-gray-300">
                        <div class="flex flex-col items-center justify-center pt-7">
                        <svg class="text-indigo-500 w-24 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" /></svg>
                                
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                            
                        </div>
                        
                    </label>
                </div>
                </div>
                <div class="flex justify-center p-2">
                    <input type="file" name="product_image"class="w-full px-4 py-2 text-white bg-blue-500 rounded shadow-xl">
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                <div class="md:col-span-5">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" id="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('name') }}" />
                    @error('name')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="md:col-span-5">
                    <label for="detail">Detail</label>
                    <div class="w-full md:w-full px-3 mb-2 mt-2">
                         <input type="text" class="h-20 border mt-1 rounded px-4 w-full bg-gray-50  @error('detail') border-red-400 @enderror" 
                         name="detail"  value="{{ old('detail') }}" required></input>
                    </div> 
                </div>

                <div class="md:col-span-3">
                    <label for="type">Product Type</label>
                    <select name="type" id="type" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50">
                        @foreach($product_types as $type)
                        <option value="{{ $type }}" {{ old('type') === $type ? "selected": ""}}>{{ $type }}</option>
                        @endforeach
                    </select>
                </div>



                <div class="md:col-span-1">
                    <label for="cost">Cost</label>
                    <input type="number" name="cost" placeholder="Cost" autocomplete="off"  class="transition-all flex items-center h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="cost" value="{{ old('cost') }}" />
                    @error('cost')
                    <div class="text-red-600">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="md:col-span-5 text-right">
                    <div class="inline-flex items-end">
                        <button type="submit"  class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                    </div>
                    <div class="inline-flex items-end">
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        <a href="{{ route('products.index') }}">
                            Cancel
                        </a>
                    </button>
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