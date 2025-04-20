<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Kasir Web</title>
   <link href="{{ asset('bootstrap-5.3.5-dist/css/bootstrap.min.css') }}" rel="stylesheet">
   <link href="{{ asset('bootstrap-icons-1.11.3/font/bootstrap-icons.min.css') }}" rel="stylesheet">
   <style>
      .whitespace-nowrap {
         white-space: nowrap;
      }

      .nav-active {
         color: var(--bs-primary) !important
      }

      .nav-active:hover {
         color: var(--bs-primary) !important
      }

      .table-action {
         width: 0;
         white-space: nowrap;
      }
   </style>
</head>

<body class="bg-light">
   <div class="d-flex">
      <div class="d-flex flex-column flex-shrink-0 bg-white p-3 shadow-sm" style="width: 280px;height: 100vh;">
         <a href="/"
            class="d-flex align-items-center mb-md-0 me-md-auto link-dark text-decoration-none mb-3 gap-2">
            <i class="bi bi-shop fs-4 fw-bold"></i>
            <span class="fs-4 fw-bold">Web Kasir</span>
         </a>
         <hr>
         <ul class="nav nav-pills flex-column mb-auto gap-3">
            <li class="nav-item">
               <a href="/" class="nav-link link-dark @yield('nav-dashboard')" aria-current="page">
                  <i class="bi bi-columns-gap me-2"></i>
                  Dashboard
               </a>
            </li>
            <li>
               <a href="{{ route('categories.index') }}" class="nav-link link-dark @yield('nav-category')">
                  <i class="bi bi-grid me-2"></i>
                  Master Kategori
               </a>
            </li>
            <li>
               <a href="{{ route('items.index') }}" class="nav-link link-dark @yield('nav-item')">
                  <i class="bi bi-list-stars me-2"></i>
                  Master Item
               </a>
            </li>
            <li>
               <a href="{{ route('transactions.index') }}" class="nav-link link-dark @yield('nav-transaction')">
                  <i class="bi bi-journal-text me-2"></i>
                  Transaksi
               </a>
            </li>
            <li>
               <a href="{{ route('transactions.history') }}" class="nav-link link-dark @yield('nav-history')">
                  <i class="bi bi-clock-history me-2"></i>
                  Histori Transaksi
               </a>
            </li>
         </ul>
         <hr>
         <a href="{{ route('logout') }}" class="fs-5 text-black" style="text-decoration: none">
            <i class="bi bi-box-arrow-left me-2"></i>
            <span>Sign Out</span>
         </a>
      </div>
      <main class="w-100 px-5 py-4">
         @yield('content')
      </main>
   </div>
   <script src="{{ asset('bootstrap-5.3.5-dist/js/bootstrap.bundle.min.js') }}"></script>

   <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
   @include('sweetalert::alert')

   @stack('scripts')
</body>

</html>
