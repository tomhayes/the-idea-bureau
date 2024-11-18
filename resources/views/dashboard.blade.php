@extends('layouts.app')
@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center mt-8">
        {{ __('Dashboard - Your Posts') }}
    </h2>

    @if($posts->isEmpty())
        <p class="mt-4 text-gray-600">{{ __('You have no posts.') }}</p>
    @else
    <main class="cards-wrapper">
        @foreach ($posts as $post)
            @include('components.card', ['post' => $post])
        @endforeach
    </main>
    @endif

@endsection