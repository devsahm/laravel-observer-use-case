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

                        <!-- Post Content Column -->
                        <div class="col-lg-12">

                          <!-- Title -->
                          <h1 class="mt-4">{{$post->title}}</h1>

                          <!-- Author -->
                          <p class="lead">
                            by
                            <a href="">{{$post->user->name}}</a>
                            views
                            <a href="#">({{$post->view_count?? '0'}})</a>
                          </p>

                          <hr>

                          <!-- Date/Time -->
                          <p>Posted on {{$post->created_at->format('d  M, Y')}}</p>

                          <hr>

                          <!-- Preview Image -->
                          <img class="img-fluid rounded" src="/images/{{$post->image}}" width="100%" alt="">

                          <hr>
                          <!-- Post Content -->

                          <p>{{$post->body}}</p>

                          <hr>



                        </div>



                      </div>



                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
