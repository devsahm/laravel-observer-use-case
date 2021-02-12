@extends('layouts.app')
@section('content')
@push('head')
<style>
    .img {
         width: 444px;
         height: 300px;
         background-position: 50% 50%;
         background-repeat: no-repeat;
         background-size: cover;
      }
</style>

@endpush
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Blog') }}</div> --}}

                <div class="card-body">
                    <div class="row">

                        <!-- Blog Entries Column -->
                        <div class="col-md-8">

                          <h1 class="my-4">{{auth()->user()->name}} Posts

                          </h1>
                          @forelse ($posts as $post)
                          <div class="card mb-4">
                            {{-- <img class="card-img-top" src="" alt="Card image cap"> --}}
                            <div class="card-img-top img" style="background: url('/images/{{$post->image}}')"></div>
                            <div class="card-body">
                              <h2 class="card-title">{{$post->title}}</h2>
                              <p class="card-text">{{Str::limit($post->body, 100)}}</p>
                              <a href="/post/{{$post->slug}}" class="btn btn-primary">Read More &rarr;</a>
                            </div>
                            <div class="card-footer text-muted">
                                Posted on {{$post->created_at->format('d M, Y')}} Views ({{$post->view_count}})

                            </div>
                          </div>
                          @empty
                          <p class="alert alert-info">No record was found</p>
                          @endforelse
                          <!-- Blog Post -->



                          <!-- Pagination -->
                          <ul class="pagination justify-content-center mb-4">
                            <li class="page-item">
                             {{$posts->links()}}
                            </li>

                          </ul>

                        </div>

                        <!-- Sidebar Widgets Column -->
                        <div class="col-md-4">

                          <!-- Search Widget -->
                          <div class="card my-4">
                            <h5 class="card-header">Search</h5>
                            <div class="card-body">
                              <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-append">
                                  <button class="btn btn-secondary" type="button">Go!</button>
                                </span>
                              </div>
                            </div>
                          </div>





                        </div>

                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
