{{-- DASHBOARD CATEGORY PRODUCT PAGE --}}

@extends('layouts.dashboardLayout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category Product</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <a href="{{  route('categoryproduct.create') }}" class="btn btn-primary mb-3">Add Data</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category Product Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Product ID</th>
                      <th>Category ID</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ( $data as $d)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $d->product_id }}</td>
                      <td>{{ $d->category_id }}</td>
                      <td>
                        <a href="{{ route('categoryproduct.edit', ['product_id' => $d->product_id, 'category_id' => $d->category_id]) }}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                        <a data-toggle="modal" data-target="#modal-hapus{{ $d->product_id }}{{ $d->category_id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                      </td>
                    </tr>
                    <div class="modal fade" id="modal-hapus{{ $d->product_id }}{{ $d->category_id }}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Confirmation Delete Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Are u sure want to delete category product data: <b>Product id: {{ $d->product_id }} | Category id: {{ $d->category_id }}</b></p>
                          </div>
                          <div class="modal-footer justify-content-end">
                            <form action="{{ route('categoryproduct.delete', ['product_id' => $d->product_id, 'category_id' => $d->category_id]) }}" method="POST">
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
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection