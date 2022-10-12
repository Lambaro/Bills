@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="col-md-4">
            <div class="card bg-light">
                <div class="card-header">
                    <span>Sign Up Form For Using Bill App</span>
                </div>
                <div class="card-body">
                    <form action="{{route('apply.register')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-control">
                            <label class="form-label" for="name">Name</label>
                            <input class="input-group" name="name" id="name" type="text" size="50" maxlength="50" required >

                            <label class="form-label" for="surname">Surname</label>
                            <input class="input-group" name="surname" id="surname" type="text" size="50" maxlength="50" required>
                        </div>
                        <div class="form-control mt-2">
                            <label class="form-label" for="street">Street</label>
                            <input class="input-group" name="street" id="street" type="text" required>

                            <label class="form-label" for="house_num">House Number</label>
                            <input class="input-group" name="house_num" id="house_num" type="text" required>
                        </div>
                        <div class="form-control mt-2">
                            <label class="form-label" for="post_num">Post Number</label>
                            <input class="input-group" name="post_num" id="post_num" type="text" required>

                            <label class="form-label" for="post_city">City</label>
                            <input class="input-group" name="post_city" id="post_city" type="text" required>
                        </div>
                        <div class="form-control mt-2">
                            <label class="form-label" for="iban">IBAN</label>
                            <input class="input-group" name="iban" id="iban" type="text" required> <!--todo tukaj bi lahko dodali za dodajanje drzave in iban checker-->
                        </div>
                        <button type="submit" class="mt-2 btn btn-primary offset-5">Apply</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
