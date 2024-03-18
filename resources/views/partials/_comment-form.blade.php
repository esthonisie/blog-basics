<form 
    class="form-comments"
    action="{{ route('comments.store', ['post' => $post->id]) }}" 
    method="post"
>
    @csrf

    <textarea 
        name="body"
        placeholder="Share your thoughts and join the conversation:"
    ></textarea>

    <button
        class="form-main-btn comment-btn" 
        type="submit">COMMENT
    </button>
</form>