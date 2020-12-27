@extends('portal.master.home')

@section('title', 'Manage Promote Code')

@section('content')

<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Promote Code</h1>
                <span>{{ isset($result) ? __('Result of '.$result.', '.$total.' record found') : '' }}</span>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item">Ticket Management</li>
                <li class="breadcrumb-item active"><a href="{{ route('codes') }}">Promote Code</a></li>
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
              <h3 class="card-title">All Promote Code Lists</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <ul class="nav">
                    <li class="nav-item mr-2">
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create-code">
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

                <form action="{{ route('code.search', 'code_name') }}" id="search">
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
                    <option value="{{ route('code.search', 'code_name') }}" selected="selected">Name</option>
                    <option value="{{ route('code.search', 'code') }}">Code</option>
                  </select>
                </div>
                <!-- /.col -->
              </div>

              <table class="table table-bordered mt-2">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Code Name</th>
                    <th>Customer</th>
                    <th>Value</th>
                    <th>Code</th>
                    <th>Expired</th>
                    <th class="text-center" style="width: 40px">Action</th>
                  </tr>
                </thead>
                <tbody>
                @if($codes->isEmpty())
                <tr>
                    <td colspan="7" class="text-center">Data not available</td>
                </tr>
                @else
                @foreach($codes as $code => $value)
                  <tr>
                    <td>{{ $codes->firstItem() + $code }}</td>
                    <td>{{ $value->code_name }}</td>
                    <td class="text-center">
                        <span class="badge {{ $value->customer_type == 'all' ? 'badge-info' : ($value->customer_type == 'free' ? 'badge-primary' : 'badge-warning') }}">{{ $value->customer_type == 'all' ? 'All Customer' : ($value->customer_type == 'free' ? 'Free Customer' : 'Premium Customer') }}</span>
                    </td>
                    <td>{{ $value->value }}</td>
                    <td>{{ $value->code }}</td>
                    <td>{{ $value->expired }}</td>
                    <td class="text-center">
                      <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-danger" data-id="/code/id/{{ Crypt::encrypt($value->code_id) }}/destroy" data-name="{{ $value->code_name }}" data-toggle="modal" data-target="#remove"><i class="far fa-trash-alt"></i></button>
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
                {{ $codes->links() }}
              </ul>
            </div>
          </div>
          <!-- /.card -->

          <!-- Modal For Create -->
          <div class="modal fade" id="create-code">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create New Code</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- /.modal-header -->
                    <div class="modal-body">
                        <!-- Modal Body Start Here -->
                        <form action="/code/store" method="POST">
                        @csrf
                            <div class="form-group">
                                <label class="col-form-label" for="codeNameInput">Code Name</label>
                                <input type="text" name="code_name" class="form-control @error('code_name') is-invalid @enderror" id="codeNameInput" value="{{ old('code_name') }}" placeholder="Enter ...">

                                @error('code_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="col-form-label" for="valueInput">Value</label>
                                <input type="text" name="value" class="form-control @error('value') is-invalid @enderror" id="valueInput" value="{{ old('value') }}" placeholder="Enter ...">

                                @error('value')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="col-form-label" for="codeInput">Code</label>
                                <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="codeInput" value="{{ old('code') }}" placeholder="Enter ...">

                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="col-form-label" for="timepicker">Expired</label>

                                <div class="input-group date" id="timepicker" data-target-input="nearest">
                                    <input type="datetime-local" name="expired" class="form-control @error('expired') is-invalid @enderror datetimepicker-input" data-target="#timepicker"/>
                                </div>
                                <!-- /.input group -->

                                @error('expired')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!-- /.form group -->

                            <div class="form-group">
                                <label class="col-form-label" for="customerSelection">Choose Customer</label>
                                <select name="customer_type" id="customerSelection" class="form-control form-control-sm select2">
                                    <option value="all" selected="selected">All Customer</option>
                                    <option value="premium">Premium</option>
                                    <option value="free">Free</option>
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
                  <p>Are you sure want to remove this code "Member 1001" ?</p>
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
      $("#create-code").modal('show')
  </script>
@endif

@endsection
