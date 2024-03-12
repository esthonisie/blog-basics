@foreach ($posts as $post)    
    <article class="card-container">
        <div class="card-image-container">
            @if ($post->is_premium === 1)
                <div class="card-premium">premium</div>
            @endif
            <img src="{{ asset('storage/' . $post->image_card) }}">
        </div>
        <div class="card-text-container">
            <div>
                @if ($post->is_premium !== 1)
                    <div class="card-title">
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                            <h2>{{ $post->title }}</h2>
                        </a>    
                    </div>
                    <div class="card-body">{{ Str::limit($post->body, 200, ' ') }}
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}">&#91;...&#93;</a>
                    </div>
                @else
                    @if (in_array(auth()->user()?->role_id, [1, 2, 3]))
                        <div class="card-title">
                            <a href="{{ route('premium.show', ['post' => $post->id]) }}">
                                <h2>{{ $post->title }}</h2>
                            </a>    
                        </div>
                        <div class="card-body">{{ Str::limit($post->body, 200, ' ') }}
                            <a href="{{ route('premium.show', ['post' => $post->id]) }}">&#91;...&#93;</a>
                        </div>
                    @else
                        <div class="card-title">
                            <a onclick="return confirm('Hello reader, please log in or register as Premium member.')">
                                <h2>{{ $post->title }}</h2>
                            </a>    
                        </div>
                        <div class="card-body">{{ Str::limit($post->body, 200, ' ') }}
                            <a onclick="return confirm('Hello reader, please log in or register as Premium member.')">&#91;...&#93;</a>
                        </div> 
                    @endif
                @endif
            </div>
            <div>
                <div class="card-name">{{ $post->user->name }}</div>
                <time class="card-datetime">{{ $post->created_at->format('F j, Y') }}</time> 
                <div class="card-category-container">
                    @foreach ($post->categories as $category)
                        <div class="card-category-label">
                            <span>|</span><a href="/posts?category={{ $category->id }}">{{ $category->name }}</a><span>|</span>
                        </div>
                    @endforeach 
                </div>
            </div>
        </div>
    </article>
@endforeach