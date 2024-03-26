<div class="post-main-container">
    <div  class="post-main-box-center">
        <div class="post-main-box">
            <article class="article-full">
                <div class="article-full-img-container">
                    <img src="{{ asset('storage/' . $post->image_post) }}">
                    {{-- double for background multiply effect --}}
                    <p>{{ $post->title }}</p>
                    <h1>{{ $post->title }}</h1>
                </div>
                <div>
                    <span class="post-name">{{ $post->user->name }}</span> 
                    <span class="post-divider">|</span>
                    <span class="post-datetime">{{ $post->created_at->format('F j, Y') }}</span>
                    @can('update', $post)
                        <span class="post-divider">|</span>
                        <a class="post-edit" href="{{ route('posts.edit', ['post' => $post->id]) }}">edit</a>
                    @endcan
                </div>
                <div class="post-body">{{ $post->body }}</div>
                <a class="post-link-previous" href="{{ url()->previous() }}">&#8594; previous page</a>
            </article>
            
            <div class="post-comment-container">
                <div id="top"></div>
                @auth
                    @include('partials._comment-form')
                @else
                    <p class="post-link-login"><a href="{{ route('login.create') }}">Log in here </a>&nbsp;to leave a comment.</p>
                @endauth
                @foreach ($post->comments as $comment )
                    <div class="post-comment-box">
                        <div>
                            <span class="post-comment-box-name">{{ $comment->user->username }}</span>
                            <span class="post-comment-box-divider">|</span>
                            <span class="post-comment-box-datetime"> {{ $comment->created_at->format('F j, Y \a\t g:i a') }}</span>
                        </div>
                        <div id="{{ $comment->id }}" class="post-comment-box-body">{{ $comment->body }}</div>
                        @auth
                            <a class="post-comment-box-to-top-link" href="#top">&#8593; back to comment form &#8593;</a>
                        @else
                            <a class="post-comment-box-to-top-link" href="#top">&#8593; back to first comment &#8593;</a>
                        @endauth
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <div class="sidebar-container">
        <p 
            class="sidebar-sticky" 
            style="color:var(--main-light); font-size:1.6rem; margin-top:20px;"
        >A Sidebar with Something
        </p>
    </div> 
</div>
