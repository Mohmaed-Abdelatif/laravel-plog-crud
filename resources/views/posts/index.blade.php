@extends('layouts.app')
@section('title')
    All Posts
@endsection
@section('content')
{{-- {{dd($current_user)}} --}}
    <table class="table table-striped mt-5">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td> <!-- Changed from $post['id'] -->
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->user ? $post->user->name : 'not found' }}</td> <!-- Shows user's name or 'not found' -->
                    <td>
                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-info">View</a>
                        @if ($post->user_id == $current_user)
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                        @endif
                        <form class="d-inline" action="{{ route('post.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
