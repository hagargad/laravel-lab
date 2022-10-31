@props(['comment'])


    <div class="flex bg-light text-dark border border-primary p-4 rounded-xl mt-3">
    <div class="flex-shrink-0 rounded">
        <img src="https://i.pravatar.cc/60" alt="" width="60" height="60" class="rounded-xl">
    </div>

    <div class="form-floating">
        <header>

           <h3 class="font-bold">{{$comment->id}}</h3>
           <time text-xs>{{$comment->commented_at}}</time>
        </header>
        <p>{{$comment->content}} </p>
    </div>

<div class="flex">
    {{--
    <button type="secondary" action='edit' class="btn btn-primary">Edit Comment</button>
    <button type="button" class="btn btn-danger" data-bs-toggle=modal data-bs-target="#examplemodal{{$post['id']}}">Delete</button> --}}
</div>
</div>



