<div class="sidebar-container">
    <div class="sidebar-sticky">
       <form
            style="color: beige; font-size:1.6rem; margin-top:15px;"
            action="{{ route('posts.index') }}" 
            method="get"
        >
            <label for="posts">Show:</label>
            <br>
            <select name="posts" id="posts">
                <option value="all">all content</option>
                <option value="1" @if (request('posts') == "1") selected @endif>premium content</option>
                <option value="0" @if (request('posts') == "0") selected @endif>free content</option>
            </select>
            <br>

            <br>
            <label for="author">Author:</label>
            <br>
            <select name="author" id="author">
                <option value="all">all authors</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->last_name }}" 
                        @if (request('author') == $author->last_name) selected @endif>
                        {{ $author->last_name }}
                    </option>
                @endforeach
            </select>
            <br>

            <br>
            <label for="category">Category:</label>
            <br>
            <select name="category" id="category">
                <option value="all">all categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                        @if (request('category') == $category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <br>

            <br>
            <button type="submit">update</button>
        </form>
        <br>
        
        {{-- FOR TESTING --}}
        <br>
        <div style="color:bisque; font-size:1.6rem;">
            Your choice:<br>show
            @if (request('posts') == "1")
                all premium
            @elseif (request('posts') == "0")
                all free
            @else all
            @endif posts,<br>with
            @if (!request('author') || request('author') == 'all')
                all authors
            @else author: {{ $authors->where('last_name', request('author'))->first()->name }}
            @endif <br>and 
            @if (!request('category') || request('category') == 'all')
                all categories
            @else category: {{ $categories->where('id', request('category'))->first()->name }}
            @endif
        </div>
    </div> 
</div>