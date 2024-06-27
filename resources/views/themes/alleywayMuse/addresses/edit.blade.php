{{-- EDIT ADDRESS USER PAGE --}}

@extends('themes.alleywayMuse.layouts.app')

@section('content')
<section class="breadcrumb-section pb-4 pb-md-4 pt-4 pt-md-4">
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('orders.checkout') }}" class="btn btn-primary">Back</a>
        </div>
        <h2>Edit Address</h2>
        <form action="{{ route('addresses.update', $address->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" value="{{ $address->first_name }}" placeholder="Enter First Name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" value="{{ $address->last_name }}" placeholder="Enter Last Name" required>
            </div>
            <div class="form-group">
                <label for="label">Label</label>
                <input type="text" class="form-control" name="label" value="{{ $address->label }}" placeholder="Enter Label (Example: Home, Office, etc.)" required>
            </div>
            <div class="form-group">
                <label for="address1">Address 1</label>
                <input type="text" class="form-control" name="address1" value="{{ $address->address1 }}" placeholder="Enter Address Label" required>
            </div>
            <div class="form-group">
                <label for="address2">Address 2</label>
                <input type="text" class="form-control" name="address2" value="{{ $address->address2 }}" placeholder="Enter Address Detail" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" value="{{ $address->phone }}" placeholder="Enter Number Phone" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $address->email }}" placeholder="Enter Email" required>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" name="city" value="{{ $address->city }}" placeholder="Enter City" required>
            </div>
            <div class="form-group">
                <label for="province">Province</label>
                <input type="text" class="form-control" name="province" value="{{ $address->province }}" placeholder="Enter Province" required>
            </div>
            <div class="form-group">
                <label for="postcode">Postcode</label>
                <input type="number" class="form-control" name="postcode" value="{{ $address->postcode }}" placeholder="Enter Postcode" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update Address</button>
        </form>
    </div>
</section>
@endsection
