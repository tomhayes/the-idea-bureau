@extends('layouts.app')

@section('content')
    <h1 class="text-center text-3xl font-sans my-8 mx-auto">Edit Post</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="mx-auto max-w-3xl">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ $post->title }}" required class="w-full">
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
                <option value="blog" {{ $post->type == 'blog' ? 'selected' : '' }}>Blog</option>
                <option value="event" {{ $post->type == 'event' ? 'selected' : '' }}>Event</option>
                <option value="news" {{ $post->type == 'news' ? 'selected' : '' }}>News</option>
            </select>
            @error('type')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="topics">Topics:</label>

            <select id="topics" name="topics[]" class="w-full" multiple>
                @foreach(App\Models\Topic::all() as $topic)
                    <option value="{{ $topic->id }}" {{ in_array($topic->name, $post->topics->pluck('name')->toArray() ?? []) ? 'selected' : '' }}>{{ $topic->name }}</option>
                @endforeach
            </select>
            @error('topics')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="{{ $post->date->format('Y-m-d') }}" required class="w-full">
            @error('date')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest">Update Post</button>
    </form>
@endsection