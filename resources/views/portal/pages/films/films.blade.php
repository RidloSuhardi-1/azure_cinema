@extends('portal.master.home')

@section('title', 'Manage Films')

@section('content')

<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Films</h1>
                <span>{{ isset($result) ? __('Result of '.$result.', '.$total.' record found') : '' }}</span>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item">Items</li>
                <li class="breadcrumb-item active"><a href="{{ route('films') }}">Films</a></li>
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

                <form action="{{ route('film.search', 'item_name') }}" id="search">
                <div class="col">
                  <div class="input-group input-group-sm float-right" style="width: 150px;">
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
                    <option value="{{ route('film.search', 'item_name') }}" selected="selected">Name</option>
                    <option value="{{ route('film.search', 'genre') }}">Genre</option>
                    <option value="{{ route('film.search', 'label') }}">Label</option>
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
                    <th>Label</th>
                    <th class="text-center" style="width: 40px">Action</th>
                  </tr>
                </thead>
                <tbody>
                @if ($films->isEmpty())
                <tr>
                    <td colspan="6" class="text-center">Data not available</td>
                </tr>
                @else
                @foreach($films as $film => $value)
                  <tr>
                    <td>{{ $films->firstItem() + $film }}</td>
                    <td>{{ $value->item_name }}</td>
                    <td>
                        <img src="{{ $value->image != 'empty' ? asset('storage/'.$value->image) : asset('dist/img/default-150x150.png') }}" alt="{{ $value->item_name }} Images" class="img-sm elevation-2">
                    </td>
                    <td><span class="badge {{ $value->label == 'standart' ? 'bg-primary' : ($value->label == 'premium' ? 'bg-warning' : 'bg-gray') }}">{{ $value->label == 'standart' ? 'Standart' : ($value->label == 'premium' ? 'Premium' : 'Coming soon') }}</span></td>
                    <td class="text-center">
                      <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-primary"
                                data-name="{{ $value->item_name }}"
                                data-img="{{ $value->image != 'empty' ? asset('storage/'.$value->image) : asset('dist/img/default-150x150.png') }}"
                                data-genre="@foreach(explode(',', $value->genre) as $film_genre) <span class='badge badge-danger'>{{ $film_genre }}</span> @endforeach"
                                data-lbl="{{ $value->label == 'standart' ? 'Standart' : ($value->label == 'premium' ? 'Premium' : 'Coming soon') }}"


                                data-lbl-class="{{ $value->label == 'standart' ? 'bg-primary' : ($value->label == 'premium' ? 'bg-warning' : 'bg-gray') }}"


                                data-desc="{{ substr($value->desc, 0, 120) }} .." data-toggle="modal" data-target="#view"><i class="far fa-eye"></i></button>

                          <button onclick="window.location.href = '/film/id/{{ Crypt::encrypt($value->item_id) }}/edit'; " type="button" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                          <button type="button" class="btn btn-sm btn-danger" data-id="/film/id/{{ Crypt::encrypt($value->item_id) }}/destroy" data-name="{{ $value->item_name }}" data-toggle="modal" data-target="#remove"><i class="far fa-trash-alt"></i></button>
                          <!-- data-toggle="modal" data-target="#change-films" -->
                          <!-- data-toggle="modal" data-target="#remove-films" -->
                      </div>
                    </td>
                  </tr>
                @endforeach
                @endif
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                {{ $films->links() }}
              </ul>
            </div>
          </div>
          <!-- /.card -->

          <!-- Modal For View Item -->
          <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="viewModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="name">Film</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- Modal Body Start Here -->
                  <div class="row">
                    <!-- Item image -->
                    <div class="col">
                        <div class="position-relative" style="width: 320px; height: 180px;">
                            <img src="{{ asset('dist/img/default-150x150.png') }}" alt="Photo 1" id="image" class="img-thumbnail img-fluid" style="width: 320px; height: 180px;">
                            <div class="ribbon-wrapper ribbon-lg">
                            <div class="">
                                genre here
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="col overflow-hidden">
                      <table class="table table-borderless">
                        <tr>
                          <th>Film</th>
                          <td id="name">Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        </tr>
                        <tr>
                          <th>Genre</th>
                          <td id="genre"></td>
                        </tr>
                        <tr>
                          <th>Synopsis</th>
                          <td id="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro tempora quo, consequuntur velit aliquam molestias!</td>
                        </tr>
                      </table>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.Modal Body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

          <!-- Modal For Create -->
          <div class="modal fade" id="create-films" tabindex="-1" role="dialog" aria-labelledby="createModal" aria-hidden="true">
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
                    <form action="/film/store" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label class="col-form-label" for="itemNameInput">Item Name</label>
                            <input type="text" name="item_name" class="form-control @error('item_name') is-invalid @enderror" id="itemNameInput" value="{{ old('item_name') }}" placeholder="Enter ...">

                            @error('item_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label>Genre Selection</label>
                            <div class="select2-danger">
                                <select class="select2 @error('genre') is-invalid @enderror" name="genre[]" multiple="multiple" data-placeholder="Select a Genre" data-dropdown-css-class="select2-danger" style="width: 100%;">
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
                            <textarea name="desc" id="descInput" class="form-control @error('desc') is-invalid @enderror" rows="3" value="{{ old('desc') }}" placeholder="Short story from the film.."></textarea>

                            @error('desc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="d-block">Item Background</label>
                            <img src="{{ asset('dist/img/default-150x150.png') }}" id="previewImage_create" class="img-thumbnail" alt="#" style="width: 150px;">

                            <div class="custom-file mt-3">
                                <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="imgInput_create">
                                <label class="custom-file-label" id="fileName_create" for="validatedCustomFile">Choose file...</label>

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label>Status</label>
                            <select name="label" class="form-control">
                                <option value="standart">Standart</option>
                                <option value="premium">Premium</option>
                                <option value="soon">Coming Soon</option>
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
      $("#create-films").modal('show')
  </script>
@endif

@endsection
