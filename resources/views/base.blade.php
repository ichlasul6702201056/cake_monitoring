@extends('foundation')
@section('frame')
<div id="layoutSidenav_content">
    <main>
      <div class="container-fluid px-4">
        @yield('big-title')
        <div class="card mb-4">
          <div class="card-header">
            @yield('title')
          </div>
          <div class="card-body">
            @yield('body')
            
          </div>
        </div>
      </div>
    </main>

    <footer class="py-4 bg-light mt-auto">
      <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
          <div class="text-muted">Copyright &copy; Your Website 2023</div>
          <div>
            <a href="#">Privacy Policy</a>
            &middot;
            <a href="#">Terms &amp; Conditions</a>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <script src="{{ asset('js/base.js') }}"></script>
  <script src="{{asset('js/script.js')}}"></script>
  <script src="{{ asset('js/cdn.jsdelivr.net_npm_popper.js@1.12.9_dist_umd_popper.min.js') }}"></script>
  <script src="{{ asset('js/cdn.jsdelivr.net_npm_bootstrap@5.2.3_dist_js_bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/cdnjs.cloudflare.com_ajax_libs_Chart.js_2.8.0_Chart.min.js') }}"></script>
  <script src="{{ asset('js/code.jquery.com_jquery-3.2.1.slim.min.js') }}"></script>
  <script src="{{ asset('js/code.jquery.com_jquery-3.5.1.js') }}"></script>
  <script src="{{ asset('js/cdn.datatables.net_1.13.5_js_jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/cdn.jsdelivr.net_npm_@popperjs_core@2.11.8_dist_umd_popper.min.js') }}"></script>
  <script src="{{ asset('js/cdn.jsdelivr.net_npm_bootstrap@4.0.0_dist_js_bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/cdn.jsdelivr.net_npm_simple-datatables@7.1.2_dist_umd_simple-datatables.min.js') }}"></script> 

@endsection