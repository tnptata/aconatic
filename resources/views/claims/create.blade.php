@extends('layouts.main')


    
@section('content')
    <div class="flex mx-auto items-center justify-center shadow-lg mt-56 mx-8 mb-4 max-w-lg">
    <form action="{{ route('claims.store')}}" method="POST" class="w-full max-w-xl bg-white rounded-lg px-4 pt-2">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">สภาพสินค้า</h2>
            <input type="hidden" name="serial_number" value="{{$warranty->serial_number}}">
           
            <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                <div class="col-span-6 sm:col-span-3">
                    <label for="status" class="block text-sm font-medium text-gray-700">
                        STATUS
                    </label>
                    <select id="status" name="status" autocomplete="status"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="รอชำระ">
                            เสียเงิน
                        </option>
                        <option value="รอส่งซ่อม">
                            ไม่เสียเงิน
                        </option>
                    
                    </select>
                </div>
            </div>
            <div class="md:col-span-5">
                    <label for="product">Cost</label>
                    <input type="text" name="cost" id="cost" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('cost') }}" />
                </div>
            <div class="w-full md:w-full px-3 mb-2 mt-2">
                <input class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="damage" placeholder='กรอกสภาพสินค้า' required>
            </div>
            <div class="w-full md:w-full flex items-start md:w-full px-3">
                <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                
                </div>
                <div class="-mr-1">
                    <button class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100">
                            add     
                    </button>
                </div>
            </div>
        </form>
    </div>
    </div>


@endsection