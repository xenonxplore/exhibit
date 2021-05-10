@extends('layouts.main')
@section('content')
<body>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{$error}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endforeach
    @endif

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div id="podcasts" class="techynaf-testiominal mb-4">
        <a href="{{route('podcast.index')}}" class="btn btn-primary" type="submit">See Other Medias</a>
        <h3 class="pl-4">Add a new podcast</h3>
        <form method="post" action="{{route('podcast.update', ['podcast' => $podcast->id])}}">
            @csrf
            <div class="container-fluid">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input value="{{$podcast->title}}" name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="add a title of your podcast">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Category</label>
                    <select name="category_id" class="form-select" aria-label="Default select example">
                        @foreach($categories as $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Description</label>
                    <input  value="{{$podcast->description}}" name="description" type="text" class="form-control" id="exampleFormControlInput1" placeholder="add one online description of the podcast">
                </div>  
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">URL</label>
                    <input  value="{{$podcast->url}}" name="url" type="text" class="form-control" id="exampleFormControlInput1" placeholder="add a URL that gets opened in a new tab when View Other Media button is clicked">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Created At</label>
                    <input  value="{{$podcast->created_at}}" name="created_at" value="" type="date" class="form-control" id="exampleFormControlInput1" placeholder="Showing today's date by default, change to any past date if required">
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{route('podcast.delete', ['podcast' => $podcast->id])}}" class="btn btn-danger">Delete</a>
            </div>
        </form>
    </div>

    @include('sections.footer')
@endsection
<script>
    $('.alert').alert()
</script>