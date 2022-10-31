@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Post') }}</div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" >
                        @csrf

                        <div class="form-group">
                            <label for="">Post Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Post Body</label>
                            <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Post Creator</label>
                            <select name="post_creator" class="form-control">
                              @foreach ($allUsers as $user)
                                <option value="{{$user->id}}">{{ $user->name }}</option>
                              @endforeach
                            </select>
                          </div>
                        <div class="form-group">
                            <label for="">Publish At</label>
                            <input type="date" name="published_at" class="form-control">
                        </div>
                        <!--display image-->
                        <div>
                            <h1 class="text-center" style="margin-top: 100px">Image Upload</h1>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <strong>{{$message}}</strong>
                                </div>

                                <img src="{{ asset('images/'.Session::get('image')) }}" />
                            @endif

                        </div>
                        <div class="form-group">


                                <input type="file" class="form-control" name="image" />


                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
