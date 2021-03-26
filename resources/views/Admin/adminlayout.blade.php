<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('grupi/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('grupi/css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('grupi/css/font.css') }}" rel="stylesheet">
    <link href="{{ asset('grupi/fonts/material-icon/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>


    
    <title>@yield('title')</title>
  </head>
  <body>
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Dashboard</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="{{url('logout')}}">Sign out</a>
      </li>
    </ul>
  </nav>
  <section class="col-lg-2 fixed-top sidebar mt-5">
    <div class="row">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="{{url('/admin')}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
            Data Table Biasa <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/admin/userdata')}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
            Data Table Yajra
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
            Products
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
            Customers
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
            Reports
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
            Integrations
          </a>
        </li>
      </ul>
    </div>
  </section>

  <section class="mh-100 col-lg-10 content bg-white">
    <div class="row mt-5">
      <div class="col-lg-12">
        @yield('container')
      </div>
    </div>
  </section>

  <script src="{{ asset('grupi/js/jquery.js') }}"></script>
  <script src="{{ asset('grupi/js/main.js') }}"></script>
  <script src="{{ asset('grupi/js/bootstrap.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
        $(document).ready(function() {
        $('#data_users_reguler').DataTable();
    } );
  </script>
  <script>
    $(function() {
        $('#data_users_side').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{url('/admin/users_server_side')}}",
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'Barcode',
                    name: 'Barcode'
                },
                {
                    data: 'Aksi',
                    name: 'Aksi'
                },
            ]
        });
    });
  </script>
  </body>
</html>