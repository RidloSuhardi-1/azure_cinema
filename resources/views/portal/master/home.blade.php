<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Azure Cinema Portal | @yield('title')</title>

  <link rel="icon" type="image/png" href="{{ asset('dist/img/icon/favicon-32x32.png') }}" sizes="32x32">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- User Setting Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <div class="user-panel image d-sm-inline-block">
                    <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle pr-2" alt="User Image">
                    Jonathan Burke Jr. <i class="fas fa-angle-down ml-2"></i>
                </div>
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header">Hai Jonathan Burke Jr.</span>
            <div class="dropdown-divider"></div>

            <a href="/user_settings" class="dropdown-item">
                <i class="fas fa-user-cog mr-2"></i> Account Settings
            </a>

            <div class="dropdown-divider"></div>
                <a href="/logout" class="dropdown-item bg-danger">
                    <i class="fas fa-sign-out-alt mr-2"></i> Log Out
                </a>
            </div>
        </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light ml-1">Azure Cinema <strong>Portal</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group mt-2" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="/home" class="nav-link {{ Route::is('home') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <!-- /.nav-item -->

          <li class="nav-item {{ Route::is('members') ? 'menu-open' : '' }} {{ Route::is('waiting_members') ? 'menu-open' : '' }} {{ Route::is('recently_members') ? 'menu-open' : '' }}">
            <!-- Nav Member -->
            <a href="#"
              class="nav-link {{ Route::is('members') ? 'active' : '' }} {{ Route::is('waiting_members') ? 'active' : '' }} {{ Route::is('recently_members') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Manage Members
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/waiting_members" class="nav-link {{ Route::is('waiting_members') ? 'active' : '' }}">
                  <i class="fas fa-user-clock nav-icon"></i>
                  <p>Waiting to Approve</p>
                  <span class="badge badge-info right">6</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="/recently_members" class="nav-link {{ Route::is('recently_members') ? 'active' : '' }}">
                  <i class="fas fa-user-check nav-icon"></i>
                  <p>Recently Added</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/members" class="nav-link {{ Route::is('members') ? 'active' : '' }}">
                  <i class="fas fa-users nav-icon"></i>
                  <p>All Members</p>
                  <span class="badge badge-info right">6</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- /.nav-item -->

          <li class="nav-item {{ Route::is('customers') ? 'menu-open' : '' }} {{ Route::is('customers.free') ? 'menu-open' : '' }} {{ Route::is('customers.premium') ? 'menu-open' : '' }}">
            <!-- Nav Member -->
            <a href="#" class="nav-link {{ Route::is('customers') ? 'active' : '' }} {{ Route::is('customers.free') ? 'active' : '' }} {{ Route::is('customers.premium') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Manage Customers
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ Route('customers.free') }}" class="nav-link {{ Route::is('customers.free') ? 'active' : '' }}">
                  <i class="fas fa-star nav-icon"></i>
                  <p>Free Customers</p>
                  <span class="badge badge-primary right">6</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('customers.premium') }}" class="nav-link {{ Route::is('customers.premium') ? 'active' : '' }}">
                  <i class="fas fa-medal nav-icon"></i>
                  <p>Premium Customers</p>
                  <span class="badge badge-primary right">6</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('customers') }}" class="nav-link {{ Route::is('customers') ? 'active' : '' }}">
                  <i class="fas fa-users nav-icon"></i>
                  <p>All Customers</p>
                  <span class="badge badge-primary right">6</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- /.nav-item -->

          <li class="nav-item {{ Route::is('cinemas') ? 'menu-open' : '' }} {{ Route::is('films') ? 'menu-open' : '' }} {{ Route::is('cinema.search') ? 'menu-open' : '' }} {{ Route::is('film.search') ? 'menu-open' : '' }} {{ Route::is('seats') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Route::is('cinemas') ? 'active' : '' }} {{ Route::is('films') ? 'active' : '' }} {{ Route::is('cinema.search') ? 'active' : '' }} {{ Route::is('film.search') ? 'active' : '' }} {{ Route::is('seats') ? 'active' : '' }}">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Manage Items
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/cinemas" class="nav-link {{ Route::is('cinemas') ? 'active' : '' }} {{ Route::is('cinema.search') ? 'active' : '' }} {{ Route::is('seats') ? 'active' : '' }}">
                    <i class="fas fa-landmark nav-icon"></i>
                  <p>Manage Cinemas</p>
                  <span class="badge badge-danger right">6</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="/films" class="nav-link {{ Route::is('films') ? 'active' : '' }} {{ Route::is('film.search') ? 'active' : '' }}">
                  <i class="fas fa-film nav-icon"></i>
                  <p>Manage Films</p>
                  <span class="badge badge-danger right">6</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- /.nav-item -->

          <li class="nav-item {{ Route::is('tickets') ? 'menu-open' : '' }} {{ Route::is('codes') ? 'menu-open' : '' }} {{ Route::is('code.search') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Route::is('tickets') ? 'active' : '' }} {{ Route::is('codes') ? 'active' : '' }} {{ Route::is('code.search') ? 'active' : '' }}">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Ticket Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/tickets" class="nav-link {{ Route::is('tickets') ? 'active' : '' }}">
                  <i class="fas fa-ticket-alt nav-icon"></i>
                  <p>Ticket</p>
                  <span class="badge badge-danger right">6</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="/codes" class="nav-link {{ Route::is('codes') ? 'active' : '' }} {{ Route::is('code.search') ? 'active' : '' }}">
                  <i class="fas fa-receipt nav-icon"></i>
                  <p>Promote Code</p>
                  <span class="badge badge-danger right">6</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- /.nav-item -->

          <li class="nav-item">
            <a href="/transactions" class="nav-link {{ Route::is('transactions') ? 'active' : '' }} {{ Route::is('searchTransaction') ? 'active' : '' }}">
              <i class="nav-icon fas fa-barcode"></i>
              <p>Manage Transaction</p>
            </a>
          </li>
          <!-- /.nav-item -->

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->

    @section('content')
    @show

  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<!-- <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script> -->

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ asset('dist/js/pages/dashboard2.js') }}"></script> --}}
<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });

  // read url create
  function readURL_create(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#previewImage_create').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
  };

  // read url update
  function readURL_update(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#previewImage_update').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
  };



</script>

<!-- customize script for modal -->
<script>
    $(document).ready(function() {

        // img input create
        $("#imgInput_create").change(function(){
            $("#fileName_create").text(this.files[0].name);
            });

        $("#imgInput_create").change(function(){
            readURL_create(this);
        });

        // img input update
        $("#imgInput_update").change(function(){
            $("#fileName_update").text(this.files[0].name);
            });

        $("#imgInput_update").change(function(){
            readURL_update(this);
        });

        // view modal
        $('#view').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            var name = button.data('name')
            var image = button.data('img')
            var desc = button.data('desc')
            var location = button.data('location')

            // additional var for items
            var genre = button.data('genre')
            var label = button.data('lbl')
            var label_class = button.data('lbl-class')

            var modal = $(this)

            modal.find('.modal-header #name').text(name)
            modal.find('.table #name').text(name)
            modal.find('.table #genre').append(genre)
            modal.find('.table #desc').text(desc)
            modal.find('.table #location').text(location)

            modal.find('.modal-body .ribbon-wrapper div').removeClass().addClass('ribbon').addClass(label_class)
            modal.find('.modal-body .ribbon').text(label)
            modal.find('.modal-body #image').attr('src', image)



            modal.find('.modal-body p').text("Are you sure want to remove \'" + name + "\' ?")
            modal.find('.modal-footer #remove-btn').attr("onclick", "window.location.href = '" + id + "';")
        });

        // reset form modal
        $('.modal').on('hidden.bs.modal', function(){
            $(".table #genre:not(:empty)").empty(); // this is remove genre lists on film modal view
            $(this).find('form')[0].reset();

            // niat ngremove class pas wis dihidden
        });

        // remove modal
        $('#remove').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            var name = button.data('name')

            var modal = $(this)

            modal.find('.modal-body p').text("Are you sure want to remove \'" + name + "\' ?")
            modal.find('.modal-footer #remove-btn').attr("onclick", "window.location.href = '" + id + "';")
        });

        // getting text based on select value
        $('#searchBy').change(function (event) {
            var key = $('#searchBy option').filter(':selected').val();
            var visibleKey = $('#searchBy option:selected').text();

            // send this to action form attribute
            $('form#search').attr("action", key);
            // send this to input with id #search-input
            $('input#search-input').attr("placeholder", "Search by " + visibleKey);
        });
    });
</script>

{{-- alert --}}
<script>
    // sweetalert2 alert
    $(function() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
@if(Session::has('success'))

    Toast.fire({
        icon: 'success',
        title: '{{ Session::get('success') }}'
    })

@elseif(Session::has('errors'))

    Toast.fire({
        icon: 'error',
        title: 'Failed to save, make sure the data entered is correct.'
    })

@endif
    });
</script>

@section('script')
@show

</body>
</html>
