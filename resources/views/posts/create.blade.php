@extends('layouts.app')
        @section('content')
    <h1 class="text-center text-3xl font-sans my-8 mx-auto">Create a New Post</h1>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="mx-auto max-w-3xl">
        @csrf
        <div class="mb-4">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required class="w-full">
            @error('title')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="imgSrc">Image:</label>
            <input type="file" id="imgSrc" name="imgSrc" class="w-full">
            @error('imgSrc')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="type">Type:</label>
            <select id="type" name="type" required class="w-full">
                <option value="">Select Type</option>
                <option value="blog">Blog</option>
                <option value="event">Event</option>
                <option value="news">News</option>
            </select>
            @error('type')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="topics">Topics:</label>
            <select id="topics" name="topics[]" class="w-full" multiple>
                @foreach(App\Models\Topic::all() as $topic)
                    <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                @endforeach
            </select>
            @error('topics')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required class="w-full">
            @error('date')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest">Create Post</button>
    </form>
    @endsection
