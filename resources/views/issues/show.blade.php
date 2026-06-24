@extends('layouts.app')

@section('content')

<h2>
    {{ $issue->title }}
</h2>

<h4>Tags</h4>

<div id="tags">

@foreach($issue->tags as $tag)

<span class="badge bg-primary">
    {{ $tag->name }}
</span>

@endforeach

</div>

<select id="tag-select">

@foreach($allTags as $tag)

<option value="{{ $tag->id }}">
    {{ $tag->name }}
</option>

@endforeach

</select>

<button
    id="attach-tag"
    class="btn btn-sm btn-success">

    Attach
</button>

<hr>

<h4>Comments</h4>

<div id="comments"></div>

<form id="comment-form">

<input
    type="text"
    name="author_name"
    class="form-control mb-2">

<textarea
    name="body"
    class="form-control mb-2">
</textarea>

<button
    class="btn btn-primary">

    Add Comment
</button>

</form>

<script>

const issueId = {{ $issue->id }};

const token = document.querySelector('meta[name="csrf-token"]').content;

function loadComments()
{
    $.get('/issues/' + issueId + '/comments',
        function(response){
            $('#comments').html('');

            response.data.forEach(function(comment){
                $('#comments').append(`
                    <div class="card mb-2">
                        <div class="card-body">
                            <strong>${comment.author_name}</strong>
                            <p>${comment.body}</p>
                        </div>
                    </div>
                `);
            });
        }
    );
}

loadComments();

$('#attach-tag').click(function(){

    $.post('/issues/' + issueId + '/tags',
        {
            _token: token,
            tag_id: $('#tag-select').val()
        },
        function(){
            location.reload();
        }
    );
});

$('#comment-form').submit(function(e){

    e.preventDefault();

    $.post('/issues/' + issueId + '/comments',
        $(this).serialize(),
        function(comment){

            $('#comments').prepend(`
                <div class="card mb-2">
                    <div class="card-body">
                        <strong>
                            ${comment.author_name}
                        </strong>

                        <p>
                            ${comment.body}
                        </p>
                    </div>
                </div>
            `);

            $('#comment-form')[0].reset();
        }
    );
});

</script>

@endsection