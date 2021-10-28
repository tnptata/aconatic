
@extends('layouts.main')

@section('content')

<body class="bg-gradient-to-r from-pink-200 via-red-100 to-blue-300 w-full h-full z-10 overflow-hidden">
        <div class="mt-40 text-center border-double border-8 border-light-blue-500 mx-20">
                <h1 class='font-semibold text-xl tracking-tight mt-10'>ADD MONEY</h1>

                <div class="mt-10">

                        <form action="{{ route('money')}}">
                                <label for="money">Amount</label>
                                <input class="border rounded-md pl-10 pr-4 py-2 focus:border-blue-500 
        focus:outline-none focus:shadow-outline" type="number" name="add_money" value="{{ 'add_money' }}" class="@error('add_money') border-red-400 @enderror"> Baht
                                @error('add_money')
                                <div class="text-red-600">
                                        {{ $message }}
                                </div>
                                @enderror

                </div>

                <div class="mt-10 mb-10">
                        <button type="submit" class="bg-blue-300 rounded-lg px-4 py-2">
                                Confirm
                        </button>
        
                </div>
                

                
        </div>
        </form>
</body>

@endsection