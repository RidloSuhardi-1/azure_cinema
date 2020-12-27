@extends('portal.master.home')

@section('title', 'Manage Recently Members')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Members</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/manage_members">Members</a></li>
                <li class="breadcrumb-item active">Recently Added Members</li>
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
              <h3 class="card-title">Recently Added Members</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <ul class="nav">
                    <li class="nav-item mr-2">
                      <div class="input-group input-group-sm" style="width: 250px;">
                        <input type="text" name="table_search" class="form-control" placeholder="Search">

                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                      <!-- /.input-group -->
                    </li>
                    <!-- /.nav-item -->
                  </ul>
                  <!-- /.nav -->
                </div>
                <!-- /.col -->
              </div>

              <table class="table table-bordered mt-2">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th colspan="2" class="text-center" style="width: 40px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1.</td>
                    <td>
                        <img src="dist/img/user1-128x128.jpg" alt="" class="img-circle img-sm elevation-2">
                    </td>
                    <td>Ujang</td>
                    <td>ujang1@gmail.com</td>
                    <td>P</td>
                    <td><span class="badge bg-success">Approved</span></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#view-member">View</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td>
                        <img src="dist/img/user1-128x128.jpg" alt="" class="img-circle img-sm elevation-2">
                    </td>
                    <td>Oni</td>
                    <td>oni1@gmail.com</td>
                    <td>L</td>
                    <td><span class="badge bg-success">Approved</span></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#view-member">View</button>
                    </td>
                  </tr>
                  <tr>
                    <td>3.</td>
                    <td>
                        <img src="dist/img/user1-128x128.jpg" alt="" class="img-circle img-sm elevation-2">
                    </td>
                    <td>Ridlo</td>
                    <td>ridlo1@gmail.com</td>
                    <td>L</td>
                    <td><span class="badge bg-success">Approved</span></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#view-member">View</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
          <!-- /.card -->

          <!-- Modal For View Member -->
          <div class="modal fade" id="view-member">
            <div class="modal-dialog">
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
                </div>
                </form>
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
