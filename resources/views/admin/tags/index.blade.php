@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            Tags
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <caption>List of tags</caption>
                <thead class="thead-dark">
                    <tr>
                        <th>
                            Tag Name
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
                    @if ($tags->count() > 0)
                        @foreach($tags as $tag)
                        <tr>
                            <td>
                                {{ $tag->tag }}
                            </td>
                            <td>
                                <a href="{{ route('tag.edit', ['id' => $tag->id ]) }}" class="btn btn-primary btn-sm" role="button">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('tag.delete', ['id' => $tag->id ]) }}" class="btn btn-danger btn-sm" role="button">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center">No tags yet</th>
                        </tr>
                    @endif
                    
                </tbody>
            </table>
        </div>
    </div>
    
@stop