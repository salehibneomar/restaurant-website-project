<!DOCTYPE html>
<html lang="en">
<head>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Sign In</title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
  <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />


  <!-- PLUGINS CSS STYLE -->
  <link href="{{asset('backend/plugins/nprogress/nprogress.css')}}" rel="stylesheet" />

  

  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="{{asset('backend/css/sleek.css')}}" />

  <!-- FAVICON -->
  {{-- <link href="assets/img/favicon.png" rel="shortcut icon" /> --}}

  

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="{{asset('backend/plugins/nprogress/nprogress.js')}}"></script>
</head>

</head>
  <body class="" id="body">
      <div class="container d-flex flex-column justify-content-between vh-100">
      <div class="row justify-content-center mt-5">
        <div class="col-xl-5 col-lg-6 col-md-10">
          @if(session('msg'))
          <div class="alert alert-danger">
            {{session('msg')}}
          </div>
          @endif
          <div class="card">
            @php
              $site_info = getSiteInfo();
            @endphp
            <div class="card-header p-0">
              <div class="app-brand p-2">
                <a href="{{route('login')}}">
                  <img class="brand-icon" src="{{asset($site_info->icon)}}" >
                  <span class="brand-name">{{$site_info->name}}</span>
                </a>
              </div>
            </div>
            <div class="card-body p-5">
              <h4 class="text-dark mb-5">Sign In</h4>
              <form method="POST" action="{{ route('login.store') }}">
                @csrf

                <div class="row">
                  <div class="form-group col-md-12 mb-4">
                    <input type="tel" class="form-control input-lg" id="tel" aria-describedby="telHelp" placeholder="Phone Number" value="{{old('phone')}}" name="phone">
                    @error('phone')
                      <span class="form-text text-danger">{{$message}}</span>
                    @endif
                  </div>
                  <div class="form-group col-md-12 ">
                    <input type="password" class="form-control input-lg" id="password" placeholder="Password" name="password">
                    @error('password')
                      <span class="form-text text-danger">{{$message}}</span>
                    @endif
                  </div>
                  <div class="col-md-12">
                    <div class="d-flex my-2 justify-content-between">
                      {{-- <div class="d-inline-block mr-3">
                        <label class="control control-checkbox">Remember me
                          <input type="checkbox" />
                          <div class="control-indicator"></div>
                        </label>

                      </div> --}}
                      {{-- <p><a class="text-blue" href="#">Forgot Your Password?</a></p> --}}
                    </div>
                    <button type="submit" class="btn btn-lg btn-success btn-block mb-4">Sign In</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright pl-0">
        <p class="text-center">
          &copy; 2022, {{$site_info->name}} , Saleh Ibne Omar
        </p>
      </div>
    </div>

</body>
</html>