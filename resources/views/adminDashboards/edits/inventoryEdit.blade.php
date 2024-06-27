{{-- DASHBOARD EDIT INVENTORY PAGE --}}

@extends('layouts.dashboardLayout')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Inventory</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('productinventory.update', $inventory->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Inventory</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="product_id">Product ID</label>
                                    <input type="number" class="form-control" id="product_id" name="product_id" value="{{ $inventory->product_id }}" placeholder="Enter Product ID">
                                </div>
                                <div class="form-group">
                                    <label for="qty">Quantity</label>
                                    <input type="number" class="form-control" id="qty" name="qty" value="{{ $inventory->qty }}" placeholder="Enter Quantity">
                                </div>
                                <div class="form-group">
                                    <label for="low_stock_threshold">Low Stock Threshold</label>
                                    <input type="number" class="form-control" id="low_stock_threshold" name="low_stock_threshold" value="{{ $inventory->low_stock_threshold }}" placeholder="Enter Low Stock Threshold">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
