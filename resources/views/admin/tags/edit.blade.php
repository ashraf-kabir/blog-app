@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

    <div class="card">
        <div class="card-header">
            Edit tag: {{ $tag->tag }}
        </div>

        <div class="card-body">
            <form action="{{ route('tag.update', ['id' => $tag->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Tag</label>
                    <input type="text" name="tag" value="{{ $tag->tag }}" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update Tag
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop