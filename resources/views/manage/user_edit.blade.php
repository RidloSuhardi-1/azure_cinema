@extends('portal.master.home')

@section('title', 'Update Cinemas')

@section('content')

<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ __('Change Customers') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/portal">Home</a></li>
                <li class="breadcrumb-item active"><a href="/usermanage">Customer</a></li>
                <li class="breadcrumb-item active"><a href="/customer/id/{{ Crypt::encrypt($users->id) }}/edit">Update</a></li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <form action="/customer/id/{{ Crypt::encrypt($users->id) }}/update" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Form Insert -->
                <div class="card clearfix">
                    <div class="card-header">
                        <h3 class="card-title">
                        <i class="fas fa-edit mr-1"></i>
                            Change <b>{{ $users->username }}</b> details
                        </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <!-- item identifier -->
                        <input type="hidden" name="id" class="form-control" id="cinemaNameInput" value="{{ Crypt::encrypt($users->id) }}">
                        <div class="form-group">
                            <label for="cinemaNameInput">{{ __('Username : ') }}</label>
                            <input type="text" name="username" class="form-control @error('username') is-invalid swalDefaultError @enderror" id="cinemaNameInput" value="{{ $users->username }}" placeholder="Username ..">

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- /.form-group -->
                        <div class="form-group">
                            <label for="cinemaLocInput">{{ __('Email') }}</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="cinemaLocInput" value="{{ $users->email }}" placeholder="Email ..">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <hr>

                        <button onclick="window.location.href = '/usermanage'; return false;" class="btn btn-default" data-dismiss="modal"><i class="fas fa-arrow-circle-left mr-2"></i>Back to previous</button>
                        <div class="row float-right">
                            <div class="col">
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
          </form>
        <!-- /.form -->
        </div>
        <!-- /.row -->

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
