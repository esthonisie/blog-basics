<form class="formCreate" action="{{ route('comments.store', ['post' => $post->id]) }}" method="post">
    @csrf

    <label for="comment">Share your thoughts and join the conversation:</label>
    <br>
    <textarea name="body" id="comment"></textarea>
    <br>
    
    <input type="hidden" name="user_id" value="4">
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <input type="hidden" name="published_at" value="{{ $current }}">

    <button class="btnForm" type="submit">Comment</button>
</form>