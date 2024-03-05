@foreach ($posts as $post)    
    <article class="card-container">
        <div class="card-image-container">
            <img src="{{ asset('storage/' . $post->image_card) }}">
        </div>
        <div class="card-text-container">
            <div>
                <div class="card-title">
                    <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                        <h2>{{ $post->title }}</h2>
                    </a>    
                </div>
                <div class="card-body">{{ Str::limit($post->body, 200, ' ') }}
                    <a href="{{ route('posts.show', ['post' => $post->id]) }}">&#91;...&#93;</a>
                </div>
            </div>
            <div>
                <div class="card-name">{{ $post->user->name }}</div>
                <time class="card-datetime">{{ $post->published_at->format('F j, Y') }}</time> 
                <div class="card-category-container">
                    @foreach ($post->categories as $category)
                        <div class="card-category-label">
                            <span>|</span><a href="{{ route('categories.show', 
                            ['category' => $category->id]) }}">{{ $category->name }}</a><span>|</span>
                        </div>
                    @endforeach 
                </div>
                <div class="card-premium"><a href="{{ route('premium.index') }}">test: is_premium {{ $post->is_premium }}</a></div>
            </div>
        </div>
    </article>
@endforeach