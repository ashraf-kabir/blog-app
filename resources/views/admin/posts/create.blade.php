@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Create a new post
        </div>

        <div class="panel-body">
            <form action="/post/store" method="post">
                {{ csrf_field() }}
                
            </form>
        </div>
    </div>
@stop