
{{-- use Carbon\Carbon; --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('View Post') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>{{$post->title}}</h2>

                    {{-- <p>Published At: {{date('Y-m-d', strtotime($post->published_at))}}</p> --}}
                    <p>Published At:  {{\Carbon\Carbon::parse($post->published_at)->format('M d Y')}}</p>
                    <br>
                    <div>
                        {{$post->body}}
                    </div>
<table>
    <thead>
    <th class="col">#</th>
    <th class="col">Comment</th>
    <th class="col">Date</th>
    <th class="col">Action</th>
</thead>

<tbody>
    @foreach ($post->comment as $comment)
<tr>
    <td>{{$comment->id}}</td>
    <td>{{$comment->content}}</td>
    <td>{{$comment->commented_at}}</td>
    <td>
        <a href="# class="btn">
            <button type="secondary" action='edit'></button>
        </a>
        <button type="button" class="btn btn-danger" data-bs-toggle=modal data-bs-target="#examplemodal{{$post['id']}}">Delete</button>
    </td>
</tr>
    @endforeach
</tbody>
</table>
                </div class="text-center">
                <a href="# class="mt-4 btn">
                    <button type="success" action='create comment'></button>
                </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
