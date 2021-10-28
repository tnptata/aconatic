@extends('layouts.main')

@section('content')

<body class="bg-gradient-to-r from-pink-200 via-red-100 to-blue-300 w-full h-full z-10 overflow-hidden">
    <div class="w-4/6 mx-auto">
        <table class="table-auto mt-20 border-collapse border border-blue-400 text-center w-full">
            <thead>
                <tr>
                    <th class="border border-blue-400">ID</th>
                    <th class="border border-blue-400">NAME</th>
                    <th class="border border-blue-400">MONEY</th>
                    <th class="border border-blue-400"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                @if($user->add_money > 0)
                <tr>
                    <td class="border border-blue-400">{{ $user->id }}</td>
                    <td class="border border-blue-400">{{ $user->name }}</td>
                    <td class="border border-blue-400">{{ $user->add_money }}</td>

                    <td class="border-blue-400 flex justify-center space-x-6">

                        <form action="{{ route('updateMoney',['id' => $user->id])}}" method="POST">
                            @csrf
                            <button name="accept" type="submit" class="bg-green-500 hover:bg-green-700 rounded-lg px-4 py-2">Accept</button>
                        </form>
                        <form action="{{ route('deniedMoney',['id' => $user->id])}}" method="POST">
                            @csrf
                            <button name="denied" type="submit" class="bg-red-500 hover:bg-red-700 rounded-lg px-4 py-2">Denied</button>

                        </form>

                    </td>
                </tr>

                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</body>

@endsection