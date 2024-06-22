@extends('layouts.dashboardLayout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
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
            <a href="{{  route('user.create') }}" class="btn btn-primary mb-3">Add Data</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>User ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ( $users as $u)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $u->id }}</td>
                      <td>{{ $u->name }}</td>
                      <td>{{ $u->email }}</td>
                      <td>
                        <a href="{{ route('user.edit', ['id' => $u->id]) }}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                        <a data-toggle="modal" data-target="#modal-hapus{{ $u->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                      </td>
                    </tr>
                    <div class="modal fade" id="modal-hapus{{ $u->id }}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Confirmation Delete Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Are u sure want to delete user data: <b>{{ $u->name }}</b></p>
                          </div>
                          <div class="modal-footer justify-content-end">
                            <form action="{{ route('user.delete', ['id' => $u->id]) }}" method="POST">
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