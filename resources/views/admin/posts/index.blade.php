@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            Published posts
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <caption>List of posts</caption>
                <thead class="thead-dark">
                    <tr>
                        <th>
                            Image
                        </th>
                        <th>
                            Title
                        </th>
                        <th>
                            Edit
                        </th>
                        <th>
                            Trash
                        </th>
                    </tr>
                </thead>
        
                <tbody>
                    @if ($posts->count() > 0)
                        @foreach($posts as $post)
                            <tr>
                                <td>
                                    <img src="{{ $post->featured }}" alt="{{ $post->title }}" width="70" height="35">
                                </td>
                                <td>
                                    {{ $post->title }}
                                </td>
                                <td>
                                    <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                                <td>
                                    <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-danger btn-sm">Trash</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center">No posts found</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    
@stop