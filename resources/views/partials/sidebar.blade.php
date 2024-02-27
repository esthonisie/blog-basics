<div class="sidebar-container">
    <div class="category-container">
        @foreach ($categories as $category)
            <div class="category-label">
                <span>|</span><a href="
                    {{ route('categories.show', ['category' => $category->id]) }}
                ">{{ $category->name }}</a><span>|</span>
            </div>
        @endforeach 
    </div>
</div>