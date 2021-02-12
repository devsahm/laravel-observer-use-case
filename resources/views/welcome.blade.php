@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Blog') }}</div> --}}

                <div class="card-body">

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Unique IP Address</th>
                          </tr>
                        </thead>
                        <tbody>

                          <tr>
                            @foreach (App\Models\UniqueUser::all() as $item)
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->user_ip}}</td>
                            @endforeach

                          </tr>
                        </tbody>
                      </table>

                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
