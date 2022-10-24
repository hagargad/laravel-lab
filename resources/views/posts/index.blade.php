@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-12">
                <a href="{{route('posts.create')}}" class="btn btn-primary mb-2">Create Post</a>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>post creator</th>
                            <th>Created at</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            @if($post->user)
                            <td>{{$post->user->name}}</td>
                            @else
                             <td>Not Defined</td>
                             @endif
                            <td>{{ date('Y-m-d', strtotime($post->created_at)) }}</td>
                            <td>
                            <a href="{{ route('posts.show', $post->id)}}" class="btn btn-primary">Show</a>
                            <a href="{{ route('posts.edit', $post->id)}}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id)}}" method="post" class="d-inline">

                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $posts->links() !!}
                    {{-- $posts->appends(['sort' => 'post'])->links() --}}
                </div>
            </div>
    </div>
</div>
@endsection
