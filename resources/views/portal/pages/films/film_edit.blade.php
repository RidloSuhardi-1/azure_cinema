@extends('portal.master.home')

@section('title', 'Update Item')

@section('content')

<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ __('Change Film Details') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="/films">Films</a></li>
                <li class="breadcrumb-item active">{{ substr($films->item_name, 0, 30) }}... </li>
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
            <!-- Form Insert -->
            <div class="card clearfix">
                <div class="card-header">
                    <h3 class="card-title">
                    <i class="fas fa-edit mr-1"></i>
                    Change '<b>{{ $films->item_name }}</b>' details
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <form action="/film/id/{{ Crypt::encrypt($films->item_id) }}/update" method="POST" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" name="item_id" class="form-control" id="itemIdInput" value="{{ $films->item_id }}" placeholder="Enter ...">

                        <div class="form-group">
                            <label class="col-form-label" for="itemNameInput">Change Item Name</label>
                            <input type="text" name="item_name" class="form-control @error('item_name') is-invalid @enderror" id="itemNameInput" value="{{ $films->item_name }}" placeholder="Enter ...">

                            @error('item_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label>Change Genre Selection</label>
                            <div class="select2-danger">
                                <select class="select2 @error('genre') is-invalid @enderror" name="genre[]" multiple="multiple" data-placeholder="Select a Genre" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <!-- get current genre -->
                                @foreach(explode(',', $films->genre) as $film_genre)
                                    <option value="{{ $film_genre }}" selected>{{ $film_genre }}</option>
                                @endforeach

                                    <option value="Action">Action</option>
                                    <option value="Adventure">Adventure</option>
                                    <option value="Comedy">Comedy</option>
                                    <option value="Criminal">Criminal</option>
                                    <option value="Drama">Drama</option>
                                    <option value="Romantic">Romantic</option>
                                    <option value="Epic">Epic</option>
                                    <option value="Fiction">Fiction</option>
                                    <option value="Science Fiction">Science Fiction</option>
                                    <option value="Horror">Horror</option>
                                    <option value="Thriller">Thriller</option>
                                    <option value="Music">Music</option>
                                    <option value="War">War</option>
                                    <option value="Spy">Spy</option>
                                    <option value="Monster">Monster</option>
                                    <option value="Fantasy">Fantasy</option>
                                    <option value="Martial Arts">Martial Arts</option>
                                    <option value="Supernatural">Supernatural</option>
                                </select>

                                @error('genre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="col-form-label" for="descInput">Synopsis</label>
                            <textarea name="desc" id="descInput" class="form-control @error('desc') is-invalid @enderror" rows="3" value="{{ $films->desc }}" placeholder="Short story from the film..">{{ $films->desc }}</textarea>

                            @error('desc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="d-block">Change Item Background</label>
                            <img src="{{ $films->image != 'empty' ? asset('storage/'.$films->image) : asset('dist/img/default-150x150.png') }}" id="previewImage_create" class="img-thumbnail" alt="#" style="width: 150px;">

                            <div class="custom-file mt-3">
                                <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="imgInput_create">
                                <label class="custom-file-label" id="fileName_create" for="validatedCustomFile">{{ $films->image }}</label>

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label>Change Status</label>
                            <select name="label" class="form-control">
                                <optgroup label="Selected label">
                                    <option value="{{ $films->label }}">{{ $films->label == 'standart' ? 'Standart' : ($films->label == 'premium' ? 'Premium' : 'Coming soon') }}</option>
                                </optgroup>
                                <optgroup label="Select label">
                                    <option value="standart">Standart</option>
                                    <option value="premium">Premium</option>
                                    <option value="soon">Coming Soon</option>
                                </optgroup>
                            </select>
                        </div>
                        <!-- /.form-group -->
                        <hr>

                        <button onclick="window.location.href = '/films'; return false;" class="btn btn-default" data-dismiss="modal"><i class="fas fa-arrow-circle-left mr-2"></i>Back to previous</button>

                        <div class="row float-right">
                            <div class="col">
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                    <!-- /.form -->

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
