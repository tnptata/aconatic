<nav class="flex items-center justify-between flex-wrap bg-red-300 p-6">
    <div class="flex items-center flex-shrink-0 text-black mr-6">
        <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z" />
        </svg>
        <span class="font-semibold text-xl tracking-tight">Aconasonic</span>
    </div>

    <div class="block lg:hidden">
        <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
        </button>
    </div>

    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
        <div class="text-sm lg:flex-grow">
            <a href="{{ route('home') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                HOME
            </a>

            <a href="{{ route('indexcustomer') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                PRODUCT
            </a>

            

            @if (Auth::check())
            
            <a href="{{ route('buylists.index') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                BUYLIST
            </a>
            @if (!Auth::user()->isCustomer())
            
            <a href="{{ route('claims.index') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                SERVICE & SUPPORT
            </a>
            @endif
            
            @if (Auth::user()->isCustomer())
            <a href="{{ route('addMoney')}}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                ADD MONEY
            </a>
            @endif

            @if (Auth::user()->isAdmin())
            <a href="{{ route('adminMoney')}}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                ADD MONEY
            </a>
            @endif

            @endif

        </div>

        <div>

            @if (Auth::check())
            <div class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 mr-4">
                {{Auth::user()->name }}
            </div>
            
            @if (Auth::user()->isCustomer())
            <div class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 mr-4">
                @if (Auth::user()->money() <= 0)
                <h1>
                    Balance 0 Baht
                </h1>
                @else
                    Balance{{Auth::user()->money }} Baht
                @endif
            </div>
            @endif
            
            <form action="{{ route('logout') }}" method="post" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                @csrf

                <button type="submit">
                    LOGOUT
                </button>
            </form>

            @else
            <a href="{{route('login')}}" class="text-sm block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                LOGIN
            </a>
            <a href="{{route('register')}}" class="text-sm block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                REGISTER
            </a>
            
            @endif
        </div>

    </div>
</nav>

<!-- nav bar -->