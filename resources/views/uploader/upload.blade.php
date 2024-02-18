<x-guest-layout>
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('upload') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Upload Big Csv</a>

                <a href="{{ route('login') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif
        
        @if($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if($message = Session::get('errors'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul>
            @foreach($errors->all() as $error) 
                <li>{{$error}}</li>
            @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

    <div style="min-height: 5vh;" class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <main>
        <form action="{{ route('uploadexcel') }}" enctype="multipart/form-data" method="post">
            @csrf

            <input type="file" class="form-control" name="excelfile" id="excelfile" />
            <!-- <input type="submit" class="btn btn-primary" name="submit" value="Submit"> -->
            <x-primary-button class="ms-4">
                {{ __('Submit') }}
            </x-primary-button>
        </form>
        </main>
    </div>
</x-guest-layout>