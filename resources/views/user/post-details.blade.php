@extends('user.master')
@section('title', 'Post Details')
@section('content')
    <div class="col-md-12 post-details">
        <img src="{{ asset('storage/post-images/' . $post->image) }}" alt=""
            class="img-fluid w-25 border border-1 border-secondary">
        <br><br>
        <small>
            <strong>
                <i class="fa fa-calendar" aria-hidden="true"></i>
                Posted On:
            </strong>
            {{ date('d-M-Y', strtotime($post->created_at)) }}
        </small>
        <br>
        <small>
            <strong>
                <i class="fa fa-list"></i> Category:
            </strong>
            {{ $post->category->name }}
        </small>
        <br><br>
        <h5><strong>{{ $post->title }}</strong></h5>
        <p style="text-align: justify;">
            {{ $post->content }}
        </p>
        <div>
            <form method="post">
                @csrf

                <div>
                    <span>{{ $likes->count() }} Likes</span>
                    <span>{{ $dislikes->count() }} Dislikes</span>
                    <span>{{ count($comments) }} Comments</span>
                </div>

                <button type="submit" formaction="{{ url('post/like/' . $post->id) }}" class="btn btn-sm btn-success"
                    @if ($likeStatus && $likeStatus->type === 'like') disabled @endif>
                    <i class="far fa-thumbs-up"></i> Like
                </button>
                <button type="submit" formaction="{{ url('post/dislike/' . $post->id) }}" class="btn btn-sm btn-danger"
                    @if ($likeStatus && $likeStatus->type === 'dislike') disabled @endif>
                    <i class="far fa-thumbs-down"></i> Dislike
                </button>
                <button type="button" class="btn btn-sm btn-info comment" data-bs-toggle="collapse"
                    data-bs-target="#collapseExample">
                    <i class="far fa-comment"></i> Comment
                </button>
            </form>
        </div>

        <div class="comment-form mt-3">
            <div class="collapse" id="collapseExample">
                <form action="{{ url('post/comment/' . $post->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control w-25 @error('text') is-invalid @enderror" name="text" id="text" cols="30"
                            rows="3" placeholder="Enter comment" required></textarea>
                        <br>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="far fa-paper-plane"></i> Submit
                        </button>
                    </div>
                </form>
                <br>
                @foreach ($comments as $comment)
                    <div class="comment-show mb-2">
                        <img src="{{ asset('images/yms.jpg') }}" alt="" width="30px"> {{ $comment->user->name }}
                        <div class=" comment-box mt-2">
                            {{ $comment->text }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
