@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header">
            Update Category: {{ $categoty->name }}
        </div>

        <div class="card-body">
            <form action="{{ route('category.update', ['id' => $categoty->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                <input type="text" name="name" value="{{ $categoty->name }}" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update Category
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop