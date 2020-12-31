<?php $__env->startSection('title', 'Manage Films'); ?>

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Films</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item">Items</li>
                <li class="breadcrumb-item active">Films</li>
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
              <h3 class="card-title">All Film Lists</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <ul class="nav">
                    <li class="nav-item mr-2">
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create-films">
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
                    <th>Item Image</th>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Label</th>
                    <th>Premiere Date</th>
                    <th class="text-center" style="width: 40px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1.</td>
                    <td>
                        <img src="dist/img/user1-128x128.jpg" alt="" class="img-sm elevation-2">
                    </td>
                    <td>Ujang</td>
                    <td>P</td>
                    <td><span class="badge bg-gray">Coming Soon</span></td>
                    <td>2020/01/01 09:00 AM</td>
                    <td class="text-center">
                      <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#view-films">View</button>
                          <button type="button" class="btn btn-sm btn-warning ml-1 mr-1" data-toggle="modal" data-target="#change-films">Change</button>
                          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#remove-films">Remove</button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td>
                        <img src="dist/img/user1-128x128.jpg" alt="" class="img-sm elevation-2">
                    </td>
                    <td>Oni</td>
                    <td>L</td>
                    <td><span class="badge bg-warning">Premium</span></td>
                    <td>2020/01/01 09:00 AM</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#view-films">View</button>
                            <button type="button" class="btn btn-sm btn-warning ml-1 mr-1" data-toggle="modal" data-target="#change-films">Change</button>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#remove-member">Remove</button>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>3.</td>
                    <td>
                        <img src="dist/img/user1-128x128.jpg" alt="" class="img-sm elevation-2">
                    </td>
                    <td>Ridlo</td>
                    <td>L</td>
                    <td><span class="badge bg-primary">Standart</span></td>
                    <td>2020/01/01 09:00 AM</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#view-films">View</button>
                            <button type="button" class="btn btn-sm btn-warning ml-1 mr-1" data-toggle="modal" data-target="#change-films">Change</button>
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

          <!-- Modal For View Item -->
          <div class="modal fade" id="view-films">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">High School DXD</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- Modal Body Start Here -->
                  <div class="row">
                    <!-- Item image -->
                    <div class="col">
                      <div class="position-relative" style="width: 350px;">
                        <img src="dist/img/photo1.png" alt="Photo 1" class="img-thumbnail img-fluid">
                        <div class="ribbon-wrapper ribbon-lg">
                          <div class="ribbon bg-primary">
                            Standart
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.col -->

                    <div class="col">
                      <table class="table table-borderless">
                        <tr>
                          <th>Item Name</th>
                          <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        </tr>
                        <tr>
                          <th>Genre</th>
                          <td>
                            <span class="badge badge-danger">Drama</span>
                            <span class="badge badge-danger">Criminal</span>
                            <span class="badge badge-danger">Fiction</span>
                          </td>
                        </tr>
                        <tr>
                          <th>Broadcast<br>Date and Time</th>
                          <td>2021/01/01 09:00 AM</td>
                        </tr>
                        <tr>
                          <th>Available</th>
                          <td>Bioskop 1</td>
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
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

          <!-- Modal For Create -->
          <div class="modal fade" id="create-films">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Create New Item</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- Modal Body Start Here -->
                  <form>

                    <div class="form-group">
                        <label class="col-form-label" for="emailInput">Item Name</label>
                        <input type="text" class="form-control" id="emailInput" placeholder="Enter ...">
                    </div>
                      <!-- /.form-group -->

                    <div class="form-group">
                        <label>Genre Selection</label>
                        <div class="select2-danger">
                            <select class="select2" multiple="multiple" data-placeholder="Select a Genre" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option>Action</option>
                            <option>Adventure</option>
                            <option>Comedy</option>
                            <option>Criminal</option>
                            <option>Drama</option>
                            <option>Romantic</option>
                            <option>Epic</option>
                            <option>Fiction</option>
                            <option>Horror</option>
                            <option>Thriller</option>
                            <option>Music</option>
                            <option>War</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.form-group -->

                    <!-- Date -->
                    <div class="form-group">
                      <label>Broadcast Date</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="date" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        </div>
                    </div>
                    <!-- /.form group -->

                    <div class="form-group">
                      <label>Broadcast Time</label>

                      <div class="input-group date" id="timepicker" data-target-input="nearest">
                        <input type="time" class="form-control datetimepicker-input" data-target="#timepicker"/>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <div class="form-group">
                      <label class="d-block">Item Background</label>
                      <img src="dist/img/default-150x150.png" id="previewImage_create" class="img-thumbnail" alt="#" style="width: 150px;">

                      <div class="custom-file mt-3">
                        <input type="file" class="custom-file-input" id="imgInput_create" required>
                        <label class="custom-file-label" id="fileName_create" for="validatedCustomFile">Choose file...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                      </div>
                    </div>
                    <!-- /.form-group -->

                  <div class="form-group">
                    <label class="col-form-label" for="cinemaSelection1">Choose Cinema</label>
                    <select id="cinemaSelection1" class="form-control form-control-sm select2">
                      <option selected="selected">N\A</option>
                      <optgroup label="Select Cinema">
                        <option>Bioskop 1</option>
                        <option>Bioskop 2</option>
                        <option>Bioskop 3</option>
                        <option>Bioskop 4</option>
                        <option>Bioskop 5</option>
                      </optgroup>
                    </select>
                  </div>
                  <!-- /.form-group -->

                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control">
                      <option>Standart</option>
                      <option>Premium</option>
                      <option>Coming Soon</option>
                    </select>
                  </div>
                  <!-- /.form-group -->

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
          <div class="modal fade" id="change-films">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Change Item</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- Modal Body Start Here -->
                  <form>
                      <!-- input states -->
                    <div class="form-group">
                        <label class="col-form-label" for="emailInput">Item Name</label>
                        <input type="text" class="form-control" id="emailInput" placeholder="Enter ...">
                    </div>
                      <!-- /.form-group -->

                    <div class="form-group">
                        <label>Genre Selection</label>
                        <div class="select2-danger">
                            <select class="select2" multiple="multiple" data-placeholder="Select a Genre" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option>Action</option>
                            <option>Adventure</option>
                            <option>Comedy</option>
                            <option>Criminal</option>
                            <option>Drama</option>
                            <option>Romantic</option>
                            <option>Epic</option>
                            <option>Fiction</option>
                            <option>Horror</option>
                            <option>Thriller</option>
                            <option>Music</option>
                            <option>War</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.form-group -->

                    <!-- Date -->
                    <div class="form-group">
                      <label>Broadcast Date</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="date" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        </div>
                    </div>
                    <!-- /.form group -->

                    <div class="form-group">
                      <label>Broadcast Time</label>

                      <div class="input-group date" id="timepicker" data-target-input="nearest">
                        <input type="time" class="form-control datetimepicker-input" data-target="#timepicker"/>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <div class="form-group">
                      <label class="d-block">Item Background</label>
                      <img src="dist/img/default-150x150.png" id="previewImage_update" class="img-thumbnail" alt="#" style="width: 150px;">

                      <div class="custom-file mt-3">
                        <input type="file" class="custom-file-input" id="imgInput_update" required>
                        <label class="custom-file-label" id="fileName_update" for="validatedCustomFile">Choose file...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-form-label" for="cinemaSelection">Choose Cinema</label>
                      <select id="cinemaSelection" class="form-control form-control-sm select2">
                          <option selected="selected">N\A</option>
                          <optgroup label="Select films">
                            <option>Bioskop 1</option>
                            <option>Bioskop 2</option>
                            <option>Bioskop 3</option>
                            <option>Bioskop 4</option>
                            <option>Bioskop 5</option>
                          </optgroup>
                      </select>
                    </div>
                  <!-- /.form-group -->

                    <div class="form-group">
                      <label class="col-form-label" for="cinemaSelection2">Choose Cinema</label>
                      <select id="cinemaSelection2" class="form-control form-control-sm select2">
                        <option selected="selected">N\A</option>
                        <optgroup label="Select Cinema">
                          <option>Bioskop 1</option>
                          <option>Bioskop 2</option>
                          <option>Bioskop 3</option>
                          <option>Bioskop 4</option>
                          <option>Bioskop 5</option>
                        </optgroup>
                      </select>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control">
                          <option>Standart</option>
                          <option>Premium</option>
                          <option>Coming Soon</option>
                      </select>
                    </div>
                    <!-- /.form-group -->

                  <!-- /.Modal Body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>

                    <div class="row">
                      <div class="col">
                        <button type="reset" class="btn btn-default">Reset</button>
                      </div>
                      <div class="col">
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                    </div>

                </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

          <!-- Modal For Delete -->
          <div class="modal fade" id="remove-films">
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('portal.master.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\azure_cinema\resources\views/portal/pages/films.blade.php ENDPATH**/ ?>