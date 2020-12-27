@extends('portal.master.home')

@section('title', 'User Preferences')

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
                <li class="breadcrumb-item active">User settings</li>
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

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('dist/img/user4-128x128.jpg') }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Nina Mcintire</h3>

                <p class="text-muted text-center">Software Engineer</p>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="far fa-file-alt mr-1"></i>Notes</h3>
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
                      <th scope="col">Member Name</th>
                      <td class="text-muted">Bebek</td>
                    </tr>
                    <!-- /.tr -->
                    <tr>
                      <th scope="col">Email</th>
                      <td class="text-muted">bebekgaming@gmail.com</td>
                    </tr>
                    <!-- /.tr -->
                    <tr>
                      <td colspan="2"><hr></td>
                    </tr>
                    <!-- /.tr -->
                    <tr>
                      <th scope="col">Location</th>
                      <td class="text-muted">Malang Kota</td>
                    </tr>
                    <!-- /.tr -->
                    <tr>
                      <td colspan="2"><hr></td>
                    </tr>
                    <!-- /.tr -->
                    <tr>
                      <td colspan="2">
                        <button onclick="window.location.href = '/user_settings/edit';" class="btn btn-outline-primary btn-block"><i class="fas fa-user-edit mr-1"></i> Change Profile</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
