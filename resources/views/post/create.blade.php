@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="card-body">
                    <div class="row">

                        <!-- Blog Entries Column -->
                        <div class="col-md-12">

                          <h1 class="my-4">Create Post

                          </h1>
                          @include('alerts.success')
                          @include('alerts.error')
                          <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <label for="title">Post Title</label>
                              <input type="text" class="form-control" name="title"  placeholder="Title">
                              @error('title')
                              <span style="color: red;">{{$message}}</span>
                              @enderror
                            </div>
                            {{-- <div class="form-group">
                              <label for="exampleInputPassword1">Category</label>
                              <input type="text" class="form-control"  placeholder="Password">
                            </div> --}}

                            <div class="form-group">
                                <label for="exampleInputPassword1">Body</label>
                                <textarea name="body"  class="form-control" cols="10" rows="4"></textarea>
                                @error('body')
                                    <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Image</label>
                                <input type="file" name="image" class="form-control">
                                @error('image')
                                <span style="color: red;">{{$message}}</span>
                            @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>

                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
