@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            Trashed Posts
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <caption>List of trashed posts</caption>
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
                            Restore
                        </th>
                        <th>
                            Destroy
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
                                Edit
                            </td>
                            <td>
                                <a href="{{ route('post.restore', ['id' => $post->id]) }}" class="btn btn-success btn-sm">Restore</a>
                            </td>
                            <td>
                                <a href="{{ route('post.kill', ['id' => $post->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center">No trashed post</th>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>
    
@stop