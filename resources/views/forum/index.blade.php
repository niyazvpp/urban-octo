<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    .like-button {
        border: 2px solid blue;
        color: blue;
        background-color: white;
        padding: 10px 15px;
        cursor: pointer;
        transition: all 0.3s;
    }

    .like-button.liked {
        background-color: blue;
        color: white;
        border-color: blue;
    }
</style>

<body>
    <div class="container mt-3">
        <h1>Create new post</h1>

        <div class="row">
            <div class="col-5">
                <form id="form1" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="mb-3">
                        <labe class="form-label">Content</labe>
                        <textarea name="content" rows="3" class="form-control">

                        </textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-select">
                            <option selected disabled>Select a category</option>
                            @foreach ($categories as $id => $category)
                                <option value="{{ encrypt($id) }}">{{ $category }}</option>
                            @endforeach
                        </select>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            @foreach ($posts as $post)
                <div class="col-7">
                    <div class="card" style="">
                        <img class="card-img-top" src="{{ asset('forums/' . $post->image) }}" height="350"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->content }}</p>
                            <p class="card-text">{{ $post->category->name }}</p>
                            <button class="btn like-button {{ $post->whoLiked->isNotEmpty() ? 'liked' : '' }}"
                                data-post-id="{{ encrypt($post->id) }}">
                                <i class="fas fa-thumbs-up"></i> <span
                                    class="btnText">{{ $post->whoLiked->isNotEmpty() ? 'Liked' : 'Like' }}</span>
                                <span class="like-count">{{ $post->likes_count }}</span>
                            </button>
                            <!-- Form for posting a new comment to the post -->
                            <form class="comment-form my-2" method="POST">
                                <textarea name="content" placeholder="Write a comment..." class="form-control mb-2"></textarea>
                                <input type="hidden" name="post_id" value="{{ encrypt($post->id) }}">
                                <button type="submit" class="btn btn-primary">Post Comment</button>
                            </form>

                            <!-- Displaying comments and their replies -->
                            @foreach ($post->comments as $comment)
                                <ul>
                                    <li>
                                        <b>{{ $comment->user->name }}</b> : {{ $comment->content }}

                                        <!-- Reply Form for each comment -->
                                        <button class="btn btn-secondary reply-btn"
                                            data-comment-id="{{ encrypt($comment->id) }}"
                                            data-post-id="{{ encrypt($post->id) }}">Reply</button>

                                        @if ($comment->children)
                                            <ul>
                                                @foreach ($comment->children as $child)
                                                    <li><b>{{ $child->user->name }}</b> : {{ $child->content }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                </ul>
                            @endforeach

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {

        $('.reply-btn').on('click', function() {
            let commentId = $(this).attr('data-comment-id');
            let postId = $(this).attr('data-post-id');
            var replyFormHtml = `
            <form method="POST" class="reply-form">
                <input type="hidden" name="parent_id" value="${commentId}">
                <input type="hidden" name="post_id" value="${postId}">
                <textarea name="content" placeholder="Write a reply..." class="form-control my-2"></textarea>
                <button type="submit" class="btn btn-primary">Post Reply</button>
            </form>
        `;
            $(this).after(replyFormHtml);
        });

        // Handle form submission for reply
        $(document).on('submit', '.reply-form', function(e) {
            e.preventDefault(); // Prevent default form submission

            console.log('Reply form submitted'); // Check if it's being triggered
            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('forum_comment.store') }}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                contentType: false,
                processData: false,
                data: formData,
                success: function(response) {
                    alert('Reply posted successfully!');
                    // Optionally, you can update the page without reloading:
                    // Append the new reply to the comment section, etc.
                    location.reload(); // Reload the page after a successful reply post
                },
                error: function(xhr, status, error) {
                    alert('Failed to post reply. Please try again.');
                }
            });
        });

        $('#form1').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            $.ajax({
                url: "{{ route('forum_post.store') }}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                contentType: false,
                processData: false,
                data: formData,
                success: function(response) {
                    alert('Post created successfully!');
                    $('#form1').trigger('reset');
                },
                error: function(xhr, status, error) {
                    alert('Failed to create post. Please try again.');
                }
            });
        });
        $('.comment-form').submit(function(e) {
            let theForm = $(this);
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                url: "{{ route('forum_comment.store') }}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                contentType: false,
                processData: false,
                data: formData,
                success: function(response) {
                    alert('Comment posted successfully!');
                    theForm.trigger('reset');
                },
                error: function(xhr, status, error) {
                    alert('Failed to post comment. Please try again.');
                }
            })
        });

        $(".like-button").on('click', function(e) {
            const btn = $(this);
            if (btn.hasClass('processing')) return; // Prevent multiple clicks during processing

            const id = btn.attr('data-post-id');
            const likeCountElement = btn.find('.like-count'); // Find the like count span
            let currentLikes = parseInt(likeCountElement.text(), 10);

            // Optimistic UI update
            btn.toggleClass('liked');
            btn.hasClass('liked') ?
                (likeCountElement.text(currentLikes + 1), btn.find('.btnText').text("Liked")) :
                (likeCountElement.text(currentLikes - 1), btn.find('.btnText').text("Like"));

            btn.addClass('processing'); // Add a processing class to prevent multiple requests

            // Send the actual server request
            $.ajax({
                url: "{{ route('forum_like') }}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    postId: id
                },
                success: function(response) {
                    // Optionally update the like count with the server response, if needed
                    likeCountElement.text(response.likes);
                },
                error: function(xhr, status, error) {
                    // Rollback the optimistic UI update in case of failure
                    btn.toggleClass('liked');
                    btn.hasClass('liked') ?
                        likeCountElement.text(currentLikes + 1) :
                        likeCountElement.text(currentLikes - 1);

                    alert('Failed to process your like. Please try again.');
                },
                complete: function() {
                    btn.removeClass('processing'); // Remove the processing class
                }
            });
        });


    });
</script>

</html>
