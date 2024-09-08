<?php
if (!isset($categories)) {
    return;
}
?>
@extends('Admin.Layouts.Dashboard')
@section('page-title', 'All Categories')
@section('body-content')
    <div class="store-all-categories flex items-center justify-center bg-gradient-to-r from-gray-100 to-indigo-100 p-10">
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

            <div class="flex justify-between items-center">
                <h2 class="text-4xl font-bold mb-8 text-center text-gray-800">All Categories</h2>
                <span class="flex justify-center items-center">
                    <a href="{{route('create-category')}}" class="py-3 px-2 rounded-lg text-s font-semibold text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                        Create a category
                    </a>
                </span>
            </div>


            @if(!empty($categories) && count($categories) > 0)
                <table class="min-w-full bg-white">
                    <thead>
                    <tr class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Category Name</th>
                        <th class="py-3 px-6 text-left">Slug</th>
                        <th class="py-3 px-6 text-left">Description</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($categories as $category)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">{{ $category->category_name }}</td>
                            <td class="py-3 px-6 text-left">{{ $category->category_slug }}</td>
                            <td class="py-3 px-6 text-left">{{ Str::limit($category->category_description, 50) }}</td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <!-- Edit Button -->
                                    <a href="{{ route('show-category',$category->id) }}" class="text-blue-500 hover:text-blue-600 mr-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#fde047">
                                            <path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/>
                                        </svg>
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{route('delete-category', $category->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center text-gray-500 py-10">
                    <h3 class="text-2xl font-semibold">No categories found</h3>
                </div>
            @endif
        </div>
    </div>
@endsection
