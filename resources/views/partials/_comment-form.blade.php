<form 
    class="form-basic"
    action="{{ route('comments.store', ['post' => $post->id]) }}" 
    method="post"
>
    @csrf

    <label for="comment">Share your thoughts and join the conversation:</label>
    <br>
    <textarea 
        name="body" 
        id="comment"
    ></textarea>
    <br>

    @error('body')
        <p class="formError">{{ $message }}</p>
    @enderror
    
    <button 
        type="submit">Comment
    </button>
</form>