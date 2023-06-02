@extends('user.master')
@section('title', 'Posts')
@section('content')

    <div class="col-md-8">
        @foreach ($posts as $post)
            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="post">
                        <img src="{{ asset('storage/post-images/' . $post->image) }}" alt=""
                            class="img-thumbnail w-75 border border-1 border-secondary">
                        <br><br>
                        <h5><strong>{{ $post->title }}</strong></h5>
                        <br>
                        <p>
                            {{ substr($post->content, 0, 40) }}
                        </p>
                        <a href="{{ url('post/' . $post->id . '/details') }}">
                            <button class="btn btn-info">See More <i class="fas fa-angle-double-right"></i> </button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $posts }}
    </div>
    <div class="col-md-4">
        <div class="siderbar">
            <form action="{{ url('search_posts') }}" method="GET">
                @csrf
                <div class="input-group">
                    <input type="text" name="search_data" class="form-control" placeholder="Search here...">
                    <button type="submit" class="btn btn-success">
                        Submit <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
            <hr>
            <h5>Categories</h5>
            <ul>
                @foreach ($categories as $category)
                    <li><a href="{{ url('search_posts_by_category/'.$category->id) }}" class="text-decoration-none">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection
