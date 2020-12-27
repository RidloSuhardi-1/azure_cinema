@extends('portal.master.home')

@section('title', 'Manage Members')

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
                <li class="breadcrumb-item active">Members</li>
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
              <h3 class="card-title">All Member Lists</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <ul class="nav">
                    <li class="nav-item mr-2">
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create-member">
                        <i class="fas fa-plus mr-1 mr-2"></i>
                        Create New
                      </button>
                    </li>
                    <!-- /.nav-item -->
                    <li class="nav-item">
                      <form action="#" target="_blank">
                        <button type="button" class="btn btn-sm btn-success">
                          <i class="fas fa-print mr-2"></i>
                          Print Documents
                        </button>
                      </form>
                    </li>
                    <!-- /.nav-item -->
                  </ul>
                  <!-- /.nav -->
                </div>
                <!-- /.col -->

                <div class="col">
                  <div class="input-group input-group-sm float-right" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.input-group -->
                </div>
                <!-- /.col -->
                <div class="col">
                  <select class="form-control form-control-sm select2">
                    <option selected="selected">Name</option>
                    <option>Recently added</option>
                  </select>
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
                    <th>Label</th>
                    <th class="text-center" style="width: 40px">Action</th>
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
                    <td><span class="badge bg-warning">Pending</span></td>
                    <td><span class="badge bg-danger">Admin</span></td>
                    <td class="text-center">
                      <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#view-member">View</button>
                          <button type="button" class="btn btn-sm btn-warning ml-1 mr-1" data-toggle="modal" data-target="#change-member">Change</button>
                          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#remove-member">Remove</button>
                      </div>
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
                    <td><span class="badge bg-danger">Admin</span></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#view-member">View</button>
                            <button type="button" class="btn btn-sm btn-warning ml-1 mr-1" data-toggle="modal" data-target="#change-member">Change</button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#remove-member">Remove</button>
                        </div>
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
                    <td><span class="badge bg-primary">Member</span></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#view-member">View</button>
                            <button type="button" class="btn btn-sm btn-warning ml-1 mr-1" data-toggle="modal" data-target="#change-member">Change</button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#remove-member">Remove</button>
                        </div>
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
                  <div class="row">
                    <!-- Item image -->
                    <div class="col">
                      <img src="dist/img/photo1.png" alt="Photo 1" class="profile-user-img img-fluid" style="width: 350px;">
                    </div>
                    <!-- /.col -->

                    <div class="col">
                      <table class="table table-borderless">
                        <tr>
                          <th scope="col">Member Name</th>
                          <td>Lorem, ipsum dolor.</td>
                        </tr>
                        <tr>
                          <th scope="col">Gender</th>
                          <td>Lanang</td>
                        </tr>
                        <tr>
                          <th scope="col">Location</th>
                          <td>Lorem</td>
                        </tr>
                        <tr>
                          <th scope="col">Role</th>
                          <td><span class="badge badge-danger">Admin</span></td>
                        </tr>
                        <tr>
                          <td colspan="2"><hr></td>
                        </tr>
                        <tr>
                          <th scope="2">Notes</th>
                          <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A debitis et voluptates, ex tenetur delectus.</td>
                        </tr>
                        <tr>
                          <td colspan="2"><hr></td>
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
                <!-- End Moda Body -->
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

          <!-- Modal For Create -->
          <div class="modal fade" id="create-member">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Create New Member</h4>
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
                              <input class="custom-control-input" type="radio" id="genderMale1" value="genderMale" name="gender">
                              <label for="genderMale1" class="custom-control-label">Male</label>
                              </div>
                              <div class="custom-control custom-radio">
                              <input class="custom-control-input" type="radio" id="genderFemale1" value="genderFemale" name="gender">
                              <label for="genderFemale1" class="custom-control-label">Female</label>
                              </div>
                              <div class="custom-control custom-radio">
                              <input class="custom-control-input" type="radio" id="genderNone1" value="genderNone" name="gender" checked>
                              <label for="genderNone1" class="custom-control-label">Choose Later</label>
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

                    <div class="row">
                      <div class="col">
                        <button type="reset" class="btn btn-default">Reset</button>
                      </div>
                      <div class="col">
                        <button type="submit" class="btn btn-primary">Create</button>
                      </div>
                    </div>
                    <!-- /.row -->
                </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

          <!-- Modal For Edit -->
          <div class="modal fade" id="change-member">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Change Member Details</h4>
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
                          <input class="custom-control-input" type="radio" id="genderMale2" value="genderMale" name="gender">
                          <label for="genderMale2" class="custom-control-label">Male</label>
                          </div>
                          <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="genderFemale2" value="genderFemale" name="gender">
                          <label for="genderFemale2" class="custom-control-label">Female</label>
                          </div>
                          <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="genderNone2" value="genderNone" name="gender" checked>
                          <label for="genderNone2" class="custom-control-label">Choose Later</label>
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

                  <div class="row">
                    <div class="col">
                      <button type="reset" class="btn btn-default">Reset</button>
                    </div>
                    <div class="col">
                      <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                  </div>
                  <!-- /.row -->
              </div>
              </form>
              <!-- /.form -->
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

          <!-- Modal For Delete -->
          <div class="modal fade" id="remove-member">
            <div class="modal-dialog">
              <div class="modal-content bg-danger">
                <div class="modal-header">
                  <h4 class="modal-title">Remove "Member 1001"</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure want to remove "Member 1001" ?</p>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-outline-light">Remove</button>
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
