@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            Categories
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <caption>List of categories</caption>
                <thead class="thead-dark">
                    <tr>
                        <th>
                            Category Name
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
                    @if ($categories->count() > 0)
                        @foreach($categories as $category)
                        <tr>
                            <td>
                                {{ $category->name }}
                            </td>
                            <td>
                                <a href="{{ route('category.edit', ['id' => $category->id ]) }}" class="btn btn-primary btn-sm" role="button">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('category.delete', ['id' => $category->id ]) }}" class="btn btn-danger btn-sm" role="button">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center">No categories yet</th>
                        </tr>
                    @endif
                    
                </tbody>
            </table>
        </div>
    </div>
    
@stop