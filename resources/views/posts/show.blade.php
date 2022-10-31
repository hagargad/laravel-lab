
{{-- use Carbon\Carbon; --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('View Post') }}</div>

                <div class="card-body">
                    {{-- @if (session('status')) --}}
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    {{-- @endif --}}
                    <img src="{{ asset($post -> file_path) }}" width="300" height="300"/>
                    <h2>{{$post->title}}</h2>

                    {{-- <p>Published At: {{date('Y-m-d', strtotime($post->published_at))}}</p> --}}
                    <p>Published At:  {{\Carbon\Carbon::parse($post->published_at)->format('M d Y')}}</p>
                    <br>
                    <div>
                        {{$post->body}}
                    </div>
                   <h3 class="mt-3">Discussion Area</h3>

                    <section class="col-span-8 col-start-5 mt-10 space-y-6">
                        @foreach ($post->comments as $comment)
                         <x-comment :comment="$comment"/>
                         @endforeach
                    </section>


                </div class="text-center">
                <section class="col-span-8 col-start-5 mt-10 space-y-6">

                    {{-- {{ route('posts.comments.storeComment') }} --}}
                    @auth


                <form action="{{ route('posts.comments.storeComment') }}" method="POST"  class="border border-gray-200 p-6 rounded-xl">
                    @csrf
                    {{-- @method('PUT') --}}
                    <div class="form-floating mt-5">
                        <textarea class="form-control" placeholder="Leave a comment here" name="content"></textarea>
                        <label for="floatingTextarea">Comments</label>
                      </div>


                    <button type="submit" class="btn btn-primary mt-3" onclick="location.href='{{'submit'}}'">Submit</button>


                </form>
                @else
               <p class="font-semibold">
                <a href="/login" class="hover:underline">Login to comment</a>
               </p>
                @endauth
            </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
