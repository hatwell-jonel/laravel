<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('local_assets/pupLogo.webp')}}" class="img-circle" alt="User Image">
        </div>
      </div>
     

      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu"  data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="{{route('userAnnouncement')}}">
           <i class="fa fa-dashboard"></i> <span>Announcement</span>
          </a>
        </li>
        <li class="active">
          <a href="{{route('userProfile')}}">
            <i class="fa  fa-bars"></i> <span>Profile</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>