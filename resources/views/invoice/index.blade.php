@extends('layouts.main')

@section('content')

    <div class="container">
        <div class=" row justify-content-center">
            <div class="col-md-8">
                    <a href="{{route('invoice.index',\App\Enums\Invoice\InvoiceState::UNPAID)}}"><span class="badge bg-warning text-dark">{{ __('Unpaid') }}</span></a>
                    <a href="{{route('invoice.index',\App\Enums\Invoice\InvoiceState::PAID)}}"><span class="badge bg-success text-dark">{{ __('Paid') }}</span></a>
                <div class="card">
                    <div class="card-header text-">Welcome</div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices as $inv)
                                <tr>
                                    <td>{{ $inv->amount / 100 }}</td>
                                    <td>{{ $inv->user_id }}</td>
                                    <td>{{$inv->reciever_id}}</td>
                                    @if($inv->status == \App\Enums\Invoice\InvoiceState::UNPAID)
                                        <td><span class="badge bg-warning text-dark">{{ __('Unpaid') }}</span></td>
                                    @elseif($inv->status == \App\Enums\Invoice\InvoiceState::PAID)
                                        <td><span class="badge bg-success text-dark">{{ __('Paid') }}</span></td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{--{{$invoices->links()}}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
