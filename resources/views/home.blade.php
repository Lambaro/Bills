@extends('layouts.main')

@section('content')
    @auth
        <div class="container">
            <div class=" row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-">Welcome {{ Auth::user()->name }}</div>
                        <div class="card-body">
                            <div>
                            <span class="fw-bold">Welcome to our amazing websites for making bills</span>
                            </div>
                            <div>
                                BLA BLA BLA BLA
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
    @if(session()->has('message'))
        <div class="container mt-5">
            <div align="center" class="card bg-black">
                <p class="text-success">
                    {{ session()->get('message') }}
                </p>
            </div>
        </div>
    @endif
@endsection
