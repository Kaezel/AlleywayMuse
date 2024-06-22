@extends('layouts.dashboardLayout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Address</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('address.update', ['id' => $addresses->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Address</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input type="text" name="first_name" class="form-control"
                                                    id="first_name" value="{{ $addresses->first_name ?? '' }}"
                                                    placeholder="Enter First Name">
                                            @error('first_name')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" name="last_name" class="form-control"
                                                    id="last_name" value="{{ $addresses->last_name ?? '' }}"
                                                    placeholder="Enter Last Name">
                                            @error('last_name')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="label">Label</label>
                                            <input type="text" name="label" class="form-control"
                                                    id="label" value="{{ $addresses->label ?? '' }}"
                                                    placeholder="Enter Label">
                                            @error('label')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="address1">Address Line 1</label>
                                            <input type="text" name="address1" class="form-control"
                                                    id="address1" value="{{ $addresses->address1 ?? '' }}"
                                                    placeholder="Enter Address Line 1">
                                            @error('address1')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="address2">Address Line 2</label>
                                            <input type="text" name="address2" class="form-control"
                                                    id="address2" value="{{ $addresses->address2 ?? '' }}"
                                                    placeholder="Enter Address Line 2">
                                            @error('address2')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" name="phone" class="form-control"
                                                    id="phone" value="{{ $addresses->phone ?? '' }}"
                                                    placeholder="Enter Phone">
                                            @error('phone')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" name="city" class="form-control"
                                                    id="city" value="{{ $addresses->city ?? '' }}"
                                                    placeholder="Enter City">
                                            @error('city')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="province">Province</label>
                                            <input type="text" name="province" class="form-control"
                                                    id="province" value="{{ $addresses->province ?? '' }}"
                                                    placeholder="Enter Province">
                                            @error('province')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="postcode">Postcode</label>
                                            <input type="number" name="postcode" class="form-control"
                                                    id="postcode" value="{{ $addresses->postcode ?? '' }}"
                                                    placeholder="Enter Postcode">
                                            @error('postcode')
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