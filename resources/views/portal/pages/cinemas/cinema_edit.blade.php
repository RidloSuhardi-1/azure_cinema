@extends('portal.master.home')

@section('title', 'Update Cinemas')

@section('content')

<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ __('Change cinemas') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/portal/home">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('cinemas') }}">Cinema</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('cinema.edit', Crypt::encrypt($cinemas->cinema_id)) }}">{{ $cinemas->cinema_name }} Update</a></li>
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
            <form action="{{ route('cinema.update', Crypt::encrypt($cinemas->cinema_id)) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Form Insert -->
                <div class="card clearfix">
                    <div class="card-header">
                        <h3 class="card-title">
                        <i class="fas fa-edit mr-1"></i>
                            Change '<b>{{ $cinemas->cinema_name }}</b>' details
                        </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <!-- item identifier -->
                        <input type="hidden" name="cinema_id" class="form-control" id="cinemaNameInput" value="{{ Crypt::encrypt($cinemas->cinema_id) }}">

                        <div class="form-group">
                            <label for="cinemaNameInput">{{ __('Cinema name') }}</label>
                            <input type="text" name="cinema_name" class="form-control @error('cinema_name') is-invalid swalDefaultError @enderror" id="cinemaNameInput" value="{{ $cinemas->cinema_name }}" placeholder="Cinema name..">

                            @error('cinema_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- /.form-group -->
                        <div class="form-group">
                            <label for="cinemaLocInput">{{ __('Location') }}</label>
                            <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" id="cinemaLocInput" value="{{ $cinemas->location }}" placeholder="Cinema location..">

                            @error('location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label for="cinemaDescInput">{{ __('Description') }}</label>
                            <textarea name="desc" class="form-control @error('desc') is-invalid @enderror" id="cinemaDescInput" rows="3" value="{{ $cinemas->desc }}" placeholder="Enter ...">{{ $cinemas->desc }}</textarea>

                            @error('desc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label for="cinemaImageInput">{{ __('Cinema background') }}</label>
                            <img class="img-thumbnail img-fluid d-block"
                            src="{{ $cinemas->image != 'empty' ? asset('storage/'.$cinemas->image) : asset('dist/img/default-150x150.png') }}"
                            id="previewImage_update"
                            alt="{{ $cinemas->cinema_name }} - Cinema Picture" style="width: 150px;">

                            <div class="custom-file mt-2">
                                <input type="file" name="image" class="form-control custom-file-input @error('image') is-invalid @enderror" id="imgInput_update">
                                <label class="custom-file-label overflow-hidden" id="fileName_update" for="cinemaImageInput">{{ $cinemas->image }}</label>

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                        <!-- /.form-group -->

                        <hr>

                        <button onclick="window.location.href = '{{ route('cinemas') }}'; return false;" class="btn btn-default" data-dismiss="modal"><i class="fas fa-arrow-circle-left mr-2"></i>Back to previous</button>

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
