@extends('layouts.app')
        @section('content')
        <div class="min-h-20 flex items-center justify-center">
            @if(session('success'))
                <div id="success-message" class="alert alert-success text-center mt-8 text-xl">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <main class="cards-wrapper">
            @foreach ($posts as $post)
                @include('components.card', ['post' => $post])
            @endforeach
        </main>
    @endsection

