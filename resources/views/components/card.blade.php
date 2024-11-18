<article class="card">
    <div class="card__image">
        <img src="{{ asset($post->imgSrc) }}" alt="{{ $post->title }}" />
        @if($post->author == Auth::id())
            <div class="card__edit_buttons">
                <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
            </div>
        @endif
    </div>
    <div class="card__type">{{ $post->type }}</div>
    <h2 class="card__title">{{ $post->title }}</h2>
    @if($post->topics && $post->topics->isNotEmpty())
        <p class="card__topics">Topics: 
            <span class="card__topics-list">
            @foreach ($post->topics as $topic)
                <a href="#" class="card__topic-list">{{ $topic->name }}</a>{{ !$loop->last ? ', ' : '' }}
            @endforeach
            </span>
        </p>
    @endif
    <p class="card__author">{{ $post->user->name }}</p>
    <p class="card__date">{{ $post->date->format('jS F Y') }}</p>
</article>