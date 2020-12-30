@extends('portal.master.home')

@section('title', 'Manage Cinemas')

@section('content')

<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cinemas</h1>
                <span>{{ isset($result) ? __('Result of '.$result.', '.$total.' record found') : '' }}</span>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/portal">Home</a></li>
                <li class="breadcrumb-item">Items</li>
                <li class="breadcrumb-item active"><a href="{{ route('cinemas') }}">Cinemas</a></li>
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
              <h3 class="card-title">All Cinema Lists</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <ul class="nav">
                    <li class="nav-item mr-2">
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create-cinemas">
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
                <form action="{{ route('cinema.search', 'cinema_name') }}" id="search">
                <div class="col">

                        <div class="input-group input-group-sm float-right" style="width: 180px;">

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
                    <option value="{{ route('cinema.search', 'cinema_name') }}" selected="selected">Name</option>
                    <option value="{{ route('cinema.search', 'location') }}">Location</option>
                  </select>
                </div>
                <!-- /.col -->
              </div>

              <table class="table table-bordered mt-2">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Cinema Image</th>
                    <th>Cinema Name</th>
                    <th>Location</th>
                    <th>Seats</th>
                    <th class="text-center" style="width: 40px">Action</th>
                  </tr>
                </thead>
                <tbody>
                @if($cinemas->isEmpty())
                <tr>
                    <td colspan="6" class="text-center">Data not available</td>
                </tr>
                @else
                @foreach($cinemas as $cinema => $value)

                  <tr>
                    <td>{{ $cinemas->firstItem() + $cinema }}</td>
                    <td>
                        <img src="{{ $value->image != 'empty' ? asset('storage/'.$value->image) : asset('dist/img/default-150x150.png') }}" alt="{{ $value->cinema_name }} Images" class="img-sm elevation-2">
                    </td>
                    <td>{{ $value->cinema_name }}</td>
                    <td>{{ $value->location }}</td>
                    <td class="text-center">
                        <button onclick="window.location.href = '{{ route('seats', Crypt::encrypt($value->cinema_id)) }}';" class="btn btn-outline-primary btn-sm">
                            Seats - {{ $value->seats->count() }}
                        </button>

                    </td>
                    <td class="text-center">
                      <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-primary"
                                data-name="{{ $value->cinema_name }}"
                                data-desc="{{ $value->desc }}"
                                data-location="{{ $value->location }}"
                                data-img="{{ $value->image != 'empty' ? asset('storage/'.$value->image) : asset('dist/img/default-150x150.png') }}" data-toggle="modal" data-target="#view"><i class="far fa-eye"></i></button>
                          <button onclick="window.location.href = '/cinema/id/{{ Crypt::encrypt($value->cinema_id) }}/edit';" type="button" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                          <button type="button" class="btn btn-sm btn-danger" data-id="/cinema/id/{{ Crypt::encrypt($value->cinema_id) }}/destroy" data-name="{{ $value->cinema_name }}" data-toggle="modal" data-target="#remove"><i class="far fa-trash-alt"></i></button>
                          <!-- data-toggle="modal" data-target="#remove-cinemas" -->
                          <!--  data-toggle="modal" data-target="#change-cinemas" -->
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
                  {{ $cinemas->links() }}
              </ul>
            </div>
          </div>
          <!-- /.card -->

          <!-- Modal For View Item -->
          <div class="modal fade" id="view">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="name">Cinema 1</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- Modal Body Start Here -->
                  <div class="row">
                    <!-- Item image -->
                    <div class="col">
                      <div class="position-relative" style="width: 350px; height: 250px;">
                        <img src="{{ asset('dist/img/photo1.png') }}" alt="Photo 1" id="image" class="img-thumbnail img-fluid" style="width: 350px; height: 250px;">
                      </div>
                    </div>
                    <!-- /.col -->

                    <div class="col">
                      <table class="table table-borderless">
                        <tr>
                          <th>Cinema</th>
                          <td id="name">Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        </tr>
                        <tr>
                          <th>Details</th>
                          <td id="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro tempora quo, consequuntur velit aliquam molestias!</td>
                        </tr>
                        <tr>
                          <th>Location</th>
                          <td id="location">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro tempora quo, consequuntur velit aliquam molestias!</td>
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
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

          <!-- Modal For Create -->
          <div class="modal fade" id="create-cinemas">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Create New Cinema</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- Modal Body Start Here -->
                  <form action="/cinema/store" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                        <label class="col-form-label" for="cinemaInput">Cinema Name</label>
                        <input type="text" name="cinema_name" class="form-control @error('cinema_name') is-invalid @enderror" id="cinemaInput" value="{{ old('cinema_name') }}" placeholder="Enter ...">

                        @error('cinema_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                      <!-- /.form-group -->

                    <div class="form-group">
                        <label class="col-form-label" for="emailInput">Location</label>
                        <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" id="emailInput" value="{{ old('location') }}" placeholder="Enter ...">

                        @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                      <!-- /.form-group -->

                    <div class="form-group">
                        <label class="col-form-label" for="emailInput">Cinema Details</label>
                        <textarea name="desc" class="form-control @error('desc') is-invalid @enderror" rows="3" value="{{ old('desc') }}" placeholder="Enter ..."></textarea>

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
      $("#create-cinemas").modal('show')
  </script>
@endif

@endsection
