<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    @include('backend.includes.head')
</head>

<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
  <script>
    NProgress.configure({ showSpinner: false });
    NProgress.start();
  </script>

  <div class="wrapper">
      <!-- Sidebar-->
      @include('backend.includes.aside')

      <div class="page-wrapper">
      <!-- Header -->
      @include('backend.includes.header')

      <div class="content-wrapper">
        <div class="content">	
          @include('backend.includes.alert')				 
          <div class="row">
              @yield('main')
          </div>
        </div>
      </div>

      @include('backend.includes.footer')

      </div>
  </div>

  @include('backend.includes.script')
  
</body>
</html>
