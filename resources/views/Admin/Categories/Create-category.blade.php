@extends('Admin.Layouts.Dashboard')
@section('page-title', 'Create Category')
@section('body-content')
    <div class="store-create-categories flex items-center justify-center bg-gradient-to-r from-gray-100 to-indigo-100 p-10">
        <div class="bg-white w-full max-w-5xl p-10 rounded-lg shadow-2xl">

            @if (session()->has('success'))
                <div class="mb-6">
                    <div class="alert alert-success bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 5.652a1 1 0 011.414 0l.707.707a1 1 0 010 1.414L12.414 10l4.055 4.055a1 1 0 010 1.414l-.707.707a1 1 0 01-1.414 0L10 12.414l-4.055 4.055a1 1 0 01-1.414 0l-.707-.707a1 1 0 010-1.414L7.586 10 3.532 5.945a1 1 0 010-1.414l.707-.707a1 1 0 011.414 0L10 7.586l4.348-4.348z"/></svg>
                        </span>
                    </div>
                </div>
            @elseif (session()->has('error'))
                <div class="mb-6">
                    <div class="alert alert-danger bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 5.652a1 1 0 011.414 0l.707.707a1 1 0 010 1.414L12.414 10l4.055 4.055a1 1 0 010 1.414l-.707.707a1 1 0 01-1.414 0L10 12.414l-4.055 4.055a1 1 0 01-1.414 0l-.707-.707a1 1 0 010-1.414L7.586 10 3.532 5.945a1 1 0 010-1.414l.707-.707a1 1 0 011.414 0L10 7.586l4.348-4.348z"/></svg>
                        </span>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6">
                    <div class="alert alert-danger bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <div class="flex justify-between">
                <h2 class="text-4xl font-bold mb-8 text-center text-gray-800">
                    Create a New Category
                </h2>
                <span class="flex justify-center items-center">
                    <a href="{{route('list-categories')}}" class="py-3 px-2 rounded-lg text-s font-semibold text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                        Show all Categories
                    </a>
                </span>
            </div>

            <form action="{{ route('create-category') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @csrf
                <div class="col-span-1">
                    <label for="category_name" class="block text-lg font-medium text-gray-700">Category Name</label>
                    <input
                        type="text"
                        id="category_name"
                        name="category_name"
                        class="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Enter category name"
                        required
                    >
                </div>

                <div class="col-span-1">
                    <label for="slug" class="block text-lg font-medium text-gray-700">Slug</label>
                    <input
                        type="text"
                        id="slug"
                        name="category_slug"
                        class="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Enter category slug"
                        required
                    >
                </div>

                <div class="col-span-2">
                    <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                    <textarea
                        id="description"
                        name="category_description"
                        rows="4"
                        class="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Enter category description"
                    ></textarea>
                </div>

                <div class="col-span-2 text-right">
                    <button
                        type="submit"
                        class="py-3 px-12 rounded-lg text-lg font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >
                        Create Category
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
