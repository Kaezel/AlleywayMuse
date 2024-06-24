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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Address Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Address ID</th>
                      <th>User ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Label</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>City</th>
                      <th>Province</th>
                      <th>Postcode</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ( $addresses as $a)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $a->id }}</td>
                      <td>{{ $a->user_id }}</td>
                      <td>{{ $a->first_name }}</td>
                      <td>{{ $a->last_name }}</td>
                      <td>{{ $a->label }}</td>
                      <td>
                        {{ $a->address1 }}
                        <br>
                        {{ $a->address2 }}
                      </td>
                      <td>{{ $a->phone }}</td>
                      <td>{{ $a->email }}</td>
                      <td>{{ $a->city }}</td>
                      <td>{{ $a->province }}</td>
                      <td>{{ $a->postcode }}</td>
                      <td>
                        <a href="{{ route('address.edit', ['id' => $a->id]) }}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                        <a data-toggle="modal" data-target="#modal-hapus{{ $a->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                      </td>
                    </tr>
                    <div class="modal fade" id="modal-hapus{{ $a->id }}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Confirmation Delete Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Are u sure want to delete address data: <b>{{ $a->label }}</b>, from user: <b>{{ $a->first_name }} {{ $a->last_name }}</b></p>
                          </div>
                          <div class="modal-footer justify-content-end">
                            <form action="{{ route('address.delete', ['id' => $a->id]) }}" method="POST">
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