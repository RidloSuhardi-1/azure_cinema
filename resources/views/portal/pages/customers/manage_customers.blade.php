@extends('portal.master.home')

@section('title', 'Manage Customers')

@section('content')

<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Customers</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('portal.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('customers') }}">Customers</a></li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Customer Lists</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <ul class="nav">
                    <li class="nav-item mr-2">
                        <button onclick="location.href = '{{ route('customers.print') }}';" type="button" class="btn btn-sm btn-success">
                        <i class="fas fa-print mr-2"></i>
                            Print Documents
                        </button>
                        <!-- button -->
                    </li>
                    <!-- /.nav-item -->
                  </ul>
                  <!-- /.nav -->
                </div>
                <!-- /.col -->

                <form action="{{ route('customer.search', 'username') }}" id="search">
                    <div class="col">
                      <div class="input-group input-group-sm float-right" style="width: 180px;">
                        <input type="text" name="keyword" id="search-input" class="form-control float-right" value="{{ $result ?? '' }}" placeholder="Search by Username">

                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                      <!-- /.input-group -->
                    </div>
                </form>
                <!-- /.col -->

                <div class="col col-3">
                  <select id="searchBy" class="form-control form-control-sm select2">
                    <option value="{{ route('customer.search', 'username') }}" selected="selected">Username</option>
                    <option value="{{ route('customer.search', 'email') }}">Email</option>
                  </select>
                </div>
                <!-- /.col -->
              </div>

              <table class="table table-bordered mt-2">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Label</th>
                    <th class="text-center" style="width: 40px">Action</th>
                  </tr>
                </thead>
                <tbody>
                @if ($users->isEmpty())
                <tr>
                    <td colspan="6" class="text-center">Data not available</td>
                </tr>
                @else
                @foreach ($users as $key => $def)
                  <tr>
                    <td>{{ $users->firstItem() + $key }}</td>
                    <td>{{ $def->username }}</td>
                    <td>{{ $def->email }}</td>
                    <td>
                        <span class="badge {{ $def->label == 'Free' ? 'bg-primary' : 'bg-warning' }}">
                            {{ $def->label }} Customer
                        </span>
                    </td>
                    <td class="text-center">
                      <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#view-member"><i class="far fa-eye"></i></button>
                          <button type="button" class="btn btn-sm btn-danger" data-id="{{ route('customer.destroy', Crypt::encrypt($def->id)) }}" data-name="{{ $def->username }}" data-toggle="modal" data-target="#remove"><i class="far fa-trash-alt"></i></button>
                      </div>
                    </td>
                  </tr>
                @endforeach
                @endif
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                  {{ $users->links() }}
              </ul>
            </div>
          </div>
          <!-- /.card -->

          <!-- Modal For View Member -->
          <div class="modal fade" id="view-member">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Member 1001</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- Modal Body Start Here -->
                  <form>
                      <!-- input states -->
                    <div class="form-group">
                        <label class="col-form-label" for="emailInput">Email</label>
                        <input type="email" class="form-control" id="emailInput" placeholder="Enter ...">
                      </div>
                      <!-- /.form-group -->

                      <div class="form-group">
                          <label class="col-form-label" for="nameInput">Member Name</label>
                          <input type="text" class="form-control" id="nameInput" placeholder="Enter ...">
                      </div>
                      <!-- /.form-group -->

                      <div class="form-group">
                          <label class="col-form-label" for="genderSelect">Gender</label>

                          <div class="custom-control custom-radio">
                              <input class="custom-control-input" type="radio" id="genderMale" name="gender">
                              <label for="genderMale" class="custom-control-label">Male</label>
                              </div>
                              <div class="custom-control custom-radio">
                              <input class="custom-control-input" type="radio" id="genderFemale" name="gender">
                              <label for="genderFemale" class="custom-control-label">Female</label>
                              </div>
                              <div class="custom-control custom-radio">
                              <input class="custom-control-input" type="radio" id="genderNone" name="gender" checked>
                              <label for="genderNone" class="custom-control-label">Choose Later</label>
                          </div>
                      </div>
                      <!-- /.form-group -->

                      <div class="form-group">
                          <label>Choose Role</label>
                          <select class="form-control">
                              <option>Member</option>
                              <option>Admin</option>
                          </select>
                      </div>
                  <!-- /.Modal Body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Done</button>
                </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

          <!-- Modal For Delete -->
          <div class="modal fade" id="remove">
            <div class="modal-dialog">
              <div class="modal-content bg-danger">
                <div class="modal-header">
                  <h4 class="modal-title">Remove selected item</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure want to remove ?</p>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                  <button type="button" id="remove-btn" class="btn btn-outline-light">Remove</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection()
