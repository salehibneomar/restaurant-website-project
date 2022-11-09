<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar">
      <!-- Aplication Brand -->
      <div class="app-brand">
        <a href="{{route('dashboard')}}" title="Dashboard">
          <img src="{{asset('images/icon/icon.png')}}" alt="icon" class="brand-icon" height="30" width="30">
          <span class="brand-name text-truncate">Dashboard</span>
        </a>
      </div>
      
      <!-- begin sidebar scrollbar -->
      <div class="sidebar-scrollbar">
        <!-- sidebar menu -->
        <ul class="nav sidebar-inner" id="sidebar-menu">
            <li  class="has-sub" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
                aria-expanded="false" aria-controls="dashboard">
                <i class="fa fa-globe" aria-hidden="true"></i>
                <span class="nav-text">Site</span> <b class="caret"></b>

              </a>
              <ul  class="collapse"  id="dashboard"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
                    @if(Auth::user()->role=='admin')
                    <li >
                      <a class="sidenav-item-link" href="{{route('siteinformation.read')}}">
                        <span class="nav-text">General Information</span>
                      </a>
                    </li>
                    @endif
                      <li >
                        <a class="sidenav-item-link" href="{{route('site.banner')}}">
                          <span class="nav-text">Banner</span>
                        </a>
                      </li>
                      <li >
                        <a class="sidenav-item-link" href="{{route('site.icon')}}">
                          <span class="nav-text">Icon</span>
                        </a>
                      </li>
                </div>
              </ul>
            </li>

            <li  class="has-sub" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#socialmedia"
                aria-expanded="false" aria-controls="socialmedia">
                <i class="fa-solid fa-hashtag"></i>
                <span class="nav-text">Social Media</span> <b class="caret"></b>

              </a>
              <ul  class="collapse"  id="socialmedia"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
                      <li >
                        <a class="sidenav-item-link" href="{{route('socialmedia.read')}}">
                          <span class="nav-text">Manage</span>
                        </a>
                      </li>
                </div>
              </ul>
            </li>

            <li  class="has-sub" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#menu"
                aria-expanded="false" aria-controls="menu">
                <i class="mdi mdi-food" style="font-size: 20pt;"></i>
                <span class="nav-text">Menu</span> <b class="caret"></b>

              </a>
              <ul  class="collapse"  id="menu"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
                      <li >
                        <a class="sidenav-item-link" href="{{route('menu.types.read')}}">
                          <span class="nav-text">Types</span>
                        </a>
                      </li>
                      @foreach (getMenuTypes() as $type)
                      <li >
                        <a class="sidenav-item-link" href="{{route('menu.read', ['type'=>$type->slug])}}">
                          <span class="nav-text">{{$type->name}}</span>
                        </a>
                      </li>
                      @endforeach

                </div>
              </ul>
            </li>

            @if (Auth::user()->role=='admin')
            <li  class="has-sub" >
              <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#editor"
                aria-expanded="false" aria-controls="editor">
                <i class="fa-solid fa-users"></i>
                <span class="nav-text">Editors</span> <b class="caret"></b>

              </a>
              <ul  class="collapse"  id="editor"
                data-parent="#sidebar-menu">
                <div class="sub-menu">
                      <li >
                        <a class="sidenav-item-link" href="{{route('editor.read')}}">
                          <span class="nav-text">View All</span>
                        </a>
                      </li>
                      <li >
                        <a class="sidenav-item-link" href="{{route('editor.create')}}">
                          <span class="nav-text">Assign New</span>
                        </a>
                      </li>
                </div>
              </ul>
            </li>
            @endif

        </ul>

      </div>


    </div>
  </aside>