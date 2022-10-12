@extends('layouts.main')


@section('content')

    <div class="container">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Add New Bill
                </div>
                <div class="card-body">
                    <form action="{{route('bills.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="border border-1 border-danger">
                            <span class="text-danger">Name of Payer:</span>
                            <div class="input-group-sm">
                                <label class="form-label" for="name">Name</label>
                                <input class="form-text" type="text" name="name" id="name">
                                <label class="form-label ms-3" for="surname">Surname</label>
                                <input class="form-text" type="text" name="surname" id="surname">
                            </div>
                            <div class="input-group-sm">
                                <label class="form-label" for="address">Address</label>
                                <input class="form-text" type="text" name="address" id="address">
                                <label class="form-label ms-3" for="post_address">Post Address</label>
                                <input class="form-text" type="text" name="post_address" id="post_address">
                            </div>
                        </div>
                        <!--Bill purpose and payment date-->
                        <div class="border border-1 border-danger  mt-4">
                            <span class="text-danger">Purpose and due date</span>
                            <div class="input-group-sm">
                                <textarea name="purpose" id="purpose" placeholder="Purpose" cols="30" rows="5"></textarea>
                            </div>
                            <div class="input-group-sm">
                                <label class="form-label" for="due_date">Due Date</label>
                                <input class="form-text" type="date" name="due_date" id="due_date">
                            </div>
                        </div>
                        <div class="border border-1 border-danger  mt-4">
                            <span class="text-danger">Price </span>
                            <div class="input-group-sm">
                                <label class="form-label" for="price">EUR</label>
                                <input class="form-text" type="text" name="price" id="price">
                            </div>
                        </div>
                        <div class="border border-1 border-danger  mt-4">
                            <span class="text-danger">Receiver Iban </span>
                            <div class="input-group-sm">
                                <label class="form-label" for="receiver_iban">IBAN</label>
                                <input class="form-text" type="text" name="receiver_iban" id="receiver_iban">
                            </div>
                        </div>
                        <div class="border border-1 border-danger mt-4">
                            <span class="text-danger">Name of receiver:</span>
                            <div class="row-cols-5">
                                <div class="input-group-sm">
                                    <label class="form-label" for="receiver_name">Name/Company name</label>
                                    <input class="form-text" type="text" name="receiver_name" id="receiver_name">

                                    <label class="form-label" for="receiver_address">Address</label>
                                    <input class="form-text" type="text" name="receiver_address" id="receiver_address">

                                    <label class="form-label ms-3" for="receiver_post_address">Post Address</label>
                                    <input class="form-text" type="text" name="receiver_post_address" id="receiver_post_address">
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="mt-2 btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
