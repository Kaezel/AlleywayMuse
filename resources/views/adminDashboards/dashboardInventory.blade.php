@extends('layouts.dashboardLayout')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product Inventories</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <a href="{{ route('productinventory.create') }}" class="btn btn-primary mb-3">Add Product Inventory</a>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Product Inventory Table</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Product ID</th>
                                <th>Qty</th>
                                <th>Low Stock Threshold</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventories as $inventory)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $inventory->product_id }}</td>
                                    <td>{{ $inventory->qty }}</td>
                                    <td>{{ $inventory->low_stock_threshold }}</td>
                                    <td>
                                        <a href="{{ route('productinventory.edit', $inventory->id) }}" class="btn btn-primary">Edit</a>
                                        <a data-toggle="modal" data-target="#modal-hapus{{ $inventory->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                                    </td>
                                    </tr>
                                    <div class="modal fade" id="modal-hapus{{ $inventory->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Confirmation Delete Data</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are u sure want to delete inventory product data: Product id: <b>{{ $inventory->product_id }}</b></p>
                                        </div>
                                        <div class="modal-footer justify-content-end">
                                            <form action="{{ route('productinventory.delete', ['id' => $inventory->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                            <button type="submit" class="btn btn-primary">Yes, Delete</button>
                                            </form>
                                        </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                    </div>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
