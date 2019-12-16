@extends('layouts.app')

@section('content')

    <div class="card">
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
                            Delete
                        </th>
                    </tr>
                </thead>
        
                <tbody>
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
                                <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-danger btn-sm">Trash</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@stop