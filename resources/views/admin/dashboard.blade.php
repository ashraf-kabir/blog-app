@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="card text-white bg-success">
                <div class="card-header text-center">Published Posts</div>
                <div class="card-body text-center">
                    <h2>{{ $posts_count }}</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-white bg-danger">
                <div class="card-header text-center">Trashed Posts</div>
                <div class="card-body text-center">
                    <h2>{{ $trashed_count }}</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-white bg-success">
                <div class="card-header text-center">Active Users</div>
                <div class="card-body text-center">
                    <h2>{{ $users_count }}</h2>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-3">
            <div class="card text-white bg-info">
                <div class="card-header text-center">Categories</div>
                <div class="card-body text-center">
                    <h2>{{ $categories_count }}</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card text-white bg-info">
                <div class="card-header text-center">Tags</div>
                <div class="card-body text-center">
                    <h2>{{ $tags_count }}</h2>
                </div>
            </div>
        </div>
    </div>
    
@endsection
