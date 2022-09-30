<div>
    <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>PUP</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>PUP</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
    
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  {{-- <span class="hidden-xs">{{ Auth::user()->name }}</span> --}}
                  <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                  </li>
                  <!-- Menu Footer-->   
                  <li class="user-footer">
                    <div class="pull-right" style="width:100%">
                        <a class="dropdown-item btn btn-default" style="width:100%" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
    
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header> 
</div>