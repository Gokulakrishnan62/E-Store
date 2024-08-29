<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body>
<div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12 flex justify-center items-center h-screen bg-gray-100">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
        <form action="{{route('login')}}" method="post">
            @csrf
            <h1 class="text-3xl font-bold mb-4 text-center">Login</h1>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label
                        class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                        for="email"
                    >
                        Email
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="email"
                        name="email"
                        type="email"
                        placeholder="youremail@example.com"
                    />
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label
                        class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                        for="password"
                    >
                        Password
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="password"
                        name="password"
                        type="password"
                        placeholder="******************"
                    />
                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button
                        class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                        type="submit"
                    >
                        Login
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
