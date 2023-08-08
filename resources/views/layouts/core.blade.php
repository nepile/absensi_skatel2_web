<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title }} | Sistem Informasi Absensi | SMK Telkom 2 Medan</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
  <link rel="icon" href="{{ asset('img/logo.png') }}">
  <link rel="stylesheet" href="{{ asset('css/public.css') }}">
  <link rel="stylesheet" href="{{ asset('css/loading.css') }}">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
</head>
<body>
  <!-- Semi-transparent overlay -->
  <div id="loading-overlay"></div>
  
  <!-- Add a loading popup -->
  <div id="loading-popup">
    <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
    <p class="text-center" style="font-size: 12px">Loading...</p>
    
    <img src="{{ asset('img/logo2.png') }}" width="180" alt="">
  </div>
  
  <div class="container-fluid">
    <div class="row">
      
      @include('components.sidebar')
      
      <!-- Main Content -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex flex-md-column flex-row justify-content-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">{{ $title }}</h1>
        </div>
        @yield('content-core')
      </main>
    </div>
  </div>
  
  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery (required by Bootstrap JS) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Font Awesome JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
  <!-- Activate script to handle sidebar toggle and close -->
  <script src="{{ asset('js/sidebar.js') }}"></script>
  <script src="{{ asset('js/loading.js') }}"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
  <script>
    new DataTable('#data');
  </script>
  
  
  @include('components.popup')
</body>
</html>