<div class="sidebar-container">
    <div class="sidebar-sticky">
       <form
            style="color: beige; font-size:1.6rem; margin-top:20px;"
            action="{{ route('posts.index') }}" 
            method="get"
        >
            <input 
                style="width:145px;"
                type="text"
                id="search" 
                name="search"
                value="{{ old('search', request('search')) }}" 
                placeholder="search"
            >
            
            <br>
            @error('search')
                <p class="formError">{{ $message }}</p>
            @enderror
            
            <div style="border:1px solid var(--highlight); width:fit-content; margin-top:10px; padding-bottom:10px">
                <br>
                <label for="posts">Show:</label>
                <br>
                <select name="posts" id="posts">
                    <option value="all">all content</option>
                    <option value="1" @if (request('posts') == "1") selected @endif>
                        premium content
                    </option>
                    <option value="0" @if (request('posts') == "0") selected @endif>
                        free content
                    </option>
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
                <label for="year">Year:</label>
                <br>
                <select name="year" id="year">
                    <option value="all">all years</option>
                    @foreach ($yearsAll as $year)
                        <option value="{{ $year }}" 
                            @if (request('year') == $year) selected @endif>
                            {{ $year }}
                        </option>
                    @endforeach
                </select>
                <br>

                <br>
                <button type="submit">update</button>
            </div>
        </form>
        <br>
        <a href="{{ route('posts.index') }}" style="font-size: 1.6rem;">reset all</a>
    </div> 
</div>