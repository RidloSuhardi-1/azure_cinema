@extends('portal.master.home')

@section('title', 'Manage Seats')

@section('content')

<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $cinemas->cinema_name }} Seats</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item">Items</li>
                <li class="breadcrumb-item"><a href="/cinemas">Cinemas</a></li>
                <li class="breadcrumb-item active">{{ $cinemas->cinema_name }}</li>
                <li class="breadcrumb-item active">Seats</li>
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
              <h3 class="card-title">List of <b>{{ $cinemas->cinema_name }}</b> seats</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <ul class="nav">
                    <li class="nav-item mr-2">
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create-seat">
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
              </div>

              <table class="table table-bordered mt-2">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Seats Name</th>
                    <th class="text-center" style="width: 40px">Action</th>
                  </tr>
                </thead>
                <tbody>
                @if($seats->isEmpty())
                <tr>
                    <td colspan="6" class="text-center">Data not available</td>
                </tr>
                @else
                @foreach($seats as $seat => $value)
                  <tr>
                    <td>{{ $seats->firstItem() + $seat }}</td>
                    <td>{{ $value->seat_name }}</td>
                    <td class="text-center">
                      <div class="btn-group">
                          <button onclick="window.location.href = '/cinema/seat/id/{{ Crypt::encrypt($value->seat_id) }}/edit'; " type="button" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                          <button type="button" class="btn btn-sm btn-danger" data-id="/cinema/seat/id/{{ Crypt::encrypt($value->seat_id) }}/destroy" data-name="{{ $value->seat_name }}" data-toggle="modal" data-target="#remove"><i class="far fa-trash-alt"></i></button>
                          <!--  data-toggle="modal" data-target="#change-seat" -->
                          <!-- data-toggle="modal" data-target="#remove-seat" -->
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
              <a href="/cinemas" class="btn btn-sm btn-primary">
                <i class="fas fa-arrow-circle-left mr-1"></i>
                Back to Cinemas
              </a>

              <ul class="pagination pagination-sm m-0 float-right">
                {{ $seats->links() }}
              </ul>
            </div>
          </div>
          <!-- /.card -->

          <!-- Modal For Create -->
          <div class="modal fade" id="create-seat">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Create New Seat</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- Modal Body Start Here -->
                  <form action="/cinema/id/{{ Crypt::encrypt($cinemas->cinema_id) }}/seat/store" method="POST">
                  @csrf
                    <input type="hidden" name="cinema_id" class="form-control" id="cinemaIDInput" value="{{ Crypt::encrypt($cinemas->cinema_id) }}">

                    <div class="form-group">
                        <label class="col-form-label" for="seatNameInput">Seat Name</label>
                        <input type="text" name="seat_name" class="form-control @error('seat_name') is-invalid @enderror" id="seatNameInput" value="{{ old('seat_name') }}" placeholder="Enter new seat ... i.e: A1">

                        @error('seat_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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
                  <p>Are you sure want to remove seat "1" ?</p>
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
      $("#create-seat").modal('show')
  </script>
@endif

@endsection
