{{-- DASHBOARD EDIT PRODUCT PAGE --}}

@extends('layouts.dashboardLayout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Product</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('product.update', ['id' => $products->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Product</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form>
                                    <div class="card-body">
                                        @if ($products->featured_image)
                                            <img src="{{ asset('themes/alleywayMuse/assets/img/' . $products->featured_image) }}" width="100"
                                                height="100px" alt="">
                                        @endif
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Photo</label>
                                            <input type="file" class="form-control" id="photo"
                                                name="photo">
                                            <small>Upload photo if want to change it</small><br>
                                            <small>Supported file extension: jpeg/jpg, png, gif, svg</small>
                                            @error('photo')
                                                <br>
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Product Name</label>
                                            <input type="text" name="name" class="form-control"
                                                    id="name" value="{{ $products->name ?? '' }}"
                                                    placeholder="Enter Product Name">
                                            @error('name')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Product Slug</label>
                                            <input type="text" name="slug" class="form-control"
                                                    id="slug" value="{{ $products->slug ?? '' }}"
                                                    placeholder="Enter Product Slug">
                                            @error('slug')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="number" step="0.01" name="price" class="form-control"
                                                    id="price" value="{{ $products->price ?? '' }}"
                                                    placeholder="Enter Price">
                                            @error('price')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="sale_price">Sale Price</label>
                                            <input type="number" step="0.01" name="sale_price" class="form-control"
                                                    id="sale_price" value="{{ $products->sale_price ?? '' }}"
                                                    placeholder="Enter Sale Price (Optional)">
                                            @error('sale_price')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <input type="text" name="status" class="form-control" id="status" value="{{ $products->status ?? '' }}" placeholder="Enter Status (ACTIVE/INACTIVE)">
                                            @error('status')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="stock_status">Stock Status</label>
                                            <input type="text" name="stock_status" class="form-control"
                                                    id="stock_status" value="{{ $products->stock_status ?? '' }}"
                                                    placeholder="Enter Stock Status (IN_STOCK/OUT_OF_STOCK)">
                                            @error('stock_status')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="body">Product Detail</label>
                                            <textarea name="body" class="form-control" id="body" placeholder="Enter Product Description">{{ $products->body ?? '' }}</textarea>
                                            @error('body')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="weight">Weight(L)</label>
                                            <input type="number" step="0.01" name="weight" class="form-control"
                                                    id="weight" value="{{ $products->weight ?? '' }}"
                                                    placeholder="Enter Weight">
                                            @error('weight')
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