<div class="sidebar-container">
    <div class="sidebar-sticky">
       <form
            class="sidebar-posts-filter"
            action="{{ route('posts.index') }}" 
            method="get"
        >
            @error('search')
                <p class="sidebar-posts-filter-error">{{ $message }}</p>
            @enderror

            <input 
                type="text"
                id="search" 
                name="search"
                value="{{ old('search', request('search')) }}" 
                placeholder="SEARCH"
            >
            
            {{-- <label for="posts">Show:</label> --}}
            <select name="posts" id="posts">
                <option value="all">all content</option>
                <option value="1" @if (request('posts') == "1") selected @endif>
                    premium content
                </option>
                <option value="0" @if (request('posts') == "0") selected @endif>
                    free content
                </option>
            </select>

            {{-- <label for="author">Author:</label> --}}
            <select name="author" id="author">
                <option value="all">all authors</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->last_name }}" 
                        @if (request('author') == $author->last_name) selected @endif>
                        {{ $author->last_name }}
                    </option>
                @endforeach
            </select>

            {{-- <label for="category">Category:</label> --}}
            <select name="category" id="category">
                <option value="all">all categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                        @if (request('category') == $category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            {{-- <label for="year">Year:</label> --}}
            <select name="year" id="year">
                <option value="all">all years</option>
                @foreach ($yearsAll as $year)
                    <option value="{{ $year }}" 
                        @if (request('year') == $year) selected @endif>
                        {{ $year }}
                    </option>
                @endforeach
            </select>
            <div class="posts-filter-btn-box">
                <button class="form-main-btn posts-filter-btn" type="submit">update</button>
                <a class="form-main-btn posts-filter-btn" href="{{ route('posts.index') }}">reset all</a>
            </div>   
        </form>  
    </div> 
</div>