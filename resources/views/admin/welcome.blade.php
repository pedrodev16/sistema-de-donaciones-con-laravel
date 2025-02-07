@extends('layout.app')
@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold text-center mt-8">Welcome to Admin Panel</h1>
        <div class="grid grid-cols-3 gap-4 mt-8">
            <div class="bg-white p-4 shadow-md rounded-md">
                <h2 class="text-xl font-bold">Users</h2>
                <p class="text-gray-500">Total Users: 10</p>
            </div>
            <div class="bg-white p-4 shadow-md rounded-md">
                <h2 class="text-xl font-bold">Posts</h2>
                <p class="text-gray-500">Total Posts: 20</p>
            </div>
            <div class="bg-white p-4 shadow-md rounded-md">
                <h2 class="text-xl font-bold">Comments</h2>
                <p class="text-gray-500">Total Comments: 30</p>
            </div>
        </div>
    </div>
@endsection
