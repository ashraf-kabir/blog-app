@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <caption>List of users</caption>
                <thead class="thead-dark">
                    <tr>
                        <th>
                            Image
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Permissions
                        </th>
                        <th>
                            Delete
                        </th>
                    </tr>
                </thead>
        
                <tbody>
                    @if ($users->count() > 0)
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <img src="{{ asset($user->profile->avatar) }}" alt="" width="40" height="40" style="border-radius: 50%;">
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    @if ($user->admin)
                                    <a href="{{ route('user.not.admin', ['id' => $user->id]) }}" class="btn btn-sm btn-danger">Remove Permissions</a>
                                    @else
                                        <a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-sm btn-success">Make Admin</a>
                                    @endif
                                </td>
                                <td>
                                    @if (Auth::id() !== $user->id)
                                    <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                                    @else
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center">No users found</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    
@stop