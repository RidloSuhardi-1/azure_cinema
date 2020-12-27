@extends('portal.master.home')

@section('title', 'Update Seat')

@section('content')

<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ __('Change seat  ') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Seats</li>
                <li class="breadcrumb-item active">Update</li>
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
            <form action="/cinema/seat/id/{{ Crypt::encrypt($seats->seat_id) }}/update" method="POST">
            @csrf
                <!-- Form Insert -->
                <div class="card clearfix">
                    <div class="card-header">
                        <h3 class="card-title">
                        <i class="fas fa-edit mr-1"></i>
                            {{ __('Change seat') }}
                        </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">

                        <input type="hidden" name="seat_id" class="form-control" value="{{ Crypt::encrypt($seats->seat_id) }}">

                        <div class="form-group">
                            <label for="seatNameInput">Seat name</label>
                            <input type="text" name="seat_name" class="form-control @error('seat_name') is-invalid @enderror" id="seatNameInput" value="{{ $seats->seat_name }}" placeholder="Change seat..">

                            @error('seat_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- /.form-group -->

                        <hr>

                        <button onclick="window.location.href = '/cinema/id/{{ Crypt::encrypt($seats->cinema_id) }}/seats'; return false;" type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-arrow-circle-left mr-2"></i>Back to previous</button>

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
