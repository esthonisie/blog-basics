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
        type="submit">COMMENT
    </button>
</form>