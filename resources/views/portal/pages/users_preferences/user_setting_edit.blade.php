@extends('portal.master.home')

@section('title', 'Edit User Preferences')

@section('content')

<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User Settings</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active"><a href="/user_settings">User settings</a></li>
                <li class="breadcrumb-item active">Edit User</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-3">
            <form action="">
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                        src="{{ asset('dist/img/user4-128x128.jpg') }}"
                        id="previewImage_update"
                        alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center">Nina Mcintire</h3>

                  <p class="text-muted text-center">Software Engineer</p>

                  <hr>

                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="imgInput_update">
                    <label class="custom-file-label overflow-hidden" id="fileName_update" for="exampleInputFile">Edit profile..</label>
                  </div>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- About Me Box -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title"><i class="far fa-file-alt mr-1"></i>Current Notes</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                  <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->


            <!-- Main Profile -->
            <div class="col-9">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item">
                      <a class="nav-link active" href="#activity" data-toggle="tab">
                        <i class="fas fa-user-cog mr-1"></i>
                        Nina Mcintire Profile
                      </a>
                    </li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-borderless">
                    <tbody>
                      <tr>
                        <th scope="col">
                          <label for="inputName">Change Member Name</label>
                        </th>
                        <td>
                          <input type="text" id="inputName" class="form-control">
                        </td>
                      </tr>
                      <!-- /.tr -->
                      <tr>
                        <th scope="col">
                          <label for="inputEmail">Change Email</label>
                        </th>
                        <td>
                          <input type="email" id="inputEmail" class="form-control">
                        </td>
                      </tr>
                      <!-- /.tr -->
                      <tr>
                        <td colspan="2"><hr></td>
                      </tr>
                      <!-- /.tr -->
                      <tr>
                        <th scope="col">
                          <label for="inputLocation">Change Location</label>
                        </th>
                        <td>
                          <input type="text" id="inputLocation" class="form-control">
                        </td>
                      </tr>
                      <!-- /.tr -->
                      <tr>
                        <th scope="col">
                          <label for="inputNotes">Change Notes</label>
                        </th>
                        <td>
                          <textarea id="inputNotes" class="form-control" rows="3"></textarea>
                        </td>
                      </tr>
                      <!-- /.tr -->
                      <tr>
                        <td colspan="2"><hr></td>
                      </tr>
                      <!-- /.tr -->
                      <tr>
                        <td colspan="2">
                          <button type="submit" class="btn btn-outline-primary btn-block"><i class="fas fa-save mr-1"></i> Save Changes</button>
                          <button onclick="window.location.href = '/user_settings'; return false;" class="btn btn-default btn-block"><i class="fas fa-arrow-circle-left mr-1"></i> Back to Profile</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- /.table -->
                </div>
              </div>
            </div> <!-- /.col -->
          </form>
        <!-- /.form -->
        </div>
        <!-- /.row -->

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
