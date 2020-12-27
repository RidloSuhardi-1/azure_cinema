@extends('portal.master.home')

@section('title', 'Manage Tickets')

@section('content')

<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tickets</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/portal">Home</a></li>
                <li class="breadcrumb-item">Ticket Management</li>
                <li class="breadcrumb-item active">Tickets</li>
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
              <h3 class="card-title">All Ticket Lists</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <ul class="nav">
                    <li class="nav-item mr-2">
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create-ticket">
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
                    <th>Film</th>
                    <th>Cinema</th>
                    <th>Broadcast</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th class="text-center" style="width: 40px">Action</th>
                  </tr>
                </thead>
                <tbody>
                @if($tickets->isEmpty())
                <tr>
                    <td colspan="6" class="text-center">Data not available</td>
                </tr>
                @else
                @foreach($tickets as $ticket => $value)
                  <tr>
                    <td>{{ $tickets->firstItem() + $ticket }}</td>
                    <td>{{ $value->film->item_name }}</td>
                    <td><span class="badge badge-primary">{{ $value->cinema->cinema_name }}</span></td>
                    <td>{{ $value->broadcast_date }} {{ $value->broadcast_time }}</td>
                    <td>{{ $value->stock }}</td>
                    <td>Rp. {{ $value->price }},-</td>
                    <td class="text-center">
                      <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-danger" data-id="/ticket/id/{{ Crypt::encrypt($value->ticket_id) }}/destroy" data-name="{{ $value->film->item_name }}" data-toggle="modal" data-target="#remove"><i class="far fa-trash-alt"></i></button>
                      </div>
                    </td>
                  </tr>
                  <!-- /.tr -->
                @endforeach
                @endif
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                {{ $tickets->links() }}
              </ul>
            </div>
          </div>
          <!-- /.card -->

          <!-- Modal For Create -->
          <div class="modal fade" id="create-ticket">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Create New Ticket</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                  <!-- Modal Body Start Here -->
                    <form action="/ticket/store" method="POST">
                    @csrf
                        <div class="form-group">
                            <label class="col-form-label" for="cinemaSelection1">Choose Cinema</label>
                            <select name="cinema_id" id="cinemaSelection1" class="form-control form-control-sm select2">
                            <optgroup label="Select Cinema">

                            <!-- retrieve all cinema -->

                            @foreach($cinemas as $cinemaList)
                                <option value="{{ $cinemaList->cinema_id }}">{{ $cinemaList->cinema_name }}</option>
                            @endforeach

                            </optgroup>
                            </select>

                            @error('cinema_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="col-form-label" for="ticketSelection">Choose Films</label>
                            <select name="item_id" id="ticketSelection" class="form-control form-control-sm select2">
                                <optgroup label="Select films">
                                @foreach($films as $film_list)
                                    <option value="{{ $film_list->item_id }}">{{ $film_list->item_name }}</option>
                                @endforeach
                                </optgroup>
                            </select>

                            @error('item_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- /.form-group -->

                        <!-- Date -->
                        <div class="form-group">
                            <label class="col-form-label">Broadcast Date</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="date" name="broadcast_date" class="form-control @error('broadcast_date') is-invalid @enderror datetimepicker-input" data-target="#reservationdate"/>
                            </div>

                            @error('broadcast_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- /.form group -->

                        <div class="form-group">
                            <label class="col-form-label">Broadcast Time</label>

                            <div class="input-group date" id="timepicker" data-target-input="nearest">
                                <input type="time" name="broadcast_time" class="form-control @error('broadcast_time') is-invalid @enderror datetimepicker-input" data-target="#timepicker"/>
                            </div>
                            <!-- /.input group -->

                            @error('broadcast_time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- /.form group -->

                        <div class="form-group">
                            <label class="col-form-label" for="priceInput">Price</label>
                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="priceInput" value="{{ old('price') }}" placeholder="Enter ...">

                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="col-form-label" for="stockInput">Stock</label>
                            <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" id="stockInput" value="1" min="1" max="99" placeholder="Enter stock ...">

                            @error('stock')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- /.form-group -->
                </div>
                <!-- /.Modal Body -->
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
                  <p>Are you sure want to remove this ticket "Member 1001" ?</p>
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
      $("#create-ticket").modal('show')
  </script>
@endif

@endsection
