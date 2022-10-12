@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="col-md-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <span>My Bills</span>
                </div>
                <div class="card-body mt-4">
                    <table class="table table-bordered table-responsive table-hover table-striped">
                        <thead>
                        <tr>
                            <th class="text-primary">Name</th>
                            <th class="text-primary">Address</th>
                            <th class="text-primary">Due date</th>
                            <th class="text-primary">Invoice ID</th>
                            <th class="text-primary">update and delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bills as $bill)
                            <tr>
                                <th>{{$bill->name}}</th>
                                <th>{{$bill->address}}</th>
                                <th>{{$bill->due_date}}</th>
                                <th>{{$bill->invoice_id}}</th>
                                <th class="text-center"><a href="{{route('bills.edit',$bill->invoice_id)}}"><i class="fas fa-pen-alt  text-warning"></i></a></th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

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
