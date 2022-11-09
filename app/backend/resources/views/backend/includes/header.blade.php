<header class="main-header" id="header">
    <nav class="navbar navbar-static-top navbar-expand-lg w-100">
      <!-- Sidebar toggle button -->
      <button id="sidebar-toggler" class="sidebar-toggle">
        <span class="sr-only">Toggle navigation</span>
      </button>
      <!-- search form -->
      <div class="search-form d-none d-lg-inline-block"></div>

      <div class="navbar-right ">
        <ul class="nav navbar-nav">
         
          <!-- User Account -->
          <li class="dropdown user-menu">
            <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <span class="user-image d-lg-none">{{Auth::user()->name}}</span>
              <span class="d-none d-lg-inline-block">{{Auth::user()->name}}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
            
              <li class="right-sidebar-in">
                <a href="{{route('profile.read')}}"> <i class="fa-solid fa-user"></i> Profile </a>
              </li>

              <li class="right-sidebar-in">
                <a href="{{route('profile.pass.edit')}}">
                  <i class="fa-solid fa-key"></i> Change Password </a>
              </li>

              <li class="dropdown-footer">
                <form 
                  method="POST" 
                  action="{{ route('logout') }}" 
                  id="logoutform">
                  @csrf 
                </form>
                <a style="cursor: pointer;" onclick="event.preventDefault();
                $('#logoutform').submit();"> <i class="mdi mdi-logout"></i> Log Out </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>


  </header>