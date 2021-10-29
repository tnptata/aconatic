@extends('layouts.main')


    
@section('content')



<div class="mt-5">
    <a href="{{ route('warranties.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">New Warranty</a>
</div>




<!---------------------------------------- Add items -------------------------------->

<!--------------------------------------------------------------------------------------------->





        <!------------------------------------------ table------------------------------------------ -->


                <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">SERIAL NUMBER</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">PRODUCT</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">FULL NAME</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">START DATE</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">EXPIRES</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($warranties as $warranty)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                        <div class="flex items-center">
                                            <div>
                                                <div class="text-sm leading-5 text-gray-800">{{ $warranty->serial_number }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $warranty->product->name}}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $warranty->product->name}}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $warranty->start_date }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{ $warranty->expire_date }}</td>
                                    <td lass="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">
                                    
                                        <button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">
                                            <a href="{{ route('warranties.show', ['warranty'=> $warranty->serial_number]) }}" >
                                                View Details
                                            </a>
                                        </button>
                                   
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    
				
                  
    </div>
    
           
  

@endsection