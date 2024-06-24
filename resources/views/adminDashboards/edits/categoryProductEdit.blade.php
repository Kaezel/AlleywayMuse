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
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('categoryproduct.update', ['product_id' => $data->product_id, 'category_id' => $data->category_id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Edit Category Product</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form>
                        <div class="card-body">
                          <div class="form-group">
                              <label for="product_id">Product ID:</label>
                              <input type="text" id="product_id" name="product_id" value="{{ $data->product_id }}" placeholder="Enter Product ID" required>
                              @error('product_id')
                                    <small>{{ $message }}</small>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label for="category_id">Category ID:</label>
                              <input type="text" id="category_id" name="category_id" value="{{ $data->category_id }}" placeholder="Enter Category ID" required>
                              @error('category_id')
                                    <small>{{ $message }}</small>
                              @enderror
                          </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    </div>
                    <!-- /.card -->
                  </div>
                  <!--/.col (left) -->
                </div>
            </form>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>

  </div>

@endsection