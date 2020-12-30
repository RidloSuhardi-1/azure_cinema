@extends('portal.master.home')

@section('title', 'Manage User')

@section('content')

<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Users</h1>
                <span>{{ isset($result) ? __('Result of '.$result.', '.$total.' record found') : '' }}</span>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/portal">Home</a></li>
                <li class="breadcrumb-item">Items</li>
                <li class="breadcrumb-item active"><a href="/usermanage">Manage</a></li>
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
              <h3 class="card-title">All User Lists</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <ul class="nav">
                    <li class="nav-item mr-2">
                    </li>
                    <!-- /.nav-item -->
                    <li class="nav-item">
                    </li>
                    <!-- /.nav-item -->
                  </ul>
                  <!-- /.nav -->
                </div>
                <!-- /.col -->
                <form action="{{ route('customer.search', 'username') }}" id="search">
                <div class="col">

                        <div class="input-group input-group-sm float-right" style="width: 180px;">

                            <input type="text" name="keyword" id="search-input" class="form-control float-right" value="{{ $result ?? '' }}" placeholder="Search by Name">

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
                    <option value="{{ route('customer.search', 'username') }}" selected="selected">Name</option>
                    <option value="{{ route('customer.search', 'email') }}">Email</option>
                  </select>
                </div>
                <!-- /.col -->
              </div>
          <br><br>
          <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th width="50px" scope="col">ID</th>
                    <th width="200px" scope="col">Username</th>
                    <th width="200px" scope="col">Email</th>
                    <th width="200px" scope="col">Roles</th>
                    <th width="200px" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $def)
                <tr>
                    <th scope="row"> {{$def->id}}</th>
                    <td>{{ $def-> username}}</td>
                    <td>{{$def->email}}</td>
                    <td>{{$def -> roles}}</td>
                    <td>
                    <div class="btn-group">
                          <button onclick="window.location.href = '/customer/id/{{ Crypt::encrypt($def->id) }}/edit';" type="button" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                          <button type="button" class="btn btn-sm btn-danger" data-id="/customer/id/{{ Crypt::encrypt($def->id) }}/destroy" data-name="{{ $def->username }}" data-toggle="modal" data-target="#remove"><i class="far fa-trash-alt"></i></button>
                          <!-- data-toggle="modal" data-target="#remove-cinemas" -->
                          <!--  data-toggle="modal" data-target="#change-cinemas" -->
                      </div>
                    </td>
                </tr>
                @endforeach
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

          <!-- Modal For View Item -->
          <div class="modal fade" id="view">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="name">Cinema 1</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- Modal Body Start Here -->
                  <div class="row">
                    <!-- Item image -->
                    <div class="col">
                      <div class="position-relative" style="width: 350px; height: 250px;">
                        <img src="{{ asset('dist/img/photo1.png') }}" alt="Photo 1" id="image" class="img-thumbnail img-fluid" style="width: 350px; height: 250px;">
                      </div>
                    </div>
                    <!-- /.col -->

                    <div class="col">
                      <table class="table table-borderless">
                        <tr>
                          <th>Cinema</th>
                          <td id="name">Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        </tr>
                        <tr>
                          <th>Details</th>
                          <td id="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro tempora quo, consequuntur velit aliquam molestias!</td>
                        </tr>
                        <tr>
                          <th>Location</th>
                          <td id="location">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro tempora quo, consequuntur velit aliquam molestias!</td>
                        </tr>
                      </table>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.Modal Body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Done</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

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
 

@endsection

{{-- if an error occurs in the save process, display the modal again --}}

@section('script')

@if($errors->any())
  <script>
      $("#create-cinemas").modal('show')
  </script>
@endif

@endsection
